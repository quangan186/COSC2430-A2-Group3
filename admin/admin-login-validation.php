<?php
    session_start();
    $_POST["invalid_account"] = "";
    if (isset($_POST["log_in"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (strcasecmp($username, "group3@rmit.edu.vn") == 0 || $password == "012345"){
            sleep(3);
            header("Location: admin.php");
            exit();
        } else{
            $_POST["invalid_account"] .= "Invalid account!";
            sleep(3);
            header("Location: admin-login.php");
        }
        
    }
    
?>