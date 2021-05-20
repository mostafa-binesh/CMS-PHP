<?php

if (isset($_POST['add_user'])) {
    $add_username = $_POST['username'];
    $add_email = $_POST['email'];
    $add_fn = $_POST['fn'];
    $add_ln = $_POST['ln'];
    $add_role = $_POST['role'];
    $add_password = $_POST['password'];
    $add_password2 = $_POST['password2'];
    // $username = $_GET['username'];
    // mysqli_num_rows()
    $query = "SELECT * FROM users WHERE username = '$add_username'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "result problem";
    }
    // echo 'pashm';
    // echo mysqli_num_rows($result);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='alert alert-warning'>A user with this username already exist!</div>";
    } else {

        if($add_password == $add_password2){
            $query = "INSERT INTO 
        `users`(`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) 
        VALUES ('{$add_username}','{$add_password}','{$add_fn}','{$add_ln}','{$add_email}','pashm.png','{$add_role}')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<h2>Couldn't add the user!</h2>" . mysqli_error($conn);
            // echo $post_image . $post_content;
        } else {
            echo "<div class='alert alert-success'>User added successfully</div>";
        }
        }
    }
}

?>

<form action="" method="post">

    <div class="form-group">
        <label for="title">Username</label>
        <input placeholder="username" type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="title">Email Address</label>
        <input placeholder="Email" type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="title">First Name</label>
        <input placeholder="Email" type="text" class="form-control" name="fn">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input placeholder="Email" type="text" class="form-control" name="ln">
    </div>
    <div class="form-group">
        <label for="status">Role</label>
        <br>
        <select class="form-control" name="role" id="">
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>
            <!-- <option value="pashm" selected="selected">pashmaloo</option> -->
        </select>
    <!-- <small>The status of comment automaticly changed to approved! will be fixed in future patchs...</small> -->
    </div>
    <div class="form-group">
        <label for="title">Password</label>
        <input placeholder="Email" type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="title">Repeat Password</label>
        <input placeholder="Email" type="password" class="form-control" name="password2">
    </div>
    
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
    </div>

</form>