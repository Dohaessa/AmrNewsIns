<form action="" method="post">
    <div class="form-group">
        <label>Edit Category</label>
        <?php
        if(isset($_GET['edit'])){
         $cat_id = $_GET['edit'];
         $sql = "SELECT * FROM `categories` WHERE cat_id = '$cat_id'";
        $category = mysqli_query($connection, $sql); 
        while ($row = mysqli_fetch_assoc($category)) :
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
     ?>
        <input type="text" class="form-control" name="cat_title" value="<?=$cat_title?>">
<?php
       endwhile;
    }
?>

<?php
if(isset($_POST['update_category'])){
 $the_cat_title =  $_POST['cat_title'] ;
//  echo $cat_title;
 $sql = "UPDATE `categories` SET `cat_title`='$the_cat_title' WHERE `cat_id`='$cat_id' ";
 $update_category = mysqli_query($connection, $sql);
 header('location:categories.php');
}
?>

    </div>
    <div class="form-group text-center">
        <input type="submit" class="btn btn-warning btn-block " value="Update Category" name="update_category">
    </div>

</form>

