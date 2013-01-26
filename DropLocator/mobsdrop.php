<?php
session_start();
include('../dbsettings.php');
include('sessiontest.php');

 $oldchars= array(" ","(",")","%","<",">",".");
 $newchars= array("-","-","-","-","-","-","");


//mysql connection

$conn1 = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

mysql_select_db($data , $conn1);

$item= $_GET['itemid'];
$tbl= $_GET['tbl'];
$chron=$_GET['chron'];


$iflvl = $_SESSION['sif'];
$rate= $_SESSION['srate'];
$level= $_SESSION['slvl'];

if(isset($_SESSION['order']))
{
$order = $_SESSION['order'];
}
else
{
    $order = "chance";
}

//test level option

if($iflvl==0)
{
    $maxlvl=$level+100;
    $minlvl=$level-100;
}
else
{
    $maxlvl=$level+8;
    $minlvl=$level-8;
}

if ($tbl==1)
{
    
    $qi = "SELECT * FROM etcitem".$chron." WHERE item_id=".$item;
    
    $inf = mysql_query($qi);
    
    $res = mysql_fetch_array($inf);
}

if ($tbl==2)
{
    
    $qi = "SELECT * FROM armor".$chron." WHERE item_id=".$item;
    
    $inf = mysql_query($qi);
    
    $res = mysql_fetch_array($inf);
}

