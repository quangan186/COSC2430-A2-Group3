<?php

    function get_data_from_csv($file_name){
        // Open, get raw data and close file
        $data_open = fopen($file_name, 'r');
        $raw_data = fread($data_open,filesize($file_name));
        fclose($data_open);

        // Split the raw data by lines
        $data_split_line = (explode("\n", $raw_data));
        
        // Use loop to split the data by the comma
        foreach($data_split_line as $index => $sub_data_array) {
            $array_full_data[] = explode(",", $sub_data_array);
        }

        return $array_full_data;
    }

    function display_users_list($data_list){
        for ($i = 0; $i < count($data_list); $i++){
            echo "<tr class= 'data'>";
            echo "<td>" . $data_list[$i][0] . "</td>";
            echo "<td>" . $data_list[$i][1] . " " . $data_list[$i][2] . "</td>";
            echo "<td><a href= '#'>" . $data_list[$i][3] . "</a></td>";
            echo "<td>" . $data_list[$i][8] . " " . $data_list[$i][9] . "</td>";
            echo "<td>" . "<button class='view-user-information'>View</button>" . "</td>";
            echo "</tr>";         
        }  

    }

    function sort_row(){
        $reversed_array = array_reverse(get_data_from_csv("../accounts.csv"));
        return $reversed_array;
    }

    function pagination($data_list){
        $num_per_page = 5;
        $total_pages = ceil(count($data_list) / $num_per_page);
        for ($p = 1; $p <= $total_pages; $p++){
            if (!empty($_GET['search_info'])){
                echo "<div class='page-number'><a href ='../admin/account-list.php?page=".$p. "&search_info=". $_GET['search_info'] . "'>".$p."</a></div>";
            } else{
                echo "<div class='page-number'><a href ='../admin/account-list.php?page=".$p. "'>".$p."</a></div>";
            }
        }                                                   
    }

    function set_number_page(){
        if (isset($_GET["page"])){
            $page = $_GET["page"];
        }else{
            $page = 1;
        }
        return $page;
    }

    function display_pagination_data($data_list){
        $num_per_page = 5;
        $page = set_number_page();
        $data = split_data($num_per_page, $data_list);
        display_users_list($data[$page - 1]);
    }

    function split_data($size_chunks, $data_list){
        return array_chunk($data_list, $size_chunks);
    }

    function search_user($find_element){
        $find_result = [];
        $data_list = sort_row();
        foreach ($data_list as $user){
            if (str_contains(strtolower($user[1]), strtolower(trim($find_element)) ) || str_contains(strtolower($user[2]), strtolower(trim($find_element)) ) || str_contains(strtolower($user[3]), strtolower(trim($find_element)))){
                array_push($find_result, $user);
            }
        }
        return $find_result;
    }

    function print_r_with_lines($arr) {
            echo '<pre>';
            print_r($arr);
            echo '</pre>';
    }

    
?>