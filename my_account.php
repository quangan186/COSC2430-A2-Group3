<?php
include("classes/autoload.php");

// If user is not logged in, redirect user to login page
if (!isset($_SESSION['userid'])) {
  $_SESSION['message'] = "You have to log in first";
  header('location:login.php');
} else {
  $id = $_SESSION['userid'];

    $user = new Signup();
    $image = new Image();

    $userData = $user->get_data($id, 6, 'accounts.csv');
    
    foreach($userData as $data){
        if(isset($data[1]) && isset($data[6]) && isset($data[2]) && isset($data[3]) && isset($data[4]) && isset($data[5])  && isset($data[8])  && isset($data[9])){
            $array = $data;
        } else {
            echo 'Your data not found';
        }
    }

    $i_had_updated = $user->get_data($id, 1, 'image-update.csv');

    // Neu nguoi dung da tung update roi, lay data moi nhat
    if(!empty($i_had_updated)){
        array_multisort(array_column($i_had_updated, 4), SORT_DESC, $i_had_updated);
        $img_src = $i_had_updated[0][2];
    } else {
      if(isset($array[5])){
        $img_src = $array[5];
      }
    }

    // Check if user had submit form (request for image update)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $insert_result = $image->insert_image($id, '', $_FILES, 'image-update.csv');
        if($insert_result){
            $_SESSION['message'] = $insert_result;
        } else {
            $_SESSION['message'] = 'Successfully Update Image';
            header('location: my_account.php');
        }
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
  <link rel="stylesheet" href="./css/my_account.css">
  <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
  <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">

</head>
<?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>

<body>
  <?php include('support/header.php'); ?>   
  <main class="user-profile-container">
      <div class="user-image">
      <img src="<?php echo $img_src ?>" alt="profilepic">

        <form method="post" enctype="multipart/form-data">
          <label for="photo">Upload Image</label>
          <input name="file" type="file" id="photo" accept="image/*" onchange="showPreview(event);">
          <input type="submit" value="Save" class="save-button">
        </form>

      </div>

      <div class="user-info">
        <div class="info">
          <ul>
            <li><span>User ID: </span><?= $array[6] ?> </li>
            <li><span>Name: </span><?= $array[1]  . " " .  $array[2]  ?></li>
            <li><span>Email: </span><?= $array[3]  ?></li>
            <li><span>Registration date: </span><?= $array[8]  . " " .  $array[9]  ?></li>
          </ul>
        </div>

        <div class="logout">
          <a href="./logout.php">Logout</a>
        </div>
      </div>

  </main>


<?php include("./support/footer.php"); ?>
</body>

<script src="./js/cookie.js"></script>
<script src="./js/MenuBtn.js"></script>
</html>