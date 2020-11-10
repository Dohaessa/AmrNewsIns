<?php include('admin-inc/admin_header.php'); ?>
<?php include('admin-inc/admin_nav.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <h1 class="page-header">
            Categories </h1>
        <div class="row">
            <div class="col-sm-6">
                <form action="categories.php" method="post">
                    <div class="form-group">
                        <label>Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>

                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary btn-block " value="Add Category" name="submit">
                    </div>
                </form>
                <?php
                if(isset($_POST['submit'])){
                   $cat_title = $_POST['cat_title'];
                   if($cat_title=='' || empty($cat_title)){
                       echo"<h3 class='text-danger'> This Field Shoud not be Empty</h3>";
                   }else{
                       $sql = "INSERT INTO `categories` (`cat_title`) VALUES ('$cat_title')";
                       $createCategory = mysqli_query($connection,$sql);
                   }
                }
                ?>

                <?php
                if(isset($_GET['edit'])){
                    $cat_id = $_GET['edit'];
                    include 'admin-inc/edit_category.php';
                }
                ?>
            </div><!-- left -->

            <div class="col-sm-6">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `categories`";
                        $allCategories = mysqli_query($connection, $sql);

                        while ($row = mysqli_fetch_assoc($allCategories)) :
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                        ?>
                            <tr>
                                <td><?=$cat_id?></td>
                                <td><?=$cat_title?></td>
                                <td class="text-center"> <a href="categories.php?edit=<?=$cat_id?>"> <i class="fa fa-edit"></i> </a> </td>
                                <td class="text-center"> <a href="categories.php?delete=<?=$cat_id?>"> <i class="fa fa-trash"></i> </a> </td>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>

                <!-- Delete Code -->
                <?php
                    deleteCategory();
                ?>


            </div><!-- right -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<?php include('admin-inc/admin_footer.php'); ?>