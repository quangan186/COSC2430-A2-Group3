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
</head>
<body>
    <?php include("../support/admin-header.php") ?>
    <main class="main-container">
        <?php include("../support/admin-sidebar-menu-accountlist.php") ?>
        <div class="table-container">
            <table class="accounts">
                <tr class="title">
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Registration date</th>
                </tr>

                <tr class="data">
                    <td>S123456</td>
                    <td>Diablo186</td>
                    <td>4/25/2022</td>
                </tr>

                <tr class="data">
                    <td>S024680</td>
                    <td>qa186</td>
                    <td>4/26/2022</td>
                </tr>

                <tr class="data">
                    <td>S15791</td>
                    <td>hiiam186</td>
                    <td>4/27/2022</td>
                </tr>
            </table>
        </div>
        
    </main>
    <?php include("../support/admin-footer.php") ?>

</body>
<script src="../js/MenuBtn.js"></script>
</html>