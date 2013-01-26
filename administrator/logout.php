<?php
include ('dbsettings.php');
session_start();
session_destroy();
header('Location: '.$site.'administrator');
?>
