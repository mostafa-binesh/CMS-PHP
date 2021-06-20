<?php  
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    echo "The current page name is: ".$curPageName;  
    echo "</br>"; 
    $p1 = $_SERVER["SCRIPT_NAME"];
    $p2 = strrpos($_SERVER["SCRIPT_NAME"],"/"); // Finds the position of the last occurrence of a string inside another string (case-sensitive)
    echo $p1; 
    echo "</br>"; 
    echo $p2;
  ?>   