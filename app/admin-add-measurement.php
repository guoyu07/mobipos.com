<?php

include('controllers/db.php');

global $db;

$response;
if(isset($_REQUEST['name'])&&isset($_REQUEST['user_id'])&&isset($_REQUEST['single_unit'])){

	$name=$_REQUEST['name'];
	$user_id=$_REQUEST['user_id'];
	$single_unit=$_REQUEST['single_unit'];
	
	$data=array();

	$data['measurement_name']=$name;
	$data['single_unit']=$single_unit;
	$data['client_id']=$user_id;
	$data['active_status']='1';
	
	$db->AutoExecute('tb_measurements',$data, 'INSERT');

	$response['success']=1;
	$response['message']="Measurement created Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>