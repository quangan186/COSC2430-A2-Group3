<?php
class Image
{
    public function generate_filename($length)
    {
        $array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $text = "";

        for($i = 0; $i < $length; $i++)
        {
            $random = rand(0,$length);
            $text .= $array[$random];
        }
        return $text;
    }
    
    public function crop_image($original_file_name, $cropped_file_name, $max_width, $max_height)
    {
            $original_image = $original_file_name;

            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            if($original_height > $original_width)
            {
                // make width equal to the max width
                $ratio = $max_width / $original_width;

                $new_width = $max_width;
                $new_height = $original_height * $ratio;
            }
            else
            {
                // make height equal to the max height
                $ratio = $max_height / $original_height;

                $new_height = $max_height;
                $new_width = $original_width * $ratio;
            }
        

        // adjust in case of max width and height are different
        if($max_width != $max_height)
        {
            if($max_height > $max_width)
            {
                if($max_height > $new_height)
                {
                    $adjustment = ($max_height / $new_height);
                }
                else
                {
                    $adjustment = ($new_height / $max_height);
                }
                $new_width = $new_width * $adjustment;
                $new_height = $new_height * $adjustment;
            }
            else
            {
                if($max_width > $new_width)
                {
                    $adjustment = ($max_width / $new_width);
                }
                else
                {
                    $adjustment = ($new_width / $max_width);
                }
                $new_width = $new_width * $adjustment;
                $new_height = $new_height * $adjustment;
            }
        }

        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);

        imagedestroy($original_image);

        if($max_width != $max_height)
        {
            if($max_width > $max_height)
            {
                $diff = ($new_height - $max_height);

                if($diff < 0)
                {
                    $diff = $diff * -1;
                }
                
                $y = round($diff / 2);
                $x = 0;
            }
            else
            {
                $diff = ($new_width - $max_width);

                if($diff < 0)
                {
                    $diff = $diff * -1;
                }

                $x = round($diff / 2);
                $y = 0;
            }
        }
        else
        {
            if($new_height > $new_width)
            {
                $diff = ($new_height - $new_width);
                $y = round($diff / 2);
                $x = 0;
            }
            else
            {
                $diff = ($new_width - $new_height);
                $x = round($diff / 2);
                $y = 0;
            }
        }

        $new_cropped_image = imagecreatetruecolor($max_width, $max_height);
        imagecopyresampled($new_cropped_image, $new_image, 0, 0, $x, $y, $max_width, $max_height, $max_width, $max_height);
        imagedestroy($new_image);
        imagejpeg($new_cropped_image, $cropped_file_name, 90);
        imagedestroy($new_cropped_image);
    }

    private $error = "";
    
    public function insert_image($files, $db){
        $id = $_SESSION['userid'];
        // Insert data vao csv file
        
            if(empty($files['file']['name'])){
                $this->error .= 'You have not input anything';
            } else {
                if($files['file']['error'] !== 0){
                    $this->error .= "Cannot this upload image";
                } else {
                    if($files['file']['type'] != 'image/jpeg' && $files['file']['type'] != 'image/gif' && $files['file']['type'] != 'image/png'){
                        $this->error .= "Invalid File Types";
                    }
                    $allowed_size = (1024 * 1024) * 7;
                    if($files['file']['size'] > $allowed_size && $files['file']['size'] < 1024){
                        $this->error .= "Only image of 7 Mb or lower and greater than 1024 are allowed <br>";
                    }
                }
            }


        if($this->error == ""){
            if(!empty($files['file']['name'])){
                // Import update data into image-update.csv
                $folder = "uploads/" . $id . "/";
        
                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                }
        
                $image_class = new Image();
        
                $endType = "";
                switch ($files['file']['type'])
                {
                    case 'image/jpeg':
                        $endType = ".jpg";
                    break;
                    case 'image/gif':
                        $endType = ".gif";
                    break;
                    case 'image/png':
                        $endType = ".png";
                        break;
                }     

                $myimage = $folder . $image_class->generate_filename(20) . $endType;
        
                move_uploaded_file($files['file']['tmp_name'],$myimage);  
            
                $newDate = date("d-m-Y H:i:s",time());
                                
                $updateid = $this->generate_filename(20);
        
                $file_open = fopen($db, "a");
                $no_rows = count(file($db));
                if($no_rows > 1)
                {
                    $no_rows = ($no_rows - 1) + 1;
                }
        
                $form_data = array(
                    'sr_no' => $no_rows,
                    'id' => $id,
                    'imagepath' => $myimage,
                    'updateid' => $updateid, 
                    'time_stamp' => $newDate
                );  
                fputcsv($file_open, $form_data);                                                                                                                   
                } 
            } else {
                return $this->error;
            }
        }
        
}