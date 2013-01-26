
<?php
session_start();
include('../dbsettings.php');
include('upper.php'); 
 //include('chronicleselect.php');     

$chron = $_GET["chron"];
if(isset($_COOKIE['rate']))
{
$_SESSION['srate']=$_COOKIE['rate'];
}


?>
<br/>
<center>The checkbox next to Level can be used to display the monsters that are 8 levels below or above you.</center>
<?php include('header.php');  ?>
<?php include('shortcuts.php'); ?>

<br/>
<center><h3>Webmaster Tool</h3></center>

<center><table>
        <tr>
            <td style="width: 250px;">This tool can be posted by private server owners on their sites, so that players can search for items directly. Note that you can set up the rate of your server in code.</td>
            <td>
                

                
            </td>
        </tr>
        
        <tr><td>

                <textarea rows="7" cols="60">
<!-- L2Tactics.com Search Box Start -->
<!-- Style can be modified to match you site's one -->
<div style="font-family: Arial, Helvetica, Sans-Serif; font-size:12px;width:300px;max-width:300px;border:1px #fff solid;text-align:center; background-color: #2e3037; color:#ffffff; padding:6px;-webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;">
<font style="color:#ffffff;">
<a href="http://www.l2tactics.com/" style="text-decoration:none; font-size:22px; ; font-weight:bold;color:#ffffff;" >L2Tactics.com</a>
</font><br />
Lineage2 database featuring 100% Freya.
<br />

<form action="http://www.l2tactics.com/droplocator/droploc.php?chron=fry"  method="post" >
Item's Name:<input type="text" name="fitem" value="" style="font-size:10px;width:80px;" />
<input type="hidden" name="frate" value="1"/> <!-- modify value to match your server's rate-->
<input type="submit" name="submit" value="Search" style="font-size:12px; height:20px;"/>
</form>

<form action="http://www.l2tactics.com/droplocator/mobsearch.php?chron=fry"  method="post" >
Npc's Name:<input type="text" name="mname" value="" style="font-size:10px; width:80px;" />
<input type="hidden" name="frate" value="1"/> <!-- modify value to match your server's rate-->
<input type="submit" name="submit" value="Search" style="font-size:12px; height:20px; "/>
</form>

</div>
<!-- L2Tactics.com Search Box End -->
 </textarea>
            </td><td>

<!-- L2Tactics.com Search Box Start -->
<!-- Style can be modified to match you site's one -->
<div style="font-family: Arial, Helvetica, Sans-Serif; font-size:12px;width:300px;max-width:300px;border:1px #fff solid;text-align:center; background-color: #2e3037; color:#ffffff; padding:6px;-webkit-border-radius: 15px;-moz-border-radius: 15px;border-radius: 15px;">
<font style="color:#ffffff;">
<a href="http://www.l2tactics.com/" style="text-decoration:none; font-size:22px; ; font-weight:bold;color:#ffffff;" >L2Tactics.com</a>
</font><br />
Lineage2 database featuring 100% Freya.
<br />
<form action="http://www.l2tactics.com/droplocator/droploc.php?chron=fry"  method="post" >
Item's Name:<input type="text" name="fitem" value="" style="font-size:10px;width:80px;" />
<input type="hidden" name="frate" value="1"/> <!-- modify value to match your server's rate-->
<input type="submit" name="submit" value="Search" style="font-size:12px; height:20px;"/>

</form>
<form action="http://www.l2tactics.com/droplocator/mobsearch.php?chron=fry"  method="post" >
Npc's Name:<input type="text" name="mname" value="" style="font-size:10px; width:80px;" />
<input type="hidden" name="frate" value="1"/> <!-- modify value to match your server's rate-->
<input type="submit" name="submit" value="Search" style="font-size:12px; height:20px; "/>
</form>
</div>
<!-- L2Tactics.com Search Box End -->

</td></tr></table></center>

<?php include('lower.php');     ?>