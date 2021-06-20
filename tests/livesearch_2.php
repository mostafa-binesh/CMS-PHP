<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>

    <style>
        body {
            font-family: Arail, sans-serif;
        }

        /* Formatting search box */
        .search-box {
            width: 300px;
            position: relative;
            display: inline-block;
            font-size: 14px;
        }

        .search-box input[type="text"] {
            height: 32px;
            padding: 5px 10px;
            border: 1px solid #CCCCCC;
            font-size: 14px;
        }

        .result {
            position: absolute;
            z-index: 999;
            top: 100%;
            left: 0;
        }

        .search-box input[type="text"],
        .result {
            width: 100%;
            box-sizing: border-box;
        }

        /* Formatting result items */
        .result p {
            margin: 0;
            padding: 7px 10px;
            border: 1px solid #CCCCCC;
            border-top: none;
            cursor: pointer;
        }

        .result p:hover {
            background: #f2f2f2;
        }
    </style>
    <script>
        $(function() {
            $("#reload").click(function() {
                $(".result").append("<p>hello mate</p>");
                // alert("wtf");
            });
        });
        $(document).on("click", ".result p", function() {
            // $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            // $(this).parent(".result").empty();
            var txt = $(this).text();
            $("#input").val(txt);
            $(".result").html("");
            // html("");
        });
    </script>
</head>

<body>
    <button id="reload">sss</button>
    <div class="search-box">
        <input id="input" type="text" autocomplete="off" placeholder="Search country..." />
        <div class="result"></div>
    </div>

</body>

</html>