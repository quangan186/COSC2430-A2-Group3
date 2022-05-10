<?php
    // session_start();
    include("./admin-login-validation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/admin-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slackey&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="./fontawesome-free-6.1.1-web/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="./admin-login-validation.php">
        <header class="log-in-header">
            <h1>InstaKilogram</h1>
        </header>

        <main class="form-content">
            <div class="username">
                <label for="email">Username</label>
                <input type="email" id="email" name="username" placeholder="Enter your email" required>
            </div>

            <div class="password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <input type="submit" class="log-in-submit" value="Log in" name= "log_in">
            <span id="error-message">
                <?php
                    if (isset($_SESSION["invalid_account"]) && !empty($_SESSION["invalid_account"])){
                        echo $_SESSION["invalid_account"];
                    } else{
                        unset($_SESSION["invalid_account"]);
                    }
                ?>
            </span>
        </main>
        <footer class="log-in-footer">
            <button class="backBtn" onclick="backButton()">Back to Homepage</button>
        </footer>
    </form>
</body>
<script src="../js/MenuBtn.js"></script>
</html>