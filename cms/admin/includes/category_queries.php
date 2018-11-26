<?php 
 // FIND ALL CATEGORIES QUERY
 $query = "SELECT * FROM category";
 $result = mysqli_query($connection, $query);

// INSERTING CATEGORY
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

    // UPDATE CATEGORY

    if (isset($_GET['edit'])) {
        $edit_cat_id = $_GET['edit'];
        // $update_query = "UPDATE ";
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

    // DELETING CATEGORY
    if (isset($_GET['delete'])) {
        $del_cat_id = $_GET['delete'];
        $del_query = "DELETE FROM category WHERE cat_id = {$del_cat_id}";
        $delete = mysqli_query($connection, $del_query);
        header("Location: categories.php");
    }

   


?>