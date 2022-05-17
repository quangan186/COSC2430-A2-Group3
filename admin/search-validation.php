<?php
    include("../admin/function.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if (!empty($_GET["search_info"])){
            $filter_data = search_user($_GET["search_info"]);
            if (count($filter_data) != 0){
                $_GET['result'] = search_user($_GET["search_info"]);
            } else{
                $_SESSION['error_message'] = "No result found";
            }
        }
    }
    
?>