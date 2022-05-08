<?php
    include("classes/autoload.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Social Website</title>
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?php
        include('support/header.php');
    ?>
    <!------------------------- MAIN -------------------------->
    <main> 
        <a href="logout.php">Logout</a>
        <a href="my_account.php">My Account</a>
        <div class="container">
            <!--======================== LEFT ==========================-->
            <div class="left">
                <a class="profile">
                    <div class="profile-photo">
                        <img src="images/profile-10.jpg" alt="... ">
                    </div>
                    <div class="handle">

                        <p class="text-muted">
                            @dayi
                        </p>
                    </div>
                </a>

                <!-------------------- SIDEBAR ------------------------->
                <div class="sidebar">
                    <a class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Home</h3>
                    </a>
                
                    <a class="menu-item">
                        <span><i class="uil uil-chart-line"></i></span>
                        <h3>Analytics</h3>
                    </a>
                    <a class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                    <a class="menu-item">
                        <span><i class="uil uil-setting"></i></span>
                        <h3>Settings</h3>
                    </a>
                </div>
                <!------------------- END OF SIDEBAR -------------------->
                <label for="create-post" class="btn btn-primary">Create Post</label>
            </div>
            <!------------------- END OF LEFT -------------------->



            <!--======================== MIDDLE ==========================-->
            <div class="middle">
                <?php
                    include("createPosts.php");
                ?>

                <!------------------- FEEDS --------------------->
                <div class="feeds">
                    <!------------------- FEED 1 --------------------->
                    <div class="feed">
                        <div class="head">
                            <div class="user">
                                <div class="profile-photo">
                                    <img src="./images/profile-13.jpg">
                                </div>
                                <div class="ingo">
                                    <h3>Lana Rose</h3>
                                    <small>Dubai, 15 MINUTES AGO</small>
                                </div>
                            </div>
                            <span class="edit">
                                <i class="uil uil-ellipsis-h"></i>
                            </span>
                        </div>

                        <div class="photo">
                            <img src="./images/feed-1.jpg">
                        </div>

                        <div class="action-buttons">
                            <div class="interaction-buttons">
                            <!-- HEART ICON(s) STARTS --> 
                                <div class="btns">
                                <Button onclick="Toggle1()" id="btnh1" class="btn"><i class="fas fa-heart"></i></Button>
                                <Button onclick="Toggle2()" id="btnh2" class="btn"><i class="uil uil-comment-dots"></i></Button>
                                <Button onclick="Toggle2()" id="btnh2" class="btn"><i class="uil uil-share-alt"></i></Button>
                                </div>
                                <script>
        
                                //    First Like Button   
                                var btnvar1 = document.getElementById('btnh1');

                                function Toggle1(){
                                            if (btnvar1.style.color =="red") {
                                                btnvar1.style.color = "grey"
                                            }
                                            else{
                                                btnvar1.style.color = "red"
                                            }
                                }
                                </script>
                                <!-- HEART ICON ENDS --> 
                            </div>
                            <div class="bookmark">
                                <span><i class="uil uil-bookmark-full"></i></span>
                            </div>
                        </div>

                        <div class="liked-by">
                            <span><img src="./images/profile-10.jpg"></span>
                            <span><img src="./images/profile-4.jpg"></span>
                            <span><img src="./images/profile-15.jpg"></span>
                            <p>Liked by <b>Ernest Achiever</b> and <b>2,323 others</b></p>
                        </div>

                        <div class="caption">
                            <p><b>Lana Rose</b> Just recieved gifts from my online friends. <span
                                    class="harsh-tag">#lifestyle</span></p>
                        </div>
                        <div class="comments text-muted">View all 277 comments</div>
                    </div>
                    <!---------------- END OF FEED ----------------->
                </div>
                <!------------------------------- END OF FEEDS ------------------------------------>
            </div>
            <!--======================== END OF MIDDLE ==========================-->
        </div>
    </main>
    <?php
        include('support/footer.php');
    ?>
</body>

</html>