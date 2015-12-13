<?php
	//We will create an array that willstore the final json response 
	$response=array();
		

	//Inclide the db_connect 
	require_once _DIR_.'/db_connect.php';

	//Connect to the databse by creating the objet of the DB_CONNNECT class
	$db = new DB_CONNECT();			
	
	//Now store the cusror or query into the result variable
	$result = mysql_query("SELECT * FROM products") or die (mysql_error());
	
	//if statement which will check any rows where selected or not by using mql_num_rows() and if select then put the values int the $response array 

	if(mysql_num_rows(($result) > 0 ) )	{
		
		// now will declare assosciated array response which will get all fields 
	
		$response["products"]=array();

		//while loop will be used to fetch one row and then push it to the array 
		while($row=mysql_fetch_array($result))
		{
			//we will make a temorary array
			$products=array();
			$products["pid"] = $row["pid"];
			$products["name"]= $row["name"];
			$products["price"]= $row["price"];
			$products["description"] = $row["description"];
			
			//Now we will push this into the final array					
			array_push($response["products"],$products);		
		}
		//Now will put success of response = 1
		$response["success"]=1;

		//Now will be encode the response in json 
		echo json_encode($response);		
	}
	else	{
		$response["success"]=0;
		$response["message"]="No products found";
			
		echo json_encode($response);
	}		
	
?>
