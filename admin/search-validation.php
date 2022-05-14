<?php
    include("../admin/function.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        if (!empty($_GET["search_info"])){
            $filter_data = search_user($_GET["search_info"]);
            if (count($filter_data) != 0){
                // unset($_GET['result']);
                // $_GET['name'] = $value[1] . " " . $value[2];
                // $_GET['email'] = $value[3];
                // // print_r($_GET['email']) ;
                // $_GET['password'] = $value[4];
                // // print_r($_GET['password']) ;
                // $_GET['user_id'] = $value[6];
                // // print_r($_GET['user_id']) ;
                // $_GET['url_address'] = $value[7];
                // // print_r($_GET['url_address']) ;
                // $_GET['registration_date'] = $value[8] . ' ' . $value[9];
                $_GET['result'] = search_user($_GET["search_info"]);
                // unset($_SESSION['result']);
            } else{
                $_SESSION['error_message'] = "No result found";
            }
        }
    }
    
?>