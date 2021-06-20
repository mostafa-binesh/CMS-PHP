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
    <div id="respone">ss</div>
    <div id="status">status</div>
    <div id="sfield">specific field</div> 
    <button id="doit">DO IT</button>
    <script>
        $(function() {
            $("#doit").click(function() {
                var url = "https://swapi.dev/api/people/1";
                $.getJSON(url, function(data,status) {
                    $("#respone").text("");
                    $.each(data, function(i, field) {
                        $("#respone").append(i + ": " + field + "<br>");
                    });
                    $("#status").html(status);
                    // var obj = JSON.parse(data);
                    $("#sfield").html(data.name);
                });
            });
        });
    </script>
</body>

</html>