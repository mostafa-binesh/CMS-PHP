<?php
include '../../includes/db.php';
// echo $_POST['post_id'];
$query = "DELETE FROM posts WHERE post_id = {$_POST['post_id']}";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<div class='alert alert-success'>Post deleted successfully</div>";
    // echo "deleted successfully";
} else{
    echo "some problem happend";
}
