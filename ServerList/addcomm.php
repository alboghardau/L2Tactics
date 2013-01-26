<?php

session_start();
include("../dbsettings.php");
$srvid = $_POST['srvid'];
$text = $_POST['comm'];
$time = time();

$old = array (" ","'");
$new = array ("","");

    $connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

    $db = mysql_select_db ($app , $connection);
    
    $q1 = mysql_query('SELECT * FROM phpbb_users WHERE username="'.$_SESSION['username'].'"');
    $row1 = mysql_fetch_array($q1);
    
    $query= mysql_query('SELECT * FROM servers WHERE id='.$srvid);
    $row2 = mysql_fetch_array($query);
    
    $usrid= $row1['user_id'];
    
    var_dump($srvid);
    var_dump($text);
    var_dump($usrid);
    var_dump($time);
    
    mysql_query('INSERT INTO srvcomm (user_id,srv_id,comm,user_name,time) VALUES ('.$usrid.','.$srvid.',"'.$text.'","'.$_SESSION['username'].'",'.$time.')');
    
    mysql_close($connection);
    header("Location:".$site."serverlist/comment/".$srvid.'/'.str_replace($old,$new,$row2['name']).'.html');

?>
