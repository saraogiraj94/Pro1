<?php
	//The folowing will create a take the new product details fromjava in android and insert into the database

	//Array for json respons which will tell whether the row was inserted into the database or not
	
	$response = array();

	//There will be two if in this one will check whether all fields or attributes where supplied by post
	//Other will check whether there was any error in insertion

	//1st if ussing isset and post variable
	
	if (isset($_POST['name']) && isset($_POST['price']) && $_POST['description'])	{
		
		//Not get data into variables			
		$name=$_POST['name'];
		$price=$_POST['price'];
		$description=$_POST['description'];

		// Include the db_connect.php file 	
		require_once _DIR_ .'/db_connect.php';

		//Connecting to the database by creating an object of db_connect class which will use the connect method 		
		$db=new DB_CONNECT();	

		//Writing the sql insert query by  using mysql_query and storing its ouptut in result variable

		$result=mysql_query("INSERT INTO products(name,price,description) VALUES ('$name','$price','$description')");

		//Now second if that will check whether the row was inserted or not by using result

		if ($result)	{
			$response["success"]=1;
			$response["message"]="Product succesfully created";
			echo json_encode($response);
		
		}
		else	{
			$response["success"]=0;
			$response["message"]="OOPs an Error occured ";
			echo json_encode($response);
		}
	}		
	else	{		
		$response["success"]=0;
		$response["message"]="Required field(s) is missing";
		echo json_encode($response);	
	} 

	
?>
