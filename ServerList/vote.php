<?php

 $cryptinstall="crypt/cryptographp.fct.php";
 include $cryptinstall;  
 $srvid = $_GET['srvid'];
 
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

<?php include('../ads720.php')?>

<center><table>
<form action="addvote.php?srvid=<?php echo $srvid;?>" method="post">
  <tr>
        <td><?php dsp_crypt(0,1); ?></td>
        <td><h3 style="color: white;">Insert verification code: <input type="text" name="code" style="width:100px;"></h3></td>
        <td><input type="submit" name="submit" value="Vote"></td></tr>
</table>
</form></center>
    
<?php include('../ads300.php')?> 
    
<!-- BEGIN SMOWTION TAG - DO NOT MODIFY -->
<div id="smowtion_cont_18d25106ae64337f8eb0919513c5ba33" style="display:none;">
<script type="text/javascript">
smowtion_size = "160x600";
smowtion_section = "2601433";
smowtion_align = "top-right";
smowtion_cont_id = "18d25106ae64337f8eb0919513c5ba33";
</script>
<script type="text/javascript" src="http://ads.smowtion.com/slider.js?s=2601433&z=160x600&a=tr&c=18d25106ae64337f8eb0919513c5ba33"></script>
</div>
<!-- END SMOWTION TAG - DO NOT MODIFY -->
    
</body>
</html>