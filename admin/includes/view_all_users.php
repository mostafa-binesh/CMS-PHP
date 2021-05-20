<?php

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "<h2>Couldn't fetch users from database!</h2>";
} else if (mysqli_num_rows($result) == 0) {
    echo "<div class='alert alert-warning'>NO USER FOUND</div>";
} else { ?>
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
<?php } ?>
