<br/>
<center>
<form action="<?php echo $host ."droploc.php?chron=" . $chron;?>" method="post">
Item's Name: <input type="text" name="fitem" />
Rate: <input style="width:25px;" type="text" name="frate" value="<?php echo $_SESSION['srate'] ?>"/>
<input type="checkbox" name="iflevel" value="1"<?php if($iflvl==1) echo " checked"?>/>
Level: <input style="width:25px;" type="text" name="flevel" value="<?php echo $_SESSION['slvl'] ?>" />
<input type="submit" value="Search Item"/>
</form>

<form action="<?php echo $host ."mobsearch.php?chron=" . $chron;?>" method="post" >
Mob's Name: <input type="text" name="mname" />
Rate: <input style="width:25px;" type="text" name="frate" value="<?php echo $_SESSION['srate'] ?>"/>
<input type="submit" value="Search Monster"/>
</form>
</center>
<br/>