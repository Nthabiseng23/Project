<?php
session_start();
//Superadmin is able to add another admins 
require("classes/sql_scripts.class.php");
$obj=new sql_commands();
$msg="";
if(!isset($_SESSION['manager']))
{
	header("Location: admin_login.php");	
	session_destroy();
	exit;	
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$type=$_POST['adminType'];
	
	
	if(!$username||!$password||!$type)
	{
		$msg= "Enter all the required information";
		//$msg= "Enter all the required information <a href='add_admin.php'>Click to go back</a>";
		//exit;
	}
	else
	{
		$obj->add_admin($username,$password,$type);	
				$msg= "Admin successfully registered!! <a href='index_admin.php'>Click to continue</a>";
		//exit;
	}

	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>add_admin</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--


-->
</style>
</head>

<body>
<div id="Layer22">
  <h1>Add admin </h1>
  <form id="form1" name="form1" method="post" action="add_admin.php">
    <table width="378" height="267" border="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="81" height="44" valign="top">Username</td>
        <td width="287" valign="top"><input type="text" name="username" /></td>
      </tr>
      
      <tr>
        <td height="41" valign="top">Password</td>
        <td valign="top"><input type="password" name="password" /></td>
      </tr>
      
      <tr>
        <td height="41" valign="top">AdminType</td>
        <td valign="top"><select name="adminType">
			<option value="admin">Admin</option>
        </select>        </td>
      </tr>
      
      
      <tr>
        <td height="51" colspan="2" valign="top">
          <div align="left">
            <input type="submit" name="add admin" value="Add Admin" />
          </div></td>
      </tr>
	  <tr>
	  <td height="20" colspan="2" valign="top"><?php echo $msg;?></td>
      <tr>
        <td height="78">&nbsp;</td>
        <td><a href="index_admin.php"><img src="images/buttons/back.jpg" width="157" height="33" border="0" /></a></td>
      </tr>
    </table>
  </form>
  <p>&nbsp;</p>
</div>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<div id="content">
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
</div>
<?php include_once("footer.php"); ?>

</body>
</html>
