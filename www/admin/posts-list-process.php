<?php
     if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $table = fopen('../images.csv','r');
        $temp_table = fopen('../table_temp.csv','w');

        if(isset($_GET['id'])){
            $id = $_GET['id'];
        } else {
            $id = '';
        }

        while (($data = fgetcsv($table, 1000)) !== FALSE){
            if($data[4] == $id){
                if(isset($data)){
                    unset($data);
                    continue;
                }
            }    
        fputcsv($temp_table,$data);
        }
            fclose($table);
            fclose($temp_table);
            rename('../table_temp.csv','../images.csv');
            header('location:posts-list.php');
        }