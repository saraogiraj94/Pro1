<?php
class DB_CONNECT {
	//Constructor
	function _constructor(){
		$this->connect();	
	}
	
	//Destructor
	function _destructor(){
		$this->close();
	}

	//Connect Function which will connect to database
	function connect(){
		//import database connecting variables 
		require_once _DIR_ . '/db_config.php';	
	
		
		//Connecting to the database
		$con = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die (mysql_error());

		//Selecting the database
		$db=mysql_select_db(DB_DATABASE) or die (mysql_error());
			
		return $con;	
	}

	//Function to close the database
	function close(){
		//closing databse command
		mysql_close();	
	}
	
}

?>
