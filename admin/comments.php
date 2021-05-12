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


                        All comments
                        <small>All posts shown here</small>
                    </h1>



                    <?php
                    if (isset($_GET['delete'])) {
                        
                        $query = "DELETE FROM comments WHERE comment_id = {$_GET['delete']}";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                            echo "<div class='alert alert-danger'>FAILED TO DELETE THE COMMENT WITH ID = {$_GET['delete']}</div>";
                        } else {
                            echo "<div class='alert alert-success'>COMMENT SUCCESSFULLY REMOVED</div>";
                        }
                    }
                    if(isset($_GET['approve'])){
                        $comment_id = $_GET['approve'];
                        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$comment_id}";
                        $result = mysqli_query($conn,$query);
                        if(!$result){
                            echo "<div class='alert alert-warning'>COULD NOT APPROVE THE COMMENT WITH ID = {$comment_id}</div>";
                        } else {
                            echo "<div class='alert alert-success'>COMMENT SUCCESSFULLY APPROVED</div>";
                        }
                    }
                    if(isset($_GET['unapprove'])){
                        $comment_id = $_GET['unapprove'];
                        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$comment_id}";
                        $result = mysqli_query($conn,$query);
                        if(!$result){
                            echo "<div class='alert alert-warning'>COULD NOT UNAPPROVE THE COMMENT WITH ID = {$comment_id}</div>";
                        } else {
                            echo "<div class='alert alert-success'>COMMENT SUCCESSFULLY UNAPPROVED</div>";
                        }
                    }
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = '';
                    }
                    switch ($source) {
                        // case 'unapproved':
                        //     // code here
                        //     # code here
                        //     include 'includes/unapproveds.php';
                        //     break;
                        case 'edit':
                            include 'includes/edit_comment.php';
                            break;
                        default:
                            include 'includes/view_all_comments.php';
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