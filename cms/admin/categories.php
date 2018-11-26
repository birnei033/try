<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<?php include "includes/category_queries.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            <small>User</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <!-- <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li> -->
                        </ol>

                        <div class="col-sm-6">
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
                                <?php } }?>
                        </div>
                        <div class="col-sm-6">
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
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
                        ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/footer.php"; ?>