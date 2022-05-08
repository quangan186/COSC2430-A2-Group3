<?php
    include("classes/autoload.php");

// If the registration form is submitted, call function and store the result of its function in $result
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // create signup class
        $signup = new Signup();

        // Call function evaluate with data $_POST
        $result = $signup->evaluate($_POST);

        //   If there is error
      if($result)
      {
          $_SESSION['message'] = $result;
          header('Location: loginandregister.php');
      }

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $password_confirm = $_POST['password_confirm'];
      $profile_image = $_POST['profile_image'];
    }