<?php $page_title = "ADMIN PANEL"?>
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
                        CMS Dashboard - ADMIN AREA
                        <small><?= $_SESSION['username'] ?></small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->
            <!-- info boxes -->
            <?php
            $query = "SELECT * FROM posts";
            $result  = mysqli_query($conn, $query);
            $post_count = mysqli_num_rows($result);
            $query = "SELECT * FROM posts WHERE post_status = 'draft'";
            $result  = mysqli_query($conn, $query);
            $draft_post_count = mysqli_num_rows($result);
            $query = "SELECT * FROM comments";
            $result  = mysqli_query($conn, $query);
            $comment_count = mysqli_num_rows($result);
            $query = "SELECT * FROM users";
            $result  = mysqli_query($conn, $query);
            $users_count = mysqli_num_rows($result);
            $query = "SELECT * FROM categories";
            $result  = mysqli_query($conn, $query);
            $category_count = mysqli_num_rows($result);
            ?>

            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?= $post_count ?></div>
                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?= $comment_count ?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?= $users_count ?></div>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class='huge'><?= $category_count ?></div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->


            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawStuff);

                function drawStuff() {
                    var data = new google.visualization.arrayToDataTable([
                        ['Move', 'Percentage'],
                        ["All Posts" , <?=$post_count?>],
                        ["Draft Posts" , <?=$draft_post_count?>],
                        ["Comments" , <?=$comment_count?>],
                        ["Users" , <?=$users_count?>],
                        ["Categories" , <?=$category_count?>],
                        // ["King's pawn (e4)", 44],
                        // ["Queen's pawn (d4)", 31],
                        // ["Knight to King 3 (Nf3)", 12],
                        // ["Queen's bishop pawn (c4)", 10],
                        // ['Other', 3]
                    ]);

                    var options = {
                        width: 'auto',
                        legend: {
                            position: 'none'
                        },
                        chart: {
                            title: '',
                            subtitle: ''
                        },
                        axes: {
                            x: {
                                0: {
                                    side: 'top',
                                    label: 'Statics'
                                } // Top x-axis.
                            }
                        },
                        bar: {
                            groupWidth: "90%"
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                    // Convert the Classic options to Material options.
                    chart.draw(data, google.charts.Bar.convertOptions(options));
                };
            </script>
            <div id="top_x_div" style="width: 'auto'; height: 500px;"></div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>