<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>



    <button id="btn">buttson</button>

    <script>
        $(function() {
            $.get("getajax_process.php", {
                name: "passsshm"
            }, function(data) {
                alert(data);
            })
        });

        // jQuery methods go here...
        // alert("mate");
    </script>
</body>

</html>