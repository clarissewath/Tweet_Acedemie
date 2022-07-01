<?php
require '../app/Controllers/TweetController.php';
require '../app/Controllers/HashtagsController.php';
//var_dump($_POST);
?>
<!Doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Twitter</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="../public/js/jquery/jquery.min.js"></script>

  <link rel="stylesheet" href="../public/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../public/fonts/FontAwesome_6/all.min.css">
  <link rel="stylesheet" href="../public/css/feed.css">
  <?php include '../public/favicon/favicon.php'; ?>

</head>

<body>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-1 col-md-1 col-2' id="col"></div>
      <div class='col-lg-2 col-md-1 col-2' id="flex-nav">
        <nav>
          <ul class="nav flex-column" style="width: max-content;">
            <li class="nav-item">
              <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./feed.php"><i class="fas fa-house-chimney"></i><span
                  class="menu-text">Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#"><i class="fa-solid fa-hashtag"></i><span class="menu-text">
                  Explore</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./notification.php"><i class="fa-regular fa-bell"></i> <span
                  class="menu-text">Notifications</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./message.php"><i class="far fa-envelope"></i><span
                  class="menu-text">Messages</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./bookmark.php"><i class="far fa-bookmark"></i><span class="menu-text">
                  Bookmarks</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./list.php"><i class="far fa-list-alt"></i><span
                  class="menu-text">Lists</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./profile.php"><i class="fa-regular fa-user"></i><span class="menu-text">
                  Profile</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./more.php"><i class="fas fa-ellipsis-h"></i><span class="menu-text">
                  More</span></a>
            </li>
          </ul>
          <button type="button" class="btn btn-primary btn-sm tweeterBtn">Tweet</button>

        </nav>
        <a href="#" class="nav-profile">
          <div class="nav-ppic"><img src="../public/images/img_avatar2.png" class="avatar" alt="Avatar"></div>
          <div class="nav-username">
            <strong id="account-username"> Canapé Academy</strong>
            <span class="twitter-account"> @canape42_</span>
          </div>
          <!-- <i class="fas fa-ellipsis-h" id="profile-more"></i>  -->
        </a>
      </div>
      <div class='col-lg-5 col-md-11 col-10' id="main">
        <div class="container mt-4">
          <form id="searchTags_form" method="post" action="explore.php">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Search tags</label>
              <input name="searchTags_input" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-dark">Submit</button>
          </form>
          <?php

$hashtag = new Hashtag;
if (!empty($_POST['searchTags_input'])) {
    foreach ($hashtag->getHashTags($_POST['searchTags_input']) as $k => $v) {
        echo "<div>";
        echo $v['hashtag'];
        // var_dump($v);
        echo "</div>";
    }
}
?>
        </div>
        <div class="modal custom fade" id="theme" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content border border-light">
              <div class="modal-body">
                <div id="form">
                  <div id="top_head">
                    <button type="button" id='close' data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa-solid fa-xmark"></i></button>
                    <p id="title">Customize your view</p>
                    <p id="subtitle">Manage your color and background. These settings affect all the Twitter accounts on
                      this browser.</p>
                  </div>
                  <br />
                  <div id="color-theme">
                    <select>
                      <option>Yellow</option>
                      <option>Red</option>
                      <option>Purple</option>
                      <option>Blue</option>
                    </select>
                    <select>
                      <option>Default</option>
                      <option>Black</option>
                      <option>Grey</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class='col-lg-3 d-none d-lg-block' id="rightBlock">
        <div class="search">
          <form>
            <label>
              <input type="search" placeholder="search twitter" />
            </label>
          </form>
        </div>
        <br />
        <div class="trends">
          <div class="heading">
            <h5>Trends for you</h5>
            <i class="fa-solid fa-gear" id="trends-gear"></i>
          </div>
          <a href="#" class="trend-1">
            <div class="trend-info">
              <span class="info-category"><span class="trend-category">Politics</span> - Trending</span>
              <span class="hashtag-trend">#UKRAINE</span>
              <span class="nb-tweets">500K Tweets</span>
            </div>
            <i class="fas fa-ellipsis-h" id="trends-more"></i>
          </a>
          <a href="#" class="trend-1">
            <div class="trend-info">
              <span class="info-category"><span class="trend-category">France</span> - Trending</span>
              <span class="hashtag-trend">Michel Drucker</span>
              <span class="nb-tweets">240K Tweets</span>
            </div>
            <i class="fas fa-ellipsis-h" id="trends-more"></i>
          </a>
          <a href="#" class="trend-1">
            <div class="trend-info">
              <span class="info-category"><span class="trend-category">Politics</span> - Trending</span>
              <span class="hashtag-trend">#RUSSIE</span>
              <span class="nb-tweets">460K Tweets</span>
            </div>
            <i class="fas fa-ellipsis-h" id="trends-more"></i>
          </a>
          <div class="heading">
            <a href="#" class="more_r">Show more</a>
          </div>
        </div>
        <div class="other-profiles">
          <div class="heading">
            <h5>You might like</h5>
          </div>
          <a href="#" class="profile-1">
            <div class="profile-img"><img src="../public/images/img_avatar2.png" class="avatar" alt="Avatar"></div>
            <div class="profile-name">
              <span class="name">Poutine</span> <br />
              <span class="twitter-account">@poutin</span>
            </div>
            <div class="follow-btn"><button>Follow</button></div>
          </a>
          <a href="#" class="profile-1">
            <div class="profile-img"><img src="../public/images/img_avatar.png" class="avatar" alt="Avatar">
            </div>
            <div class="profile-name">
              <span class="name">CTE Magazine</span> <br />
              <span class="twitter-account">@W@C</span>
            </div>
            <div class="follow-btn"><button>Follow</button></div>
          </a>
          <a href="#" class="profile-1">
            <div class="profile-img"><img src="../public/images/img_avatar2.png" class="avatar" alt="Avatar">
            </div>
            <div class="profile-name">
              <span class="name">CTE Magazine</span> <br />
              <span class="twitter-account">@W@C</span>
            </div>
            <div class="follow-btn"><button>Follow</button></div>
          </a>
          <div class="heading">
            <a href="#">Show more</a>
          </div>
        </div>
        <br />
        <div id="policy">
          <span><strong>Design:</strong>
            <a href="#">@W@C</a> +
            <a href="#">@W@C</a>
          </span><br />
          <span><strong>Backend:</strong>
            <a href="#">@W@C</a> +
            <a href="#">@W@C</a>
          </span><br />
        </div>
        <br />
      </div>
      <div class='col-lg-1 col-md-1 col-2'></div>
    </div>

  </div>
  </div>
  <footer></footer>


  <script src="../public/js/bootstrap/bootstrap.bundle.js"></script>
  <!-- <script src="../public/js/fontawesome/all.min.js"></script> -->
  <script src="../public/js/main.js"></script>
</body>

</html>