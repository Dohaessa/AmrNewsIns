<?php include('admin-inc/admin_header.php'); ?>
<!-- Navigation -->
<?php include('admin-inc/admin_nav.php'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Posts </h1>

                <?php
                if (isset($_GET['source'])) {
                    $source = $_GET['source'];
                } else {
                    $source = '';
                }

                switch ($source) {
                    case 'add':
                        include('admin-inc/add_post.php');
                        break;
                    default:
                        include('admin-inc/all_posts.php');
                        break;
                }
                ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<?php include('admin-inc/admin_footer.php'); ?>