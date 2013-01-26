<?php
session_start();
include('dbsettings.php');
$user = $_POST['user'];
$pass =md5( $_POST['pass']);



if(($user == $uss) && ($pass == $pwd))
{
    echo 'You are loged in.';
    $_SESSION['username']=$user;
    $_SESSION['password']=$pass;
    header('Location: cms.php');
}
else
{
    echo "Incorect user/pass.";
    header('Location: '.$site.'administrator');
}


?>
