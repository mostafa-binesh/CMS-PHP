<?php include "includes/admin_header.php"; ?>




<div id="wrapper">
    
    <!-- Navigation -->
    
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