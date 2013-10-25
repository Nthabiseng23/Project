<?php
    //db connection
     include 'classes/connect_to_mysql.class.php';

if(isset ($_COOKIE['ID_my_site'])){

//if there's a cookie it logs you and directs you to the members page
$username   = $_COOKIE['ID_my_site'];
$id_num     = $_COOKIE['Key_my_site'];

$check = mysql_query("SELECT * FROM users WHERE name = '$username'") or die (mysql_error());
while ($row = mysql_fetch_array($check))
{
    if($id_num != $row['id_number'])
    {

    }else{

//validations
if(isset ($_POST['save']))
{
    if(!$_POST['new_password'])
    {
        $error_string .= '<br />Password can not be empty';
    }
    if(!$_POST['con_password'])
    {
        $error_string .= '<br />You must confirm you password';
    }

    if(!$error_string)
    {
        if($_POST['new_password'] != $_POST['con_password'])
        {
            $error_string .= 'Your passwords does not match';
        }else {

            $insert = mysql_query('UPDATE users SET user_password = "'.$_POST['new_password'].'"
                        WHERE name = "'.$_COOKIE['ID_my_site'].'"');

            if($insert)
            {
                $error_string .= '<br />Your password is successfuly changed<br /> <a href="user_login.php" title="Click here to go back to login page">Login</a>';
            }
        }
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
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
 
<form action="" method="post">
<div id="content">
 <?php echo  $error_string ;?>
  <p>&nbsp;</p>
  <table width="293" border="1">
    <tr>
      <td width="133">NewPassword</td>
      <td width="144"><input name="new_password" type="text" id="new_password" /></td>
    </tr>
    <tr>
      <td>Confirm Password </td>
      <td><input name="con_password" type="text" id="con_password" />      </td>
    </tr>
    <tr>
      <td><input type="submit" name="save" value="Submit" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
 
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
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
