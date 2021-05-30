<?php
// include_once '../../includes/db.php';
if (isset($_POST['bulksubmit'])) {
    // echo "receiving data!";
    if (isset($_POST['checkboxValues']) && $_POST['checkBoxOptions'] != 'select') {

        foreach ($_POST['checkboxValues'] as $CBV) {
            switch ($_POST['checkBoxOptions']) {
                case 'approve':
                    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$CBV}";
                    break;
                case 'unapprove':
                    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$CBV}";
                    break;
                case 'delete':
                    $query = "DELETE FROM comments WHERE comment_id = {$CBV}";
                    break;
            }
            $result = mysqli_query($conn, $query);
        }
    } else {
        echo "<div class='alert alert-danger'>Please control the entries</div>";
    }
}
if (isset($_GET['source']) && $_GET['source'] == 'unapproved') {
    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ORDER BY comment_id ASC";
} else {
    $query = "SELECT * FROM comments ORDER BY comment_status DESC,comment_date DESC";
}
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "<h2>Couldn't fetch posts from database!</h2>";
} else if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-warning'>NO UNAPPROVED COMMENTS FOUND</div>";
} else { ?>
    <form action="" method="POST">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <select class="form-control" name="checkBoxOptions" id="">
                        <option value="select">Select</option>
                        <option value="approve">Approve</option>
                        <option value="unapprove">Unapprove</option>
                        <option value="delete"">Delete</option>
    </select>
    
</div>
  </div>
  <div class=" col-xs-6">
                            <input name="bulksubmit" type="submit" class="btn btn-primary" value="Apply">
                            <input type="button" class="btn btn-info" value="New Post">
                </div>
            </div>
            <table class="table table-hover table-striped table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col"><input name="checkAllBoxes" type="checkbox"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Author</th>
                        <th scope="col">Email</th>
                        <th scope="col">Post's name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cat_query = "SELECT * FROM posts WHERE post_id = {$row['comment_post_id']}";
                        $cat_result = mysqli_query($conn, $cat_query);
                        while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                            $post_name = $cat_row['post_title'];
                        }
                        echo "<tr>";
                        echo " <th scope='row'><input class='checkBoxes' value={$row['comment_id']} id='check' name='checkboxValues[]' type='checkbox'></th>";
                        echo "<th scope='row'>{$row['comment_id']}</th>";
                        echo "<td>{$row['comment_author']}</td>";
                        echo "<td>{$row['comment_email']}</td>";
                        echo "<td>{$post_name}</td>";
                        echo "<td>{$row['comment_content']}</td>";
                        echo "<td>{$row['comment_date']}</td>";
                        echo "<td>{$row['comment_status']}</td> ";
                        echo "<td><a href='?source=edit&c_id={$row['comment_id']}'>Edit</a></td>";
                        echo "<td><a href='?delete={$row['comment_id']}'>Delete</a></td>";
                        if ($row['comment_status'] == 'unapproved' && isset($_GET['source'])) {
                            $site_name = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
                            echo "<td><a href='{$site_name}&approve={$row['comment_id']}'>Approve</a></td>";
                        } else if ($row['comment_status'] == 'unapproved') {
                            echo "<td><a href='?approve={$row['comment_id']}'>Approve</a></td>";
                        } else {
                            echo "<td><a href='?unapprove={$row['comment_id']}'>Unapprove</a></td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>