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
                    $result = mysqli_query($conn,$query);
                    if(!$result){
                        echo "QUERY FAILED!";
                    } else {
                        while($row = mysqli_fetch_assoc($result)){

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

    <!-- Side Widget Well -->
    <?php include  "widget.php" ?>

</div>

</div>
<hr>