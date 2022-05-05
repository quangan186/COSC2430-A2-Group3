<?php
    include("classes/autoload.php");

    // define variables and set to empty values
    $firstname = $lastname = $email =  $password = $password_confirm = $profile_image = "";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/loginandregister.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Slackey&display=swap" rel="stylesheet">
</head>
<body>
<!-- Success Message -->
<?php 
if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) 
{ ?>
  <div class="success-message" style="margin-bottom: 20px;font-size: 20px;color: green;">
    <?php echo $_SESSION['success_message']; ?>
  </div>

<?php
  unset($_SESSION['success_message']);
}
?>
<!-- Logo -->
  <div class="logo">
      <h1> InstaKilogram </h1>
  </div>
<!-- Logo Ends -->
<!-- ------------------------------------------------------------ -->

<!-- ------------------------------------------------------------ -->
<!-- Login Form -->
<form method="POST" action="login_validation.php">
  <div class="inputbox">
    <label for="username"><b>Username or phone number</b></label>
    <input type="text" placeholder="Enter Username" name="username" id="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

    <button class="loginbtn" type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</form>
<!-- Login Form Ends -->
<!-- ------------------------------------------------------------ -->


  <div class="inputbox" >
    <span class="password"> <a href="#">Forgot your password?</a></span>
    <span>Don't have an account? Register here </span>
  </div>


<!-- ------------------------------------------------------------ -->
<!-- Register Form -->
  <div class="inputbox">
        <button class="regisbtn" onclick="document.getElementById('id01').style.display='block'">Register</button>
  </div>

  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

    <form class="modal-content animate" method="post" action="register_validation.php">
      <div class="greeting">
        <h1> Register </h1>
        <p> Become part of us, it's free </p>

    </div>


      <div class="inputbox1">
        <label for="firstname"><b>First Name</b></label>
        <input type="text" placeholder="E.g: John" name="firstname" id="first name" required>

        <label for="lastname"><b>Last Name</b></label>
        <input type="text" placeholder="E.g: Brown" name="lastname" id="last name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>

        <label for="password_confirm"><b>Repeat Password</b></label>
        <input type="password" placeholder="Re-enter your Password" name="password_confirm" id="password_confirm" required>
          <p>By creating an account you agree to InstaKilogram's <a href="privacy.php">Terms & Privacy</a></p>
        <button type="submit" class="regisbtn">Register</button>
        <button type="reset" class="regisbtn">Clear</button>

        <p>Already have an account? <a href="#" onclick="document.getElementById('id01').style.display='none'">Sign in </a></p>
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  <!-- Register Form Ends -->
  </div>
</html>
