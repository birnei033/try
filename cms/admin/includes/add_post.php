<?php

if (isset($_POST['submit'])) {
    $postTitle = $_POST['title'];
    $postAuthor = $_POST['author'];
    $postCatId = $_POST['cat_id'];
    $postStatus = $_POST['status'];
    // $postImage = $_POST['image'];
    $postImage = $_FILES['image']['name'];
    $postImageTemp = $_FILES['image']['tmp_name'];
    $postTag = $_POST['tag'];
    $postContent = $_POST['content'];
    $postDate = date('d-m-y');
    $postCommentCount = 4;

    move_uploaded_file($postImageTemp, "../images/$postImage");

    $query = "INSERT INTO posts (post_cat_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
    $query .= " VALUES('{$postCatId}', '{$postTitle}', '{$postAuthor}', now(), '{$postImage}', '{$postContent}', '{$postTag}', '{$postCommentCount}', '{$postStatus}')";
    $insertPost = mysqli_query($connection, $query);
    confirmQuery($insertPost);
}

?>


<h1 class="page-header">
    Add Post
    <small>User</small>
</h1>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="titie">Post Title</label>
    <input type="text" class="form-control" name="title">
</div>

<div class="form-group">
    <label for="cat_id">Post Category Id</label>
    <select class="form-control" name="cat_id" id="">
            <?php
                foreach (getCategory() as $key => $value) {
                    echo "<option value='{$key}'>$value</option>";
                }
            
            ?>
        
    </select>
</div>

<div class="form-group">
    <label for="author">Post Author</label>
    <input type="text" class="form-control" name="author">
</div>

<div class="form-group">
    <label for="status">Post Status</label>
    <input type="text" class="form-control" name="status">
</div>

<div class="form-group">
    <label for="status">Post Images</label>
    <input type="file" class="form-control" name="image">
</div>

<div class="form-group">
    <label for="tag">Post Tags</label>
    <input type="text" class="form-control" name="tag">
</div>

<div class="form-group">
    <label for="content">Post Content</label>
    <textarea class="form-control" cols="30" rows="10" name="content"></textarea>
</div>

<button class="btn btn-primary" name="submit" type="submit">Submit</button>

</form>