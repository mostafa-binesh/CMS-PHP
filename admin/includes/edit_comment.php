<?php

if (isset($_POST['update_comment'])) {
    $comment_author = $_GET['author'];
        $comment_email = $_GET['email'];
        $comment_status = $_GET['status'];
        $comment_content = $_GET['content'];
    // $post_id = $_GET['p_id'];
    // $post_title = $_POST['title'];
    // $post_category_id = $_POST['category_id'];
    // $post_author = $_POST['author'];
    // $post_status = $_POST['status'];
    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];
    // $post_tags = $_POST['tags'];
    // $post_content = $_POST['content'];
    // $post_date = date('y-m-d');
    // $post_comment_count = $
    // echo "{$post_image} , {$post_image_temp}";

    // echo "../images/";
    // send data to database and upload the image

    $query = "UPDATE comments SET 
    `comment_id`='{$comment_id}'
    ,`comment_email`='{$comment_email}'
    ,`comment_status`='{$comment_status}'
    ,`comment_content`='{$comment_content}'
    WHERE comment_id = {$comment_id}";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<h2>Couldn't update the comment!</h2>" . mysqli_error($conn);
        echo $post_image . $post_content;
    } else {
       
        // header('Location: &added=1');
        // echo "<h2>Post updated successfully</h2>";
        echo "<div class='alert alert-success'>comment updated successfully</div>";
    }
}
if (isset($_GET['c_id'])) {
    $comment_id = $_GET['c_id'];
    // echo $post_edit_id;
    $query = "SELECT * FROM comments WHERE comment_id = {$comment_id}";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        // $post_id = $row['post_id'];
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        // $post_tags = $row['post_tags'];
        // $post_comment_count = $row['post_comment_count'];
        // $post_status = $row['post_status'];
        // $post_content = $row['post_content'];
        // $post_image = $row['post_image'];
    }
}
?>

<form action="" method="post">

    <div class="form-group">
        <label for="title">Author Name</label>
        <input value="<?php echo $comment_author ?>" type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="title">Email Address</label>
        <input value="<?php echo $comment_email ?>" type="text" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <br>
        <select class="form-control" name="status" id="">
            <option value="approved">Approved</option>
            <option value="unapproved">Unapproved</option>
            <!-- <option value="pashm" selected="selected">pashmaloo</option> -->
        </select>
    <small>The status of comment automaticly changed to approved! will be fixed in future patchs...</small>
    </div>


    <div class="form-group">
        <label for="post_content">Comment Content</label>
        <textarea class="form-control " name="content" id="" cols="30" rows="10"><?php echo $comment_content ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_comment" value="Publish Post">
    </div>

</form>