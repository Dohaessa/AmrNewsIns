<?php
    if(isset($_POST['create_post'])){
        //echo $_POST['title'];
        $post_title = $_POST['title'];
        $post_category = $_POST['post_category_id'];
        $post_author = $_POST['author'];
        $post_content = $_POST['content'];
        $post_tags = $_POST['tags'];
        $post_date = date('d-m-y');

        $post_image = $_FILES['image']['name'];
        $post_image_tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($post_image_tmp,"../images/$post_image");
    }
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label> Post Title </label>
        <input type="text" name="title" class="form-control">
    </div><!-- Post Title -->

    <div class="form-group">
        <label> Post Category </label>
        <select name="post_category_id" class="form-control">
            <?php
            $cat_sql = "SELECT * FROM `categories`";
            $allCategories = mysqli_query($connection, $cat_sql);

            while ($row = mysqli_fetch_assoc($allCategories)) :
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            ?>
                <option value="<?= $cat_id?>"><?= $cat_title ?></option>
            <?php endwhile; ?>

        </select>
    </div><!-- Post Category -->

    <div class="form-group">
        <label> Post Author </label>
        <input type="text" name="author" class="form-control">
    </div><!-- Post Author -->

    <div class="form-group">
        <label> Post Image </label>
        <input type="file" name="image" class="form-control">
    </div><!-- Post Image -->

    <div class="form-group">
        <label> Post Content </label>
        <textarea name="content" rows="6" class="form-control"></textarea>
    </div><!-- Post Content -->

    <div class="form-group">
        <label> Post Tags </label>
        <input type="text" name="tags" class="form-control">
    </div><!-- Post Tags -->


    <div class="form-group">
        <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary btn-block">
    </div><!-- Post Tags -->

</form>