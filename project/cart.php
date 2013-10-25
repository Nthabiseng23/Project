<?php
require("classes/shopping_cart.class.php");
session_start();
//displays the products selected and add them to a shopping cart 
if(isset($_GET['add']))
{
	
	$_SESSION['cart_'.$_GET['add']]+=1;
}

if(isset($_GET['sub']))
{
	
	$_SESSION['cart_'.$_GET['sub']]--;
}

if(isset($_GET['remov']))
{
	
	$_SESSION['cart_'.$_GET['remov']]=0;
}

$obj=new shopping_cart();
$output=$obj->cart($_SESSION);
$total=$obj->total_cost_to_pay();

if(isset($_GET['clear'])&&isset($_GET['clear'])=="empty")
{
	session_destroy();
	header("Location: index.php");
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cart</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--


-->
</style>
</head>

<body>


<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
<div align="center">
  <table width="1265" border="1">
    <tr>
      <td width="15%" height="41" bgcolor="#CCCC99" ><strong>Product</strong></td>
<td width="22%" bgcolor="#CCCC99"><strong>Description</strong></td>
<td width="11%" bgcolor="#CCCC99"><strong>Price</strong></td>
<td width="11%" bgcolor="#CCCC99"><strong>Categoty</strong></td>
<td width="14%" bgcolor="#CCCC99"><strong>Sub-Category</strong></td>
<td width="10%" bgcolor="#CCCC99"><strong>Quantity</strong></td>
<td width="17%" bgcolor="#CCCC99"><strong>add/sub/remove</strong></td>

    </tr>
	
	<?php echo $output;?>
  </table>
  <div align="right">
<p><a href="user_login.php"><img src="images/buttons/checkout.jpg" width="173" height="48" /></a></p>
<p align="right"><?php echo $total;?></p>
</div>
</div>
 <div align="right">
<p>&nbsp;</p>
</div>
  

  <div align="center"><a href=cart.php?clear=empty>Clear Shopping cart</a>
    </p>
  </div>
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
