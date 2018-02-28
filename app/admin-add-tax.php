<?php

include('controllers/db.php');

global $db;

$response;
if(isset($_REQUEST['mode'])&&isset($_REQUEST['user_id'])&&isset($_REQUEST['margin'])){

	$mode=$_REQUEST['mode'];
	$user_id=$_REQUEST['user_id'];
	$margin=$_REQUEST['margin'];
	
	$data=array();

	$data['tax_margin']=$margin;
	$data['margin_mode']=$mode;
	$data['client_id']=$user_id;
	$data['active_status']='1';
	
	$db->AutoExecute('tb_tax_margins',$data, 'INSERT');

	$response['success']=1;
	$response['message']="Tax created Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>