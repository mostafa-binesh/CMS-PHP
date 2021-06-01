<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #95c2de;
        }

        .mainbox {
            background-color: #95c2de;
            margin: auto;
            height: 600px;
            width: 600px;
            position: relative;
        }

        .err {
            color: #ffffff;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 11rem;
            position: absolute;
            left: 20%;
            top: 8%;
        }

        .far {
            position: absolute;
            font-size: 8.5rem;
            left: 42%;
            top: 15%;
            color: #ffffff;
        }

        .err2 {
            color: #ffffff;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 11rem;
            position: absolute;
            left: 68%;
            top: 8%;
        }

        .msg {
            text-align: center;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 1.6rem;
            position: absolute;
            left: 16%;
            top: 45%;
            width: 75%;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- purple x moss 2020 -->

    <head>
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    </head>

    <body>
        <div class="mainbox">
            <div class="err">4</div>
            <i class="far fa-question-circle fa-spin"></i>
            <div class="err2">4</div>
            <!-- fix: dynamic -->
            <div class="msg">Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first place?<p>Let's go <a href="./">home</a> and try from there.</p>
            </div>
            <!-- <button class="btn btn-info">Back to admin panel</button> -->
        </div>
    </body>

</html>