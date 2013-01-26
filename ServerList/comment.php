<?php
session_start();
$srvid= $_GET['id'];

$old = array (" ","'");
$new = array ("","");

include('simupper.php');

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$query = "SELECT * FROM srvcomm WHERE srv_id=".$srvid.' ORDER BY time DESC';

$result = mysql_query($query);

$query2 = "SELECT * FROM servers WHERE id=".$srvid;

$result2 = mysql_query($query2);

$row2 = mysql_fetch_array($result2);


?>
<div id="contenthead">
         Comments
            
        </div>
        
        <div id="contentmain"  style="min-height: 500px;">

            
            <div class="article">
                <table class="server">
                    <tr>
                        <td><div class="read"><?php echo '<a class="read" href="'.$site.'serverlist/'.$row2['id'].'/'.str_replace($old,$new,$row2['name']).'.html">'.'Description'.'</a>';?></div></td>
                        <td><div class="read">Comments</div></td>
                    </tr>
                </table>
            </div>

            

            
            
                        <div class="article" >           
                <table class="server">
                    <tr>
                        <td class="srvname"><?php echo $row2['name'];?> </td>
                        <td style="width: 50px;"></td>
                        <td class="votes">Votes: <?php echo $row2['votes'];?></td>
                    </tr>
                </table> 
                        </div>
                        
            
           <?php 
           if(isset($_SESSION['username']))
           {
           echo '
                                    <div class="article" >
                                    
            <form action="'.$site.'serverlist/addcomm.php" method="post">
                <center><table><tr>
                <input type="hidden" name="srvid" value="'.$srvid.'"/>
                <td><div class="addcomm"><center><textarea name="comm" class="addcomm"     cols="70"    rows="4">Test</textarea></center></div><td>
                <td><button type="submit" value="Submit" class="scomm">Submit</button></td>
                </tr></table></center>
            </form>

            </div>
            <br/>  ';
           }
           else{
               echo "<br/>";
           }
            
            ?>
            <?php 
            
            while($row = mysql_fetch_array($result))
            {
                echo '<div class="commname">'.$row['user_name'].'</div>';
                echo '<div class="comment">'.$row['comm'].'</div>';
                echo '</br>';
            }
            
            if(mysql_num_rows($result)==0)
            {
                echo '<center><h3>'."No comments yet.".'</h3></center>';
            }
            
            ?>
            

        
<?php


include('lower.php');

mysql_close($connection) ;
        
?>