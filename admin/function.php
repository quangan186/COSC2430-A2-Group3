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

    function display_users_list(){
        $data_list = sort_row();
        for ($i = 1; $i < count($data_list); $i++){
            echo "<tr class= 'data'>";
            echo "<td>" . $data_list[$i][0] . "</td>";
            echo "<td>" . $data_list[$i][1] . " " . $data_list[$i][2] . "</td>";
            echo "<td><a href= '#'>" . $data_list[$i][3] . "</a></td>";
            echo "<td>" . $data_list[$i][8] . " " . $data_list[$i][9] . "</td>";
            echo "</tr>";         
        }  
    }

    function sort_row(){
        return array_reverse(get_data_from_csv("../accounts.csv"));
    }
    
    function print_r_with_lines($arr) {
            echo '<pre>';
            print_r($arr);
            echo '</pre>';
    }


?>