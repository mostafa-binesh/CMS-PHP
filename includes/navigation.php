
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $GLOBALS['url']?>">HOMEPAGE</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $query = "SELECT * FROM categories";
                $result = mysqli_query($conn, $query);
                $number = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    // echo $row['cat_title'];
                    // $cat_title = $row['cat_title'];
                    echo
                    "
                    <li>
                         <a href='category.php?cat_id={$row['cat_id']}'>{$row['cat_title']}</a>
                    </li>
                ";
                }
                if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
                    echo
                    "
                    <li>
                        <a href='./admin'>Admin Panel</a>
                    </li>
                    ";
                    if(isset($_GET['id'])){
                        echo
                        "
                        <li>
                            <a href='./admin/posts.php?source=edit&p_id={$_GET['id']}'>Edit Post</a>
                        </li>
                        ";
                    }
                }
                ?>
                


                <!-- <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>