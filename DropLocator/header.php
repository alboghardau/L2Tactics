 <br/>
<center>
<form action="droploc.php?chron=<?php echo $chron;?>" method="post">
Item's Name: <input type="text" name="fitem" />
Rate: <input style="width: 25px;" type="text" name="frate" value="<?php

if (isset($_COOKIE["rate"]))
{
echo $_COOKIE["rate"];
}
else
{
    echo 1;
}

?>"/>

<input type="checkbox" name="iflevel" value="1"/>
Level: <input style="width: 25px;" type="text" name="flevel" value="<?php

if (isset($_COOKIE["level"]))
{
echo $_COOKIE["level"];
}
else
{
    echo 76;
}

?>" />
<input type="submit" value="Search Item"/>
</form>
<br/>
<form action="mobsearch.php?chron=<?php echo $chron;?>" method="post" >
Mob's Name: <input type="text" name="mname" />
Rate:<input style="width: 25px;" type="text" name="frate" value="<?php

if (isset($_COOKIE["rate"]))
{
echo $_COOKIE["rate"];
}
else
{
    echo 1;
}

?>"/>
<input type="submit" value="Search Monster"/>
</form>
</center>
<br/>