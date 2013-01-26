<?php

$title = $_SERVER["REQUEST_URI"];


$nr= strrpos($title,"/");
$title = substr_replace($title,"",0,$nr+1);

$old = array ("-","--","---",".html");
$new = array (" "," "," ","");

$title = str_replace($old,$new,$title);

if($chron == "fry")
{
   $ch = "Freya";
}
if($chron == "c6")
{
   $ch = "Interlude";
}

echo "DropFinder ". $ch .": ". $title;

?>
