<?php
    include("../admin/function.php");
    $id = $_GET['id'];
    $data_list = get_data_without_null();
    $name = $email = $password = $profile_image = $password = $registration_date = $user_id = '';
    for ($i = 0; $i < count($data_list); $i++){
        if (in_array($id,$data_list[$i])){
            $name .= $data_list[$i][1] . " " . $data_list[$i][2];
            $email .= $data_list[$i][3];
            $password .= $data_list[$i][4];
            $profile_image .= $data_list[$i][5];
            $user_id .= $data_list[$i][6];
            $registration_date .= $data_list[$i][8] . " " . $data_list[$i][9];
        }
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
    <link rel="stylesheet" href="../css/user-information.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
</head>
<body>
    <?php include("../support/admin-header.php") ?>
    <main class="main-content">
        <div class="user-image">
            <img src="<?= "../" .$profile_image ?>" alt="avatar">
        </div>
        <div class="user-info">
            <ul>
                <li><span>Name: </span><?= $name ?></li>
                <li><span>Email: </span><?= $email ?></li>
                <li><span>Password: </span><?= $password ?></li>
                <li><span>User ID: </span><?= $user_id ?></li>
                <li><span>Registration date: </span><?= $registration_date ?></li>
            </ul>
        </div>
        <form action="./user-information.php" method="POST">
            <button class="reset-password" type="submit" name="reset_password">Reset password</button>
        </form>
    </main>
    <?php include("../support/admin-footer.php") ?>
</body>
</html>