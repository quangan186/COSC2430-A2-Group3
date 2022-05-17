<?php
    session_start();
    if(!isset($_SESSION['adminid'])){
        $_SESSION['message'] = "You have to log in first";
        header('location:admin-login.php');
    }
include("../admin/function.php");
$posts_list = sort_row("../images.csv");
$users_list = get_data_without_null("../accounts.csv");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-sidebar-menu.css">
    <link rel="stylesheet" href="../css/post-list.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
</head>

<body>
    <?php include("../support/admin-header.php") ?>
    <main class="main-container">
        <?php include("../support/admin-sidebar-menu-postslis.php") ?>
        <div class="post-container">
            <?php foreach ($posts_list as $post) {
            ?>
                <div class="post">
                    <div class="user">
                        <?php
                        foreach ($users_list as $user) {
                            if ($user[6] == $post[1]) {
                                echo "<h1>" . $user[1] . " " . $user[2]  ."</h1>";
                                break;
                            }
                        }
                        ?>
                    </div>

                    <div class="image">
                        <?php
                        if (!empty($post[3])) {
                        ?>
                            <img src="<?= "../" . $post[3] ?>" alt="image">
                        <?php
                        }
                        ?>

                    </div>

                    <div class="status">
                        <?php
                        if (!empty($post[2])) {
                        ?>
                            <?= "<p>". "($post[5]) ". $post[2] ."</p>"; ?>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="delete-button">
                        <button class="delete-btn">Delete</button>
                    </div>
                </div>

            <?php } ?>
        </div>
        </div>


    </main>
    <?php include("../support/admin-footer.php") ?>

</body>
<script src="../js/MenuBtn.js"></script>

</html>