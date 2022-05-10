<?php
include('classes/autoload.php');
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $post = new Post();
    $id = $_SESSION['userid'];
    $result = $post->create_post($id, $_POST, $_FILES); 

    echo $result;
    // if($result == "")
    // {
    //     echo 'There havent any post';
    // }
    // else
    // {
    //     echo "<div class='alert alert-info text-center'>";
    //     echo $result;
    //     echo "</div>";
					    
    // }
}