if ($tbl==3)
{
    
    $qi = "SELECT * FROM weapon".$chron." WHERE item_id=".$item;
    
    $inf = mysql_query($qi);
    
    $res = mysql_fetch_array($inf);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
    
  <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="<?php include('keywords.php');?>,database,lineage,items,weapons,materials,c4,freya,high,five,interlude,lineage 2,drop,monster" />
  <meta name="rights" content="" />
  <meta name="language" content="en-GB" />
  <meta name="description" content="<?php echo $res['name']."".$res['additionalname'].". ".$res['description'];?>" />

  <title><?php include('titleint.php')?></title>

  <link rel="stylesheet" href="<?php echo $site;?>style/style.css" type="text/css" />
  
  <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22420740-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<script type="text/javascript" src="<?php echo $host?>js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo $host?>js/scripts.js"></script>
<script type="text/javascript" src="<?php echo $host?>js/sorttable.js"></script>

</head>
<body class="background">

        
<?php include('../menu.php')?>
        
<?php include('../ads720.php')?>
    
        <div id="mzone">

            <div id="contentheadfull"><?php include('chronicleselect.php');?></div>
            <div id="contentmainfull">
                


<?php

include('headermob.php');



//query for details about item

if ($tbl==1)
{

    
    echo '<center><table class="tbl">';
    echo '<tr class="itm">';
    echo '<td class="ico"> <img src="'.$host.'ico/' . $res['icon'] ."_0.jpg" . '" alt="'.$res['icon']. '"/></td>';
    echo '<td class="col2"> '.$res['name'] ." ".$res['additionalname'] .'</td>';
    echo '<td class="col5"> Weight: '. $res['weight'] .'</td>';
    echo '<td class="col5"> Type: '. $res['item_type'] .'</td>';
    echo '</tr>';

    echo '</table>';
    echo '<table id="table"><tr ><td>';
    echo $res['description'];
    echo '</td></tr></table></center>';
   
}

if ($tbl==2)
{
    
    echo '<center><table class="tbl">';
    echo '<tr class="itm">';
    echo '<td class="ico"> <img src="'.$host.'ico/' . $res['icon'] ."_0.jpg" . '" alt="'.$res['icon']. '"/></td>';
    echo '<td class="col2"> '.$res['name'] ." ".$res['additionalname'].'</td>';
    echo '<td class="col5"> Weight: '. $res['weight'] .'</td>';
    echo '<td class="col5"> Type: '. $res['bodypart'] .'</td>';
    echo '<td class="col5"> PDef: '. $res['p_def'] .'</td>';
    echo '<td class="col5"> MDef: '. $res['m_def'] .'</td>';
    echo '</tr>';
    echo '</table>';
    echo '<table id="table"><tr ><td>';
    echo $res['description'];
    echo '</td></tr></table></center>';
   
}

if ($tbl==3)
{

    echo '<center><table class="tbl">';
    echo '<tr class="itm">';
    echo '<td class="ico"> <img src="'.$host.'ico/' . $res['icon'] ."_0.jpg" . '" alt="'.$res['icon']. '"/></td>';
    echo '<td class="col2"> '.$res['name'] ." ".$res['additionalname'].'</td>';
    echo '<td class="col5"> Weight: '. $res['weight'] .'</td>';
    echo '<td class="col5"> Type: '. $res['bodypart'] .'</td>';
    echo '<td class="col5"> PAtk: '. $res['p_dam'] .'</td>';
    echo '<td class="col5"> MAtk: '. $res['m_dam'] .'</td>';
    echo '</tr>';
    echo '</table>';
    echo '<table id="table"><tr ><td>';
    echo $res['description'];
    echo '</td></tr></table></center>';
   
}

echo "<br/>";

//query for recipe

$q1 = "SELECT * FROM recipes".$chron." WHERE recipeId=".$item;

$rec = mysql_query($q1);


while($r = mysql_fetch_array($rec))
{
    echo '<center><table id="rectbl">';
    echo '<tr class="itm">';
    echo '<td class="ico"> <img src="'.$host.'ico/' . $r['ingico'] ."_0.jpg" . '" alt="'.$r['ingico']. '"/></td>';
    echo '<td class="col3">' . $r['ingredientcount'] . '</td>';
    echo '<td class="col5"><a href="'.$host.$chron.'/1/'.$r['ingredientid'].'/'.str_replace($oldchars,$newchars,$r['ingname']).'.html">' . $r['ingname'].'</a></td>';
    echo '</tr>';
    echo '</table></center>';
        
}

?>
   
<center><table><tr><td valign="top">
<?php


$result1= mysql_query ("Select * From droplist". $chron . " WHERE itemId=" . $item ." AND category>=0 ORDER BY ".$order." DESC " , $conn1);
$a=0;

//test for table head
//Drops table

if (mysql_num_rows($result1)!=0)
{
    
    echo '
<br/>
<center>Drop</center>
<br/><center><table class="tbl2 sortable">
<tr class="itm">
<th class="col1"><img src="'.$site.'images/sort.png" alt="sort"/> Lvl </th>
<th class="col4 sorttable_nosort"> Map <input type="checkbox" class="smap"/></th>
<th class="col6"><img src="'.$site.'images/sort.png" alt="sort"/> Mob`s Name </th>

<th class="col3"><img src="'.$site.'images/sort.png" alt="sort"/> Min </th>
<th class="col3"><img src="'.$site.'images/sort.png" alt="sort"/> Max</th>
<th class="col5"><img src="'.$site.'images/sort.png" alt="sort"/> Rate </th>
</tr>
';

}

//table listing drop

		while ($row = mysql_fetch_array($result1))
{

    

    if( ($row['moblvl']>=$minlvl) && ($row['moblvl']<=$maxlvl) )
    {
        //echo '<center><table id="table">';
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


        echo '<td class="col1">' . $row['moblvl'] . '</td>';
        echo '<td class="col4">';
        if($row['map']==1)
        {
            echo '<img src="'.$host.'images/map.png" alt="map"/>';
        }
            
        echo '</td>' ; 
        echo '<td class="col6"> <a href="'.$host.$chron.'/'. $row['mobId'].'/'.str_replace($oldchars,$newchars,$row['mobname']). '.html">' . $row['mobname'] . '</a></td>';

        echo '<td class="col3"> ' .$min. '</td>';
        echo '<td class="col3"> ' . $max . '</td>';
        echo '<td class="col5">' . $droprate ."%" . '</td>';
        echo '</tr>';
        //echo '<img src="images/interline.png" alt="inter" />';
        
        $a++;

        }


    //if($a>49) { break; }
}
echo '</table></center>';
if($a==0) { echo '<br/><center>No mob drops your item</center><br/>' ; }

echo '</td><td valign="top">';

$result2= mysql_query ("Select * From droplist" . $chron . " WHERE itemId=" . $item ." AND category<0 ORDER BY ".$order." DESC " , $conn1);
$b = 0;

//test for table head
//spoils table

if (mysql_num_rows($result2)!=0)
{
    
    echo '
    <br/><center>Spoil</center>
    <br/><center><table class="tbl2 sortable">
    <tr class="itm">
<th class="col1"><img src="'.$site.'images/sort.png" alt="sort"/> Lvl </th>
<th class="col4 sorttable_nosort"> Map </th>
<th class="col6"><img src="'.$site.'images/sort.png" alt="sort"/> Mob`s Name </th>

<th class="col3"><img src="'.$site.'images/sort.png" alt="sort"/> Min</th>
<th class="col3"><img src="'.$site.'images/sort.png" alt="sort"/> Max</th>
<th class="col5"><img src="'.$site.'images/sort.png" alt="sort"/> Rate </td></th>
';
    
}

while($row2 = mysql_fetch_array($result2))
{


    if( ($row2['moblvl']>=$minlvl) && ($row2['moblvl']<=$maxlvl) )
    {
        
        echo '<tr class="itm">';
        $droprate =$row2['chance']/10000*$rate;
        if ($droprate<=100)
        { 
            $droprate = number_format($droprate ,2 );
            $min=$row2['min'];
            $max=$row2['max'];
        }
        else if($droprate>100)
        {
            $min=number_format($row2['min']*$droprate/100 , 0);
            $max=number_format($row2['max']*$droprate/100 , 0);
            $droprate=100;
        }


        echo '<td class="col1">' . $row2['moblvl'] . '</td>';
        echo '<td class="col4">';
        if($row2['map']==1)
        {
            echo '<img src="'.$host.'images/map.png" alt="map"/>';
        }
            
        echo '</td>' ; 
        echo '<td class="col6"> <a href="'.$host.$chron.'/'. $row2['mobId'].'/'.str_replace($oldchars,$newchars,$row2['mobname']). '.html">' . $row2['mobname'] . '</a></td>';

        echo '<td class="col3">' .$min. '</td>';
        echo '<td class="col3">' .$max . '</td>';
        echo '<td class="col5">' . $droprate ."%" . '</td>';
        echo '</tr>';
        //echo '<img src="images/interline.png" alt="inter" />';

        $b++;
        
        }
    
    //if($b>49) { break; }
}
        echo '</table></center>';
if($b==0) { echo '<br/><center>No mob drops your item by spoiling</center><br/>' ; }


echo "</td></tr></table></center>";
mysql_close($conn1);

include('lower.php');

?>
