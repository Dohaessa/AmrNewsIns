<div class="col-md-8">
    <h1 class="page-header">
        Amr News  <small>by amr elbehiry</small>  </h1>
    <?php
    if(isset($_POST['submit'])){
        $keywords = $_POST['txtSearch'];
    
    $sql = "SELECT * FROM `posts` WHERE `post_tags` LIKE '%$keywords%'  ";
    $res = mysqli_query($connection, $sql);
    $count = mysqli_num_rows($res) ;
    if($count == 0){
        echo '<h1 class="text-center text-danger"> No Posts </h1>';
    }
    while ($row = mysqli_fetch_assoc($res)) :
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        // $post_content = $row['post_content'];
        $post_content = substr($row['post_content'] ,0,150) ;
    ?>
        <!--  Blog Post -->
        <h2> <a href="post.php?p_id=<?=$post_id?>">  <?= $post_title ?>  </a> </h2>
        <p class="lead">   by <a href="index.php"><?= $post_author ?></a>  </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?= $post_date ?></p>
        <hr>
        <img class="img-responsive" src="images/<?= $post_image ?>" alt="">
        <hr>
        <p><?= $post_content ?></p>
        <a class="btn btn-primary" href="post.php?p_id=<?=$post_id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
    <?php endwhile; 
    }//if
    ?>
</div><!-- col8 -->