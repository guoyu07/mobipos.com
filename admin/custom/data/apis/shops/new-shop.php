<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['name'])){

	$name=$_REQUEST['name'];
	
	$data=array();

	$data['tb_shop_name']=$name;
	$data['client_id']=$user_id;
	$data['active_status']='1';
	
	$db->AutoExecute('tb_shops',$data, 'INSERT');

	$response['success']=1;
	$response['message']="Outlet created Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>