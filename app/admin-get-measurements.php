<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];
		
		$results=$db->GetArray("SELECT * FROM `tb_measurements` where client_id=$user_id and active_status=1");

		foreach ($results as $row) {
			$data=array();
			$data["measurement_id"]=$row["measurement_id"];
			$data["measurement_name"]=$row["measurement_name"];
			$data["single_unit"]=$row["single_unit"];
			
			array_push($response['data'],$data);

		}
		$response['success']=1;
	

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>