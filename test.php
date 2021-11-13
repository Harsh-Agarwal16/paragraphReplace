<?php 
$currentPage = 'home';
include "function.php";
include "index.php";   
$myfile = fopen("content.txt", "r") or die("Unable to open file!");
$str= fread($myfile,filesize("content.txt"));
    fclose($myfile);

// string replace
$after_replace = replaceString($str);
print_r($after_replace);
?>
</body>
</html>



