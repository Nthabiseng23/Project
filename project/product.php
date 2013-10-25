<?php
require("classes/sql_scripts.class.php");
//display the specific product selected from the page called product_list.php
session_start();
$obj=new sql_commands();
$output="";
$id=0;


	//checks if the product selected
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$output=$obj->view_specific_product($id);		
	}
	
	
		if(isset($_POST['pid']))
		{
			$pid=$_POST['pid'];
			$_SESSION['cart_'.$pid]+=1;
			header("Location: cart.php");
		
		}

	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Product</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--

}
-->
</style>
</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="product.php" method="post">

<div id="content">
  <table width="495" border="0" align="center">
    <!--DWLayoutTable-->
    <tr>
	<td width="304" height="31"><h2>The Product</h2></td>
	<td width="181">&nbsp;</td>
    </tr>
  <tr>
    <td height="214" valign="top"><img src="images/<?php echo $id;?>.jpg" width="250" height="211" />
      <a href="proImages/<?php echo $id;?>.jpg"></a></td>
	  <td valign="top"><p><?php echo $output;?></p>
	    <p>
	      <input type="hidden" name="pid" value="<?php echo $id;?>"/>
	        </p>	    <p>
	      <input name="submit" type="submit" value="Add to Cart" />
            </p></td>
      </tr>
</table>
<p><a href="product_list.php"><img src="images/buttons/back.jpg" width="157" height="33" /></a></p>
<p>&nbsp;</p>
</div>
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
