<?php
    include('classes/autoload.php');
    $user = new Signup();
    $post = new Post();

    $publicPost = $user->get_data('public', 5, 'images.csv');

    $internalPost = $user->get_data('internal', 5, 'images.csv');

    $privatePost = $user->get_data('private', 5, 'images.csv');

    $postData = array($publicPost, $internalPost, $privatePost);

    if(isset($_SESSION['userid'])){
        $id = $_SESSION['userid'];
        $check = $user->get_data($id, 1, $privatePost);
        
        foreach($postData as $array){
            foreach($array as $ROW){
                include('new-feedd.php');
            }
        }
    } 
    else 
    {
        foreach($postData as $array){
            foreach($array as $ROW){
                if($ROW[5] == 'public'){
                   include('new-feedd.php');
                }
            }
        }
    }
