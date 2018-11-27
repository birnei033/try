<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $source = $_GET['source'];
    $content = getPost($id);
}

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
    move_uploaded_file($postImageTemp, "../images/$postImage");
    $postCommentCount = 4;
    if (empty($postImage)) {
        $d = getPost($id);
        $postImage = $d['image'];
    }
    $success = updatePost("UPDATE posts 
        SET post_title = '{$postTitle}',
            post_cat_id = '{$postCatId}',
            post_author = '{$postAuthor}',
            post_status = '{$postStatus}',
            post_image = '{$postImage}',
            post_tags = '{$postTag}',
            post_content = '{$postContent}'
        WHERE post_id = {$id}");
    if ($success) {
        redirectTo("posts.php?source=$source&id=$id");
    }
}

?>

<h1 class="page-header">
    Edit Post
    <small>User</small>
</h1>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="titie">Post Title</label>
        <input type="text" value="<?php echo $content['title']?>" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="cat_id">Post Category Id</label>
        <select class="form-control" name="cat_id" id="">
            <?php
                foreach (getCategory() as $key => $value) {
                    $selected = $content['cat_id'] == $key ? "selected='selected'" : "" ;
                    echo "<option {$selected} value='{$key}'>$value</option>";
                }
            
            ?>
        
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php echo $content['author']?>" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="status">Post Status</label>
        <input type="text" value="<?php echo $content['status']?>" class="form-control" name="status">
    </div>

    <div class="form-group">
        <img width="200" class="img-responsive" src="../images/<?php echo $content['image']?>" alt="">
        <label for="status">Post Images</label>
        <input type="file" class="form-control" name="image">
    </div>

    <div class="form-group">
        <label for="tag">Post Tags</label>
        <input type="text" value="<?php echo $content['tag']?>" class="form-control" name="tag">
    </div>

    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea class="form-control" value="<?php echo $content['content']?>" cols="30" rows="10" name="content"><?php echo $content['content']?></textarea>
    </div>

    <button class="btn btn-primary" name="submit" type="submit">Submit</button>

</form>