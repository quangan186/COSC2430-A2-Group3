<?php
    include("classes/autoload.php");
    
     // If user is not logged in, redirect user to login page
     if (!isset($_SESSION['userid'])){
        $_SESSION['message'] = "You have to log in first";
        header('location:loginandregister.php');
    }

    $userid = $_SESSION['userid'];
    $user = new Signup();

    $userData = $user->get_userdata($userid);    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account Page</title>
</head>
<body>
    
    <a href="index.php">Homepage</a>
    <a href="logout.php">Logout</a>

    <!-- Display Information -->
<table summary="state data">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Profile Picture</th>
        <th>Userid</th>
        <th>URL Link</th>
        <th>Registered Time</th>
    </tr>

<?php
foreach( $userData as $my_state ) {
?>
    <tr>
    <td><?php 
    echo( $my_state['1'] ); ?></td>
    <td><?php 
    echo( $my_state['2'] ); ?></td>
    <td><?php 
    echo( $my_state['3'] ); ?></td>
    <td>
        <?php
            $image = "";

            if(file_exists($my_state['5'])){
                $image = $my_state['5'];
            } else {
                echo 'There is no image';
            }
        
            echo $image; 
        ?>
            <form method="post" enctype="multipart/form-data" action="update-image.php">
                <input type="file" name="update_profile">
                <input type="submit">
            </form>

    </td>
    <td><?php 
    echo( $my_state['6'] ); ?></td>
    <td><?php 
    echo( $my_state['7'] ); ?></td>
    <td><?php 
    echo( $my_state['8'] ); ?></td>
    <td>
    </tr>

<?php
 } ?>
</table>
<br>          
</body>
</html>
