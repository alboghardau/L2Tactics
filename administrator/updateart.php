<?php
session_start();
include('dbsettings.php');
$id = $_GET['id'];
$artname= $_POST['artname'];
$pgtitle = $_POST['pgtitle'];
$category = $_POST['category'];
$text = $_POST['text'];
$key = $_POST['key'];


$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$result = mysql_query("SELECT * FROM categories WHERE cat_id=".$category);

$row = mysql_fetch_array($result);


mysql_query(' UPDATE articles SET name="'.$artname.'" WHERE id='.$id);
mysql_query(' UPDATE articles SET cat_id='.$category.' WHERE id='.$id);
mysql_query(' UPDATE articles SET page_name="'.$pgtitle.'" WHERE id='.$id);
mysql_query(' UPDATE articles SET text="'.$text.'" WHERE id='.$id);
mysql_query(' UPDATE articles SET keywords="'.$key.'" WHERE id='.$id);
mysql_query(' UPDATE articles SET cat_name="'.$row['name'].'" WHERE id='.$id);


 
mysql_close($connection);
header("Location: cms.php");
?>