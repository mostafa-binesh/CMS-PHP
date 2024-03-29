
<?php include "includes/header.php" ?>

<!-- <body> -->
<!-- Navigation -->
<?php include "includes/navigation.php" ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <?php
            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $result = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($result)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,100);
                
                // $post_title = $row['post_title'];
                // $post_title = $row['post_title'];
                // $post_title = $row['post_title'];
                // $post_title = $row['post_title'];
                // $post_title = $row['post_title'];
            

            ?>
            <h2>
                <a href="post.php?id=<?php echo $post_id;?>"><?php echo $post_title ?></a>
            </h2>
            <p class='lead'>
            by <a href='index.php'><?php echo $post_author ?></a>
            </p>
            <p><span class='glyphicon glyphicon-time'></span> Posted on <?php echo $post_date ?></p>
            <hr>
            <img class='img-responsive img-rounded'  src='images/<?php echo $post_image; ?>' alt=''>
            <hr>
            <p><?php echo $post_content ?></p>
            <a class='btn btn-primary' href='post.php?id=<?php echo $post_id ?>'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>

            <hr>
            <?php } ?>
            <!-- Pager -->
            <?php include "includes/pager.php" ?>


            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>
            <!-- /.row -->



            <!-- Footer -->

            <?php include "includes/footer.php" ?>