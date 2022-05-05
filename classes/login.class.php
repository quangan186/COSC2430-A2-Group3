<?php
include_once('classes/connect.php');
 
class User extends Database{

    public function check_login($username, $password){ 
        $query = "SELECT * FROM users WHERE email = '$username'";
        $DB = new Database();        
        
        $result = $DB->read($query);

        if($result)
        {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if (!password_verify($password, $hashed_password)) { 
                return false;
            } else {
                return $result[0];
            }
        }
        else
        {
            return false;
        }
    }

    public function get_user($id)
    {
        $query = "SELECT * FROM users WHERE userid = '$id' LIMIT 1";
        $DB = new Database();

        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }
        else
        {
            return false;
        }
    }
}

?>