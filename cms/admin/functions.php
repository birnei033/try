<?php 

// INSERTING CATEGORY
function insert_categories(){
    global $connection;
    $error = "";
    if (isset($_POST['cat_submit'])) {
        $cat = $_POST['cat_title'];
        if ($cat == "" || empty($cat)) {
            $error = "This field should not be empty";
        }else {
            $insert = "INSERT INTO category (cat_title) VALUE('{$cat}')";
            $create_category = mysqli_query($connection, $insert);
            if (!$create_category) {
                die("Query Faild". mysqli_error);
            }
            header("Location: categories.php");
        }
         }
         ?>
        <form action="" method="post">
            <div class="form-group">
            <label for="cat_title">Add Category<br> <em style="color: red;"><?php echo $error ?></em></label>
                <input type="text" class="form-control" name="cat_title" id="">
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="cat_submit" value="Add Category" id="">
            </div>
        </form>
    <?php
}

// FIND ALL CATEGORIES QUERY
function display_categories(){
     global $connection;
     delete(); 
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $r = $row['cat_title'];
        $cat_id = $row['cat_id'];
        ?>
       <tr>
            <td><?php echo $cat_id; ?></td>
            <td><?php echo $r; ?></td>
            <td><a href="?delete=<?php echo $cat_id; ?>"><span color="red" >Delete</span></a></td>
            <td><a href="?edit=<?php echo $cat_id; ?>"><span color="red" >Edit</span></a></td>
        </tr>
        <?php }
}

// UPDATE CATEGORY
function update_category(){
    $error = "";
    global $connection;
    if (isset($_GET['edit'])) {
        $edit_cat_id = $_GET['edit'];
        $select_cat_id_query = "SELECT * FROM category WHERE cat_id = {$edit_cat_id}";
        $category = mysqli_query($connection, $select_cat_id_query);
    }

    if (isset($_POST['cat_update'])) {
        $cat_tit = $_POST['edit_cat_title'];
        $id = $_POST['cat_id'];
        $update_query = "UPDATE category SET cat_title = '{$cat_tit}' WHERE cat_id = {$id}";
        $update = mysqli_query($connection, $update_query);
        header("Location: categories.php");
    }
    if (isset($_GET['edit'])) {
        while ($row = mysqli_fetch_assoc($category)) {
            $r = $row['cat_title'];
            $cat_id = $row['cat_id'];
    ?>
    <form action="" method="post">
        <div class="form-group">
        <label for="cat_title">Update Category<br> <em style="color: red;"><?php echo $error ?></em></label>
            <input value="<?php echo $r; ?>" type="text" class="form-control" name="edit_cat_title" id="">
            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="cat_update" value="Update" id="">
        </div>
    </form>
        <?php } }
}

// GET CATEGORY
function getCategory($id = ""){
    global $connection;
    if (empty($id)) {
        $query = "SELECT * FROM category";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $r = $row['cat_title'];
            $cat_id = $row['cat_id'];
            $categories[$cat_id] = $r;
        }
        return $categories; 
    }else{
        $query = "SELECT * FROM category WHERE cat_id = {$id}";
        $result = mysqli_query($connection, $query);
        confirmQuery($result);
        while ($row = mysqli_fetch_assoc($result)) {
            $r = $row['cat_title'];
            $cat_id = $row['cat_id'];
            $categories = [
                $cat_id=>$r
            ];
        }
        return $categories;
    }

}
   

// DELETING CATEGORY
function delete(){
    global $connection;
    if (isset($_GET['delete'])) {
        $del_cat_id = $_GET['delete'];
        $del_query = "DELETE FROM category WHERE cat_id = {$del_cat_id}";
        $delete = mysqli_query($connection, $del_query);
        header("Location: categories.php");
    }
}
   
// DISPLAY ALL POST
function displayPost(){ 
    global $connection;
    if (isset($_GET['delete'])) {
        deletePost($_GET['delete']);
    }
    $query = "SELECT * FROM posts";
    $selectPost = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($selectPost)) { ?>
        <tr>
            <td><?php echo $row['post_id'] ?></td>
            <td><?php echo $row['post_title'] ?></td>
            <td><?php echo $row['post_author'] ?></td>
            <td><?php
            foreach (getCategory($row['post_cat_id'] ) as $key => $value) {
             echo $value;
            }
             ?></td>
            <td><?php echo $row['post_status'] ?></td>
            <td><img width="100" src="../images/<?php echo $row['post_image'] ?>" alt="<?php echo $row['post_image'] ?>"></td>
            <td><?php echo $row['post_tags'] ?></td>
            <td><?php echo $row['post_comment_count'] ?></td>
            <td><?php echo $row['post_date'] ?></td>
            <td><a href="posts.php?source=edit_post&id=<?php echo $row['post_id'] ?>">Edit</a></td>
            <td><a href="posts.php?delete=<?php echo $row['post_id'] ?>">Delete</a></td>
        </tr>
    
    <?php }
}

// DELETE A POST
function deletePost($id){
    global  $connection;
    $query = "DELETE FROM posts WHERE post_id = $id";
    confirmQuery(mysqli_query($connection, $query));
}

function confirmQuery($Queryresult){
    global $connection;
    if(!$Queryresult){
        die("Query not working<br>" . mysqli_error($connection));
    }
}

// GET POST FUNCTION
function getPost($id = ""){
    global $connection;
    if(empty($id)){
        $query = "SELECT * FROM posts";
    }else{
        $query = "SELECT * FROM posts WHERE post_id = {$id}";
        $selectPost = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($selectPost)) {
            $data = [
                'id'=> $row['post_id'],
                'title'=> $row['post_title'],
                'author'=> $row['post_author'],
                'cat_id'=> $row['post_cat_id'],
                'image'=> $row['post_image'],
                'status'=> $row['post_status'],
                'tag'=> $row['post_tags'],
                'content'=> $row['post_content'],
                'comment_count'=> $row['post_comment_count'],
                'date'=> $row['post_date']
            ];
        }
        return $data;
    }
    $selectPost = mysqli_query($connection, $query);
    return $selectPost;
}

// UPDATE POST

function updatePost($query){
    global $connection;
    $result =  mysqli_query($connection, $query);
    confirmQuery($result);
    return $result;
}

// REDIRECT
function redirectTo($address){
    header("Location: $address");
}