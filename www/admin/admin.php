<?php
    session_start();
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
    <title>InstaKilogram</title>
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
       <?php include("../support/admin-sidebar-menu.php") ?> 
        <div class="board-container">
            <div class="board" onclick="AccountList()">
                <div>
                    <!-- <h1>50</h1> -->
                    <?php
                        $csv_file = file("../accounts.csv");
                        echo "<h1>" . count($csv_file) . "</h1>"; 
                    ?>
                    <p>Users</p> 
                </div>
                <div>
                <i class="fa-solid fa-users"></i>
                </div>
            </div>

            <div class="board" onclick="PostList()">
            <div>
                    <!-- <h1>50</h1> -->
                    <?php
                        $row = 1;
                        $post_count = [];
                        if (($handle = fopen("../images.csv", "r")) !== FALSE) {
                          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                              $row++;
                              if(isset($data[0])){
                                if (ctype_digit($data[0])){
                                  array_push($post_count, $data);
                                }  
                              }
                
                            }
                          fclose($handle);
                        }
                        echo "<h1>". count($post_count) ."</h1>" ;
                    ?>
                    <p>Posts</p> 
                </div>
                <div>
                    <i class="fa-solid fa-image"></i>
                </div>
            </div>
        </div>
    </main>
    <?php include("../support/admin-footer.php") ?>
</body>
<script src="../js/MenuBtn.js"></script>
</html>