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

$res2 = mysql_query("SELECT * FROM servers WHERE user_id=".$row['user_id']);
$row2= mysql_fetch_array($res2);



$srvid = $row2['id'];

 
mysql_query('UPDATE servers SET name="'.$name.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET site="'.$site.'" WHERE id='.$srvid); 
mysql_query('UPDATE servers SET host="'.$ip.'" WHERE id='.$srvid); 
mysql_query('UPDATE servers SET port="'.$port.'" WHERE id='.$srvid); 
mysql_query('UPDATE servers SET country="'.$country.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET chronicle="'.$chronicle.'" WHERE id='.$srvid); 
mysql_query('UPDATE servers SET rate_xp="'.$ratexp.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET rate_sp="'.$ratesp.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET rate_drop="'.$ratedrop.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET rate_adena="'.$rateadena.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET ench_rate="'.$enchrate.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET ench_safe="'.$enchsafe.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET ench_max="'.$enchmax.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET anti_bot="'.$antibot.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET buffer="'.$buffer.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET gmshop="'.$gmshop.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET gm_grade="'.$gmgrade.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET donation="'.$donation.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET ad_link="'.$adlink.'" WHERE id='.$srvid);
mysql_query('UPDATE servers SET description="'.$description.'" WHERE id='.$srvid);


 
 
 
 mysql_close($connection);
header('Location: index.php');
?>
