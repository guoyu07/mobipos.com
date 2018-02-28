<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['id'])&&
	isset($_REQUEST['name'])&&
	isset($_REQUEST['measure'])){

	$id=$_REQUEST['id'];
	$name=$_REQUEST['name'];
	$measure=$_REQUEST['measure'];
	
	$measure_id = $db->GetOne("select measurement_id from tb_measurements where 
		measurement_name = '$measure' and client_id=$user_id");
	

	$data=array();

	$data['product_name']=$name;
	$data['measurement_type']=$measure_id;
	
	$db->AutoExecute('tb_products',$data, 'UPDATE','product_id='.$id);

	
	$response['success']=1;
	$response['message']='product updated successfully';

	echo json_encode($response);



}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>