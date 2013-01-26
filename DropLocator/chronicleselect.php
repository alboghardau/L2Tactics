<?php

$chron = $_GET["chron"];
if($chron=='c6')
    
{
        echo '<center><img src="'.$host.'images/interludep.png" alt="c6"/> <a href="'.$host.'fry.html"><img src="'.$host.'images/freya.png" alt="freya"/></a></center>';
}

if($chron=='fry')
    
{
    echo '<center><a href="'.$host.'c6.html"><img src="'.$host.'images/interlude.png" alt="c6"/></a> <img src="'.$host.'images/freyap.png" alt="freya"/></center>';
}

?>