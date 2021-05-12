<?php include "includes/admin_header.php"; ?>

<?php
if (isset($_POST['submit'])) {
    $add_cat_title = $_POST['category'];
    if (!empty($add_cat_title)) {
        $query = "INSERT INTO categories(cat_title) VALUES ('$add_cat_title')";
        $result = mysqli_query($conn, $query);
        header('Location: ' . 'categories.php?add_s=1');
        // header('Location: ' . 'categories.php   ');
        // $current_url = (empty($_SERVER['HTTPS']) ? "http://" : "https://") . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // header('Location: ' . $current_url);
        exit();
    }
}
if (isset($_GET['delete'])) {
    $delete_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$delete_cat_id}";
    $delete_result = mysqli_query($conn, $query);
    if (!$delete_result) {
        echo "Couldn't delete category with ID = {$cat_id}";
    }
}
if (isset($_POST['update_submit'])) {
    $edit_cat_title = $_POST['category'];
    $query = "UPDATE categories SET cat_title = '{$edit_cat_title}' WHERE cat_id = {$_GET['edit']}";
    // $query = "UPDATE categories SET cat_title = 'pashm' WHERE cat_id = 1";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo mysqli_errno($conn);
    } else {
        header('Location: ?edit_s=1');
    }
}

?>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">CMS Dashboard</a>
        </div>
        <!-- Top Menu Items -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <!-- ADD / EDIT CATEGORIES -->
                        <div class="col-xs-6">
                            <?php
                            if (isset($_GET['add_s']) && $_GET['add_s'] == 1) {
                                echo
                                "
                                <div class='alert alert-success'>New category added</div>
                                ";
                            }
                            ?>
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="add-category">Add a new category</label>
                                    <input name="category" type="text" class="form-control" aria-describedby="emailHelp" placeholder="new category name">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Add category</button>
                            </form>
                            <hr>

                            <?php
                            if (isset($_GET['edit'])) { ?>
                                <form method="POST" action="">
                                    <div class="form-group">
                                        <label for="add-category">Edit category</label>
                                        <input name="category" type="text" class="form-control" aria-describedby="emailHelp" value="<?php if (isset($_GET['edit'])) {
                                                                                                                                        $query = "SELECT * FROM categories WHERE cat_id = {$_GET['edit']}";
                                                                                                                                        $edit_result = mysqli_query($conn, $query);
                                                                                                                                        if (!$edit_result) {
                                                                                                                                            echo "some problem on fetching the categories";
                                                                                                                                        }
                                                                                                                                        while ($row = mysqli_fetch_assoc($edit_result)) {
                                                                                                                                            $edit_cat_title = $row['cat_title'];
                                                                                                                                        }
                                                                                                                                        echo $edit_cat_title;
                                                                                                                                    } ?>">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                    </div>
                                    <button type="submit" name="update_submit" class="btn btn-primary">Edit category</button>
                                </form>

                            <?php } ?>

                            <!-- CATEORIES TABLE -->
                        </div>
                        <div class="col-xs-6">
                            <?php
                            if (isset($_GET['edit_s']) && $_GET['edit_s'] == 1) {
                                echo "<div class='alert alert-success'>Category updated successfully</div>";
                            }
                            ?>
                            <table class="table table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Category Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                    </tr> -->
                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $fetch_cat_result = mysqli_query($conn, $query);
                                    if (!$fetch_cat_result) {
                                        echo "
                                        <div class='alert alert-warning'>Couldn't fetch the categories!</div>
                                        ";
                                    } else {
                                        while ($row = mysqli_fetch_assoc($fetch_cat_result)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            echo "
                                            <tr>
                                        <th scope='row'>{$cat_id}</th>
                                        <td>{$cat_title}</td>
                                        <td><a href='?delete={$cat_id}'>Delete    </a></td>
                                        <td><a href='?edit={$cat_id}'>Edit    </a></td>
                                    </tr>
                                            ";
                                        }
                                    }
                                    ?>
                                    <!-- <td><a href="categories.php/delete={$cat_id}"></a></td> -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>