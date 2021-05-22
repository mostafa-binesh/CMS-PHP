<?php

if(isset($_POST['submit_comment']) && isset($_GET['id'])){
    $comment_name = $_POST['name'];
    $comment_email = $_POST['email'];
    $comment_content = $_POST['content'];
    $comment_date = date('y-m-d');
    $query = "INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_status`) 
    VALUES ({$_GET['id']},'{$comment_name}','{$comment_email}','{$comment_content}','{$comment_date}','unapproved')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        echo "kose khare zhilet! " . mysqli_error($conn);
        echo $comment_date;
    } else{

        header('Location: ');
    }
}

?>

<div class="well">
    <h4>Leave a Comment:</h4>
    <?php
    if(!isset($_SESSION['username'])){  ?>
        <form action="" method="POST" role="form">
        <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email:</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Content:</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input name="submit_comment" class="btn btn-primary" type="submit" value="submit">
    </form>
    <?php
    } else{ ?>
        <form action="" method="POST" role="form">
        <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input value="<?=$_SESSION['firstname'] . ' ' . $_SESSION['lastname']?>" name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email:</label>
            <input value="<?=$_SESSION['email']?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Content:</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
        </div>
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <input name="submit_comment" class="btn btn-primary" type="submit" value="submit">
    </form>
    <?php } ?>
</div>

<hr>

<!-- Posted Comments -->

<?php
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
}
$query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} and comment_status = 'approved' ORDER BY comment_id ASC"; // ASC | DESC
$result = mysqli_query($conn, $query);
if (!$result) {
    echo "couldn't fetch the data from database!";
} else {
    while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $row['comment_author'] ?>
            <small><?php echo $row['comment_date'] ?></small>
        </h4>
        <?php echo $row['comment_content'] ?>
    </div>
</div>
     <?php }
} 
?>
<!-- <div>pashm</div> -->



<!-- Comment -->
<!-- <div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->
<!-- Nested Comment -->
<!-- <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div> -->
<!-- End Nested Comment -->
<!-- </div>
</div> -->