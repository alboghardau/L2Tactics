<?php
session_start();
include('dbsettings.php');

$artname= $_POST['artname'];
$pgtitle = $_POST['pgtitle'];
$category = $_POST['category'];
$text = $_POST['text'];
$key = $_POST['key'];

$date = date("Y-m-d");

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$result = mysql_query("SELECT * FROM categories WHERE cat_id=".$category);

$row = mysql_fetch_array($result);

mysql_query("

INSERT INTO articles (name , cat_id ,page_name, text, date, keywords, cat_name)
VALUES ('".$artname."',".$category.",'".$pgtitle."','".$text."','".$date."','".$key."','".$row['name']."')


");

mysql_close($connection);
header("Location: cms.php");
?>
