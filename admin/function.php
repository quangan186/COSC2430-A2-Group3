<?php
    function display_users_list(){
        $row = 0;
        if (($handle = fopen("../accounts.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // $num = count($data);
                echo "<tr class= 'data'>";
                echo "<td>" . $data[0] . "</td>";
                echo "<td>" . $data[1] . " " . $data[2] . "</td>";
                echo "<td>" . $data[3] . "</td>";
                echo "<td>" . $data[8] . "</td>";
                echo "</tr>";
                $row++;
            }
            fclose($handle);
        }

    }
?>