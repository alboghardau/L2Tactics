<br/>
<center>
<form action="<?php echo $host ."droploc.php?chron=" . $chron;?>" method="post">
Item's Name: <input type="text" name="fitem" />
Rate: <input style="width:25px" type="text" name="frate" value="<?php echo $_POST['frate'] ?>"/>
<input type="checkbox" name="iflevel" value="1"<?php if($iflvl==1) echo " checked"?>/>
Level: <input style="width:25px" type="text" name="flevel" value="<?php 
if(isset($_POST['flevel']))
{
echo $_POST['flevel']; }
else if(isset($_SESSION['slvl']))
{
    echo $_SESSION['slvl'];
}
                else{
    echo 76;
}
?>" />


<input type="submit" value="Search Item"/>
</form>
<br/>
<form action="<?php echo $host ."mobsearch.php?chron=" . $chron;?>" method="post" >
Mob's Name: <input type="text" name="mname" />
Rate: <input style="width:25px" type="text" name="frate" value="<?php echo $_POST['frate'] ?>"/>
<input type="submit" value="Search Monster"/>
</form>
</center>
<br/>