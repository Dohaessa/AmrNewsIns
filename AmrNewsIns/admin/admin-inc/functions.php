<?php
function deleteCategory(){
    if(isset($_GET['delete'])){
        global $connection;  // new
        $the_id = $_GET['delete'];
        $sql = " DELETE FROM `categories` WHERE `cat_id` = '$the_id' ";
        $deleteCategory = mysqli_query($connection, $sql);
        header('location:categories.php');
     }
}
?>