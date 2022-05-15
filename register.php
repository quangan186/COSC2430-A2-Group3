<?php
    include("classes/autoload.php");

    $firstname = $lastname = $email = $password = $profile_image = $newDate = '';

// If the registration form is submitted, call function and store the result of its function in $result
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // create signup class
        $signup = new Signup();

        // Call function evaluate with data $_POST
        $result = $signup->evaluate($_POST);

        if($result){
            $_SESSION['message'] = $result;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/register.css">
    <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Slackey&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/fontawesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>


    <form method="post">
        <header class="form-title">
            <h1>Register</h1>
        </header>

        <main class="form-content">
            <div class="image">
                <img id="preview_img" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLeqsbTn6eqpr7PJzc/j5ebf4eLZ3N2wtrnBxsjN0NLGysy6v8HT1tissra8wMNxTKO9AAAFDklEQVR4nO2d3XqDIAxAlfivoO//tEOZWzvbVTEpic252W3PF0gAIcsyRVEURVEURVEURVEURVEURVEURVEURVEURVEURflgAFL/AirAqzXO9R7XNBVcy9TbuMHmxjN6lr92cNVVLKEurVfK/zCORVvW8iUBnC02dj+Wpu0z0Y6QlaN5phcwZqjkOkK5HZyPAjkIjSO4fIdfcOwFKkJlX4zPu7Ha1tIcwR3wWxyFhRG6g4Je0YpSPDJCV8a2Sv2zd1O1x/2WMDZCwljH+clRrHfWCLGK8REMiql//2si5+DKWKcWeAGcFMzzNrXC/0TUwQ2s6+LhlcwjTMlYsUIQzPOCb7YBiyHopyLXIEKPEkI/TgeuiidK/R9FniUDOjRDpvm0RhqjMyyXNjDhCfIMYl1gGjIMIuYsnGEYRMRZOMMunaLVwpWRW008v6fYKDIzxCwVAeNSO90BJW6emelYBRF/kHpYGVaoxTDAaxOFsfP9y8hpJ4xd7gOcij7JNGQ1EYFgkPJa1jQEiYZXRaRINKxSDUW9n+FT82lSKadkiru9/4XPqSLWOekGPoY05TAvLm9orm+YWuwHoBHkZKijNBJGmeb61eL6Ff/6q7bLr7yvv3vKGhpDRjvgjGaPz+gUg6YgcvpyAR2FIZ9U6nEEyZRTovmEU32KichpGn7C17XrfyH9gK/c0CMP05HZIM2uf9sEveizKveBy9/6Qt7o89ne33D525cfcIMW6ab+TMEukQbQbu+xu7X3A9bChmWaCeAkG17bpntwXgWxHaMzGPmUaR5dQZiKqRVeUZ3047fi3nAu28h4CHxCsZAgmEH8Y27jJAhm8c+5RQzRQNVGhVFSfxOYIjp/pP7RxzjevYXVGf4eLt+BJ1vCuLuLkrgABgCGXZ2wik5uty+oBvNirI6mkzhAf4Gsb58Hcm67Jzd+KwD10BYPLL3e0MjvKrgAULnOfveF/O4N2Xb9BZom3gJes3F9X5Zze8/6Yt09b4CrqsEjUv8oFBaR2rl+6CZr2xVrp24o/WitBKuGrrpl1+bFkmK2qXTON4VpbdfLa7o7y/WdLxG7lm2Lqh2clOwTegbvc/vj2U78CwhA87Bn8G5Nk3eOb0Nsr9flz3sG78UUtue4kpv1xvjg3TMay62BMlTlP+vrOMnJsRmt/ze0jsfkPPYdAH57hK+34PeOyc8XIXu5xT2HsUkdZz+adwg8HGFfQ3K5jtDvbUiO4Di9/ywHGrL88pDizZ++oTp+an+SMX/ndymUCwmHMdO7yuOx83pUx/eEMU0AvxWndwgidAqOZ8ypCwdEfvvEo6D9HwpA8wzvmOJEqAg9ySu8g4x0Hb9hSB/BANEKJ+LbPBU0lzbAJs4xt1AoshKkUGQmiH8/jJ0gdhTTLmSegHlPE0oOdXALnqDjKYh3px//fSgSWG8UqfrrIICzYYSJXRr9BSPbpNzw7gBjKjKOYI7ReIGqQRIap5+5MdjyvuDkExvGeXSlONWZAP3/AZBwJohU7QJRGU+cTVH18ELmRPNBmibW6MT/k1b0XhdkRBvyT6SB6EYv/GvhSmRNpGngRULsAlxMCGNXp7w3FfdEbTEEDdLI9TdIKRUzUesa3I461ER8cpNT7gMRhpKmYVS9ELOgCUQsa4SsulciKiLbY+AnHD8cpuhISsnxpamI84sbDq9qYJgf8wiiOBrC7Ml7M7ZECCqKoiiKoiiKoiiKoijv5AvJxlZRyNWWLwAAAABJRU5ErkJggg==" alt="pic" /><br>
                <label for="photo">Upload Image</label><br>
                <input name="profile_image" type="file" id="photo" accept="image/*" onchange="showPreview(event);">
            </div>

            <div class="name-info">
                <div class="first-name">
                    <label for="fname">First name:</label>
                    <span id="invalid-first-name"></span>
                    <input type="text" name="firstname" id="fname" onkeyup="validateFirstName()" placeholder="E.g: An">
                </div>

                <div class="last-name">
                    <label for="lname">Last name:</label>
                    <span id="invalid-last-name"></span>
                    <input type="text" name="lastname" id="lname" onkeyup="validateLastName()" placeholder="E.g: Bui">
                </div>
            </div>

            <div class="email">
                <label for="email">Email:</label>
                <span id="invalid-email"></span>
                <input type="email" name="email" id="email" placeholder="E.g: example@gmail.com" onkeyup="validateEmail()">
            </div>

            <div class="password">
                <label for="password">Password:</label>
                <span id="invalid-password"></span>
                <input type="password" name="password" id="password" placeholder="E.g: Hello123" onkeyup="validatePassword()">
            </div>

            <div class="retype-password">
                <label for="retype-password">Retype password:</label>
                <span id="invalid-retype-password"></span>
                <input type="password" name="password_confirm" id="retype-password" placeholder="Confirm password" onkeyup="validateRetypePassword()">
            </div>

            <span id="invalid-form">
               <?php
                if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                } else{
                    unset($_SESSION['message']);
                }
               ?>
            </span>

            <div class="form-button">
                <button class="clear-button" type="reset">Clear</button>
                <button class="register-button" type="submit">Register</button>
            </div>
        </main>

        <footer class="form-footer">
            <p>Already have an account? <a href="./login.php">Sign in </a></p>
        </footer>
    </form>

    <script src="./js/RegisterValidation.js"></script>
</body>

</html>
