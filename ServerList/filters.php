<?php

if(isset($_SESSION['filters'][0]))
{
    $minrate = " AND rate_xp>=".$_SESSION['filters'][0];
}
else
{
    $minrate = " AND rate_xp>0";
}

if(isset($_SESSION['filters'][1]))
{
    $maxrate = " AND rate_xp<=".$_SESSION['filters'][1];
}
else
{
    $maxrate = "";
}

if(isset($_SESSION['filters'][2]))
{
    $antibot = ' AND anti_bot="'.$_SESSION['filters'][2].'"';
}
else
{
    $antibot = "";
}

if(isset($_SESSION['filters'][3]))
{
    $donation = ' AND donation="'.$_SESSION['filters'][3].'"';
}
else
{
    $donation = "";
}

if(isset($_SESSION['filters'][4]))
{
    $chronicle = ' AND chronicle="'.$_SESSION['filters'][4].'"';
}
else
{
    $chronicle = "";
}

?>
