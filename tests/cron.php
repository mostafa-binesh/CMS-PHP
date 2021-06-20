<?php

const DB_HOST = 'sql200.netafrooz.net';
// define(db_host, 'localhost');
const DB_USER = 'xznu_28218506';
const DB_PASS = 'rI8hHEu805Ry';
const DB_DATABASE = 'xznu_28218506_test';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);

if($conn){
    // echo "Database connected!";
    # do nothing
} else{
    echo "FAILED TO CONNECT TO THE DATABASE!";
}

$query = "SELECT * FROM posts WHERE id=1";
$result = mysqli_query($conn,$query);
if(!$result){
    die("problem in first query");
}
$id = 0;
while($row = mysqli_fetch_assoc($result)){
    $id = $row['number'];
}



$query = "UPDATE posts SET number = {$id} WHERE id = 1";
$result = mysqli_connect($conn,$query);
if(!$result){
    die("problem in second query");
}


?>