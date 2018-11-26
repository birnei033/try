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

            <?php
            if ($count) { 
            while ($post = mysqli_fetch_assoc($posts)) {
            
            ?>

                <h1 class="page-header">
                    <?php echo "Page Heading" ?>
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post["post_title"]; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post["post_author"];?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post["post_date"];?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post["post_image"]; ?>" alt="<?php $post["post_title"]; ?>">
                <hr>
                <p><?php echo $post["post_content"];?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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