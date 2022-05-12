<?php
    session_start();
    // $_POST["invalid_account"] = "";
    if (isset($_POST["log_in"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (strcasecmp($username, "group3@rmit.edu.vn") == 0 && $password == "012345"){
            sleep(2);
            header("Location: admin.php");
        } else{
            $_SESSION["invalid_account"] = "Invalid account!";
            sleep(2);
            unset($_SESSION["invalid_account"]);
            header("Location: admin-login.php");
        }
        
    }
    
?>