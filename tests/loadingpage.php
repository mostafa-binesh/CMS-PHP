<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="loading.css" rel="stylesheet">
    <script>
        $(function() {
            $("#btn").click(function() {
                $(this).text("pashmaloo");
            });
            // alert("hello");
            $(".loading").fadeOut(300);
        });
    </script>
    <title>Document</title>

</head>

<body>
    <!-- <button id="btn">wtf</button> -->
    <button style="z-index: 999;" id="btn">pashm</button>
    <div class="loading">
        <div class='uil-ring-css' style='transform:scale(0.79);'>
            <div></div>
        </div>
    </div>
</body>

</html>