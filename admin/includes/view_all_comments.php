<?php
if (isset($_GET['source']) && $_GET['source'] == 'unapproved') {
    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ORDER BY comment_id ASC";
} else {
    $query = "SELECT * FROM comments ORDER BY comment_id ASC";
}
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "<h2>Couldn't fetch posts from database!</h2>";
} else if(mysqli_num_rows($result) == 0){
    echo "<h2>NO COMMENT FOUND</h2>";
}

else { ?>

    <table class="table table-hover table-striped table-responsive table-bordered">
        <thead>
            <tr>
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
                echo "<th scope='row'>{$row['comment_id']}</th>";
                echo "<td>{$row['comment_author']}</td>";
                echo "<td>{$row['comment_email']}</td>";
                echo "<td>{$post_name}</td>";
                echo "<td>{$row['comment_content']}</td>";
                
                echo "<td>{$row['comment_date']}</td>";
                
                echo "<td>{$row['comment_status']}</td> "    ;      
                echo "<td><a href='?source=edit&c_id={$row['comment_id']}'>Edit</a></td>";
                echo "<td><a href='?delete={$row['comment_id']}'>Delete</a></td>";
                if($row['comment_status'] == 'unapproved' && isset($_GET['source'])){
                    $site_name = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
                    echo "<td><a href='{$site_name}&approve={$row['comment_id']}'>Approve</a></td>";
                } else if($row['comment_status'] == 'unapproved'){
                    echo "<td><a href='?approve={$row['comment_id']}'>Approve</a></td>";
                } 
                else{
                    echo "<td><a href='?unapprove={$row['comment_id']}'>Unapprove</a></td>";
                }
                // echo "<td><a href='?approve={$row['comment_id']}'>Approve</a></td>";
                echo "</tr>";
                
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