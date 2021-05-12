<?php
$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "<h2>Couldn't fetch posts from database!</h2>";
} else { ?>

    <table class="table table-hover table-striped table-responsive table-bordered">
        <thead>
            <tr>
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
                $cat_query = "SELECT * FROM categories WHERE cat_id = {$row['post_category_id']}";
                $cat_result = mysqli_query($conn, $cat_query);
                while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                    $post_cat_name = $cat_row['cat_title'];
                }
                echo "<tr>
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
                <td><a href='?delete={$row['post_id']}'>Delete</a></td>
                </tr>
                ";
            }
            ?>
            <!-- <tr>
                                        <th scope="row">1</th>
                                        <td>Mostafa</td>
                                        <td>Pashm</td>
                                        <td>Javascript</td>
                                        <td>Published</td>
                                        <td><img src="" alt=""></td>
                                        <td>pashm,awesome</td>
                                        <td>Mark</td>
                                        <td>2020</td>
                                    </tr> -->

        </tbody>
    </table>
<?php } ?>