<?php

include('controllers/db.php');

global $db;

$response;
if(isset($_REQUEST['name'])&&isset($_REQUEST['user_id'])){

	$name=$_REQUEST['name'];
	$user_id=$_REQUEST['user_id'];
	
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