<?php
// include_once '../../includes/db.php';
if (isset($_POST['bulksubmit'])) {
    // echo "receiving data!";
    if (isset($_POST['checkboxValues']) && $_POST['checkBoxOptions'] != 'select') {

        foreach ($_POST['checkboxValues'] as $CBV) {
            switch ($_POST['checkBoxOptions']) {
                case 'publish':
                    $query = "UPDATE posts SET post_status = 'published' WHERE post_id = {$CBV}";
                    break;
                case 'draft':
                    $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = {$CBV}";
                    break;
                case 'delete':
                    // $query = "DELETE FROM posts WHERE post_id = {$CBV}";
                    deletePost($CBV);
                    break;
            }
            $result = mysqli_query($conn, $query);
        }
    } else {
        echo "<div class='alert alert-danger'>Please control the entries</div>";
    }
}
$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "<h2>Couldn't fetch posts from database!</h2>";
} else { ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <select class="form-control" name="checkBoxOptions" id="">
                        <option value="select">Select</option>
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                        <option value="delete"">Delete</option>
    </select>
    
</div>
  </div>
  <div class=" col-xs-6">
                            <input name="bulksubmit" type="submit" class="btn btn-primary" value="Apply">
                            <!-- <input type="button" class="btn btn-info" value="New Post"> -->
                            <a class="btn btn-info" href="posts.php?source=add_post">Add new post</a>
                </div>
            </div>

            <table class="table table-hover table-striped table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><input name="checkAllBoxes" type="checkbox"></th>
                        <!-- <th scope="col"><input name="checkAllBoxes" onclick="selects(this)" type="checkbox"></th> -->
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $post_id = $row['post_id'];
                        $cat_query = "SELECT * FROM categories WHERE cat_id = {$row['post_category_id']}";
                        $cat_result = mysqli_query($conn, $cat_query);
                        while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                            $post_cat_name = $cat_row['cat_title'];
                        }

                        echo "<tr value={$post_id} >
                <th scope='row'><input class='checkBoxes' value={$post_id} id='check' name='checkboxValues[]' type='checkbox'></th>
                <th scope='row'>{$row['post_id']}</th>
                <td>{$row['post_title']}</td>
                <td>{$row['post_author']}</td>
                <td>{$post_cat_name}</td>
                <td>{$row['post_date']}</td>
                <td><img class='img-rounded img-responsive img-thumbnail' style='width:250px;' src='../images/{$row['post_image']}' alt=''></td>
                <td>{$row['post_tags']}</td>
                <td>{$row['post_comment_count']}</td>
                <td>{$row['post_status']}</td>           
                <td><a href='?source=edit&p_id={$row['post_id']}'>Edit</a></td>
                <td><a onclick=\"javascript: return confirm('Are u sure?')\"  href='?delete={$row['post_id']}'>Delete</a></td>
                <td><a href='../post.php?id={$row['post_id']}'>View</a></td>
                </tr>
                ";
                    }
                    ?>
                </tbody>
            </table>
    </form>
<?php } ?>
<button id="fadebtn">fade</button>


<script>
    $(function() {
        $("#fadebtn").click(function() {
            $("tr[value='94']").fadeOut(200);
        });
    });
</script>