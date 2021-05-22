<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="POST">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button type="submit" name="submit" class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $query = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $query);
                    if (!$result) {
                        echo "QUERY FAILED!";
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {

                            echo
                            "
                            <li><a href='category.php?cat_id={$row['cat_id']}'>{$row['cat_title']}</a>
                    </li>
                            ";
                        }
                    }
                    ?>

                    <!-- <li><a href="#">Category Name</a>
                    </li> -->


                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- login section -->
    <?php
    if (!isset($_SESSION['username'])) { ?>

        <div class="well">


            <form method="POST" action="includes/loginprocess.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                <!-- <div class="form-check"> -->
                <!-- <input type="checkbox" class="form-check-input" id="exampleCheck1"> -->
                <!-- <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                <!-- </div> -->
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </form>
        </div>
        <div class="well text-center">
            <h2>Links</h2>
            <a class="btn btn-primary" href="registration.php">Registration</a>
        </div>
    <?php } else{
        ?>
        <div class="well text-center">
            <a href="./admin/includes/logout.php" class="btn btn-warning text-center center-block">Logout</a>
        </div>
    <?php } ?>
    
    




    <!-- Side Widget Well -->
    <?php include  "widget.php" ?>

</div>

</div>
<hr>