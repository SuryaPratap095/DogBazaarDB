<?php
	define('DB_USER',"root");
	define('DB_PASSWORD',"");
	define('DB_DATABASE',"dogbazaar");
	define('DB_SERVER',"localhost");
	
	$con=mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die('unable to connect');
	
	//require_once(db_connect2.php);
	
	$sql="SELECT dog_id FROM DOGS";
	
	$r=mysqli_query($con,$sql);
	
	$result=array();

	

		
	//header('content-type: image/jpeg');

	$url="http://localhost/dogbazaar/get_all.php?dog_id=";
	
	while($row=mysqli_fetch_array($r)){
		array_push($result,array('url'=>$url.$row['dog_id']));
	}
	
	
	echo json_encode(array("result"=>$result));
	
	
	/*while($row=mysqli_fetch_array($r)){
		array_push($result,array(
		"dog_id"=>$row['dog_id'],
		"dog_name"=>$row['dog_name'],
		"dog_color"=>$row['dog_color']
		"dog_image"=>$row['dog_image']));				
	}*/
	
	//echo base64_decode($result['image']);
		//echo json_encode($result);
	
	//echo json_encode(array('result'=>$result));
	
	mysqli_close($con);
	
?>