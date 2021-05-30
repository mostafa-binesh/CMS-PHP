<?php
include '../../includes/db.php';
include '../../admin/includes/functions.php';

// echo $_POST['post_id'];
// $query = "DELETE FROM posts WHERE post_id = {$_POST['post_id']}";
// $result = mysqli_query($conn, $query);
$result = deletePost($_POST['post_id']);
if ($result) {
    echo "<div class='alert alert-success'>Post deleted successfully</div>";
    // echo "deleted successfully";
} else{
    echo "some problem happend";
}
