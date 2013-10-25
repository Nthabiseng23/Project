<?php
session_start();
//the form basically requires the information/ credentials of the user in order for him to login to other pages to make a purchase. If the user was already logged in, he/she will be redirected to order.php 
if(isset($_SESSION['user']))
{
	header("Location: order.php");	
	exit;
}
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	$user=$_POST['name'];
	$password=$_POST['password'];
	if(!$user||!$password)
	{
		echo "Please enter the correct information";	
		exit;
	}
	require("classes/sql_scripts.class.php");
	$obj=new sql_commands();
	//$obj->connect();
	$value=$obj->user_login($user,$password);
		if($value>0)
		{
			
		$_SESSION["user"]=$user;
		$_SESSION["id"]=$value;
		header("Location: check_out.php");
		exit;
		}else
		{
			echo 'The information is incorrect <a href="user_login.php">Click here</a>';
			exit;
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>home page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">

</head>

<body>
<div id="Layer8">
  <form id="form1" name="form1" method="post" action="">
    <h2 align="center">User Login</h2>
    <table width="474" height="163" border="0">
      <tr>
        <td>Username:</td>
        <td><input type="text" name="name" /></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input type="text" name="password" /></td>
      </tr>
      <tr>
        <td height="23"><input type="submit" name="Submit" value="Submit" /></td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="23"><a href="#">Register</a></td>
        <td>|<span class="style4"> <a href="#">Forgot Password</a></span> </td>
      </tr>
    </table>
  </form>
</div>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
 <div>
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
  <div id="Layer8" align="center">
  <form id="form1" name="form1" method="post" action="">
    <h2 align="center">User Login</h2>
    <table width="474" height="163" border="0">
      <tr>
        <td>Username:</td>
        <td><input type="text" name="name" /></td>
      </tr>
      <tr>
        <td>Password:</td>
        <td><input type="password" name="password" /></td>
      </tr>
      <tr>
        <td height="23"><input type="submit" name="Submit" value="Submit" /></td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td height="23"><a href="register.php">Register</a></td>
        <td>|<span class="style4"> <a href="forgot_password.php">Forgot Password</a></span> </td>
      </tr>
	  <tr><td></td></tr>
    </table>
  </form>
</div>
</div>
 
<?php include_once("footer.php"); ?>

</body>
</html>
