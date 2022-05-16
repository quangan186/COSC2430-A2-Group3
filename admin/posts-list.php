<?php
    include("../admin/function.php");
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
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
</head>
<body>
    <?php include("../support/admin-header.php") ?>
    <main class="main-container">
        <?php include("../support/admin-sidebar-menu-postslis.php") ?>
        <div class="table-container">
            <table class="posts">
                <tr class="title">
                    <th>User ID</th>
                    <th>Post ID</th>
                    <th>Type</th>
                    <th>Registration date</th>
                    <th></th>
                </tr>

                <?php
                     display_pagination_data(sort_row("../images.csv"));
                ?>

                <!-- <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>
                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>
                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>
                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>
                
                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>
                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr>

                <tr class="data">
                    <td>U123456</td>
                    <td>P123456</td>
                    <td>public</td>
                    <td>4/25/2022</td>
                    <td></td>
                </tr> -->
            </table>
        </div>
        
    </main>
    <?php include("../support/admin-footer.php") ?>

</body>
<script src="../js/MenuBtn.js"></script>
</html>