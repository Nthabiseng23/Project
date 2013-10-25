<?php
require("sql_scripts.class.php");
class admin extends sql_commands
{
	//the method recieve the three ain parameters which contain information/ values recieved by admin_login.php and invoke the login method from sql_scripts.class.php
	function check($username,$password,$type)
	{
		$msg="";
		if(isset($username)&&isset($password)&&isset($type))
		{
			$msg= sql_commands::Login($username,$password,$type);
		}
		
		
		return $msg;
	}


}
?>