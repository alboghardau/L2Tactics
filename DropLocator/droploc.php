<?php
session_start();
include("../dbsettings.php");

 $chron = $_GET["chron"];
 
 //test for using +-8 lvls option
 
 if (!empty($_POST['iflevel']))
 {
     $iflvl = $_POST['iflevel'];
 }
 else
 {
     $iflvl = 0;
 }
 
 $item = $_POST["fitem"];
 $rate = $_POST["frate"];
 $level = $_POST['flevel'];
 $expire=time()+60*60*24*30;
 setcookie("rate", $rate, $expire);
 setcookie("level", $level, $expire);
 
 $_SESSION['slvl']=$level;
 $_SESSION['srate']=$rate;
 $_SESSION['sif']=$iflvl;

 include('upper.php');
 

 include("headerlist.php");

 
 //jump in case search term has <4 letters
 
 if(strlen($item)<4)  goto end;

 $oldchars= array(" ","(",")","%","<",">",".");
 $newchars= array("-","-","-","-","-","-","");
 
 
 
 ?>

    <center>Misc Items</center>
    <br/>
    <center><table class="tbl">
            <tr class="itm">
    <td class="col1"> Icon </td>
    <td class="col2"> Name </td>
    <td class="col3"> Weight </td>
    <td class="col5"> Type </td>
            </tr>

    </table></center>

 <?php

 $connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $connection);
 
 //ectitem table

 $result = mysql_query ("Select * From etcitem" . $chron, $connection);

        while($row = mysql_fetch_array($result))
{
    if(stristr($row[1],$item))
    {
        echo '<center><table class="tbl">';
        echo '<tr class="itm">';
        echo '<td class="ico"> <img src="ico/' . $row['icon'] ."_0.jpg" . '" alt="'.$row['icon'] .'"/></td>';
        echo '<td class="col2">' . '<a href="'.$host. $chron .'/1/' .$row['item_id'] . "/".str_replace($oldchars,$newchars,$row['name']). '.html">' . $row['name'] .'</a></td>';
        echo '<td class="col3">' . $row['weight'] . '</td>';
        echo '<td class="col5">'. $row['item_type'] .'</td>';

        echo '<img src="images/interline.png" alt="inter" />';
        echo '</tr>';
        echo '</table></center>';
        
    }
}
?>

        <br/>
        <center>Armors</center>
        <br/>
    <center><table class="tbl">
            <tr class="itm">
<td class="col1"> Icon </td>
<td class="col2"> Name </td>
<td class="col3"> Weight </td>
<td class="col5"> Type </td>
            </tr>
</table></center>



<?php

//armors table

$result2 = mysql_query ("Select * From armor" . $chron, $connection);

        while($row2 = mysql_fetch_array($result2))
{
    
    if(stristr($row2[1],$item))
    {
        
        echo '<center><table class="tbl">';
        echo '<tr class="itm">';
        echo '<td class="ico"> <img src="ico/' . $row2['icon'] . "_0.jpg" . '" alt="'.$row2['icon'] .'"/></td>';
        if($row2['additionalname']!="") { $lin = "-"; }
        else {$lin = "";}
        
        echo '<td class="col2">' . '<a href="'.$host . $chron .'/2/' .$row2['item_id'] . "/".str_replace($oldchars,$newchars,$row2['name'].$lin.$row2['additionalname']). '.html">' . $row2['name'] ." ".$row2['additionalname'].'</a></td>';
        echo '<td class="col3">' . $row2['weight'] . '</td>';
        echo '<td class="col5">'. $row2['bodypart'] .'</td>';

        echo '<img src="images/interline.png" alt="inter" />';
        echo '</tr>';
        echo '</table></center>';

    }
    
}
?>

    <br/>
    <center>Weapons</center>
    <br/>
    <center><table class="tbl">
            <tr class="itm">
    <td class="col1"> Icon </td>
    <td class="col2"> Name </td>
    <td class="col3"> Weight </td>
    <td class="col5"> Type </td>
            </tr>
    </table></center>

<?php

//Weapons table

$result3 = mysql_query ("Select * From weapon" . $chron, $connection);


        while($row3 = mysql_fetch_array($result3))
{

    if(stristr($row3[1],$item))
    {
        
        echo '<center><table class="tbl">';
        echo '<tr class="itm">';
        echo '<td class="ico"> <img src="ico/' . $row3['icon'] . "_0.jpg" . '" alt="'.$row3['icon'] .'"/></td>';
                if($row3['additionalname']!="") { $lin = "-"; }
        else {$lin = "";}
        echo '<td class="col2">' . '<a href="'.$host. $chron .'/3/' .$row3['item_id'] . "/".str_replace($oldchars,$newchars,$row3['name'].$lin.$row3['additionalname']). '.html">' . $row3['name'] ." ".$row3['additionalname'] .'</a></td>';
        echo '<td class="col3">' . $row3['weight'] . '</td>';
        echo '<td class="col5">' . $row3['weaponType'] .'</td>';

        echo '<img src="images/interline.png" alt="inter" />';
        echo '</tr>';
        echo '</table></center>';

    }

}

mysql_close($connection);

//executed for <4 letters

end:
if(strlen($item)<=3) echo "<br/><center>Minimum 4 letters required.</center><br/>";
include('lower.php');

?>