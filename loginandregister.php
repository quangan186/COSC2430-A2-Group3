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

    <form class="modal-content animate" method="post" action="signup.php">
      <div class="container">
        <label for="firstname"><b>First Name</b></label>
        <input type="text" placeholder="E.g: John" name="firstname" id="first name" required>

        <label for="lastname"><b>Last Name</b></label>
        <input type="text" placeholder="E.g: Brown" name="lastname" id="last name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw" required>

        <label for="password_confirm"><b>Repeat Password</b></label>
        <input type="password" placeholder="Re-enter your Password" name="password_confirm" id="psw-repeat" required>
        <label> Gender</label>
    
        <div class="form-check required">
            <label class="form-check-label">
                <input name="gender" value="F" <?php echo $gender == 1? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios1">
                Female 
            </label> <br>

            <label class="form-check-label">
                <input name="gender" value="M" <?php echo $gender == 2? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios2">
                Male
            </label> <br> 

            <label class="form-check-label">
                <input name="gender" value="O" <?php echo $gender == 3? "checked" : ""; ?> type="radio" class="form-check-input" id="optionsRadios3" checked>
                Other
            </label>  <br>
        </div>

        <p>By creating an account you agree to InstaKilogram's <a href="privacy.php">Terms & Privacy</a></p>
      <button type="submit" class="regisbtn">Register</button>

        <p>Already have an account? <a href="#" onclick="document.getElementById('id01').style.display='none'">Sign in </a></p>
          <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

      </div>
    </form>
  </div>
</html>
