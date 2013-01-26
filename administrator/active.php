<?php
include ('dbsettings.php');
$id = $_GET['id'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$result = mysql_query('SELECT * FROM articles WHERE id='.$id);

$row = mysql_fetch_array($result);

if($row['view'] == 'yes')
{
    $quer = 'UPDATE articles SET view="no" WHERE id='.$id;
}
else
{
    $quer = 'UPDATE articles SET view="yes" WHERE id='.$id;
}
 
mysql_query($quer);

mysql_close($connection);

header('Location: cms.php');
 
?>
