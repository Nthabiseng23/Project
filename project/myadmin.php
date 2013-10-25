<?php
session_start();
//the admin is able to update user on the list information which wil be  displayed on the  form called index.php
$DOCUMENT_ROOT=$_SERVER['DOCUMENT_ROOT'];
$data="";
$text="";
$msg="";
	$fp=fopen("news.txt",'rb');
	while(!feof($fp))
	{
		$text.=fgets($fp);
	}
	fclose($fp);
	
if(!isset($_SESSION['admin']))
{
	header("Location: admin_login.php");	
	session_destroy();

}

if(isset($_POST['logOut']))
{
	header("Location: admin_login.php");	
	session_destroy();
}
	
if(isset($_POST['update']))
{
	if($_POST['newsletter'])
	{
		$text=$_POST['newsletter'];
		$data=$text;
		$fp=fopen("news.txt",'w');
		fwrite($fp,$data,strlen($text));	
		fclose($fp);
		$msg="News updated successfully!";
		//echo "News updated successfully! <a href='myadmin.php'>Click here</a>";
		//exit;
	}
	else
	{
		$msg= "Please write the text to update the news";
		//echo "Please write the text to update the news <a href='myadmin.php'>Click here</a>";	
		//exit;
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update News</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen">


</head>

<body>
<?php include_once("header.php"); ?>
<?php include_once("mid.php"); ?>
<form action="myadmin.php" method="post">
<div id="content" align="center">
<h2><strong> NEWS UPDATES</strong></h2>
<p><br/>
    <textarea name="newsletter" cols="35" rows="20"><?php echo $text; ?></textarea>
    <br/>
    <br/>
    <input type="submit" value="update" name="update"/>
    </p>
<p><?php echo $msg;?><br/>
</p>
<div align="left"><input type="submit" value="logOut" name="logOut"/></div>
  <p>&nbsp;</p>

</div>
</form>
<?php include_once("footer.php"); ?>

</body>
</html>
