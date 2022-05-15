<?php
    include("classes/autoload.php");

    $username = $password = "";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/loginandregister.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Slackey&display=swap" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>


<!-- ------------------------------------------------------------ -->
<!-- Login Form -->
<form class="login-page" method="POST" action="login_validation.php">
  <header class="logo">
    <h1> InstaKilogram </h1>
  </header>

  <main class="form-content">

    <?php
      if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
          echo $_SESSION['message'];
          unset($_SESSION['message']);
      }
    ?>
    <div class="username text-field">
      <label for="username">Username</label>
      <input type="email" placeholder="Enter your email" name="username" id="username" required>
    </div>
   
    <div class="password text-field">
      <label for="password">Password</label>
      <input type="password" placeholder="Enter your password" name="password" id="password" required>
    </div>
    
    <div class="submit-btn">
      <button class="login-btn" type="submit">Login</button>
    </div>
  </main>

  <footer class="footer">
    <span>Don't have an account? <a href="./register.php">Register here</a></span><br>
    <button class="register-btn" onclick="registerButton()">Register</button>
  </footer>
</form>
<!-- Login Form Ends -->
<!-- ------------------------------------------------------------ -->
</body>
<script src="./js/MenuBtn.js"></script>
<script src="loginandregister.js"></script>
</html>
