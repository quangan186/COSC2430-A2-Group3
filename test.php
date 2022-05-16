<?php
include('classes/autoload.php');
// Check if user is logged in
if (!isset($_SESSION['userid'])){
    $_SESSION['message'] = "You have to log in first";
    header('location:login.php');
} else {
    $id = $_SESSION['userid'];

    $user = new Signup();
    $image = new Image();

    $userData = $user->get_data($id, 6, 'accounts.csv');
    
    foreach($userData as $data){
        if(isset($data[1]) && isset($data[6]) && isset($data[2]) && isset($data[3]) && isset($data[4]) && isset($data[5])  && isset($data[8])  && isset($data[9])){
            $array = $data;
        } else {
            echo 'Your data not found';
        }
    }

    $i_had_updated = $user->get_data($id, 1, 'image-update.csv');

    // Neu nguoi dung da tung update roi, lay data moi nhat
    if(!empty($i_had_updated)){
        array_multisort(array_column($i_had_updated, 4), SORT_DESC, $i_had_updated);
        $img_src = $i_had_updated[0][2];
    } else {
        $img_src = $array[5];
    }

    // Check if user had submit form (request for image update)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $insert_result = $image->insert_image($id, '', $_FILES, 'image-update.csv');
        if($insert_result){
            $_SESSION['message'] = $insert_result;
        } else {
            $_SESSION['message'] = 'Successfully Update Image';
            header('location: test.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account Page</title>
</head>
<body>
<?php
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
?>

<!-- Display Information -->
<p>Your name is <?php echo $array[1] . $array[6]; ?></p>
<p>Here is your profile picture: <br><br>
</p>
<!-- Display Profile Picture -->
<img src="<?php echo $img_src ?>" alt="profilepic">
<!-- End of Display Profile Picture -->


<!-- Update Form -->
<form method="POST" enctype="multipart/form-data">
    <h3>Update Image</h3>
    <input name="file" type="file">
    <input type="submit"> 
</form>
<!-- End of Update Form -->
    
</body>
</html>
<?php
    }
    // End of check if user is logged in
?>