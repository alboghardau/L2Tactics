<?php
session_start();
include("../dbsettings.php");

$srvid = $_POST['srvid'];
echo $srvid;

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

mysql_query("DELETE FROM servers WHERE id=".$srvid);

mysql_close($connection);
echo mysql_error();
header("Location: controlpanel.php");
?>
