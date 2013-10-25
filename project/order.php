<?php
session_start();
//users sends necessary information for him/her to be able to make an order
require("classes/shopping_cart.class.php");
$myObj=new shopping_cart();
$tabl=$myObj->order_display($_SESSION);
$total_cost=$myObj->cost();
$total=$myObj->total_cost_to_pay();
$msg="";
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	//header("Location: order.php");	

//accepting the variables from the text boxes
$credit=$_POST["credit"];
$amount=$_POST["amount"];
if(isset($credit)&& isset($amount))
{
	if(!preg_match("/[0-9]{16}/",$credit))
	{
		$msg="Credit number not valid";
		//echo "Credit number not valid <a href='order.php'>Click Here</a>";
		//exit;	
	}
	
	if($total_cost==0)
	{
		session_destroy();
		$msg ="Your shopping card is empty so u can't do any of the transaction";
		//echo "Your shopping card is empty so u can't do any of the transaction so you will be logged out <a href='index.php'>Click Here</a>";	
		//exit;	
	}
	
	
	//checks if the user is paying enough
	if($total_cost == $amount)
	{
		 
		 $new_id=$myObj->order($_SESSION["id"],$total_cost,$amount);
		 $myObj->order_items($new_id,$_SESSION);
		 session_destroy();
		  $msg="Order successfully processed. You will be notifyed on your email about your products... You will be locked out by the security of the system...Thanks <a href='check_out.php'>Click Here</a>";
		  //echo "Order successfully processed. You will be notifyed on your email about your products... You will be locked out by the security of the system... Thanks <a href='check_out.php'>Click Here</a>";
		  //exit;
	}
	else
	{
		$msg = "Enter the exact amount";
		//echo "Enter the exact amount <a href='order.php'>Click to go back</a>";	
		//exit;
	}
	
	
	}
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Order</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form id="form1" name="form1" method="post" action="order.php">
<div id="content">
<div align="left">  
    <h2>&nbsp;</h2>
    <h2>Order Your Products </h2>
    <table width="727" border="0">
      <!--DWLayoutTable-->
  	    <tr>
  	      <td height="38" colspan="2" valign="top">Total Cost:            </td>
  	      <td colspan="2" valign="top"><input name="Cost" type="text" id="cost" value="<?php echo $total_cost; ?>" readonly="readonly" size="4"/></td>
          <td width="398">&nbsp;</td>
      </tr>
  	    <tr>
  	      <td height="38" colspan="2" valign="top">Credit Card No:</td>
  	      <td colspan="2" valign="top"><input type="text" name="credit" id="credit" /></td>
          <td></td>
      </tr>
  	    <tr>
  	      <td height="24" colspan="2" valign="top">Amount:</td>
  	      <td colspan="2" valign="top"><input type="text" name="amount" id="amount" /></td>
          <td></td>
      </tr>
  	    <tr>
  	      <td width="82" height="26">&nbsp;</td>
  	      <td colspan="2" valign="top"><input type="submit" value="Order" /></td>
          <td width="55">&nbsp;</td>
  	      <td></td>
      </tr>
  	    <tr>
  	      <td height="38" colspan="5" valign="top"><?php echo $msg;?></td>
      </tr>
  	    <tr>
  	      <td height="3"></td>
  	      <td width="49"></td>
  	      <td width="121"></td>
  	      <td></td>
  	      <td></td>
      </tr>
    </table>
  	  <p>&nbsp;</p>
  	  <p><br/>
    </p>
  	  <p><br/>
        <a href="check_out.php"><img src="images/buttons/back.jpg" width="126" height="33" /></a><br/>
  	    <br/>
    </p>
</div>
  <p>&nbsp;</p>
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
