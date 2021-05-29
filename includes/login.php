<?php include "db.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


    <div class="container text-center">
        <div class="well">
        <?php

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT * FROM users WHERE username='{$username}' AND user_password = '{$password}'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "result bug";
    } else if (empty($result)) {
        echo "result is empty";
    } else if (mysqli_num_rows($result) == 0) {
        echo "<div class='alert alert-danger'>The account name or password that you have entered is incorrect</div>";
        // sleep(3);
        // header('location:../index.php');
        // header("refresh:2; url=../index.php");
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['user_email'];
            $_SESSION['role'] = $row['user_role'];
            $_SESSION['firstname'] = $row['user_firstname'];
            $_SESSION['lastname'] = $row['user_lastname'];
            // $_SESSION['last_time'] = time();

            
            header('location: ../admin');
            // $_SESSION['username'] = $row['username'];
        }
        // echo $_SESSION['username'] , $_SESSION['role'];
    }
}
?>
            <h1>Login Page</h1>
            <form method="POST" action="./loginprocess.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <!-- <div class="form-check"> -->
                    <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                    <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                <!-- </div> -->
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
            <a class="btn btn-primary text-center" href="../index.php">GO TO HOMEPAGE</a>
        </div>
    </div>
</body>