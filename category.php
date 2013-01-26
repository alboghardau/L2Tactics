<?php

include("dbsettings.php");
$cat = $_GET['cat'];
$page = $_GET['page'];

$cin = ($page-1)*5;
$cfin = $page*5;        // to be tested



$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

$db = mysql_select_db ($app , $connection);
 
$artnr = mysql_num_rows(mysql_query("SELECT * FROM articles WHERE cat_id=".$cat.' AND view="yes"'));


$res = mysql_query("SELECT * FROM categories WHERE cat_id=".$cat);
 
$r = mysql_fetch_array($res);

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

  <title><?php echo $r['name'] ?></title>

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
            <?php
            
            echo $r['name']; 
                       ?>
            
                 </div>   
            
           

        
        <div id="contentmain">
             <div id="pagination">
            
            <?php
           
            echo "Page: "; 
            $pg=$page-5;
            if($pg<1)
            {
                $pg=1;
            }
            if($artnr<=0) {$artnr=1;}       
            while(($pg<$artnr/5+1)&&($pg<=$page+5)&&($pg>=$page-5))
            {
                if($pg != $page)
                {
                echo '<a href="'.$site.'cms/category/'.$cat.'/'.$pg.'/updates.html">'.$pg." </a>";
                
                }
                else
                {
                    echo $pg.' ';

                }

                $pg++;
                
            }
            
            ?>
            </div>
         
            <?php

            
            $result = mysql_query('SELECT * FROM articles WHERE view="yes" AND cat_id='.$cat." ORDER BY id DESC LIMIT ".$cin.",".$cfin);
            
            while($row = mysql_fetch_array($result))
            {
                echo '<div class="article">';
                echo '<h1>'.$row['name'].'</h1>';
                echo '<h4>'.$row['date'].'</h4>';
                echo '<div class="comment">'.substr($row['text'],0,400).'';
               
                if(strlen($row['text']) != strlen(substr($row['text'],0,400)))
                {
                echo ".....</div>";
                echo '<div class="read"><a class="read" href="'.$site.'cms/article/'.$row['id'].'/'.$row['page_name'].'.html">Read More</a></div>';
                }
                else{
                    echo "</div>";
                }
                echo '</div>';
            }
            
            
            ?>
            

    
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

