<?php
session_start();
include ('dbsettings.php');
$id = $_GET['id'];

$connection = mysql_connect($mysql[0],$mysql[1],$mysql[2]);

 $db = mysql_select_db ($app , $connection);
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en-gb" dir="ltr">
<head>
    
  <meta http-equiv="content-type" content="text/html; charset=utf-8;charset=utf-8" />

  <meta name="language" content="en-GB" />

  <title>L2Tactics CMS</title>

  <link rel="stylesheet" href="../style/style.css" type="text/css" />
  
  
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
         // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,



        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",
        
                // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js"
});
</script>

</head>
<body class="background">
    
<?php include('menu.php')?>
    <div id="mzone">
        
 
     
        <div id="contentheadfull">
            <?php
            if(isset($_SESSION['username'])&&isset($_SESSION['password']))
            {
                echo "<center>You are loged in.</center>";
            }
             else
            {
                echo "<center>You are not loged in.</center>";
            }
            ?>
            
        </div>
        
        <div id="contentmainfull">
          
       
         <?php 
         
         $result = mysql_query('SELECT * FROM articles WHERE id='.$id);
         
         $row2 = mysql_fetch_array($result);
         
      if(isset($_SESSION['username'])&&isset($_SESSION['password']))
        {
          
        echo '
                 
                    <form method="post" action="updateart.php?id='.$id.'">
                    <center>Name: <input type="text" name="artname" value="'.$row2['name'].'"/></center>
                     <br/>
                     <center>PageTitle: <input type="text" name="pgtitle" value="'.$row2['page_name'].'"/></center>
                     <br/>
';
        
        echo '      <center>Category:<select name="category"> ';
        
        $result = mysql_query("SELECT * FROM categories");
        
        while($row=  mysql_fetch_array($result))
        {
            echo '<option value="'.$row['cat_id'].'">'.$row['name'].'</option>';
        }
          echo $row['text'] ;         
        echo '      
            
                    </select></center>   <br/>
                    <center>Keywords<input type="text" name="key" value="'.$row2['keywords'].'"/></center>
                    <center><textarea name="text" style="width: 90%;" >'.$row2['text'].'</textarea></center>
                     <center><input type="submit"/></center>
                    </form>        ';        
     }
           
         ?>
                
        <br/> 
        </div>
        <div id="contentbotfull"></div>
     
    </div>
    
      
    </body>
</html>
<?php

mysql_close($connection); 

?>