<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['measure_name'])&&isset($_REQUEST['unit'])){

	$measure_name=$_REQUEST['measure_name'];
	$unit=$_REQUEST['unit'];
	
	$data=array();

	$data['measurement_name']=$measure_name;
	$data['single_unit']=$unit;
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