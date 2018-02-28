<?php

include('controllers/db.php');


$response;
if(isset($_REQUEST['user_id'])
&&isset($_REQUEST['product_id'])
&&isset($_REQUEST['alert_type'])
&&isset($_REQUEST['message'])
){

	$user_id=$_REQUEST['user_id'];
	$product_id=$_REQUEST['product_id'];
	$message=$_REQUEST['message'];
	$alert_type=$_REQUEST['alert_type'];

	
	$data=array();

	$client_id=$db->GetOne("SELECT client_id FROM tb_employees WHERE id=$user_id");

	
		$data['product_id']=$product_id;
		$data['client_id']=$client_id;
		$data['alert_message']=$message;
		$data['alert_type']=$alert_type;
		$data['date_of_alert']=$db->GetOne("SELECT now()");
	
		$db->AutoExecute('tb_app_low_stock_alert',$data, 'INSERT');

		$response['success']=1;
		$response['message']="alert pushed successfully";

		echo json_encode($response);

	

	
}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>