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

    function pagination(){
        $num_per_page = 5;
        $total_pages = ceil(count(get_data_from_csv("../accounts.csv")) / $num_per_page);
        for ($p = 1; $p <= $total_pages; $p++){
            echo "<div class='page-number'><a href ='../admin/account-list.php?page=".$p."'>".$p."</a></div>";
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

    function display_pagination_data(){
        $num_per_page = 5;
        $page = set_number_page();
        $data_list = split_data($num_per_page);
        display_users_list($data_list[$page - 1]);
    }

    function split_data($size_chunks){
        // $data_list = sort_row();
        $data_list = sort_row();
        return array_chunk($data_list, $size_chunks);
    }

    function search_user(){
        if (isset($_POST["search_btn"])){

        }
    }

    function print_r_with_lines($arr) {
            echo '<pre>';
            print_r($arr);
            echo '</pre>';
    }

    
?>