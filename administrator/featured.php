<?php
session_start();
include ('dbsettings.php');
$id = $_GET['id'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$result = mysql_query('SELECT * FROM articles WHERE id='.$id);

$row = mysql_fetch_array($result);

if($row['featured'] == 'yes')
{
    $quer = 'UPDATE articles SET featured="no" WHERE id='.$id;
}
else
{
    $quer = 'UPDATE articles SET featured="yes" WHERE id='.$id;
}
 
mysql_query($quer);

mysql_close($connection);

header('Location: cms.php');
 
?>