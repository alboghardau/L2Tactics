<?php
session_start();
include('simupper.php');



?>


   <div id="contenthead">
         Control Panel
            
        </div>
        
        <div id="contentmain"><br/>
   
   

    <br/>
    <center><h3>

            <?php 
            
            if(isset($_SESSION['username']))
            {
            
            $connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

            $db = mysql_select_db ($app , $connection);
            
            $q = mysql_query("SELECT * FROM servers WHERE user_id=".$_SESSION['userid']);
            
            $row = mysql_fetch_array($q);
            
            if(mysql_num_rows($q))
            {
                echo '<div class="comment">Vote banners(you can use any other):<br/><br/><img src="images/vote1.png" alt="vote1"/><img src="images/vote2.png" alt="vote2"/></div><br/><div class="comment">';
                
                echo "Vote Link: "."www.l2tactics.com/serverlist/vote.php?srvid=".$row['id'].'</div><br/><div class="comment">';
                
                echo "Your server is already registred ";
                

                
                
                if($row['approved']==0)           
            {
                echo "and is waiting to be approved.";
            }
            if($row['approved']==1) {
                echo ", approved and displayed in list.";
            }

                echo '        </div><br/>';
                echo '
                <div class="read"><a class="read" href="editsrv.php?srvid=' .$row['id']. '">Edit Server Details</a></div>';
                            
                echo '<div class="read"><a class="read" href="deleteserver.php?srvid=' .$row['id']. '">Delete your server.</a></div>';           

                            
            }
            else{
                echo '<div class="read"><a class="read" href="addserver.php">Register your server</a></div>';
            }
            
   
            
                    mysql_close($connection);
            }
            else
            {
                echo "You are not loged in.";
            }
            
            
            ?>
            
            
    
        <br/>


    </h3></center>



<?php

        include('lower.php');

?>