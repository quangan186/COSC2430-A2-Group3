<?php
class Signup
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
                else {   
                    $x = $value;
                    $fcsv = file('accounts.csv');

                    if($this->check_existence($x, $fcsv)){
                        $this->error .= "Email has already registered <br>";
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
            $_SESSION['message'] = "Register successfully.";
            header("Location: loginandregister.php");
            exit();
        }
        else
        {
            return $this->error;
        }
    }

    public function check_existence($value, $fcsv){
        foreach($fcsv as $array => $key)
        {
            $temp = explode(',', $key);
        
            if($temp[3] == $value){
            return true;
            exit;
            } 
        }
    }

// Get user id
    public function get_userid($email){
        $row = 1;
        if (($handle = fopen("accounts.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
              $row++;
              if ($data[3] == $email) {
                return $data[5];
                exit;
                }
            }
          fclose($handle);
        }
    }

    public function check_login($un,$pwd,$fcsv){
        if($this->check_existence($un, $fcsv)){
            $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
            if (!password_verify($pwd, $hashed_password)) { 
                return false;
            } else {
                return true;
                return $this->get_userid($un);
            }
        } 
    }

// Insert user data into database
    public function create_user($data)
    {
        $firstname = ucfirst($data['firstname']);
        $lastname = ucfirst($data['lastname']);
        $email = $data['email'];
        $password = $data['password_confirm'];
        $profile_image = $data['profile_image'];
        $newDate = date("d-m-Y H:i:s",time());
        
        // Hash Password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // create by PHP
        $userid = $this->create_userid();
        $url_address = strtolower($firstname) . "." . strtolower($lastname) . "." . $userid;

        $file_open = fopen("accounts.csv", "a");
        $no_rows = count(file("accounts.csv"));
        if($no_rows > 1)
        {
            $no_rows = ($no_rows - 1) + 1;
        }

        $form_data = array(
            'sr_no' => $no_rows,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $hashed_password,
            'profile_image' => $profile_image,
            'userid' => $userid,
            'url_address' => $url_address,
            'time_stamp' => $newDate
        );  
        fputcsv($file_open, $form_data);
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