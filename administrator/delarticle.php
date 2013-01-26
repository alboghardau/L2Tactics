<?php

session_start();
include ('dbsettings.php');
$id = $_GET['id'];
$action = $_GET['action'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($app , $connection);
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
    
  <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />

  <meta name="language" content="en-GB" />

  <title>L2Tactics CMS</title>

  <link rel="stylesheet" href="../style/style.css" type="text/css" />
  
  </head>
<body class="background">
    
    <?php include('menu.php')?>
    <div id="mzone">
        
 
     
        <div id="contentheadfull"></div>
        <div id="contentmainfull">
            <br/>
            
            <?php 
            
            if($action==1)
            {
                echo "<center><h3>Are you sure?</h3></center>";
                echo '<center><form action="delarticle.php" method="get">
                <input type="hidden" name="action" value="2" />
                <input type="hidden" name="id" value="'.$id.'" />
                <input type="submit" value="yes"/>    
                </from></center>';
            }
            
            if($action==2)
            {
                $query = "DELETE FROM articles WHERE id=".$id;
                mysql_query($query);
                echo "<center><h3>Articles deleted</h3></center>";
            }
            
            ?>
            
            
        <br/> 
        </div>
        <div id="contentbotfull"></div>
     
    </div>
    
    
</body>
</html>
    
<?php
mysql_close($connection)
?>