<?php
include('classes/autoload.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $post = new Post();
    $id = $_SESSION['userid'];
    $result = $post->create_post($id, $_POST, $_FILES); 
    $_SESSION['message'] = 'Successful Share Image';
    header('Location: index.php');
}

