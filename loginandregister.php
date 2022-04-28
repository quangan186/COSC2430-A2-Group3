<?php
    include("classes/autoload.php");

    // define variables and set to empty values
    $firstname = $lastname = $email =  $password = $password_confirm = $gender = "";

    // If the registration form is submitted,
    //   create a class and store the result of its function in $result
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // create signup class
        $signup = new Signup();

        // Call function evaluate with data $_POST
        $result = $signup->evaluate($_POST);

        if($result != "")
        {
            echo "<div style='text-align:center;'>";
            echo "The following errors occured <br>";
            echo $result;
            echo "</div>";
            }
            else
            {
                header("Location: index.php");
                die;
            }

            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
    }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="loginandregister.css">
</head>
<body>
  <div class="logo">
    <img src="">
  <div class="inputbox">
    <label for="uname"><b>Username or phone number</b></label>
    <input type="text" placeholder="Enter Username" name="uname" id="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="password" required>

    <button class="loginbtn" type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="inputbox" >
    <span class="psw"> <a href="#">Forgot your password?</a></span>
    <span>Don't have an account? Register here </span>
  </div>

  <div class="inputbox">
    <span>Don't have an account? Register here </span>

  </div>

  <div class="inputbox">
        <button class="regisbtn" onclick="document.getElementById('id01').style.display='block'">Register</button>

  </div>

  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'"
  class="close" title="Close Modal">&times;</span>

    <form class="modal-content animate" method="post">
      <div class="inputbox1">
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
