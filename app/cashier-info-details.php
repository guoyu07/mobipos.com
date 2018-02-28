<?php

include('controllers/db.php');

$response=array();

global $db;

$response["data"]=array();



if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];

		$results=$db->GetArray("SELECT * FROM tb_employees WHERE id=$user_id");

		foreach ($results as $row) {
			$data=array();

			$data["name"]=$row["employee_name"];
			$data["employee_id"]=$row["employee_id"];
			$data["phone_number"]=$row["phone_number"];
			$data["email"]=$row["email"];

			array_push($response["data"],$data);
			
		}
			

			$response['success']=1;
			$response['message']='categories pulled';

			echo json_encode($response);

		
		

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>