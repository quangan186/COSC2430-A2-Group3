<?php
    include("classes/autoload.php");
    $user = new Signup();

    // Sort Descending
    $arrayFile = $user->format_db('images.csv');
    array_multisort(array_column($arrayFile, 6), SORT_DESC, $arrayFile);

    // Get all public post in db
    $publicPost = $user->get_data('public', 5, $arrayFile);
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
    <link rel="stylesheet" href="/css/cookie.css">
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
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                    include("createPosts.php");
                ?>

                <!------------------- FEEDS --------------------->
                <div class="feeds">
                    <?php
                    // If user logged in (not a guest)
                        if(isset($_SESSION['userid'])){
                            // Display public post, internal post
                            $id = $_SESSION['userid'];
                            
                            foreach($arrayFile as $array){
                                if(isset($array[1]) || isset($array[2]) || isset($array[3]) || isset($array[4]) || isset($array[5]) || isset($array[6])){
                                    if($array[5] !== 'private'){
                                        include('new-feed.php');
                                    } else if($array[1] == $id){
                                        include('new-feed.php');
                                    }
                                }
                                

                            }
                        } 
                        // If user is not logged in (guest), display all public post in Descending order
                        else 
                        {
                            array_multisort(array_column($publicPost, 6), SORT_DESC, $publicPost);
                            foreach($publicPost as $array){
                                include('new-feed.php');
                            }
                        }                      
                    ?>
                    <!---------------- END OF FEED ----------------->
                </div>
                <!------------------------------- END OF FEEDS ------------------------------------>
            </div>
            <!--======================== END OF MIDDLE ==========================-->
        </div>
        <?php
    // } else {
    //     print_r($publicPost); 
    // }
?>
    </main>
    <?php
        include('support/footer.php');
    ?>
</body>
<script src="./js/cookie.js"></script>
<script src="./js/MenuBtn.js"></script>
</html>