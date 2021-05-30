<?php ob_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "functions.php" ?>
<?php session_start(); ?>
<?php

if (!isset($_SESSION['username'])) {

    echo "<div class='alert alert-warning'>Your crendital has been expired... redirecting in seconds...</div>";
    header("refresh:3; url=../includes/login.php");
    die();
} else if (isset($_SESSION['username']) && $_SESSION['role'] != 'admin') {
    // if () {
    echo "only admins can access to this dir";
    header("refresh:2; url=../index.php");
    die();
    // }
} else {
    $last_online_time = time();
    $query = "UPDATE users SET last_time = {$last_online_time} WHERE user_id = {$_SESSION['user_id']}";
    $result = mysqli_query($conn, $query);
}

// $page_title = "ADMIN PANEL";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- <title>SB Admin - Bootstrap Admin Template</title> -->
    <title>
        <?php
        if (!isset($page_title)) {
            echo "ADMIN PANEL";
        } else {
            echo $page_title;
        }
        ?>
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap 5 CDN -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- editor script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <script src="./js/scripts.js"></script> -->
    <!-- <script>
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>ّ -->
</head>

<body>