<?php
    session_start();
    // $_POST["invalid_account"] = "";
    if (isset($_POST["log_in"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if (strcasecmp($username, "group3@rmit.edu.vn") == 0 && $password == "012345"){
            $_SESSION['adminid'] = 'group3';
            header("Location: admin.php");
        } else{
            $_SESSION["message"] = "Invalid account!";
            header("Location: admin-login.php");
            unset($_SESSION["message"]);
        }
        
    }
    
?>