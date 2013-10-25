<?php
require("classes/sql_scripts.class.php");
//the form show's the information that the user searched in the databse on this form
session_start();
$obj=new sql_commands();
$output="";
$id=0;

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
<title>Results</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="result_search.php" method="post">
<div id="content">
  <h2 align="center">Searched Results</h2>
  </p>
  <table width="407" height="280" border="0" align="center">
    <!--DWLayoutTable-->
  <tr>
    <td width="195" height="190" valign="top"><img src="images/<?php echo $id;?>.jpg" width="239" height="271" />
      <a href="images/<?php echo $id;?>.jpg"></a></td>
    <td width="141" valign="top"><?php echo $output;?>
      <p>
        <input type="hidden" name="pid" value="<?php echo $id;?>"/>
        </p>      <p>
        <input name="submit" type="submit" value="Add to Cart" />
        </p></td>
    </tr>
 
</table>
  <p><a href="product_list.php"><img src="images/buttons/back.jpg" width="146" height="33" /></a></p>
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
