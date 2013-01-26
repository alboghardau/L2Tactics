<?php
session_start();

$srvid = $_GET['srvid'];

include('simupper.php');

?>

 <div id="contenthead">
         Delete Server
            
        </div>
        
        <div id="contentmain"><br/>
            <center><h3>Are you sure?</h3>
            <form action="delsrv.php" method="post">
                <input type="hidden" name="srvid" value="<?php echo $srvid;?>"/>
                <input type="submit" value="Yes"/>                
           </form>
           <form action="controlpanel.php"/>
           <input type="submit" value="No"/>
        </form></center>
<?php            
            
include('lower.php');
?>
