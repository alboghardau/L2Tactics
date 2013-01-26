<?php

include("dbsettings.php");
$artid = $_GET['artid'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($app , $connection);
 
  $result = mysql_query("SELECT * FROM articles WHERE id=".$artid);
                
 $row = mysql_fetch_array($result);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
    
  <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />
  <meta name="robots" content="index, follow" />
  <meta name="keywords" content="<?php echo $row['keywords']; ?>" />
  <meta name="rights" content="" />
  <meta name="language" content="en-GB" />

  <title><?php echo $row['name']; ?></title>

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
  
</head>
<body class="background">
    

<?php include('menu.php')?>
        

    <div id="mzone">
        
 <?php include('leftcol.php'); ?>
        
        
        <div id="cmain">
        <div id="contenthead">
            Article
            
        </div>
        
        <div id="contentmain">
            
            <div class="article">
          
                <?php
                
               
                
                echo "<h1>".$row['name']."</h1>";
                echo "<h4>".$row['date']."</h4>";
                echo '<div class="comment">'.$row['text'].'</div>';                
                ?>
                
            </div>
            <br/>
        
        </div>
        
        <div id="contentbot">
            
            
        </div>
        </div>
        </div>
 
    
     <?php include('footer.php') ?> 
    
    </body>
</html>

  <?php mysql_close($connection); ?>