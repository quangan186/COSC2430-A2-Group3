<?php
    if(isset($_SESSION['userid'])){
        ?>
<link rel="stylesheet" href="css/createPost.css">
<form action="process-post.php" method="POST" class="create-post" enctype="multipart/form-data">
    <div class="profile-photo">
        <img src="images/profile-1.jpg" alt="">
    </div>
    <textarea name="post" id="create-post"  placeholder="What's on your mind?" cols="40" rows="5"></textarea>
  <div class="post-create">
  <div class="upload-file-status">
    <label for="file-upload" class="custom-file-upload">File Upload</lable>
        <input id="file-upload" type="file" name="file">
    </div>
        <!-- <i class="uil uil-image-upload" style="font-size: 30px";> </i> -->
        <!-- Sharing level -->
    <label for="sharelevel" class="form-label mt-4"></label>
    <select name="sel" class="form-select" id="exampleSelect1">
        <option value="public">Public</option>
        <option value="internal">Internal</option>
        <option value="private">Private</option>
    </select>
    <div class="create">
        <label for="submit_post">
            <input type="submit" value="Post" type="text">
        </label>
    </div>
  </div>

</form>
<?php
    }
?>
