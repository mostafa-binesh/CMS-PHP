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
                        var pashm = 0;
                        var currentData = "";

                        function auto_load() {
                            $.ajax({
                                type: 'GET',
                                url: 'includes/view_all_posts_ajax.php',
                                success: function(data) {
                                    // if (currentData != data) {
                                    if (true) {
                                        $('#postdiv').html(data);
                                        currentData = data;
                                        pashm++;
                                        console.log(pashm);
                                    }
                                }
                            });
                            //   alert('page refreshed');
                        }


                        function ajaxdelete(id) {
                            $.ajax({
                                type: 'POST',
                                url: 'includes/ajaxdelete.php',
                                data: {
                                    post_id: id
                                    // aa: 'gholvagir'
                                },
                                success: function(data) {
                                    if (currentData != data) {
                                        $('#notification').html(data);
                                        // currentData = data;
                                        // pashm++;
                                        // console.log(pashm);
                                    }
                                }
                            });
                            // alert('page refreshed');
                        }

                        // auto_load();
                        // setInterval(auto_load,30000);
                    </script>


                    <!-- <button onclick="auto_load()">Button</button> -->
                    <div id="notification"></div>
                    <div id="postdiv"></div>





                    <script>
                        setInterval(auto_load, 1000);
                        // ajaxdelete();
                        // ajaxdelete();
                        // setInterval(ajaxdelete,8000);
                        $(document).ready(function() {
                            ajaxdelete();
                        })
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