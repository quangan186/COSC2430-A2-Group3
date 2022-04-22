<!DOCTYPE html>
<html>
<div class="container">
  <h1>Login</h1>
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

<div>
  <span class="regist">Don't have an account? Register here </span>

</div>

<div>
      <button class="regisbtn" onclick="document.getElementById('id01').style.display='block'">Register</button>

</div>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <form class="modal-content animate"
    <div class="container">
      <h1>Register</h1> 
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
    </div>
    <p>By creating an account you agree to InstaKilogram's <a href="#">Terms & Privacy</a></p>
    <button type="submit" class="registerbtn">Register</button>
    <div class="container signin">
      <p>Already have an account? <a href="#" onclick="document.getElementById('id01').style.display='none'">Sign in </a></p>
    </div>
    <div class="container" >
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

</html>
