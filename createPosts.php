<?php
    if(isset($_SESSION['userid'])){
        ?>

<form action="process-post.php" method="POST" class="create-post" enctype="multipart/form-data">
    <div class="profile-photo">
        <img src="images/profile-1.jpg" alt="">
    </div>
    <textarea name="post" id="create-post"  placeholder="What's on your mind?" cols="30" rows="10"></textarea>
    <label for="file-upload" class="custom-file-upload">
        <input id="file-upload" type="file" name="file">
        <!-- <i class="uil uil-image-upload" style="font-size: 30px";> </i> -->
    </label>
    <label for="sharelevel" class="form-label mt-4">Sharing Level</label> 
    <select name="sel" class="form-select" id="exampleSelect1">
        <option value="public">Public</option>
        <option value="internal">Internal</option>
        <option value="private">Private</option>
    </select>
    <div class="create">
        <label for="submit_post">
            <input class="btn btn-primary" type="submit" value="Post" type="text">
        </label>
    </div>
    
</form>
<?php
    }
?>

