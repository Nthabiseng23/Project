<?php
//The page reads informtion in a text file and display it on the form
	$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
	$text="";
	$fp=fopen("news.txt",'rb');
	while(!feof($fp))
	{
		$text.=fgets($fp)."<br>";
	}
	fclose($fp);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>News Page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--


-->
</style>
</head>

<body>


<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="index.php" method="post">
<div id="content">
<div id="Layer10">
<table width="686" border="0">
  <tr>
    <td width="680" height="59" align="center"><h2><strong>News for Specials </strong></h2></td>
    </tr>
  <tr>
    <td height="196" align="center" valign="top"><?php echo $text;?> <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
  </tr>
  </table>
  </div>
<div id="Layer11">
  <table width="352" border="0">
    <!--DWLayoutTable-->
    <tr>
      <td height="22" colspan="2" valign="top"><b>On Sale Products</b> </td>
    </tr>
    <tr>
      <td width="116" height="114" valign="top" ><p><img src="images/0.jpg" width="114" height="100" /></p></td>
	  <td width="226" valign="top" >
	    <p><br/>
	      Canon Pixma<br/>inkjet Printer <br/>
          <span class="style6"><s>Was R1720</s></span>  Now R1300</p>
	    </td>
	  </tr>
    
	  <tr>
        <td height="112" valign="top"><p><img src="images/44.jpg" width="115" height="93" /></p></td>
		<td valign="top"><p>&nbsp;</p>
		  <p>Pocket Mouse<br/>
		    Wireless Mobile<br/>
		    <span class="style6"><s>Was R300</s></span> Now R200</p>
		</td>
	</tr>
	<tr>	
		<td height="114" valign="top"><p><img src="images/46.jpg" width="116" height="101" /></p></td>
		<td valign="top"><p>&nbsp;</p>
		  <p>Pentel <br/>
		    <span class="style6"><s>Was R45</s></span> Now R30 </p></td>
	  </tr>
  </table>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
