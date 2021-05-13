<?php

if (isset($_POST['update_comment']) && isset($_GET['c_id'])) {
    $comment_id = $_GET['c_id'];
    $comment_author = $_POST['author'];
        $comment_email = $_POST['email'];
        $comment_status = $_POST['status'];
        $comment_content = $_POST['content'];
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
        echo "<div class='alert alert-success'>comment updated successfully</div>";
    }
}
if (isset($_GET['c_id'])) {
    $comment_id = $_GET['c_id'];
    // echo $post_edit_id;
    $query = "SELECT * FROM comments WHERE comment_id = {$comment_id}";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $comment_author = $row['comment_author'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
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
        <input class="btn btn-primary" type="submit" name="update_comment" value="Update comment">
    </div>

</form>