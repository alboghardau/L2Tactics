<?php
session_start();
include('simupper.php');
include('../dbsettings.php');

?>

   <div id="contenthead">
         Server Registration
            
        </div>
        
        <div id="contentmain"><br/>
   

<?php

if(isset ($_SESSION['username']))
{
include('srvregform.php');

}
else
{
    echo "<center>You are not loged in.</center>";
}

?>



<?php include('lower.php'); ?>
