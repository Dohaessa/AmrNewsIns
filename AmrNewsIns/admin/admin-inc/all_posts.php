<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $sql = "SELECT * FROM `posts`";
    $allPosts = mysqli_query($connection , $sql);
    while( $row = mysqli_fetch_assoc($allPosts)  ):
        $post_id = $row['post_id'] ;
        $post_title = $row['post_title'] ;
        $post_category = $row['post_category_id'] ;
        $post_author = $row['post_author'] ;
        $post_date= $row['post_date'] ;
        $post_image = $row['post_image'] ;
        ?>
        
        <tr>
            <td><?=$post_id?></td>
            <td><?=$post_title?></td>

            <!-- <td><?=$post_category?></td> -->
            <td>
                <?php
                 $cat_sql = "SELECT * FROM `categories` WHERE `cat_id` = '$post_category'  ";
                 $allCategories = mysqli_query($connection, $cat_sql);

                 while ($row = mysqli_fetch_assoc($allCategories)):
                     $cat_id = $row['cat_id'];
                     $cat_title = $row['cat_title'];
                     echo $cat_title;
                 endwhile;
                ?>
            </td>

            <td><?=$post_author?></td>
            <td><?=$post_date?></td>
            <td> <img src="../images/<?=$post_image?>" width="100" alt=""> </td>
            <td class="text-center"> <a href="posts.php?source=edit&p_id=<?=$post_id?>"> <i class="fa fa-edit"></i> </a></td>
            <td class="text-center"> <a href="posts.php?source=delete&p_id=<?=$post_id?>"> <i class="fa fa-trash text-danger"></i> </a></td>
        </tr>
 <?php endwhile; ?>
    </tbody>
</table>