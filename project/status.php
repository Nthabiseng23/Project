<?php
//the information displays the status of the user
require("classes/sql_scripts.class.php");
$obj=new sql_commands();
$history="";
$status=$_POST['status'];
$msg="";
if(!$status)
{
	$msg= "<h3>Enter ID number</h3>";
	}
	else 
	{
	$history= $obj->orderHistory($status);
	$msg= "<h3>Thank you for viewing your order history</h3>";
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>status</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">

<h1>Order History</h1>
<p><?php echo $history; ?></p>
   <p> <?php echo $msg;?></p>
  <p>&nbsp;</p>
    <a href="orderHistory.php"><input type="submit" name="Submit" value="Back" /></a>
  <a href="index.php"><input type="submit" name="Submit" value="Logout" /></a>
  <p>&nbsp;</p>
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
