<?php
include("classes/autoload.php");

// If user is not logged in, redirect user to login page
if (!isset($_SESSION['userid'])) {
  $_SESSION['message'] = "You have to log in first";
  header('location:login.php');
}

$id = $_SESSION['userid'];
$user = new Signup();

$userData = $user->get_data($id, 6, 'accounts.csv');

// if($_SERVER['REQUEST_METHOD'] == 'POST')
// {
//   $col_filter = array_column($userData, 5);
//   print_r($userData);
//   print_r($col_filter);
// }
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


<body>
  <?php include('support/header.php'); ?>   
  <main class="user-profile-container">
    <?php
    foreach ($userData as $my_state) {
    ?>
      <div class="user-image">
        <img src="<?php echo $my_state[5]; ?>" alt="">

        <form method="post" enctype="multipart/form-data">
          <label for="photo">Upload Image</label>
          <input name="update_profile" type="file" id="photo" accept="image/*" onchange="showPreview(event);">
          <input type="submit" value="Save" class="save-button">
        </form>

      </div>

      <div class="user-info">
        <div class="info">
          <ul>
            <li><span>User ID: </span><?= $my_state['6'] ?> </li>
            <li><span>Name: </span><?= $my_state['1']  . " " .  $my_state['2']  ?></li>
            <li><span>Email: </span><?= $my_state['3']  ?></li>
            <li><span>Registration date: </span><?= $my_state['8']  . " " .  $my_state['9']  ?></li>
          </ul>
        </div>

        <div class="logout">
          <a href="./logout.php">Logout</a>
        </div>
      </div>

  </main>

<?php
    } ?>

<?php include("./support/footer.php"); ?>
</body>

<script src="./js/cookie.js"></script>
<script src="./js/MenuBtn.js"></script>
</html>