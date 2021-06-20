<?php

include "../includes/db.php";
$query = "SELECT * FROM posts";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
    $query = "SELECT * FROM comments WHERE comment_post_id = {$row['post_id']}";
    $result2 = mysqli_query($conn,$query);
    if(!$result2){
        die("die");
    }
    $num_row = mysqli_num_rows($result2);
    $query2 = "UPDATE posts SET post_comment_count = {$num_row} WHERE post_id = {$row['post_id']}";
    $result3 = mysqli_query($conn,$query2);
    if(!$result3){
        die("the fuck");
    }
    else{
        echo " {$row['post_id']} | $num_row";
        echo "<br>";
    }
    // while($row2 = mysqli_fetch_assoc($result)){
    // }
}


?>