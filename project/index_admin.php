<?php
session_start();

require("classes/sql_scripts.class.php");
$obj=new sql_commands();
$name="";

if(isset($_GET['id']))
{
	$name=$obj->getAdmin_name($_GET['id']);
}
//shows things the superadmin can perform 
if(!isset($_SESSION['manager']))
{
	header("Location: admin_login.php");	
	session_destroy();
	exit;	
}

if($_SERVER['REQUEST_METHOD']=="POST")
{

	header("Location: admin_login.php");
	session_destroy();
}


	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>index admin</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


<style type="text/css">
<!--
#Layer30 {
	position:absolute;
	left:316px;
	top:182px;
	width:680px;
	height:317px;
	z-index:3;
}

-->
</style>
</head>

<body>


<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="index_admin.php" method="post">
<div id="content">
  	<br />
	<div align="center">
     		 <h2>Welcome Jane <?php echo $name; ?></h2>
	</div>
	<div id="Layer27" align="center">
	 	 
         <p><a href="Inventory.php">Products management</a></p>
         <p><a href="add_admin.php">Add new admin</a></p>
         <p> <a href="customer_list.php"> Customer's and Admin's Registered </a> 
      </p>
    <a href="add_admin.php"></a></div>
	<p align="center"><img src="images/buttons/list.jpg" width="237" height="184" />&nbsp;</p>
    <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <div align="center">
      <p>
        <input type="submit"  value="LogOut" />
      </p>
      
   	</div>
	
  		
	
 </div>
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
