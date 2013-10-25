<?php
//an admin is able to send an email to a user 
require("classes/sql_scripts.class.php");
$obj=new sql_commands();
$email="";
$error="";
$msg="";

if(isset($_GET['mail_id']))
{
	$email=$obj->getEmail($_GET['mail_id']);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
		$to=$_POST['to'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];	
		$from="jane@gmail.com";
		
	if(!$to||!$subject||!$message)
	{
		$error="All fields must be entered";	
	}
	else
	{
		mail($to,$subject,$message,$from);
		//$error="Email successfully sent!";
		echo "Email successfully sent! <a href='index_admin.php'>Click here to continue</a>";
		exit;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Email page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="mail.php" method="post">
<div id="content">
<br/>
<table width="200" border="0" align="center">
  <!--DWLayoutTable-->
  <tr>
    <td colspan="2" align="center"><h2>SEND MAIL</h2></td>
    </tr>
  <tr>
    <td width="69">To:</td>
    <td width="240"><input type="text" name="to" size="40"  value="<?php echo $email;?>"  readonly="readonly" /></td>
  </tr>
  <tr>
    <td>Subject:</td>
    <td><input type="text" name="subject" size="40" /></td>
  </tr>
  <tr>
    <td>Message:</td>
    <td><textarea cols="30" rows="10" name="message"></textarea></td>
  </tr>
  <tr>
    <td height="26">&nbsp;</td>
    <td align="left" valign="top"><input type="submit" value="Send Email" /></td>
    </tr>
</table>
<br/>
<p align="center"><?php echo $error;?></p>
  <br/>
<a href="customer_list.php"><img src="images/buttons/back.jpg" width="144" height="33" /></a></div>
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
