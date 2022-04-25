<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <div class="logo">
    <img src="">
  <div class="container">
    <label for="uname"><b>Username or phone number</b></label>
    <input type="text" placeholder="Enter Username" name="uname" id="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="password" required>

    <button class="loginbtn" type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" >
    <span class="psw"> <a href="#">Forgot your password?</a></span>
  </div>

  <div class="regist">
    <span>Don't have an account? Register here </span>

  </div>

  <div class="container">
        <button class="regisbtn" onclick="document.getElementById('id01').style.display='block'">Register</button>

  </div>

  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'"
  class="close" title="Close Modal">&times;</span>

    <form class="modal-content animate">
      <div class="container">
        <label for="fname"><b>First Name</b></label>
        <input type="text" placeholder="E.g: John" name="fname" id="first name" required>

        <label for="lname"><b>Last Name</b></label>
        <input type="text" placeholder="E.g: Brown" name="lname" id="last name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Re-enter your Password" name="psw-repeat" id="psw-repeat" required>
          <p>By creating an account you agree to InstaKilogram's <a href="privacy.php">Terms & Privacy</a></p>
      <button type="submit" class="regisbtn">Register</button>

        <p>Already have an account? <a href="#" onclick="document.getElementById('id01').style.display='none'">Sign in </a></p>
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

      </div>
    </form>
  </div>
</html>
