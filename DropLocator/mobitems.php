<?php
session_start();
include('../dbsettings.php');
include('sessiontest.php');

$chron=$_GET['chron'];

$mobid= $_GET['mobid'];




$iflvl = $_SESSION['sif'];
$rate= $_SESSION['srate'];
$level= $_SESSION['slvl'];

include('upperint.php');

include('headermob.php');

 $oldchars= array(" ","(",")","%","<",">",".");
 $newchars= array("-","-","-","-","-","-","");


$conn = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($data , $conn);

 //select template formob

 $tmpid= mysql_query("Select * From npc". $chron ." WHERE id=" . $mobid);
 $mobtmpid = mysql_fetch_array($tmpid);
 $mobtemplate = $mobtmpid['idTemplate'];
 echo "<center><h3>Level: ".$mobtmpid['level']." Name: ".$mobtmpid['name']." HP: ".round($mobtmpid['hp']). " Exp:". $mobtmpid['exp']."</h3></center><br/>";


$result= mysql_query('Select * From spawnlist'.$chron .' WHERE npc_templateid='.$mobtemplate);


//map display

$raw= mysql_fetch_array($result);

//adenmap

$ratio = 378;
$cx = 334;
$cy= 620;

if(mysql_num_rows($result)> 0 && ($raw['locx']> -130000))
    {
    
    echo '<center><div style="position:relative;width: 930px; height: 1295px; background-image:url('.$host.'images/adenmap.jpg); ">';
    mysql_data_seek($result,0);
    while ($line = mysql_fetch_array($result))
{

    if($line['locy']<=0)
    {
    $loy=$cy-($line['locy']/$ratio*(-1));
    }
 else {
    $loy=$line['locy']/$ratio+$cy;
    }

    if($line['locx']<=0)
    {
    $lox=$cx-($line['locx']/$ratio*(-1));
    }
 else
 {
 $lox=$line['locx']/$ratio+$cx;
 }
    

    echo '<div style="position:absolute;top:'.$loy.'px;left:'.$lox.'px;'.'">';
    echo '<img src="'.$host.'images/mob.png" alt="mob"/>';
    echo '</div>';
}
        
        echo '</div></center>';
    
    }


    
 //gracia map   
    
    $ratio = 250;
    $cx = 1260;
    $cy= -470;
    
if(mysql_num_rows($result)!= 0 && ($raw['locx'] < -130000))
    {
    
    echo '<center><div style="position:relative;width: 700px; height: 535px; background-image:url('.$host.'images/graciamap.jpg); ">';
    mysql_data_seek($result,0);
    while ($line = mysql_fetch_array($result))
{

    if($line['locy']<=0)
    {
    $loy=$cy-($line['locy']/$ratio*(-1));
    }
 else {
    $loy=$line['locy']/$ratio+$cy;
    }

    if($line['locx']<=0)
    {
    $lox=$cx-($line['locx']/$ratio*(-1));
    }
 else
 {
 $lox=$line['locx']/$ratio+$cx;
 }

    echo '<div style="position:absolute;top:'.$loy.'px;left:'.$lox.'px;'.'">';
    echo '<img src="'.$host.'images/mob.png" alt="mob"/>';
    echo '</div>';
}
        
        echo '</div></center>';
    
    }



    

 $result1= mysql_query ("Select * From droplist".$chron." WHERE mobId=".$mobid." ORDER BY chance DESC " , $conn);
$a=0;

if (mysql_num_rows($result1)!=0)
{

echo '    
<br/>
    <center>Drop</center>
    <br/><center><table class="tbl"><tr class="itm">
<td class="col1">Icon</td>
<td class="col2"> Item`s Name </td>
<td class="col3"> Min Nr. </td>
<td class="col4"> Max Nr. </td>
<td class="col5"> Rate </td></tr>
</table></center>
    ';
}
//table listing drop

		while ($row = mysql_fetch_array($result1))
{

   

    if( $row['category']>=0 )
    {
        echo '<center><table class="tbl">';
        echo '<tr class="itm">';
        $droprate =$row['chance']/10000*$rate;
        if ($droprate<=100)
        {
            $droprate = number_format($droprate ,2 );
            $min=$row['min'];
            $max=$row['max'];
        }
        else if($droprate>100)
        {
            $min=number_format($row['min']*$droprate/100 , 0);
            $max=number_format($row['max']*$droprate/100 , 0);
            $droprate=100;
        }


        echo '<td class="ico">' . '<img src="'.$host.'ico/' . $row['icon'] . '_0.jpg" alt="ico"/>' . '</td>';
        echo '<td class="col2">' . '<a href="'.$host. $chron .'/'.$row['tbl'].'/' .$row['itemId'] . "/".str_replace($oldchars,$newchars,$row['itemname']). '.html">' . $row['itemname'] .'</a></td>';
        echo '<td class="col3">' . $min . '</td>';
        echo '<td class="col4">' . $max , '</td>';
        echo '<td class="col5">' . $droprate ."%" . '</td>';
        echo '</tr>';
        //echo '<img src="images/interline.png" alt="inter" />';
        echo '</table></center>';
        $a++;

        }


}

if($a==0) { echo '<br/><center>No dropable items.</center></br>' ; }





 $result1= mysql_query ("Select * From droplist".$chron." WHERE mobId=".$mobid." ORDER BY chance DESC " , $conn);
$a=0;

if (mysql_num_rows($result1)!=0)
{

echo '
    <br/><center>Spoil</center>
    <br/><center><table class="tbl">
    <tr class="itm">
<td class="col1">Icon</td>
<td class="col2"> Item`s Name </td>
<td class="col3"> Min Nr. </td>
<td class="col4"> Max Nr. </td>
<td class="col5"> Rate </td></tr>
</table></center>
';

}

//table listing drop

		while ($row = mysql_fetch_array($result1))
{

    if($row['category']<0)
    {
        echo '<center><table class="tbl">';
        echo '<tr class="itm">';
        $droprate =$row['chance']/10000*$rate;
        if ($droprate<=100)
        {
            $droprate = number_format($droprate ,2 );
            $min=$row['min'];
            $max=$row['max'];
        }
        else if($droprate>100)
        {
            $min=number_format($row['min']*$droprate/100 , 0);
            $max=number_format($row['max']*$droprate/100 , 0);
            $droprate=100;
        }

        echo '<td class="ico">' . '<img src="'.$host.'ico/' . $row['icon'] . '_0.jpg" alt="ico"/>' . '</td>';
        echo '<td class="col2">' . '<a href="'.$host. $chron .'/'.$row['tbl'].'/' .$row['itemId'] . "/".str_replace($oldchars,$newchars,$row['itemname']). '.html">' . $row['itemname'] .'</a></td>';
        echo '<td class="col3">' . $min . '</td>';
        echo '<td class="col4">' . $max , '</td>';
        echo '<td class="col5">' . $droprate ."%" . '</td>';
        echo '</tr>';
        //echo '<img src="images/interline.png" alt="inter" />';
        echo '</table></center>';
        $a++;

        }


}

if($a==0) { echo '<center>No spoilable items.</center><br/>' ; }

mysql_close($conn);

include('lower.php');
?>