<?php
$posterData = $user->get_data($array[1], 6, 'accounts.csv');
?>
<!------------------- FEED 1 --------------------->
<div class="feeds">
<div class="feed">

<div class="head">
    <div class="user">
        <div class="profile-photo">
            <img src="./images/profile-13.jpg">
        </div>
        <div class="ingo">
            <h3>
                <!-- User Firstname and Last name -->
                <?php 
                    foreach($posterData as $poster){
                        if(isset($poster[1]) || isset($poster[2])){
                            echo $poster[1] . ' ' . $poster[2] . '<br>';
                        }
                    }
                ?>

            </h3>
            <small>
                <?php echo $array[6] ?>
            </small>
        </div>
    </div>
    <span class="edit">
        <i class="uil uil-ellipsis-h"></i>
    </span>
</div>
<div class="photo">
        <img src="<?php echo $array[3] ?>">
</div>
<div class="caption">
    <p><b>
        <!-- User Firstname and Last name -->
        <?php 
            foreach($posterData as $poster){
                if(isset($poster[1]) || isset($poster[2])){
                    echo $poster[1] . ' ' . $poster[2];
                }
            }
        ?>
    </b> 
        <?php echo $array[2] ?>
    </p>
        </div>
        </div>

    
