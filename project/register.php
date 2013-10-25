<?php
//user provided necessary information so that they can be registered in with the site and be able to make necessary purchases
$erro="";
$msg="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$name=$_POST["name"];
	$surname=$_POST["surname"];
	$address=$_POST["address"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$id=$_POST['id'];
	if(!$address||!$email||!$name||!$password||!$surname||!$id)
	{
		echo "Provide all fields";
		exit;	
	}
	if(!preg_match("/[a-zA-Z0-9_\-.\]+@[a-zA-Z0-9\-]\.[a-zA-Z]{3,4}+$/",$email))
	{
		echo "Email should be in this format mohla90@gmail.com <a href='register.php'>Click Here</a>";
		exit;
	}
	if(empty ($_POST['id_number']) || strlen($_POST['id_number']) != 13 || !is_numeric($_POST['id_number']))
        {
              echo'<br />Enter a valid numeric ID number<br/>';
        }
        if(!checkdate(substr($_POST['id_number'], 2, 2), substr($_POST['id_number'], 4, 2), substr($_POST['id_number'], 2, 2)) && empty ($error_string))
        {
            echo '<br />Invalid ID number please enter a correct one<br/>';
        }
        if((substr($_POST['id_number'], 10, 1) != 0))
        {
            echo '<br />This is not a South African ID number<br/>';
        }
	
	/*if(!preg_match("/[0-9]{13}/",$id))
	{
		echo "ID number not valid <a href='register.php'>Click Here</a>";
		exit;	
	}*/
	

		require("classes/sql_scripts.class.php");
	$obj=new sql_commands();
	$error =$obj->register($name,$surname,$address,$email,$password,$id);
	if($error >0)
	{
		echo "A user with the email address entered exists";
		exit;
	}
	echo"account created succefully <a href='user_login.php'>Click Here</a>";
	exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" href="styles/sytle.css" type="text/css" media="screen">
</head>

<body>
<div align="center" id="main">
<?php include_once("header.php"); ?>
<?php include_once("mid.php");?>
<div id="content">
  <div align="left" style="margin:-left:24px;">  
    <h2 align="center">REGISTER</h2>
    <form id="form1" name="form1" method="post" action="register.php">
      <table width="689" height="402" border="0" align="center">
        <!--DWLayoutTable-->
        <tr>
          <td height="58" colspan="2" valign="top">Name:</td>
          <td colspan="2" valign="top"><input type="text" name="name" id="name" /></td>
          <td width="363" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        <tr>
          <td height="54" colspan="2" valign="top">Surname:</td>
          <td colspan="2" valign="top"><input type="text" name="surname" id="surname" /></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        <tr>
          <td height="53" colspan="2" valign="top">ID number:</td>
          <td colspan="2" valign="top"><input type="text" name="id" id="id" /></td>
          <td valign="top"></td>
          </tr>
        <tr>
          <td height="53" colspan="2" valign="top">Address: <br/></td>
          <td colspan="2" valign="top"><input type="text" name="address" id="address" /></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        <tr>
          <td height="52" colspan="2" valign="top">Email: </td>
          <td colspan="2" valign="top"><input type="text" name="email" id="email" /></td>
          <td valign="top"></td>
          </tr>
        <tr>
          <td height="54" colspan="2" valign="top">Password: </td>
          <td colspan="2" valign="top"><input type="password" name="password" id="password" /></td>
          <td valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
          </tr>
        <tr>
          <td width="57" height="49">&nbsp;</td>
          <td colspan="2" valign="top"><input type="submit" value="Register" /></td>
          <td width="74">&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
        <tr>
          <td height="27" colspan="5" valign="top"><?php echo $msg;?></td>
          </tr>
        <tr>
          <td height="3"></td>
          <td width="80"></td>
          <td width="93"></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <p><br/>
      </p>
      </form>
    <h2> </h2>
  </div>
</div>
<?php include_once("footer.php"); ?>
</div>
</body>
</html>