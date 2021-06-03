<?php include "db.php";
session_start();
if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
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
            $hash = $row['user_password'];
            if (password_verify($password, $row['user_password'])) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = 'admin';
                $_SESSION['email'] = $row['user_email'];
                $_SESSION['role'] = $row['user_role'];
                $_SESSION['firstname'] = $row['user_firstname'];
                $_SESSION['lastname'] = $row['user_lastname'];
                $_SESSION['password'] = $password;
                echo $_SESSION['username'];
                // die();
                if ($_SESSION['role'] == 'admin') {
                    header('location: ../admin');
                } else {
                    header('location: ../index.php');
                }
            } else {
                echo "password is incorrect";
                header("refresh:2; url=../index.php");
            }
            // $_SESSION['username'] = $row['username'];
        }
        // echo $_SESSION['username'] , $_SESSION['role'];
    }
}
