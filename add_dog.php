<?php
	$response=array()
	
	if(isset($_POST['dog_name']) && isset($_POST['dog_image'])
		&& isset($_POST['dog_breed']) && isset($_POST['dog_height'])
		&& isset($_POST['dog_weight']) && isset($_POST['dog_color'])
		&& isset($_POST['dog_description'])){
			
			$dog_name=$_POST['dog_name'];
			$dog_image=$_POST['dog_image'];
			$dog_breed=$_POST['dog_breed'];
			$dog_height=$_POST['dog_height'];
			$dog_weight=$_POST['dog_weight'];
			$dog_color=$_POST['dog_color'];
			$dog_description=$_POST['dog_description'];
			
			require_once __DIR__ .'/db_connect.php';
			
			$db=new DB_CONNECT();
			
			$result=mysql_query("INSERT INTO dogs (dog_name, dog_image, dog_breed, dog_height, dog_weight, dog_color, dog_description)
								values('$dog_name', '$dog_image', '$dog_breed', '$dog_height', '$dog_weight', '$dog_color', '$dog_description')");
								
			if($result){
				$response["success"]=1;
				$response["message"]="Row successfully added";
				
				echo json_encode($response);
			}
			else{
				$response["success"]=0;
				$response["message"]="Error occured, row not added";
				
				echo json_encode($response);
			}
		}
		else{
			$response["success"]=0;
			$response["message"]="Required fields missing";
			
			echo json_encode($response);
		}

?>