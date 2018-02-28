<?php

include('controllers/db.php');


$response;
if(isset($_REQUEST['user_id'])
&&isset($_REQUEST['order_id'])
&&isset($_REQUEST['amount_total'])
&&isset($_REQUEST['app_sale_id'])
&&isset($_REQUEST['trans_type'])
&&isset($_REQUEST['trans_code'])
&&isset($_REQUEST['date'])

){

	$user_id=$_REQUEST['user_id'];
	$order_id=$_REQUEST['order_id'];
	$amount_total=$_REQUEST['amount_total'];
	$app_sale_id=$_REQUEST['app_sale_id'];
	$trans_type=$_REQUEST['trans_type'];
	$trans_code=$_REQUEST['trans_code'];
	$date=$_REQUEST['date'];
	

	$order_count=$db->GetOne("SELECT COUNT(order_id) FROM tb_app_sales WHERE order_id='$order_id'");

	if($order_count==1){
		$response['success']=0;
		$response['message']="order already exists";

		echo json_encode($response);
	}else{
		//$date_format=date($date);

	
	$data=array();

	//$data['app_sale_id']=$app_sale_id;
	$data['order_id']=$order_id;
	$data['amount_total']=$amount_total;
	$data['transaction_type']=$trans_type;
	$data['transaction_code']=$trans_code;
	$data['employee_id']=$user_id;
	$data['date_of_sale']=$date;
	
	$db->AutoExecute('tb_app_sales',$data, 'INSERT');

	$response['order_no']=$order_id;
	$response['date']=$date;
	$response['success']=1;
	$response['message']="sale sync Successfully";

	echo json_encode($response);
	}


	

}else{
	$response['success']=0;
	$response['message']="Some information required MASHIDA TUPU";

		echo json_encode($response);
}
?>