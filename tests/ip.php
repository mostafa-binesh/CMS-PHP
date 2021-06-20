<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            // $.getJSON("http://ip-api.com/json", function(result){
            //     console.log(result.country);
            // });
            // $.getJSON("https://api.ipify.org?format=jsonp&callback=?",
            //     function(json) {
            //         document.write("My public IP address is: ", json.country);
            //     }
            // );
            
            $.getJSON("http://api.ipinfodb.com/v3/ip-country/?key=e4b21280bf99283676d25b1d36139eeb6ac1de82d0a27bf53620933c428c4d6f&format=json",
            function(json) {
                // console.log(json.ip)
                        document.write("IP Address is: ", json.ipAddress);
                        document.write("<br>Country: ", json.countryName);
                }
            );
//             $.getJSON('https://api.ipify.org?format=jsonp&callback=?', function(data) {
//   console.log(JSON.stringify(data, null, 5));
// });
        });
    </script>
</body>

</html>