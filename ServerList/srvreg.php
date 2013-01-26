<?php
session_start();
include('../dbsettings.php');

$name=$_POST['name'];
$chronicle=$_POST['chronicle'];
$country=$_POST['country'];
$ratexp=$_POST['rate_xp'];
$ratesp=$_POST['rate_sp'];
$ratedrop=$_POST['rate_drop'];
$rateadena=$_POST['rate_adena'];
$enchrate=$_POST['ench_rate'];
$enchsafe=$_POST['ench_safe'];
$enchmax=$_POST['ench_max'];
$antibot=$_POST['anti_bot'];
$buffer=$_POST['buffer'];
$gmshop=$_POST['gmshop'];
$gmgrade=$_POST['gm_grade'];
$description=$_POST['description'];
$donation=$_POST['donation'];
$ip=$_POST['host'];
$port=$_POST['port'];
if(isset($_POST['ad_link']))
                {
    $adlink=$_POST['ad_link'];
}
else{
    $adlink='';
}

$site=$_POST['site'];


$user = $_SESSION['username'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($app , $connection);

$q='SELECT * FROM phpbb_users WHERE username="'.$user.'"';
$result=  mysql_query($q);
$row= mysql_fetch_array($result);



$r=
'
INSERT INTO servers (name,country,user_id,rate_xp,rate_sp,rate_drop,rate_adena,buffer,gmshop,gm_grade,ench_rate,ench_safe,ench_max,chronicle,description,anti_bot,ad_link,site,donation,host,port,date,votes) 
VALUES              ("'.$name.'","'.$country.'",'.$row['user_id'].','.$ratexp.','.$ratesp.','.$ratedrop.','.$rateadena.',"'.$buffer.'","'.$gmshop.'","'.$gmgrade.'",'.$enchrate.','.$enchsafe.','.$enchmax.',"'.$chronicle.'","'.$description.'","'.$antibot.'","'.$adlink.'","'.$site.'","'.$donation.'","'.$ip.'","'.$port.'",'.time().',0)
';

echo $r;
mysql_query($r);



mysql_close($connection);
header('Location: index.php');
?>
