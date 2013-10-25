<?php
//displays the products that already there in the database on the form
require("classes/sql_scripts.class.php");
$obj=new sql_commands();
$msg="";
$computer=$obj->select_computer();
$stationery=$obj->select_stationeryOffice();
$book=$obj->select_book();
//header("Location: product_list.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
	$search=$_POST['search'];
	
	$result=$obj->search($search);
	if($result>0)
	{
		$msg="Product found!! <a href=result_search.php?id=$result>View Product</a>";
	}
	else
	{
		$msg="Product does not exist!!";
	}
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Product List</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--


-->
</style>
</head>

<body>


<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="product_list.php" method="post">
<div id="content">
<div>
<p>Search by name:
    <input type="text" name="search" /><input type="submit" value="Go" /></p>
  <p><?php  echo $msg;?></p>
</div>
<div>
  <table width="760" height="329" border="0">
    <!--DWLayoutTable-->
  <tr>
    <td width="232" height="23" valign="top" bgcolor="#CCCC99"><h4>Computer</h4></td>
    <td width="236" valign="top" bgcolor="#CCCC99"><h4>Stationery & Office</h4></td>
    <td width="231" valign="top" bgcolor="#CCCC99"><h4>Books</h4></td>
  </tr>
  <tr>
    <td height="294" valign="top"><?php  echo $computer;?></td>
    <td valign="top"><?php echo $stationery;?></td>
    <td valign="top"><?php  echo $book;?></td>
  </tr>
</table>
<div id="Layer30">
  <p>Get ready for your shopping</p>
  <p><img src="images/visa_gift_card.jpg" width="177" height="136" /></p>
  <p>Spoil yourself with vourchers at P&amp;J </p>
  <p><img src="images/14783252-the-words-gift-card-on-a-plastic-credit-or-debit-card-used-for-buying-merchandise-from-a-store-as-a-.jpg" width="177" height="143" /></p>
</div>
</div>

  <p>&nbsp;</p>
  <p align="right">&nbsp;</p>
  <p>&nbsp;</p>
  <p align="right">&nbsp;</p>
  <p></p>
</div>
</form>
  
<?php include_once("footer.php"); ?>

</body>
</html>
