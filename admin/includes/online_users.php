<div id="onlineusers">pashm</div>
<script>
    $(document).ready(function() {
        function load_online_users() {
            // alert("loaded");
            // $.get("includes/functions.php?onlineusers=result", function(data, status) {
            //     $("#onlineusers").html(data);
            //     //   alert("Data: " + data + "\nStatus: " + status);
            // });
            $("#onlineusers").load("includes/functions.php?onlineusers=result"); // optimized way
        }
        load_online_users();
        setInterval(load_online_users,8000);
    });
</script>