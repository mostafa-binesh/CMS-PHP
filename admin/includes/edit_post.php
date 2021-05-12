<?php

if (isset($_POST['update_post'])) {
    $post_id = $_GET['p_id'];
    $post_title = $_POST['title'];
    $post_category_id = $_POST['category_id'];
    $post_author = $_POST['author'];
    $post_status = $_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_date = date('y-m-d');
    // $post_comment_count = $
    // echo "{$post_image} , {$post_image_temp}";

    // echo "../images/";
    // send data to database and upload the image
    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $result = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result)){
            $post_image = $row['post_image'];
        }
    }
    $query = "UPDATE `posts` SET `post_id`='{$post_id}',`post_category_id`='{$post_category_id}',`post_title`='{$post_title}',`post_author`='{$post_author}',`post_date`='{$post_date}',`post_image`='{$post_image}',`post_content`='{$post_content}',`post_tags`='{$post_tags}',`post_status`='{$post_status}' WHERE post_id = {$post_id}";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<h2>Couldn't update the post!</h2>" . mysqli_error($conn);
        echo $post_image . $post_content;
    } else {
        move_uploaded_file($post_image_temp, "../images/$post_image");
        // header('Location: &added=1');
        // echo "<h2>Post updated successfully</h2>";
        echo "<div class='alert alert-success'>Post updated successfully</div>";
    }
}
if (isset($_GET['p_id'])) {
    $post_id = $_GET['p_id'];
    // echo $post_edit_id;
    $edit_fetch_post_query = "SELECT * FROM posts WHERE post_id = {$post_id}";
    $edit_fetch_post_result = mysqli_query($conn, $edit_fetch_post_query);
    while ($row = mysqli_fetch_assoc($edit_fetch_post_result)) {
        // $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_category_id = $row['post_category_id'];
        $post_date = $row['post_date'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_content = $row['post_content'];
        $post_image = $row['post_image'];
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Category ID</label>
        <br>
        <select class="form-control" name="category_id" id="">
            <?php
            $cat_query = "SELECT * FROM categories";
            $cat_result = mysqli_query($conn,$cat_query);
            if(!$cat_result){

            } else{
                while($row = mysqli_fetch_assoc($cat_result)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    $selected = "";
                    if($cat_id == $post_category_id){
                        // $selected = "selected='selected'";
                        echo "<option selected='selected' value={$cat_id}>{$cat_title}</option>";
                    } else{
                        // $selected = "";
                        echo "<option value={$cat_id}>{$cat_title}</option>";
                    }
                    // echo "<option" .  "{$selected}" . " value={$cat_id}>{$cat_title}</option>";
                    // echo "<option value={$cat_id}>{$cat_title}</option>";
                }
            }
            ?>
            <!-- <option value="pashm" selected="selected">pashmaloo</option> -->
        </select>
    </div>
    <div class="form-group">
        <label for="category">Post author</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="category">Post status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <?php echo $post_image; ?>
        <input type="file" name="image">
    </div>
        <img src="../images/<?php echo $post_image ?>" class="img-rounded img-responsive img-thumbnail img" style="width: 125px;" alt="">

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="tags">
        <!-- <small>Seperate tags via ,</small> -->
        <p>Seperate tags via ,</p>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Publish Post">
    </div>

</form>