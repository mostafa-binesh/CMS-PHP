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
    <div>
        <div id="result"></div>
        <p>test is here</p>
    </div>
    <script>
        $(document).ready(function() {

            function auto_load() {
                // alert('ajax is here');
                $.ajax({
                    type: 'GET',
                    url: 'pashm.html',
                    success: function(data) {
                        // if (currentData != data) {
                        if (true) {
                            $('#result').html(data);
                            // currentData = data;
                            // pashm++;
                            // console.log(pashm);
                        }
                    }
                });
                //   alert('page refreshed');
            }
            auto_load();
            // setInterval(auto_load,1000);

        });
    </script>
</body>

</html>