<?php
	$status = $_POST['status'];
	
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		if(!$status)
		{
			echo "Enter ID number";
		}
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>orderHistory</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--

-->
</style>
</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="status.php" method="post">
<div id="content">
<br/><br/>
<table width="333" height="342" border="0" align="right">
  <!--DWLayoutTable-->
    <tr>
      <td height="33" colspan="2" valign="top"><b>COMING OUT SOON</b> </td>
      </tr>
    <tr>
      <td width="166" height="115" valign="top"><img src="images/coming/ac.jpg" width="128" height="109" /></td>
      <td width="151" valign="top"><p>ACER</p>
        <p>R4500</p>
        <p>&nbsp;</p></td>
      </tr>
    <tr>
      <td height="109" valign="top"><img src="images/coming/sp2.jpg" width="131" height="103" /></td>
      <td valign="top"><p>Sony Speakers </p>
        <p>R3500</p>
        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="120" valign="top"><img src="images/coming/prin2.jpg" width="131" height="112" /></td>
      <td valign="top"><p>Samsung Printer </p>
        <p>R3700</p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
<h2 align="center">   To view your order history enter <br/>your resistered ID Number </h2>
  
  <br/>
    <p align="center">Id Number:
    <input type="text" name="status" />
    <br/>
    <br/>
    
    <input type="submit" value="View Order History" />
    </p>
	
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
