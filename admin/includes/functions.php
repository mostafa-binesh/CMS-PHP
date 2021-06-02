        <?php
        if (isset($_GET['onlineusers'])) {
            if (!isset($conn)) {
                include "../../includes/db.php";
            }
        ?>
            <table class="table table-hover table-striped table-responsive table-bordered">
                <thead>
                    <tr>
                    
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <!-- <th scope="col">Status</th> -->
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $online_timeout = 30; // seconds
                    $time = time();
                    $query = "SELECT * FROM users WHERE last_time + $online_timeout >= {$time}";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "failed to connect to database";
                    } else if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<th scope='row'>{$row['user_id']}</th>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['user_firstname']}</td>";
                            echo "<td>{$row['user_lastname']}</td>";
                            echo "<td>{$row['user_email']}</td>";
                            echo "<td>{$row['user_role']}</td>";
                            // echo "<td>{$row['comment_status']}</td> ";
                            echo "<td><a href='?source=edit&u_id={$row['user_id']}'>Edit</a></td>";
                            echo "<td><a href='?delete={$row['user_id']}'>Delete</a></td>";

                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

        <?php }
                }
            // echo "test content"; 
        
        
// echo "test content in includes"; 

// deletes post and all related comments to the post
function deletePost($id){
    global $conn;
    $query = "DELETE FROM posts WHERE post_id = {$id}";
    $result = mysqli_query($conn,$query);
    $query = "DELETE FROM comments WHERE comment_post_id = {$id}";
    $result = mysqli_query($conn,$query);
    return ($result) ? true : false;
}
function siteURL()
{
    // $website_name = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $website_name = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['SERVER_NAME'];
    $GLOBALS['url'] = $website_name;
    return $website_name;
} 