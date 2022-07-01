<?php
include '../app/Controllers/TweetController.php';
include '../app/Models/Follow.php';
include '../app/Models/Reply.php';
include '../app/Models/User.php';
// var_dump($_SESSION);
// var_dump($_GET);
// $test = new Follow;

// var_dump($test->unFollowAction(107, 111));
// var_dump($test->followAction(107, 111));

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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../app/Controllers/ReplyController.php" method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                            <input name="recipient-name" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea name="message" class="form-control" id="message-text"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="sendReply" data-bs-dismiss="modal" class=" btn btn-primary">Send
                        message</button>
                </div>
            </div>
        </div>
    </div>
    <div class='container'>
        <?php
        // $show_tweets = new Tweet();
        //        $show_tweets->getTweets_or_Retweets();
        //      //  var_dump($show_tweets->getTweets());
        //        foreach ($show_tweets->getTweets_or_Retweets() as $k => $v) {
        //          var_dump($v);
        //
        //        //  $date = date_create($v['tweet_date']);
        //        //  $date = date_format($date, 'j D.');
        //        }

        ?>
        <div class='row' id="main_container">

            <div class='col-lg-2 col-md-1 col-2' id="flex-nav">
                <nav>
                    <ul class="nav flex-column" style="width: max-content;">
                        <li class="nav-item">
                            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#"><i class="fas fa-house-chimney"></i><span class="menu-text">Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./explore.php"><i class="fa-solid fa-hashtag"></i><span class="menu-text">
                                    Explore</span></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./notification.php"><i class="fa-regular fa-bell"></i> <span class="menu-text">Notifications</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./message.php"><i class="far fa-envelope"></i><span class="menu-text">Messages</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./bookmark.php"><i class="far fa-bookmark"></i><span class="menu-text">
                                    Bookmarks</span></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./list.php"><i class="far fa-list-alt"></i><span class="menu-text">Lists</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./profile.php"><i class="fa-regular fa-user"></i><span class="menu-text">
                                    Profile</span></a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#theme"><i class="fas fa-ellipsis-h"></i><span class="menu-text"> More</span></a>
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
            <div id="middle_column" class='col-lg-5 col-md-11 col-10'>

                <main id="main__tweet">
                    <div class="first-part">
                        <div><a class="home">Home</a></div>
                        <!-- <div><i class="fa-regular fa-star"></i></div> -->
                    </div>
                    <div class="whats-happening">
                        <form id="post_form">

                            <div class="post-blocks">
                                <div class="post-profile"><img src="../public/images/img_avatar2.png" class="avatar" alt="Avatar"></div>
                                <textarea name="tweet_content" id="head_textarea" placeholder="What's happening?"></textarea>

                            </div>
                            <div id="visibility">
                                <select class="select">
                                    <option>Everyone can reply</option>
                                    <!--&#xf57d; OU <i class="fa-solid fa-earth-americas"></i>-->
                                    <option>People you follow</option>
                                    <!--&#xf4fc; OU <i class="fa-regular fa-user-check"></i>-->
                                    <option>Only People you mention</option>
                                    <!--&#x40; OU <i class="fa-solid fa-at"></i>-->
                                </select>
                                <hr>

                            </div>
                    </div>
                    <div class="post-icons">
                        <div class="first-post-icons">
                            <i class="fa-regular fa-image hov"></i>
                            <i class="fa-solid fa-file-image hov"></i>
                            <i class="fa-regular fa-chart-bar hov"></i>
                            <i class="fa-regular fa-face-smile hov"></i>
                            <i class="fa-regular fa-calendar-check hov"></i>
                            <i class="fa-solid fa-location-dot hov"></i>
                        </div>
                        <div class="second-post-icons">
                            <!-- <i class="far fa-circle"></i>
                                <i class="fas fa-plus-circle"></i>  (s'affiche que quand on commence à ecrire)-->
                            <button type="submit" id="input-twt-btn" style="margin-right: 2em;" class="btn btn-primary btn-sm tweeterBtn">Tweet</button>
                            <div id="count">140</div>
                        </div>
                        </form>

                    </div>
                </main>
                <div class="modal custom fade" id="theme" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border border-light">
                            <div class="modal-body">
                                <div id="form">
                                    <div id="top_head">
                                        <button type="button" id='close' data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                                        <p id="title">Customize your view</p>
                                        <p id="subtitle">Manage your color and background. These settings affect all the
                                            Twitter accounts on this browser.</p>
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
                <section id="tweets">

                    <?php
                    $show_tweets = new Tweet();
                    $show_tweets->getTweets_or_Retweets();

                    $test_reply = new Reply;

                    //  var_dump($show_tweets->getTweets());
                    foreach ($show_tweets->getTweets_or_Retweets() as $k => $v) {
                        $test = new User;
                        // var_dump($test->getUserById($v['retweet_tweet_id']));
                        // print_r($v['retweet_tweet_id']);
                        // var_dump($v);


                        $tweetOrRetweetID = $v['tweet_id'] ?? $v['retweet_tweet_id'];
                        if ($v['retweet_id']) {
                            // var_dump($v);
                            echo '<div style="font-size: 0.8em; font-style : italic;">';
                            echo $v['tweet_username'];
                            echo " a retweeté <i class='fa-solid fa-retweet'></i></a></div>";
                        }
                        $date = date_create($v['tweet_date']);

                        $date = date_format($date, 'j D.');


                        echo '<div class="tweet-1">';
                        echo '<div class="tweet-img">';
                        echo '<img src="../public/images/img_avatar.png" alt="Avatar">';
                        echo '</div>';
                        echo '<div class="tweet-txt">';
                        echo '<div class="tweet-name-date">';
                        //  echo "<input class='id_tweet' name='id_tweet' type='hidden' value='" . $tweetOrRetweetID . "'>";
                        if (!$v['retweet_id']) {
                            echo '<strong> ' . $v['tweet_username'] . '</strong>';
                        }
                        echo "<span class='twitter-account'> " . '';
                        echo $test->getUserById($v['retweet_tweet_id'])[0]['username'] ?? '';
                        echo   '</span>';

                        // echo $v['tweet_username'] ;
                        echo "<span class='date'> " . $date . '</span>';
                        echo '</div>';
                        echo '<div class="message">';

                        echo html_entity_decode($v['tweet_content'] ?? '');
                        echo '</div>';
                        echo "<div class='tweet-icons'>";
                        // echo "<a href='#' ><i id='com'class=' modal_test fa-solid fa-comment-dots'></i></a>";
                        echo "<a href='#' ><i id='com' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever=" . $v['tweet_username'] . " class='fa-solid fa-comment-dots'></i></a>";
                        echo "<a href='#' ><i id='ret'  class='fa-solid fa-retweet tweet_retweet'></i>";
                        echo "<input class='id_tweet' name='id_tweet' type='hidden' value='" . $tweetOrRetweetID . "'>";
                        echo "<a href='#' ><i id='hea'  class='fa-solid fa-heart'></i></a>";
                        echo "<a href='#' ><i  id='par' class='fa-solid fa-arrow-up-from-bracket'></i></a>";

                        echo '</div></div></div>';

                        foreach ($test_reply->getReply($v['tweet_id'] ?? -1) as $k => $v) {
                            //  var_dump($v);
                            //  echo($v['reply_date'] ?? ''); username
                            //  echo($v['content'] ?? '');
                            $date = date_create($v['reply_date']);
                            //    var_dump($date);

                            $date = date_format($date, 'j D.');

                            //   echo $v['username'];
                            echo '<div class="tweet-1" style="margin-top: -2em;  ">';
                            //      echo '<div class="tweet-img">';
                            //      echo '<img src="../public/images/img_avatar.png" alt="Avatar">';
                            //     echo '</div>';
                            echo '<div class="tweet-txt">';
                            echo '<div class="tweet-name-date">';
                            echo "<br><div class='twitter-account'> " . '</div>';
                            echo "<span class='twitter-account'> ";
                            echo ($test->getUserById($v['retweet_tweet_id'])[0]['username']) ?? $v['username'];
                            //   echo " a retweeté <i class='fa-solid fa-retweet'></i></a>";
                            echo ' replied ' . 'on ' . $date . ' </span>';
                            // echo $v['username'] . '</span>';
                            //      echo "<br><div class='date'> " . $date . '</div>';
                            echo "<br>" . $v['content'] ?? '' . "<br>";
                            //     echo "<div class='tweet-icons'>";
                            //     echo "<a href='#' ><i id='com' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo' class='fa-solid fa-comment-dots'></i></a>";
                            //     echo "<a href='#' ><i id='ret'  class='fa-solid fa-retweet tweet_retweet'></i>";
                            //     echo "<a href='#' ><i id='hea'  class='fa-solid fa-heart'></i></a>";
                            //     echo "<a href='#' ><i id='par' class='fa-solid fa-arrow-up-from-bracket'></i></a>";
                            //     echo '</div>';
                            echo '</div>';
                            echo '</div></div>';
                        }
                    }
                    ?>



                </section>

            </div>
            <div class='col-lg-3 d-none d-lg-block m-3 ' id="rightBlock">
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
                <div class="other-profiles" style="background-color : #151618;;">
                    <div class="heading">
                        <h5>You might like</h5>
                    </div>
                    <a href="#" class="profile-1">
                        <div class="profile-img"><img src="../public/images/img_avatar2.png" class="avatar" alt="Avatar"></div>
                        <div class="profile-name">
                            Poutine <br />
                            <span class="name">Poutine</span> <br />
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
                            CTE Magazine <br />
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
        </div>

        <div class='col-lg-1 col-md-1 col-2'></div>
    </div>


    </div>
    </div>
    <footer></footer>

    <script src="../public/js/bootstrap/bootstrap.bundle.js"></script>
    <!-- <!-- <script src="../public/js/fontawesome/all.min.js"></script> --> -->
    <script src="../public/js/main.js"></script>
</body>

</html>