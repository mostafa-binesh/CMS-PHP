<?php
// if (isset($_POST['update_post'])) {
//     $post_id = $_GET['p_id'];
//     $post_title = $_POST['title'];
//     $post_category_id = $_POST['category_id'];
//     $post_author = $_POST['author'];
//     $post_status = $_POST['status'];
//     $post_image = $_FILES['image']['name'];
//     $post_image_temp = $_FILES['image']['tmp_name'];
//     $post_tags = $_POST['tags'];
//     $post_content = $_POST['content'];
//     $post_date = date('y-m-d');
//     // $post_comment_count = $
//     // echo "{$post_image} , {$post_image_temp}";

//     // echo "../images/";
//     // send data to database and upload the image
//     if (empty($post_image)) {
//         $query = "SELECT * FROM posts WHERE post_id = $post_id";
//         $result = mysqli_query($conn, $query);
//         while ($row = mysqli_fetch_assoc($result)) {
//             $post_image = $row['post_image'];
//         }
//     }
//     $query = "UPDATE `posts` SET `post_id`='{$post_id}',`post_category_id`='{$post_category_id}',`post_title`='{$post_title}',`post_author`='{$post_author}',`post_date`='{$post_date}',`post_image`='{$post_image}',`post_content`='{$post_content}',`post_tags`='{$post_tags}',`post_status`='{$post_status}' WHERE post_id = {$post_id}";
//     $result = mysqli_query($conn, $query);
//     if (!$result) {
//         echo "<h2>Couldn't update the post!</h2>" . mysqli_error($conn);
//         echo $post_image . $post_content;
//     } else {
//         move_uploaded_file($post_image_temp, "../images/$post_image");
//         // header('Location: &added=1');
//         // echo "<h2>Post updated successfully</h2>";
//         echo "<div class='alert alert-success'>Post updated successfully</div>";
//     }
// }


############ POST
if (isset($_POST['update_user'])) {
    // confirmation password of admin 
    // $query = "SELECT * FROM users WHERE user_id = {$_GET['u_id']}'";
    // $result = mysqli_query($conn,$query);
    // if(!$result){
    //     echo "cannot send the request to the database!";
    // } else if(mysqli_num_rows($result) == 0){
    //     echo "no user with this id";
    // } else {
    //     while($row = mysqli_fetch_assoc($result)){
    //         $
    //     }
    // }
    $query = "SELECT * FROM users WHERE user_email = '{$_POST['email']}'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "failed to connect to the database!";
    // } else if (mysqli_num_rows($result) > 0 && $_POST['email'] != $row['user_email']) {
    //     while ($row = mysqli_fetch_assoc($result)) {

    //         if ($_POST['email'] == $row['user_email']) {
    //             // no problem
    //         } else {

    //             echo "this email already exist!";
    //         }
    //     }
    } else {
        if ($_POST['newPassword'] == $_POST['newPassword2'] && !empty($_POST['newPassword'])) {
            $password = password_hash($_POST['newPassword'], PASSWORD_ARGON2ID);
            $query = "UPDATE `users` SET 
        `user_password`='{$password}',`user_firstname`='{$_POST['firstname']}',
        `user_lastname`='{$_POST['lastname']}',`user_email`='{$_POST['email']}',`user_role`='{$_POST['role']}' 
        WHERE user_id = {$_GET['u_id']}";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "failed to connect to the database!";
            } else {
                echo "<div class=' alert alert-success'>User Updated Successfully 1</div>";
            }
        } else if ($_POST['newPassword'] != $_POST['newPassword2'] && !empty($_POST['newPassword'])) {
            echo "password and repeat password must be the same!";
        } else if (empty($_POST['newPassword']) && empty($_POST['newPassword2'])) {
            $query = "UPDATE `users` SET 
        `user_firstname`='{$_POST['firstname']}',
        `user_lastname`='{$_POST['lastname']}',`user_email`='{$_POST['email']}',`user_role`='{$_POST['role']}' 
        WHERE user_id = {$_GET['u_id']}";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "failed to connect to the database!";
            } else {
                echo "<div class=' alert alert-success'>User Updated Successfully 2</div>";
            }
        }
    }
}



############ GET 

if (isset($_GET['u_id'])) {
    $user_id = $_GET['u_id'];
    $query = "SELECT * FROM users WHERE user_id = {$user_id}";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "problem to send the request to database!";
    } else if (mysqli_num_rows($result) == 0) {
        echo "user with this ID does not exist!";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            // $user_firstname = $row['username'];
?>
            <form action="" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Username</label>
                    <input value="<?php echo $username; ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="title">Email</label>
                    <input value="<?php echo $user_email; ?>" type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="title">First Name</label>
                    <input value="<?php echo $user_firstname ?>" type="text" class="form-control" name="firstname">
                </div>
                <div class="form-group">
                    <label for="title">Last Name</label>
                    <input value="<?php echo $user_lastname ?>" type="text" class="form-control" name="lastname">
                </div>
                <div class="form-group">
                    <label for="title">Role</label>
                    <select class="form-control" name="role">
                        <?php
                        if ($user_role == 'admin') {
                            echo "<option selected='selected' value='admin'>Admin</option>";
                            echo "<option value='Subscriber'>Subscriber</option>";
                        } else {
                            echo "
        <option selected='selected' value='Subscriber'>Subscriber</option>
        <option value='admin'>Admin</option>
        ";
                        }
                        ?>
                        <!-- // <option value=""></option> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">New Password</label>
                    <input placeholder="New Password" value="" type="password" class="form-control" name="newPassword">
                    <small>If you don't wanna change the password, don't fill 'new password's fields</small>
                </div>
                <div class="form-group">
                    <label for="title">New Password Confirmation</label>
                    <input placeholder="New Password" value="" type="password" class="form-control" name="newPassword2">
                </div>
                <!-- <div class="form-group">
    <label for="title">Current Password</label>
    <input placeholder="Curent Password"  value="" type="password" class="form-control" name="OldPassword">
</div> -->





                <div class="form-group">
                    <input class="btn btn-primary" type="submit" name="update_user" value="Edit User">
                </div>

            </form>
<?php
        }
    }
}
?>