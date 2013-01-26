<?php


$link = $_SERVER["REQUEST_URI"];
$nr= strrpos($link,"/");
$link = substr_replace($link,"",0,$nr+1);

$old = array ("-","--","---",".html",":");
$new = array (",",",",",","","");

$link = str_replace($old,$new,$link);

echo $link;
//echo str_replace($old, $new, $link);


?>
