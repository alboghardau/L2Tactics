<?php
session_start();
include('../dbsettings.php');

define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);

if ($_POST['username'] != "" && $_POST['password'] != '') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    
       
    }

 $connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($app , $connection);

$query = "SELECT * FROM phpbb_users WHERE username='".$username."'";
echo $query."<br/>";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if (phpbb_check_hash($password, $row['user_password']))
{
    $_SESSION['username']=$username;
    $_SESSION['userid']=$row['user_id'];
    echo ' merge';
}



mysql_close($connection);
header("Location: index.php");
?>