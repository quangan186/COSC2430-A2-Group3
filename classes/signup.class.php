<?php
class Signup
{
    private $error = "";

// Get user data
    public function get_userdata($userid){
        $filename = 'accounts.csv';

        // The nested array to hold all the arrays
        $formatted_db = [];

        // Open the file for reading
        if (($h = fopen("{$filename}", "r")) !== FALSE)
        {

        while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
        {
            $formatted_db[] = $data;
        }

        fclose($h);
        }

        // Filter data of the user in the session
        $result = array_filter(
            $formatted_db,
            function($item) use ($userid){
                if(isset($item[6])){
                    return ($item[6] == $userid);
                }
            });
        return $result;
    }
// Validate user input
    public function evaluate($data)
    {
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) && isset($data['password']) && isset($data['password_confirm']) && isset($data['profile_image'])){
            $password = $data['password'];
            $password_confirm = $data['password_confirm'];

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
                        // Check email duplication
                        $index = 3;
                        $db = 'accounts.csv';

                        if($this->check_existence($value, $index, $db)){
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
                }
            }

            if($password !== $password_confirm){
                $this->error .= 'Your confirm password must match your password <br>';
            }
        }

        if($this->error == "")
        {
            // no error
           $this->create_user($data);
           $_SESSION['message'] = 'Successfully Registered';
           sleep(2);
           header('Location: loginandregister.php');
        }
        else
        {   
            return $this->error;
        }

    }

// Check existence of a value
    public function check_existence($examine, $key_index, $filename){

        // Formatting Database

        // The nested array to hold all the arrays
        $formatted_db = [];

        // Open the file for reading
        if (($h = fopen("{$filename}", "r")) !== FALSE)
        {

        while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
        {
            $formatted_db[] = $data;
        }

        fclose($h);
        }

        foreach($formatted_db as $array){
            if(isset($array[$key_index])){
                if($array[$key_index] == $examine){
                    return true;
                    exit;
                }
            }
        }
    }

// Get user id
    private function get_userid($email){
        $row = 1;
        if (($handle = fopen("accounts.csv", "r")) !== FALSE) {
          while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
              $row++;
              if(isset($data[3])){
                if ($data[3] == $email) {
                  return $data[6];
                  exit;
                  }  
              }

            }
          fclose($handle);
        }
    }

// Login Validation
    public function check_login($un,$pwd,$fcsv){
        if($this->check_existence($un, 3, $fcsv)){
            $row = 1;
            if (($handle = fopen("accounts.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $row++;
                if(isset($data[4])){
                  if(password_verify($pwd, $data[4])){
                      return $this->get_userid($un);
                  }
                }

            }
            fclose($handle);
        }
    }
}

// Insert user data into database
    public function create_user($data)
    {
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) && isset($data['password_confirm'])){
            $firstname = ucfirst($data['firstname']);
            $lastname = ucfirst($data['lastname']);
            $email = $data['email'];
            $password = $data['password_confirm'];
            $profile_image = $data['profile_image'];
            $newDate = date("d-m-Y",time());
            $newTime = date("H:i:s",time());

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
                'date' => $newDate,
                'time' => $newTime,
            );
            $registration = implode(",", $form_data);
            fwrite($file_open, "\n{$registration}");
        }
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
