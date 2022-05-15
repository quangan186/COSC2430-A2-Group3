<?php
class Post 
{
    private $error = "";

    private function create_postid()
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

    public function create_post($userid, $data, $files)
    {     
        // verify the data
        if(!empty($data['post']) || !empty($files['file']['name']))
        {
            $sel = $data['sel'];

            if(!empty($files['file']['name'])){
                // create folder to store images
                $folder = "uploads/" . $userid . "/";

                if(!file_exists($folder))
                {
                    mkdir($folder, 0777, true);
                }

                $image_class = new Image();

                $myimage = $folder . $image_class->generate_filename(20) . ".jpg";

                move_uploaded_file($_FILES['file']['tmp_name'],$myimage);  
            }
                $newDate = date("d-m-Y H:i:s",time());

            
            $post = "";
            if(isset($data['post']))
            {
                $post = addslashes($data['post']);
            }
            
            $postid = $this->create_postid();

            $file_open = fopen("images.csv", "a");
            $no_rows = count(file("images.csv"));
            if($no_rows > 1)
            {
                $no_rows = ($no_rows - 1) + 1;
            }

            $form_data = array(
                'sr_no' => $no_rows,
                'userid' => $userid,
                'postContent' => $post,
                'postImage' => $myimage,
                'postid' => $postid, 
                'sel' => $sel,               
                'time_stamp' => $newDate
            );  
            fputcsv($file_open, $form_data);
        }
    }

    public function get_post($id){
        return $id;
    }
}


?>