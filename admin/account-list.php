<?php
    session_start();
    include_once("../admin/search-validation.php");
    if(!isset($_SESSION['adminid'])){
        $_SESSION['message'] = "You have to log in first";
        header('location:admin-login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/admin-sidebar-menu.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
</head>
<body>
    <?php include("../support/admin-header.php") ?>
    <main class="main-container">
        <?php include("../support/admin-sidebar-menu-accountlist.php") ?>
        <div class="table-container">
            <table class="accounts">
                <tr class="title">
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Registration date</th>
                    <th></th>
                </tr>

                <?php
                    if (isset($_GET['result']) && !empty($_GET['result'])){
                        display_pagination_data($_GET['result']) ;
                    } else{
                        if (empty($_GET["search_info"])){
                            display_pagination_data(sort_row("../accounts.csv"));
                        }    
                    }
                ?>
            </table>
            <div class="page-bar">
                <?php
                        if (!empty($_GET["search_info"])){
                            if (empty($_GET['result'])){
                                echo $_SESSION['error_message']; 
                                unset($_SESSION['error_message']) ;
                            } else{
                                pagination($_GET['result']);
                            }
                        } else{
                            pagination(sort_row("../accounts.csv"));
                        }
                    ?> 
            </div>
        </div>     
    </main>
    <?php include("../support/admin-footer.php") ?>

</body>
<script src="../js/MenuBtn.js"></script>
</html>