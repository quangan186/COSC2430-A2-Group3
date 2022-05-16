<?php
class Signup
{
    private $error = "";

// Format database
    public function format_db($filename){
        // The nested array to hold all the arrays
        $formatted_db = [];

        // Open the file for reading
        if (($h = fopen("{$filename}", "r")) !== FALSE)
        {
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
                {
                    $formatted_db[] = $data;
                }
            return $formatted_db;

            fclose($h);
        }
    }

// Get data in row if $check == $index
    public function get_data($check, $index, $filename){
        if(!is_array($filename)){
            $formatted_db = $this->format_db($filename);   
        } else {
            $formatted_db = $filename;
        }

        // Filter data of the user in the session
        $result = array_filter( 
            $formatted_db, 
            function($item) use ($index, $check){
                if(isset($item[$index])){
                    return ($item[$index] == $check);
                }
            });
        return $result;
    }
    
// Validate user input 
    public function evaluate($data, $files){
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) && isset($data['password']) && isset($data['password_confirm'])){
            $password = $data['password'];
            $password_confirm = $data['password_confirm'];

            if(isset($files['profile_image']['name']) && $files['profile_image']['name'] != ""){
                if($files['profile_image']['type'] != 'image/jpeg' && $files['profile_image']['type'] != 'image/gif' && $files['profile_image']['type'] != 'image/png'){
                    $this->error .= "Invalid File Types <br>";
                }
                $allowed_size = (1024 * 1024) * 7;
                if($files['profile_image']['size'] > $allowed_size && $files['profile_image']['size'] < 1024){
                   $this->error .= "Only image of 7 Mb or lower and greater than 1024 are allowed <br>";
                }
            } else {
                $this->error .= "*Error uploading images <br>";
            }

            foreach ($data as $key => $value)
            {
                // First name and last name is any value between 2 to 20 characters
                if($key == "firstname")
                {
                    if(strlen($value) < 2 || strlen($value) > 20)
                    {
                        $this->error .= "*You first name must have between 2 and 20 characters <br>";
                    }
                }
                
                if($key == "lastname")
                {
                    if(strlen($value) < 2 || strlen($value) > 20)
                    {
                        $this->error .= "*You last name must have between 2 and 20 characters <br>";
                    }
                }

                // Email must be formatted correctly and has not existed in database
                if($key == "email")
                {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->error .= "*Invalid email format <br>";
                    }
                    else {
                        // Check email duplication
                        $index = 3;
                        $db = 'accounts.csv';

                        if($this->check_existence($value, $index, $db)){
                            $this->error .= "*Email has already registered <br>";
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
                        $this->error .= '*Password should be between 8 and 20 characters in length and should include at least one upper case letter, one lower case letter and one number.<br>';
                    }
                }
            }

            if($password !== $password_confirm){
                $this->error .= '*Your confirm password must match your password <br>';
            }
        } 

        if($this->error == "")
        {
            // no error
           $this->create_user($data, $files);
           $_SESSION['message'] = 'Successfully Registered';
           header('Location: login.php');
        }
        else
        {   
            return $this->error;
        }
    

    }

// Check existence of a value
    public function check_existence($examine, $key_index, $filename){

        // Formatting Database
        $formatted_db = $this->format_db($filename);

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
    public function create_user($data, $files)
    {
        if(isset($data['firstname']) && isset($data['lastname']) && isset($data['email']) && isset($data['password_confirm']) && !empty($files)){
            $firstname = ucfirst($data['firstname']);
            $lastname = ucfirst($data['lastname']);
            $email = $data['email'];
            $password = $data['password_confirm'];
            $newDate = date("d-m-Y",time());
            $newTime = date("H:i:s",time());
            // create by PHP
            $userid = $this->create_id();
            $url_address = strtolower($firstname) . "." . strtolower($lastname) . "." . $userid;

            // create folder to store images
            $folder = "uploads/" . $userid . "/";


            if(!file_exists($folder))
            {
                mkdir($folder, 0777, true);
            }
            $image_class = new Image();

            $myimage = $folder . $image_class->generate_filename(20) . '.jpg';

            move_uploaded_file($_FILES['profile_image']['tmp_name'],$myimage);  

        
            switch ($files['profile_image']['type'])
            {
                case 'image/jpeg':
                    $image = imagecreatefromjpeg($myimage);
                break;
                case 'image/gif':
                    $image = imagecreatefromgif($myimage);
                break;
                case 'image/png':
                    $image = imagecreatefrompng($myimage);
                break;
            }        

            $image_class->crop_image($image,$myimage,150,150); 

            // Hash Password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $file_open = fopen("accounts.csv", "a");
            $no_rows = count(file("accounts.csv"));
            if($no_rows > 1)
            {
                $no_rows = ($no_rows - 1) + 1;
            }

            $form_data = array(
                'sr_no' => "u" . $no_rows,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => $hashed_password,
                'profile_image' => $myimage,
                'userid' => $userid,
                'url_address' => $url_address,
                'date' => $newDate,
                'time' => $newTime,
            );
            $registration = implode(",", $form_data);
            fwrite($file_open, "{$registration}\n");
        }
    }

// Create user id
    public function create_id(){
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
