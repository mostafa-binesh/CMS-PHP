<?php
if (isset($_POST['send'])) {
    // echo "Filename: " . $_FILES['file']['name'] . "<br>";
    // echo "Type : " . $_FILES['file']['type'] . "<br>";
    // echo "Size : " . $_FILES['file']['size'] . "<br>";
    // echo "Temp name: " . $_FILES['file']['tmp_name'] . "<br>";
    // echo "Error : " . $_FILES['file']['error'] . "<br>";
    echo $_POST['selection'];
}
// header('location: ?source=pashm');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- <input type="file" name="file"> -->
        <select name="selection" id="">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        </select>
        <input name="send" type="submit" value="submit">
    </form>
    <?php
    require_once "includes/jdf.php"; // تقویم شمسی
    echo jdate('Y/m/d');
//  echo "pashm";
    ?>
    <!-- <a href="/pashm.txt">pashm is here</a> -->
</body>

</html>