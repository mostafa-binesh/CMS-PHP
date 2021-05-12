<?php

const DB_HOST = 'localhost';
// define(db_host, 'localhost');
const DB_USER = 'root';
const DB_PASS = '';
const DB_DATABASE = 'cms2';
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);

if($conn){
    // echo "Database connected!";
    # do nothing
} else{
    echo "FAILED TO CONNECT TO THE DATABASE!";
}
