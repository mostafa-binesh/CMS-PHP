<?php  



include "includes/db.php";



$query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT 3,1";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
    echo $row['post_id'];
    echo "<br>";
}


?>