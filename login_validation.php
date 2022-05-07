<?php
    include("classes/autoload.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fcsv = file('accounts.csv');

        // call for User class
        $user = new Signup();
        $valid_user = $user->check_login($username, $password, $fcsv);

        if($valid_user){
            $_SESSION['userid'] = $valid_user;
            header('Location: index.php');
        } else {
            $_SESSION['message'] = "Invalid Username or Password";
            header('Location: loginandregister.php');
        }
    }
    