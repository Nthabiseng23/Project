<?php 
class Connect
{
	private $localhost="localhost";
	private $username="root";
	private $password="";
	private $database_name="Project_db";
	private $db;
	
	
	public function __construct()
	{
		
	}
	
	//the method creates a connection of the database called e_shopping_db
		function connect()
	{
		$this->db=new MySQLi($this->localhost,$this->username,$this->password,$this->database_name)or die("could not connect");
		
		return $this->db;
	
	}
	//Database connection here..
   

    //checking if the connection is established
    /*function connect()
	{
	 $db_connection  =   mysql_connect('localhost', 'root', '');
	if(!$db_connection)
    {
        echo 'ERROR: '.mysql_error().', <br />Your Username or password maybe incorrect';
    }

    //This is the database selection
    $query          =   mysql_select_db('project_db');

    //check if the is found or not.
    if(!$query)
    {
        echo 'ERROR: '.mysql_error().', <br />Check if it is the right database selected';
    }
	
	 }*/
}

?>