<?php
session_unset();
include '../app/Controllers/inscription.php';

$inscr = new Inscription();
// var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Clarisse.W, Evan.N, Gildas.L, Sarah.B" />
  <meta name="description" content="Twitter - Version dev" />

  <title>Twitter</title>

  <script src="../public/js/jquery/jquery.min.js"></script>

  <link rel="stylesheet" href="../public/css/index.css">
  <link rel="stylesheet" href="../public/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../public/fonts/FontAwesome_6/all.min.css">

  <?php include '../public/favicon/favicon.php'; ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-6 first-img none"></div>
      <div class="col-6">
        <div class="container">
          <div class="icon mt-5">
            <i class="fa-brands fa-twitter twitter-icon"></i>
          </div>
          <div class="twitter-titile my-5">
            <h1 class="title">Happening now</h1>
          </div>
          <div class="subtitle">
            <h2 class="stitle">Join Twitter today.</h2>
          </div>

          <div class="pt-5 mb-3 mt-5">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger rounded-pill w-50 p-2" data-bs-toggle="modal"
              data-bs-target="#signUp">Sign up
            </button>
            <!-- Modal -->
            <div class="modal fade" id="signUp" tabindex="-1" aria-labelledby="signUpLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content border border-light">
                  <div class="modal-body">
                    <div id="form">
                      <div id="top_head">
                        <button type="button" id='close' data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                        <i id="logo" class="fa-brands fa-twitter"></i>
                      </div>
                      <br />
                      <form action="../app/Controllers/SignupControl.php" method="POST">
                        <h5>Create your account</h5>
                        <div class="form-floating mb-3">
                          <input type="text" name="name" required class="form-control" id="signupCountChar"
                            maxlength="50">
                          <label for="floatingInput">Name <span id="char"></span></label>
                        </div>
                        <div class="form-floating mb-3" id="mail">
                          <input type="email" name="email" required class="form-control" id="floatingInput"
                            maxlength="50">
                          <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">


                          <input name="mdp" password-toggle type="password" class="form-control" placeholder="Password"
                            required>
                          <div class="form-check">
                            <input class="form-check-input toggleVisibility" type="checkbox" checked
                              style="float: left!important; margin-top: 1em;">
                            <label class="form-check-label" style="float: left!important; margin-top: .8em;">
                              Hide password
                            </label>
                          </div>

                          <br />

                        </div>
                        <br>
                        <p>Date of birth</p>
                        <p id="info_bday">This will not be shown publicly. Confirm your own age,
                          even if this account is for a business, a pet, or something else.
                        </p>

                        <div id="bday">
                          <label>
                            <select name="day">
                              <!-- Boucle avec les jours en php -->
                              <?php $inscr->day() ?>
                            </select>
                          </label>
                          <label>
                            <select name="month">
                              <!-- Boucle avec les mois en php -->
                              <?php for ($m = 1; $m <= 12; ++$m) {
    $month_label = date('F', mktime(0, 0, 0, $m, 1)); ?>
                              <option value="<?php echo $m ?>">
                                <?php echo $month_label; ?>
                              </option>
                              <?php
} ?>
                            </select>
                          </label>
                          <label>
                            <select name="year">
                              <!-- Boucle avec les annnées en php -->
                              <?php $inscr->year() ?>
                            </select>
                          </label>
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                          <button class="next">Go!</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="login-but mt-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-black btn-outline-light rounded-pill w-50 p-2" data-bs-toggle="modal"
              data-bs-target="#logIn">Log in
            </button>
            <!-- Modal -->
            <div class="modal fade" id="logIn" tabindex="-1" aria-labelledby="LoginLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content border border-light">
                  <div class="modal-body">
                    <div id="form">
                      <div id="top_head">
                        <button type="button" id='close' data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                        <i id="logo" class="fa-brands fa-twitter"></i>
                      </div>
                      <br />
                      <form action="../app/Controllers/LoginControl.php" method="POST">
                        <h5>Log in to your account</h5>
                        <br>
                        <div class="form-floating mb-3" id="mail">
                          <input type="email" name="email" required class="form-control" id="floatingInput"
                            maxlength="50">
                          <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">


                          <input name="mdp" password-toggle type="password" class="form-control" placeholder="Password"
                            required>
                          <div class="form-check">
                            <input class="form-check-input toggleVisibility" type="checkbox" checked
                              style="float: left!important; margin-top: 1em;">
                            <label class="form-check-label" style="float: left!important; margin-top: .8em;">
                              Hide password
                            </label>
                          </div>

                          <br />

                        </div>
                        <br>
                        <br>
                        <div style="text-align: center;">
                          <button class="next">Go!</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-center mt-3">
    <div class="footer-link">
      <a href="fix.php" class="px-2">About</a>
      <a href="fix.php" class="px-2">Help center</a>
      <a href="fix.php" class="px-2">Terms of Service</a>
      <a href="fix.php" class="px-2">Privacy Policy</a>
      <a href="fix.php" class="px-2">Cookie Policy</a>
      <a href="fix.php" class="px-2">Accessibility</a>
      <a href="fix.php" class="px-2">Ads info</a>
      <a href="fix.php" class="px-2">Blog</a>
      <a href="fix.php" class="px-2">Status</a>
      <a href="fix.php" class="px-2">Careers</a>
      <a href="fix.php" class="px-2">Brand Resources</a>
      <a href="fix.php" class="px-2">Advertising</a>
      <a href="fix.php" class="px-2">Marketing</a>
      <a href="fix.php" class="px-2">Twitter for Business</a>
      <a href="fix.php" class="px-2">Developers</a>
      <a href="fix.php" class="px-2">Directory</a>
      <a href="fix.php" class="px-2">Settings</a>
      <br>
      <span class="copy-right">© 2022 Twitter, Inc.</span>
    </div>
  </footer>

  <script src="../public/js/bootstrap/bootstrap.bundle.js"></script>
  <!-- <script src="../public/js/fontawesome/all.min.js"></script> -->
  <script src="../public/js/main.js"></script>
</body>

</html>