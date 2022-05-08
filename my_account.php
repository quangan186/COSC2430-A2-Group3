<?php
    include("classes/autoload.php");
    
     // If user is not logged in, redirect user to login page
     if (!isset($_SESSION['userid'])){
        $_SESSION['message'] = "You have to log in first";
        header('location:loginandregister.php');
    }

    $userid = $_SESSION['userid'];

     // Formatting Database
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
     $my_states = array_filter( $formatted_db, function($item) use ($userid){
         return ($userid == $item[5]);
     });

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
    
    <a href="index.php">Homepage</a>
    <a href="logout.php">Logout</a>

    <!-- Display Information -->
<table summary="state data">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Profile Picture</th>
        <th>Userid</th>
        <th>URL Link</th>
        <th>Registered Time</th>
    </tr>

<?php
foreach( $my_states as $my_state ) {
?>
    <tr>
    <td><?php echo( $my_state['1'] ); ?></td>
    <td><?php echo( $my_state['2'] ); ?></td>
    <td><?php echo( $my_state['3'] ); ?></td>
    <td>
        <?php echo( $my_state['5'] ); ?>
        <button>Change Profile Picture</button>
    </td>
    <td><?php echo( $my_state['6'] ); ?></td>
    <td><?php echo( $my_state['7'] ); ?></td>
    <td><?php echo( $my_state['8'] ); ?></td>
    </tr>

<?php } ?>
</table>
</body>
</html>
