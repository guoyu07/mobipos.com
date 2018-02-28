<?php

include('controllers/db.php');


$response;
if(isset($_REQUEST['user_id'])
&&isset($_REQUEST['order_id'])
&&isset($_REQUEST['date'])
){

	$user_id=$_REQUEST['user_id'];
	$order_id=$_REQUEST['order_id'];
	$date=$_REQUEST['date'];

	
	$data=array();

	$order_count=$db->GetOne("SELECT COUNT(order_no) FROM tb_app_orders WHERE order_id='$order_id'");

	if($order_count==1){
		$response['success']=0;
		$response['message']="order already exists";

		echo json_encode($response);
	}else{
		$data['order_no']=$order_id;
		$data['employee_id']=$user_id;
		$data['date_of_sale']=$date;
	
		$db->AutoExecute('tb_app_orders',$data, 'INSERT');

		$response['success']=1;
		$response['message']="sync orders Successfully";

		echo json_encode($response);

	}

	
}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>