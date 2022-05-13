<?php
    session_start();
    include("../admin/function.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if (!empty($_GET["search_info"])){
            $filter_data = search_user($_GET["search_info"]);
            if (count($filter_data) != 0){
                unset($_GET['result']);
                $_GET['result'] = search_user($_GET["search_info"]);
                // unset($_SESSION['result']);
            } else{
                $_SESSION['error_message'] = "No result found";
            }
        }
    }
    
?>