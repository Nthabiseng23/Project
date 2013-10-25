<?php
    include 'classes/connect_to_mysql.class.php';

if(isset($_POST['check_user']))
{
    if(!$_POST['username'] || !$_POST['id_number'])
    {
        $error_string  .= '<br />Enter both username and your ID number';
    }else{

        if(!get_magic_quotes_gpc()){
            $_POST['username'] = addslashes($_POST['username']);
        }

            $check = mysql_query("SELECT * FROM users WHERE name ='".$_POST['username']."'") or die(mysql_error());

            //Do the login process
            $check2 = mysql_num_rows($check);

            if(($check2 == 0) && !$error_string)
            {
                $error_string  .= 'Unknown user, please try again';
            }
            if(!$error_string){
            while ($row1 = mysql_fetch_array($check) ) {

                if($_POST['id_number'] != $row1['id_number'])
                {
                    $error_string  .=   'Wrong ID number, please try again';
                }else
                {
                    $hour = time() + 36000;
                    setcookie('ID_my_site', $_POST['username'], $hour);
                    setcookie('Key_my_site', $_POST['id_number'], $hour);

                    header('Location:new_password.php');
                }

            }}
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
      <td width="109">Username</td>
      <td width="168"><input name="username" type="text" id="username" /></td>
    </tr>
    <tr>
      <td>ID Number </td>
      <td><input name="id_number" type="text" id="id_number" />      </td>
    </tr>
    <tr>
      <td><input type="submit" name="check_user" value="Submit" /></td>
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
