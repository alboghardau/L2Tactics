<?php

 if (isset($_SESSION['username']))
         {
             echo "<center>You are loged in as ".$_SESSION['username']."</center>";
             echo '<ul><li><a class="read" href="'.$site.'serverlist/controlpanel.php">Control Panel</a></li></ul>';
             echo '<ul><li><a class="read" href="'.$site.'serverlist/logout.php">Log Out</a></li></ul>';
         }
         else
         {
             
                  include('loginform.php');
         
         }
?>
