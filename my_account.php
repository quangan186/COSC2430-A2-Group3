<?php
    include("classes/autoload.php");
    
     // If user is not logged in, redirect user to login page
     if (!isset($_SESSION['userid'])){
        $_SESSION['message'] = "You have to log in first";
        header('location:loginandregister.php');
    }
?>
