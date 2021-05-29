<?php $page_title = "SEE AND EDIT POSTS VIA AJAX" ?>
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

                    <script type="text/javascript">
                        // $(document).ready(auto_load());
                        // $('title').html("See and delete posts via Ajax");
                        $(document).ready(function() {
                            auto_load();
                            setInterval(auto_load, 5000);
                        });
                        var currentData = "";

                        function auto_load() {
                            // alert('ajax is here');

                            $.ajax({
                                type: 'GET',
                                url: 'includes/view_all_posts_ajax.php',
                                success: function(data) {
                                    if (currentData != data) {
                                        // if (true) {
                                        $('#postdiv').html(data);
                                        currentData = data;
                                        // pashm++;
                                        // console.log(pashm);
                                    }
                                }
                            });
                            //   alert('page refreshed');
                        }

                        function ajaxdelete(id) {
                            // alert('ajax delete launched');
                            $.ajax({
                                type: 'POST',
                                url: 'includes/ajaxdelete.php',
                                data: {
                                    post_id: id
                                    // aa: 'gholvagir'
                                },
                                success: function(data) {
                                    $('#notification').html(data);
                                    auto_load();
                                }
                            });
                            // alert('page refreshed');
                            auto_load();
                        }
                    </script>
                    <!-- <button onclick="auto_load()">Button</button> -->
                    <div id="notification"></div>
                    <small">Posts update every 5 seconds...</small>
                        <div id="postdiv"></div>
                        <!-- <a  href="">pashmaloo hastam</a> -->
                        <script>
                            function pashm(id) {
                                alert('pashm');
                            }
                            // setInterval(auto_load, 1000);
                            // ajaxdelete();
                            // ajaxdelete();
                            // setInterval(ajaxdelete,8000);

                            // $(function)
                            // $(function() {

                            //     auto_load();

                            // });
                            // $(auto_load());
                            // ajaxdelete();
                        </script>
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