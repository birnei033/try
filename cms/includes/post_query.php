<?php

 if (isset($_POST['submit'])) 
 {
    $search = $_POST['search'];
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $posts = mysqli_query($connection, $query);
 	
 	if (!$posts) {
        die("QUERY Failed" . mysqli_error($connection));
    }
    $count = mysqli_num_rows($posts);
 
}else{
	$query = "SELECT * FROM posts";
    $posts = mysqli_query($connection, $query);
    $count = mysqli_num_rows($posts);
}
?>