<?php include "db.php";
session_start();
if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $password = password_verify($password , )
    $query = "SELECT * FROM users WHERE username='{$username}'";
    // echo $query;
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "result bug";
    } else if (empty($result)) {
        echo "result is empty";
    } else if (mysqli_num_rows($result) == 0) {
        echo "no account with this username exist";
        // sleep(3);
        // header('location:../index.php');
        header("refresh:2; url=../index.php");
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['user_password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['user_role'];
                header('location: ../admin');
            } else {
                echo "password is incorrect";
                header("refresh:2; url=../index.php");
            }
            // $_SESSION['username'] = $row['username'];
        }
        // echo $_SESSION['username'] , $_SESSION['role'];
    }
}
