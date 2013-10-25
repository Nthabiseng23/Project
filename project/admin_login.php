<?php
session_start();
//logs in the admin or super admin. Admin will only be able to update news and super admin add, update, and delete the product
require("classes/admin.class.php");
$msg="";
if(isset($_SESSION['manager']))
{
	header("Location: index_admin.php");	
	exit;
}

if(isset($_SESSION['admin']))
{
	header("Location: myadmin.php");	
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
		$result="";
		$type=$_POST['adminType'];
		$manager=$_POST['username'];
		$password=$_POST['password'];
		$obj=new admin();

		$result=$obj->check($manager,$password,$type);
		if($result=="superadmin")
		{
			
		$_SESSION["manager"]=$manager;
		$_SESSION["password"]=$password;
		header("Location: index_admin.php");
		
		}else if($result=="admin")
		{
			$_SESSION["admin"]=$manager;
			$_SESSION["password"]=$password;
			header("Location: myadmin.php");
		}
		else
		{
			$msg= 'The information is incorrect!!';
			//$msg= 'The information is incorrect <a href="index_admin.php">Click to go back</a>';
			//exit;
		}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin_login</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <div id="Layer21">
    <h1>Admin Login </h1>
    <form id="form1" name="form1" method="post" action="admin_login.php">
      <table width="313" height="189" border="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="73">Username</td>
          <td width="230"><input type="text" name="username" id="username" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><select name="adminType">
		  <option value="superadmin">SuperAdmin</option>
		  <option value="admin">Admin</option>
          </select></td>
        </tr>
        <tr>
          <td><input type="submit" name="Submit" value="Login" /></td>
          <td>&nbsp;</td>
        </tr>
		<tr>
		<td height="11"></td>
		<td></td>
		</tr>
		<tr>
		  <td height="21" colspan="2" valign="top"><?php echo $msg;?></td>
		</tr>
      </table>
    </form>
    <p>&nbsp; </p>
  </div>
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
