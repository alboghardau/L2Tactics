<?php
include('../../dbsettings.php');
$srvid= $_GET['srvid'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$query = "SELECT * FROM servers WHERE id=".$srvid;

$result = mysql_query($query);

$row = mysql_fetch_array($result);


$server=$row['host'];
$port=$row['port'];

$timeout='2';

$ping =  @fsockopen("$server", $port, $errno, $errstr, $timeout);

if($ping)
{
    echo '<center><img src="../images/online.png" alt="on"/></center>';
}
 else {
    echo '<center><img src="../images/offline.png" alt="on"/></center>';
}


mysql_close($connection);
?>
