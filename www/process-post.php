<?php
include('classes/autoload.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $image = new Image();
    $id = $_SESSION['userid']; 
    
    $result = $image->insert_image($id, $_POST, $_FILES, 'images.csv');

    if($result){
        $_SESSION['message'] = $result;
        header('Location: index.php');
    } else {
        $_SESSION['message'] = 'Successfully Share Post';
        header('Location: index.php'); 
    }   
}

