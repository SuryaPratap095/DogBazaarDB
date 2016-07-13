<?php
	
	//$response=array();
	
	require_once __DIR__.'/db_connect.php';
	
	$db= new DB_CONNECT();
	
	$result=mysql_query("Select dog_id, dog_name, dog_image,
						dog_breed, dog_weight, dog_height, dog_color, 
						dog_description from dogs") or die (mysql_error());
	
	if(mysql_num_rows($result)>0){
		//echo("In if Loop");
		$dogs=array();		
		while($row=mysql_fetch_array($result)){			
			//$dog=array();
			//echo ("In while loop");
			$dog["dog_id"]=$row["dog_id"];
			$dog["dog_name"]=$row["dog_name"];
			$dog["dog_image"]=base64_encode($row["dog_image"]);
			$dog["dog_breed"]=$row["dog_breed"];
			$dog["dog_weight"]=$row["dog_weight"];
			$dog["dog_height"]=$row["dog_height"];
			$dog["dog_color"]=$row["dog_color"];
			$dog["dog_description"]=$row["dog_description"];
			//echo ("In while loop");
			array_push($dogs,$dog); 
			
		}
		$response["success"]=1;
		
		echo json_encode(array("dogs"=>$dogs));
	}
	else{
		$response["success"]=0;
		$response["message"]="No products found";
		
		echo json_encode($response);
	}
?>