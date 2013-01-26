<?php
session_start();
include ('dbsettings.php');

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
          
            
             <center><table id="table" >
                <tr class="itm" style="height: 34px">
                <td class="col4">ID</td>
                <td class="col4">Category</td>
                <td>Name</td>
                <td class="col4">Active</td>
                <td class="col4">Featured</td>
                <td class="col4">Edit</td>
                <td class="col4">Delete</td>
                </tr>
           
       
                    <?php
            if(isset($_SESSION['username'])&&isset($_SESSION['password']))
            {
                

                $result = mysql_query("SELECT * FROM articles ORDER BY id DESC");
                

                while($row = mysql_fetch_array($result))
                {
                    echo '<tr class="itm" style="height: 34px">';
                    echo '<td class="col4">'.$row['id'].'</td>';
                    echo '<td class="col4">'.$row['cat_name'].'</td>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td class="col4"><a href="active.php?id='.$row['id'].'"><img src="'.$site.'images/'.$row['view'].'.png"></a></td>';
                    echo '<td class="col4"><a href="featured.php?id='.$row['id'].'"><img src="'.$site.'images/'.$row['featured'].'.png"></a></td>';
                    echo '<td class="col4"><a href="editarticle.php?id='.$row['id'].'"><img src="'.$site.'images/edit.png"></a></td>';
                    echo '<td class="col4"><a href="delarticle.php?action=1&id='.$row['id'].'"><img src="'.$site.'images/close.png"></a></td>';
                    
                    echo '</tr>';
                    
                    
                }
               
            }

            ?>
                
           </table></center>
            
        </div>
        <div id="contentbotfull"></div>
     
    </div>
    
    
    </body>
</html>

<?php        mysql_close($connection); ?>