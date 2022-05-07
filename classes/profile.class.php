<?php

class Profile
{
    function get_profile($id){
        $id = addslashes($id);
        $DB = new Database();
        $query = "SELECT * FROM user WHERE userid = '$id' LIMIT 1";
        
        return $DB->read($query);
    }
}