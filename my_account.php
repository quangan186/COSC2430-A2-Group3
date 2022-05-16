<?php
    include("classes/autoload.php");

     // If user is not logged in, redirect user to login page
     if (!isset($_SESSION['userid'])){
        $_SESSION['message'] = "You have to log in first";
        header('location:login.php');
    }

    $userid = $_SESSION['userid'];
    $user = new Signup();

    $userData = $user->get_data($userid, 6, 'accounts.csv');    

    // if($_SERVER['REQUEST_METHOD'] == 'POST')
    // {
    //   $col_filter = array_column($userData, 5);
    //   print_r($userData);
    //   print_r($col_filter);
    // }
?>
 <?php include ('support/header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/my_account.css">
      <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>My Account Page</title>

</head>

<body>


<!-- <a href="index.php">Homepage</a>
<a href="logout.php">Logout</a> -->
<!-- 
  <div class="logout">
<a href="logout.php"><input type="button" value="Log out">Log Out</a>
  </div> -->

<div class="display">

    <!-- Display Information -->
      <?php
      foreach( $userData as $my_state ) {
      ?>
    <div class="user-profle-image">
      <span id="image-status">
         <?php
            $image = "";

            if(file_exists($my_state['5'])){
                $image = $my_state['5'];
            } else {
              echo "<p>There is no image<p>";
            }

            echo $image;
        ?>
      </span>
            <form method="post" enctype="multipart/form-data">
            <div id="profile" >
            <label for="photo">Upload Image</label>
            <input name="update_profile" type="file" id="photo" accept="image/*" onchange="showPreview(event);">
            <input type="submit">
            </div>


            </form>
        </div>
      <div class="user-name">
        <?php
        echo( $my_state['1'] ); ?></n>
        <?php
        echo( $my_state['2'] ); ?></br>
        <?php
        echo( $my_state['3'] ); ?></br>
      </div>
      <img src="<?php echo $my_state[5]; ?>" alt="">

      <div class="container">
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View more</button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="user-data-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3>Your Information</h3>
              </div>
              <div class="modal-body">
                <p>UserID: <?php
              echo( $my_state['6'] ); ?> </br>
              UserURL: <?php
              echo( $my_state['7'] ); ?></br>
              Register time: <?php
              echo( $my_state['8'] ); ?></br></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>


          </div>
        </div>

      </div>
</div>
<?php
 } ?>

<br>
</body>
<script src="./js/cookie.js"></script>
</html>
