
<?php
include_once "includes/db.php";
if(isset($_GET['id'])){
    $query = "SELECT * FROM posts WHERE post_id = {$_GET['id']}";
    $result = mysqli_query($conn,$query);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['post_title'];
        }
    }
    else {
        echo "problem happend";
    }
}
?>
<?php include 'includes/header.php' ?>

<!-- Navigation -->
<?php include "includes/navigation.php" ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <?php include 'includes/blog_post.php'; ?>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>