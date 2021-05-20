<?php
            if (isset($_GET['id'])) {
                $query = "SELECT * FROM posts WHERE post_id = {$_GET['id']}";
                $post_result = mysqli_query($conn, $query);
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result) > 0){

                    while ($row = mysqli_fetch_assoc($result)) {
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
    
                        // $post_title = $row['post_title'];
                        // $post_title = $row['post_title'];
                        // $post_title = $row['post_title'];
                        // $post_title = $row['post_title'];
                        // $post_title = $row['post_title'];
    
    
                ?>
                        <h2>
                            <a href='#'><?php echo $post_title ?></a>
                        </h2>
                        <p class='lead'>
                            by <a href='index.php'><?php echo $post_author ?></a>
                        </p>
                        <p><span class='glyphicon glyphicon-time'></span> Posted on <?php echo $post_date ?></p>
                        <hr>
                        <img class='img-responsive img-rounded' src='images/<?php echo $post_image; ?>' alt=''>
                        <hr>
                        <p style="text-overflow: ellipsis;"><?php echo $post_content ?></p>
                        <!-- <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a> -->
    
                        <hr>
    
                <?php
                    } 
                    include "includes/comments.php";
                } else{
                    echo "<h1>NO POST FOUND WITH THIS ID</h1>";
                }
            } // end-if
            else {
                echo "<h1>NO ARGUMENT FOR POST ID FOUND</h1>";
            }

            ?>