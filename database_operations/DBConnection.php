<?php 
include_once dirname(__FILE__) . '/Constants.php';
	
//Class DbConnect
class DBConnection
{
	//Variable to store database link
	private $con;
 
	//Class constructor
	function __construct(){}
 
	//This method will connect to the database
	function connect()
	{
 
		//connecting to mysql database
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		
 
		//Checking if any error occured while connecting
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
 
		//finally returning the connection link 
		return $this->con;
	}

	//This method will connect to the database
	function connectNoDB()
	{
 
		//connecting to mysql database
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, '');
 
		//Checking if any error occured while connecting
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
 
		//finally returning the connection link 
		return $this->con;
	}
 
}

?>