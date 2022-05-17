<?php
    include("classes/autoload.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $username = $_POST['username'];

        // call for User class
        $user = new Signup();

        $id = $user->get_userid($username);

        if(!$id){
            header('Location: login.php');
            $_SESSION['message'] = 'You have not registered';
        } else {
            $i_had_updated = $user->get_data($id, 1, 'account-updated.csv');
        }

        // Neu nguoi dung da tung update roi, lay data moi nhat
        if(!empty($i_had_updated)){
            array_multisort(array_column($i_had_updated, 3), SORT_DESC, $i_had_updated);
            $password = $i_had_updated[0][2];
            $filename = 'account-updated.csv';
        } else {
            $password = $_POST['password'];
            $filename = 'accounts.csv';
        }

        $valid_user = $user->check_login($username, $password, $filename);

        if($valid_user){
            $_SESSION['userid'] = $valid_user;
            header('Location: index.php');
        } else {
            header('Location: login.php');
            $_SESSION['message'] = "*Invalid Username or Password";    
        }
    }
    