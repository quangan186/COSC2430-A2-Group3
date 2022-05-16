<?php
$posterData = $user->get_data($array[1], 6, 'accounts.csv');
?>
<!------------------- FEED 1 --------------------->
<div class="feeds">
<div class="feed">

<div class="head">
    <div class="user">
        <div class="profile-photo">
        <?php 
            foreach($posterData as $poster){
                if(isset($poster[1]) && isset($poster[2]) && isset($poster[5])){
                    ?>
                <img src="<?php echo $poster[5]; ?>">
        </div>
        <div class="ingo">
            <h3>
                <!-- User Firstname and Last name -->
               <?php
                    echo $poster[1] . ' ' . $poster[2] . '<br>';
                    }
                }
                ?>

            </h3>
            <small>
                <?php echo $array[6] . ' <b>' . $array [5] . '</b>'; ?>
            </small>
        </div>
    </div>
    <span class="edit">
        <i class="uil uil-ellipsis-h"></i>
    </span>
</div>
<div class="photo">
    <?php
        if(!empty($array[3])){
    ?>
        <img src="<?php echo $array[3] ?>">
    <?php
        }
    ?>
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

    
