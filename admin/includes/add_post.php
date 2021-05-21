<?php
if (isset($_GET['added'])) {
    echo "<div class='alert alert-success'>Post added successfuly</div>";
}
if (isset($_POST['create_post'])) {
    $post_title = $_POST['title'];
    $post_category_ID = $_POST['category_id'];
    $post_author = $_POST['author'];
    $post_status = $_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['tags'];
    $post_content = $_POST['content'];
    $post_date = date('y-m-d'); // or using now()
    // echo "{$post_image} , {$post_image_temp}";

    // echo "../images/";
    // send data to database and upload the image
    $query = "INSERT INTO 
    `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) 
    VALUES ('$post_category_ID','{$post_title}','{$post_author}','{$post_date}','{$post_image}','{$post_content}','{$post_tags}',0,'{$post_status}')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<h2>Couldn't add the post!</h2>";
    } else {
        move_uploaded_file($post_image_temp, "../images/$post_image");
        // header('Location: &added=1');
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <br>
        <select class="form-control" name="category_id" id="">
            <?php
            $cat_query = "SELECT * FROM categories";
            $cat_result = mysqli_query($conn, $cat_query);
            if (!$cat_result) {
            } else {
                while ($row = mysqli_fetch_assoc($cat_result)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value={$cat_id}>{$cat_title}</option>";
                }
            }
            ?>
            <!-- <option value=""></option> -->
        </select>
    </div>
    <div class="form-group">
        <label for="category">Post author</label>
        <input type="text" class="form-control" name="author">
    </div>
    <div class="form-group">
        <label for="category">Post status</label>
        <!-- <input type="text" class="form-control" name="status"> -->
        <select class="form-control" name="status">
            <option value='published'>Published</option>
            <option value='draft'>Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="tags">
        <!-- <small>Seperate tags via ,</small> -->
        <p>Seperate tags via ,</p>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="content" id="editor" cols="30" rows="10">
            <p>sample text</p>
        </textarea>
        <script src="./js/scripts.js"></script>
        <!-- <div name="content" id="editor" style="height: 500px;"> -->
        <!-- </div> -->

    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
    </div>

</form>