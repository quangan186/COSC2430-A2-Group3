<?php
include_once('classes/connect.php');

class Signup extends Database
{
    private $error = "";

// Validate user input 
    public function evaluate($data)
    {
        foreach ($data as $key => $value)
        {
            // First name and last name is any value between 2 to 20 characters
            if($key == "firstname" || $key == "lastname")
            {
                if(strlen($value) < 2 || strlen($value) > 20)
                {
                    $this->error .= "You name must have between 2 and 20 characters <br>";
                }
            }

            // Email must be formatted correctly and has not existed in database
            if($key == "email")
            {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->error .= "Invalid email format <br>";
                }
                else{
                    $query = "SELECT * FROM users WHERE email = '$value' LIMIT 1";
                    $DB = new Database();
                    $result = $DB->read($query);

                    if($result)
                    {
                        $this->error .= "Email already exists <br>";
                    }
                }
            }

            // Password 8 to 20 characters, at least 1 lower case, 1 upper case, 1 digit, and same with password confirm
            if($key == "password")
            {
                // Validate password strength
                $uppercase = preg_match('@[A-Z]@', $value);
                $lowercase = preg_match('@[a-z]@', $value);
                $number    = preg_match('@[0-9]@', $value);

                if(!$uppercase || !$lowercase || !$number || strlen($value) < 8 || strlen($value) > 20) {
                    $this->error .= 'Password should be between 8 and 20 characters in length and should include at least one upper case letter, one lower case letter and one number.<br>';
                }

                if($value !== $data['password_confirm'])
                {
                    $this->error .= 'Your confirm password must match your password <br>';
                }
            }
        }

        if($this->error == "")
        {
            // no error
            $this->create_user($data);
            $_SESSION['success_message'] = "Contact form saved successfully.";
            header("Location: loginandregister.php");
            exit();
        }
        else
        {
            return $this->error;
        }
    }

// Insert user data into database
    public function create_user($data)
    {
        $firstname = ucfirst($data['firstname']);
        $lastname = ucfirst($data['lastname']);
        $email = $data['email'];
        $password = $data['password_confirm'];

        // Hash Password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // create by PHP
        $userid = $this->create_userid();
        $url_address = strtolower($firstname) . "." . strtolower($lastname) . "." . $userid;

        $query = "INSERT INTO users(userid,firstname,lastname,email,password,url_address) VALUES('$userid','$firstname','$lastname','$email','$hashed_password','$url_address')";
        
        $DB = new Database();
        $DB->save($query);
    }
    
// Create user id
    private function create_userid()
    {
        // generate random number
        $length = rand(4,19);
        $number = "";
        for ($i=0; $i < $length; $i++) {
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }

        return $number;
    }
}

?>