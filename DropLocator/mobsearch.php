<?php
session_start();
$expire=time()+60*60*24*30;
include('../dbsettings.php');
$iflvl= 0;


$chron=$_GET['chron'];
$mname=$_POST['mname'];
$rate=$_POST['frate'];

$_SESSION['srate']=$rate;

setcookie("rate", $rate, $expire);

include('upper.php');


include('headerlist.php');

include('sessiontest.php');



 $oldchars= array(" ","(",")","%","<",">",".");
 $newchars= array("-","-","-","-","-","-","");
 
 

 if(strlen($mname)<3)  goto end;
?>

        <center><table class="tbl">
                <tr class="itm">
<td class="col1"> Lvl </td>
<td class="col1"> Map </td>
<td class="col2"> Mob's Name </td>
<td class="col5"> Type </td></tr>
</table></center>

<?php

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($data , $connection);

$result = mysql_query ("Select * From npc".$chron , $connection);



        while($row = mysql_fetch_array($result))
{
   

    if(stristr($row[2],$mname))
    {
        echo '<center><table class="tbl">';
        echo '<tr class="itm">';
        echo '<td class="col1">' . $row['level'] . '</td>';
        echo '<td class="col1">';
        if($row['map']==1)
        {
            echo '<img src="images/map.png" alt="map"/>';
        }
            
        echo '</td>' ; 
        echo '<td class="col2"> <a href="'.$host.$chron.'/'. $row['id'].'/'.str_replace($oldchars,$newchars,$row['name']) .'.html">' . $row['name'] . '</a></td>';
        if($row['aggro']>0)
        {
        echo '<td class="col5">' . "Agresive" . '</td>';
        }
        else {
        echo '<td class="col5">' . "Passive" . '</td>';
}
        echo "</tr>";
       // echo '<img src="images/interline.png" alt="inter" />';
        echo '</table></center>';
    }
    
}
?>


<?php

mysql_close($connection);
end:
if(strlen($mname)<3)  echo "<br><center>Minimum 4 letters required.</center><br>";
include('lower.php');

?>
