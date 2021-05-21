<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST">
        <input onclick="selects()" type="checkbox" id="check" name="vehicle1" value="Bike">
        <label for="vehicle1"> Check All</label><br>
        <input type="checkbox" id="chk" name="chk" value="Bike">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" id='chk' name="chk" value="Car">
        <label for="vehicle2"> I have a car</label><br>
        <input type="checkbox" id="chk" name="chk" value="Boat">
        <label for="vehicle3"> I have a boat</label><br><br>
        <input type="button" onclick='selects()' value="Select All"/>  
        <input type="submit" value="Submit">
    </form>
    <input type="checkbox" id="chk" name="chk" value="Bike">
    <input type="checkbox" id="chk" name="chk" value="Bike">
    <input type="checkbox" id="chk" name="chk" value="Bike">
    <input type="checkbox" id="chk" name="chk" value="Bike">
    <input type="checkbox" id="chk" name="chk" value="Bike">
    <input type="checkbox" id="chk" name="chk" value="Bike">
    <input type="checkbox" id="chk" name="chk" value="Bike">




    <script>
        function selects(){  
            // document.getElementById
                // var ele=document.getElementsByName('chk');  
                
                var ele = document.getElementsById("chk");
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }
    </script>
</body>

</html>
<!-- <html>  
<head>  
        <title>Selecting or deselecting all CheckBoxes</title>  
        <script type="text/javascript">  
            function selects(){  
                var ele=document.getElementsByName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelect(){  
                var ele=document.getElementsByName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
            }             
        </script>  
    </head>  
<body>  
    <h3>Select or Deselect all or some checkboxes as per your mood:</h3>  
    <input type="checkbox" name="chk" value="Smile">Smile<br>  
    <input type="checkbox" name="chk" value="Cry">Cry<br>  
    <input type="checkbox" name="chk" value="Laugh">Laugh<br>  
    <input type="checkbox" name="chk" value="Angry">Angry<br>  
     <br>  
        <input type="button" onclick='selects()' value="Select All"/>  
        <input type="button" onclick='deSelect()' value="Deselect All"/>  
      </body>  
</html>   -->