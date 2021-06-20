<?php
$text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
$text2 = "<h1>abc<h1><p>  dfx</p><h2>doost</h2><br><h2>dashtam</h2>";
echo "<p>".strip_tags($text2) . "</p>";
echo "\n";


// Allow <p> and <a>
echo strip_tags($text, '<p><a>');
echo "\n";
echo strip_tags($text2, '<p><a>');

// as of PHP 7.4.0 the line above can be written as:
// echo strip_tags($text, ['p', 'a']);
?>
<br>
<br>
<br>
<br>
<br>
<div>
<p style="color:blue;">color is blue</p><p>size is <span style="font-size:200%;">huge</span></p>
<p>material is wood</p>
</div>
<br>
<p>changed to:</p>
<br>
<?php 
echo rip_tags($text2);
?>
<?php 
function rip_tags($string, $rep = ' ') {
   
    // ----- remove HTML TAGs -----
    $string = preg_replace ('/<[^>]*>/', $rep, $string);
   
    // ----- remove control characters -----
    $string = str_replace("\r", '', $string);    // --- replace with empty space
    $string = str_replace("\n", $rep, $string);   // --- replace with space
    $string = str_replace("\t", $rep, $string);   // --- replace with space
   
    // ----- remove multiple spaces -----
    $string = trim(preg_replace('/ {2,}/', $rep, $string));
   
    return $string;

}
?>