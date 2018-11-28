<?php 
include "includes/header.php"; 
include "includes/post_query.php";
?>


    <!-- Navigation -->
   <?php include "includes/nav.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">



            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                    <?php echo "Posts" ?>
                    <small>Secondary Text</small>
                </h1>
            <?php
            if ($count) { 
            while ($post = mysqli_fetch_assoc($posts)) {
            
            ?>



                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?id=<?php echo $post['post_id'];?>"><?php echo $post["post_title"]; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post["post_author"];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post["post_date"];?></p>
                <hr>
                <a href="post.php?id=<?php echo $post['post_id'];?>">
                <img class="img-responsive" src="images/<?php echo $post["post_image"]; ?>" alt="<?php $post["post_title"]; ?>">
                </a><hr>
                <p><?php echo $post["post_content"];?></p>
                <a class="btn btn-primary" href="post.php?id=<?php echo $post['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php  }  ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            <?php }else{ ?>

             <h2>
                    No Result Found
                </h2>
            <?php }
             ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>