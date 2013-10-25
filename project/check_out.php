<?php
session_start();
//the customer sees this page only when he/she is logged in and decides where to buy the products or not 
require("classes/shopping_cart.class.php");


if(!isset($_SESSION["user"]))
{
	header("Location: index.php");
	session_destroy();
}

if(isset($_POST['logOut']))
{
	header("Location: index.php");	
	session_destroy();
	
}
if(isset($_POST['buy']))
{
	header("Location: order.php");	
}

$myObj=new shopping_cart();
$tabl=$myObj->order_display($_SESSION);
$total_cost=$myObj->cost();
$total=$myObj->total_cost_to_pay();



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>checkout</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
 <form id="form1" name="form1" method="post" action="check_out.php">
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
  <table width="98%" border="1" cellpadding="6" cellspacing="0">
<tr>
<td width="18%" bgcolor="#CCCC99"><strong>Product</strong></td>
<td width="20%" bgcolor="#CCCC99"><strong>Description</strong></td>
<td width="14%" bgcolor="#CCCC99"><strong>Price</strong></td>
<td width="15%" bgcolor="#CCCC99"><strong>Categoty</strong></td>
<td width="18%" bgcolor="#CCCC99"><strong>Sub-Category</strong></td>
<td width="15%" bgcolor="#CCCC99"><strong>Quantity</strong></td>
</tr>
<?php echo $tabl;?>

</table>
<div align="left">
  <p>
  <?php echo $total;?> <br/><br/>
  <input type="submit" value=" Buy " name="buy" size="100"/></p>
 
  <div align="left"><p><input type="submit" value="LogOut" name="logOut"/></p>
 </div>
 </div>
</form>
  <?php include_once("footer.php"); ?>

</body>
</html>
