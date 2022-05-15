<?php
    include("classes/autoload.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $filename = 'accounts.csv';

        // call for User class
        $user = new Signup();
        $valid_user = $user->check_login($username, $password, $filename);

        if($valid_user){
            $_SESSION['userid'] = $valid_user;
            header('Location: index.php');
        } else {
            header('Location: login.php');
            $_SESSION['message'] = "Invalid Username or Password";    
        }
    }
    