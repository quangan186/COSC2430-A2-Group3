<?php
    session_start();
    include('../classes/image.class.php');
    include('../classes/signup.class.php');
    include("../admin/function.php");
    $id = $_GET['id'];
    $data_list = get_data_without_null("../accounts.csv");
   
    $name = $email = $password = $profile_image = $password = $registration_date = $userid = '';
    for ($i = 0; $i < count($data_list); $i++){
        if (in_array($id,$data_list[$i])){
            $name .= $data_list[$i][1] . " " . $data_list[$i][2];
            $email .= $data_list[$i][3];
            $password .= $data_list[$i][4];
            $profile_image .= $data_list[$i][5];
            $userid .= $data_list[$i][6];
            $registration_date .= $data_list[$i][8] . " " . $data_list[$i][9];
        }
        
    } 
// if admin submit form, process the form in user-information
// get userid, new password, insert into new database
$user = new Signup();
$image = new Image();

$i_had_updated = $user->get_data($id, 1, '../account-updated.csv');

// Neu nguoi dung da tung update roi, lay data moi nhat
if(!empty($i_had_updated)){
    array_multisort(array_column($i_had_updated, 3), SORT_DESC, $i_had_updated);
    $password = $i_had_updated[0][2];
} 

 // Check if user had submit form (request for image update)
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
      // Hash Password
      if(isset($_POST['reset-psw']) && !empty($_POST['reset-psw'])){
        $password = $_POST['reset-psw'];

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $newDate = date("d-m-Y H:i:s",time());

      $file_open = fopen("../account-updated.csv", "a");
      $no_rows = count(file("../account-updated.csv"));
      if($no_rows > 1)
      {
          $no_rows = ($no_rows - 1) + 1;
      }

      $form_data = array(
          'sr_no' => $no_rows,
          'userid' => $userid,
          'password' => $hashed_password,
          'date' => $newDate,
      );
      $registration = implode(",", $form_data);
      fwrite($file_open, "{$registration}\n");
      header('location:user-information.php?id='.$userid);
      // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();
    } else {
        echo 'You have not input';
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
    <span id="notification">
            <?php
                if (isset($_SESSION["notification"]) && !empty($_SESSION["notification"])){
                    echo "<span id='notification'>";
                    echo $_SESSION["notification"];
                    echo "</span>";
                    unset($_SESSION["notification"]);
                }
            ?>
    </span>
    <main class="main-content">
        <div class="user-image">
            <img src="<?= "../" .$profile_image ?>" alt="avatar">
        </div>
        <div class="user-info">
            <ul>
                <li><span>Name: </span><?= $name ?></li>
                <li><span>Email: </span><?= $email ?></li>
                <li><span>Password: </span><?= $password ?></li>
                <li><span>User ID: </span><?= $userid ?></li>
                <li><span>Registration date: </span><?= $registration_date ?></li>
            </ul>

            <div class="button-container">
                <button class="reset-password" onclick="EditPassword()">Edit password</button>

                <div class="edit-password">
                    <?php 
                        echo "<form action='../admin/user-information.php?id=" .   $userid   ."'" . " method='POST'>";
                    ?>
                    <div class="password-input">
                        <label for="new-password">Enter new password: </label>
                        <input type="password" id="new-password" name="reset-psw">
                    </div>
                    <div class="form-btn">
                        <input type="submit" value="Save" class="btn_reset">
                        <!-- <button class="cancel-change" onclick="CancelEdit()">Cancel</button> -->
                    </div>    
                        
                    <?php
                        echo "</form>";
                    ?>
                    

                </div>
            </div>
            
        </div>  
    </main>
    <?php include("../support/admin-footer.php") ?>
</body>
<script src="../js/MenuBtn.js"></script>
</html>