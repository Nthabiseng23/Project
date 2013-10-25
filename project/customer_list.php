<?php
//display customers and admins that are registered
require("classes/sql_scripts.class.php");
$obj=new sql_commands();

session_start();
if(!isset($_SESSION['manager']))
{
	header("Location: admin_login.php");	
	session_destroy();
	exit;	
}

if(isset($_GET['del']))
{
	$obj->deleteUser($_GET['del']);	
}

if(isset($_GET['delAdmin']))
{
	$obj->deleteAdmin($_GET['delAdmin']);	
}
$current_user=$obj->getAllCustomers();
$current_admins=$obj->getAllAdmin();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>customer_list</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--

-->
</style>
</head>

<body>

<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="customer_list.php" method="post">


<div id="content">
  <h1 align="center">Administrators and Customers Registered </h1>
  <div align="center" >
<table width="554" border="1">
  <!--DWLayoutTable-->
  <tr>
    <td width="419" height="23" valign="top"><strong>Admins </strong></td>
    
    </tr>
  <tr>
    <td height="22"><?php echo $current_admins;?></td>
  
    </tr>
  <tr>
    <td height="23" valign="top"><strong> Customers </strong></td>
  
  </tr>
  <tr>
    <td height="22" valign="top"><?php echo $current_user;?></td>

    </tr>

</table>
</div>

  <p align="left"><a href="index_admin.php"><img src="images/buttons/back.jpg" width="157" height="33" /></a></p>
  </div>
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
