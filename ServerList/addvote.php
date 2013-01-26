<?php


 $cryptinstall="crypt/cryptographp.fct.php";
 include $cryptinstall;  

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
    
  <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="" />
  <meta name="rights" content="" />
  <meta name="language" content="en-GB" />

  <title>L2Tactics</title>

  <link rel="stylesheet" href="../style/style.css" type="text/css" />
  
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
  
</head>
<body class="background">
    
    <center><h3 style="color:white;">
    <?php
    include('../dbsettings.php');  
  $srvid = $_GET['srvid'];
    
  if(isset($_POST['code']))
  {
    
    if (chk_crypt($_POST['code'])) 
  {
      
     
      
    

    $connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

    $db = mysql_select_db ($app , $connection);
      
    $ip = $_SERVER['REMOTE_ADDR']; 

    
    $t = time()+6*3600;
    
    $ctime = date("Y-m-d G:i:s",$t);
    
    $result = mysql_query('SELECT * FROM votes WHERE ip="'.$ip.'"');
            
    $row = mysql_fetch_array($result);        
   
    if($row['time'] < time())
    {
    
    $srv = mysql_query('SELECT * FROM servers WHERE id='.$srvid);
    
    $server = mysql_fetch_array($srv);
    
    $votes = $server['votes']+1;     
        
     echo 'Your Vote is Correct.'."<br/>You can vote again in 6 hours.<br/>";   
        
    if(mysql_num_rows($result)==1)
    {
        
        mysql_query('UPDATE votes SET time="'.$t.'" WHERE ip="'.$ip.'"');
        mysql_query('UPDATE servers SET votes='.$votes.' WHERE id='.$srvid);
        
    }
     if(mysql_num_rows($result)==0)
    {
         
        mysql_query('INSERT INTO votes (ip,time) VALUES ("'.$ip.'","'.$t.'")');
        mysql_query('UPDATE servers SET votes='.$votes.' WHERE id='.$srvid);
        
    } 
    }
    else{
        echo "You can not vote until: ".date("Y-m-d G:i:s",$row['time'])." GMT";
    }

      
      
      
      
    mysql_close($connection) ;
     header('Refresh: 5; URL='.$site.'serverlist/index.php');  
         echo "<br/>Redirecting in 5 seconds.";
  }
    else 
    {
        echo 'The verification code is not correct.<br/> <a style="color:white;" href='.$site."serverlist/vote.php?srvid=".$srvid.">Try again.</a>
        ";
    }
    
  } 

 
?>
             </h3></center>
</body>
</html>