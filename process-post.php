<?php
include('classes/autoload.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $post = new Post();
    $id = $_SESSION['userid']; 
    
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
    $result = $post->create_post($id, $_POST, $_FILES);
    if($result){
        $_SESSION['message'] = $result;
        header('Location: index.php');
    } else {
        $_SESSION['message'] = 'Successfully Share Post';
        header('Location: index.php'); 
    }   
}

