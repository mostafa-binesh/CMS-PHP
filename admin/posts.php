<?php include "includes/admin_header.php"; ?>





<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">CMS Dashboard</a>
        </div>
        <!-- Top Menu Items -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                        
                        
                            All posts
                            <small>All posts shown here</small>
                        </h1>
                        <?php

                        if (isset($_GET['delete'])) {
                            $delete_id = $_GET['delete'];
                            $query = "DELETE FROM posts WHERE post_id = $delete_id";
                            $result = mysqli_query($conn, $query);
                            if (!$result) {
                                # do sth
                                echo "<div class='alert alert-danger'>Couldn't delete the post</div>";
                            } else {
                                # done
                                echo "<div class='alert alert-success'>Post deleted successfully</div>";
                            }
                        }
                        ?>
                        <?php
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        } else {
                            $source = '';
                        }
                        switch ($source) {
                            case 'add_post':
                                // code here
                                # code here
                                include 'includes/add_post.php';
                                break;
                            case 'edit':
                                include 'includes/edit_post.php';
                                break;
                            default:
                                include 'includes/view_all_posts.php';
                        }
                        ?>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>