<?php
session_start();
$srvid= $_GET['srvid'];

$old = array (" ","'");
$new = array ("","");


include('simupper.php');

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);

$query = "SELECT * FROM servers WHERE id=".$srvid;

$result = mysql_query($query);

$row = mysql_fetch_array($result);

?>
<div id="contenthead">
         Server Details
            
        </div>
        
        <div id="contentmain"  style="min-height: 500px;">
            
                        <div class="article">
                <table class="server">
                    <tr>
                        <td><div class="read">Description</div></td>
                        <td><div class="read"><?php echo '<a class="read" href="'.$site.'serverlist/srv/comment/'.$row['id'].'/'.str_replace($old,$new,$row['name']).'.html">'.'Comments'.'</a>';?></div></td>
                    </tr>
                </table>
            </div>

            <div class="article" >  
            
                <table class="server">
                    <tr>
                        <td class="srvname"><?php echo $row['name'];?> </td>
                        <td style="width: 50px;"></td>
                        <td class="votes">Votes: <?php echo $row['votes'];?></td>
                    </tr>
                </table>    
                
                
             <center><table><tr><td>   
                
            <table class="server">
                <tr>
                <td class="topl"></td>
                <td class="hed1">Server Rates</td>
                <td class="hed1"></td>
                <td class="topr"></td>                    
                </tr>
                <?php
    echo     '<tr class="row"> <td class="spc"></td>   <td class="col1">XP:</td>        <td class="col2">'.$row['rate_xp'].'X</td>      <td class="spc"></td>    </tr>';
    echo     '<tr class="row"> <td class="spc"></td>   <td class="col1">SP:</td>        <td class="col2">'.$row['rate_sp'].'X</td>      <td class="spc"></td>    </tr>';
    echo     '<tr class="row"> <td class="spc"></td>   <td class="col1">Drop:</td>      <td class="col2">'.$row['rate_drop'].'X</td>    <td class="spc"></td>    </tr>';
    echo     '<tr class="row"> <td class="spc"></td>   <td class="col1">Adena:</td>     <td class="col2">'.$row['rate_adena'].'X</td>   <td class="spc"></td>    </tr>';
                ?>
                <tr>
                    <td class="botl"></td>
                    <td class="bott"></td>
                    <td class="bott"></td>
                    <td class="botr"></td>
                </tr>
                </table>
                         
                         </td><td style="width: 10px;"></td><td>
                    
                            <table class="server">
                <tr>
                <td class="topl"></td>
                <td class="hed1">Information</td>
                <td class="hed1"></td>
                <td class="topr"></td>
                </tr>
                <?php
    echo     '<tr class="row"> <td></td>   <td class="col3">Site:</td>        <td class="col4"><a href="http://'.$row['site'].'">'.$row['site'].'</a></td>  <td></td></tr>';
    echo     '<tr class="row"> <td></td>   <td class="col3">Status:</td>     <td class="col4">'.'<iframe frameborder="0" height="40px" src="'.$site.'serverlist/oncheck/check.php?srvid='.$srvid.'"></iframe>'.'</td>    <td></td> </tr>';
    //echo     '<tr class="row"> <td></td>  <td class="col3">Owner:</td>        <td class="col4">'.$row['rate_sp'].'</td>   <td></td></tr>';
    echo     '<tr class="row"> <td></td> <td class="col3">Country:</td>      <td class="col4"><img src="'.$site.'serverlist/flags/'.$row['country'].'.png"/></td>     <td></td></tr>';
    echo     '<tr class="row"> <td></td>   <td class="col3">Chronicle:</td>     <td class="col4">'.$row['chronicle'].'</td>    <td></td> </tr>';
                ?>
                <tr>
                    <td class="botl"></td>
                    <td class="bott"></td>
                    <td class="bott"></td>
                    <td class="botr"></td>
                </tr>
                </table>
                
                </td></tr></table></center>
                
                
                <center><table><tr><td>   
                
            <table class="server">
                <tr>
                <td class="topl"></td>
                <td class="hed1">Additional Info</td>
                <td class="hed1"></td>
                <td class="topr"></td>
                </tr>
                <?php
    echo     '<tr class="row">  <td></td>  <td class="col1">Enchant Rate:</td>        <td class="col2">'.$row['ench_rate'].'%</td>  <td></td></tr>';
    echo     '<tr class="row">  <td></td> <td class="col1">Enchant Safe:</td>        <td class="col2">+'.$row['ench_safe'].'</td>   <td></td></tr>';
    echo     '<tr class="row">  <td></td>   <td class="col1">Enchant Max:</td>      <td class="col2">+'.$row['ench_max'].'</td>     <td></td></tr>';
    echo     '<tr class="row">  <td></td>  <td class="col1">Buffer:</td>     <td class="col2"><img src="'.$site.'serverlist/images/'.$row['buffer'].'.png"/></td>     <td></td></tr>';
                ?>
                <tr>
                    <td class="botl"></td>
                    <td class="bott"></td>
                    <td class="bott"></td>
                    <td class="botr"></td>
                </tr>
                </table>
                         
                         </td><td style="width: 50px;"></td><td>
                    
                            <table class="server">
                <tr>
                <td class="topl"></td>
                <td class="hed1">Additional Info</td>
                <td class="hed1"></td>
                <td class="topr"></td>
                </tr>
                <?php
    echo     '<tr class="row">  <td></td>  <td class="col1">Gm Shop:</td>        <td class="col2"><img src="'.$site.'serverlist/images/'.$row['gmshop'].'.png"/></td>  <td></td></tr>';
    echo     '<tr class="row">  <td></td> <td class="col1">GmShop Grade:</td>        <td class="col2">'.$row['gm_grade'].'</td>   <td></td></tr>';
    echo     '<tr class="row">  <td></td><td class="col1">Anti-Bot:</td>      <td class="col2"><img src="'.$site.'serverlist/images/'.$row['anti_bot'].'.png"/></td>     <td></td></tr>';
    echo     '<tr class="row">  <td></td>  <td class="col1">Donation:</td>     <td class="col2"><img src="'.$site.'serverlist/images/'.$row['donation'].'.png"/></td>     <td></td></tr>';
                ?>
                <tr>
                    <td class="botl"></td>
                    <td class="bott"></td>
                    <td class="bott"></td>
                    <td class="botr"></td>
                </tr>
                </table>
                
                </td></tr></table></center>
                
                            <table class="server">
                    <tr>
                        <td class="srvname">Description</td>
       
                    </tr>
                </table>  
  
             </div>
            
            <div class="article"/>
            <?php echo $row['description'];?>
        </div>

<?php


include('lower.php');

mysql_close($connection);
?>
