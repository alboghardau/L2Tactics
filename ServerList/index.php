<?php
session_start();
include('filters.php');
include('upper.php');


?>
   <div id="contenthead">
         Server List
            
        </div>
        
        <div id="contentmain"  style="min-height: 700px;"><br/>
            
           <h4><center>

<?php

$old = array (" ","'");
$new = array ("","");

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$qu = "SELECT * FROM servers WHERE approved>0".$minrate.$maxrate.$antibot.$donation.$chronicle." ORDER BY votes DESC";


$result = mysql_query($qu);

?>
             
 
    <table style="width: 650px" >
    <tr class="itm" style="height: 32px;">
            <th class="col3">Rank</th>
            <th class="col3">Country</th>
            <th class="col3">Chron</th>
            <th class="col5">Name</th>
            <th class="col3">XP</th>
            <th class="col3">SP</th>
            <th class="col3">Drop</th>
            <th class="col3">Votes</th>
             </tr>
             
             <?php
$c = 1;
while($row = mysql_fetch_array($result))
{
    echo '<tr class="itm" style="height: 32px;">';
    echo ' <td class="col3">'.$c.'</td>';
    echo ' <td class="col3">'.'<img src="flags/'.$row['country'].'.png" alt="flag"/></td>';
    echo ' <td class="col3">'.$row['chronicle'].'</td>';
    echo ' <td class="col5"><a href="'.$site.'serverlist/'.$row['id'].'/'.str_replace($old,$new,$row['name']).'.html">'.$row['name'].'</a></td>';
    echo ' <td class="col3">'.$row['rate_xp'].'</td>';
    echo ' <td class="col3">'.$row['rate_sp'].'</td>';
    echo ' <td class="col3">'.$row['rate_drop'].'</td>';
    echo ' <td class="col3">'.$row['votes'].'</td>';
    echo '</tr>';
    $c++;
}

 
 
 
mysql_close($connection);

?>
       
    </table>
</center>
</h4>

             
         <?php   
         

        include('lower.php');
      ?>            
                   
                   
  