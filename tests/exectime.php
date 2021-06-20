<?php 
  
// Start the clock time in seconds 
$start_time = microtime(true); 
// $val=1; 
  
// Start loop 
for($i = 1; $i <=1; $i++) 
{ 
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}  
  
// End the clock time in seconds 
$end_time = microtime(true); 
  
// Calculate the script execution time 
$execution_time = ($end_time - $start_time); 
  
echo " It takes ".$execution_time." seconds to execute the script"; 
?>