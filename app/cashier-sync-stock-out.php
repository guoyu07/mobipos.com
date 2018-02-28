<?php

include('controllers/db.php');


$response;
if(isset($_REQUEST['user_id'])
&&isset($_REQUEST['id'])
&&isset($_REQUEST['product_id'])
&&isset($_REQUEST['movement_type'])
&&isset($_REQUEST['count'])
&&isset($_REQUEST['sale_id'])
&&isset($_REQUEST['date'])
){

	$user_id=$_REQUEST['user_id'];
	$id=$_REQUEST['id'];
	$product_id=$_REQUEST['product_id'];
	$movement_type=$_REQUEST['movement_type'];
	$count=$_REQUEST['count'];
	$sale_id=$_REQUEST['sale_id'];
	$date=$_REQUEST['date'];

	
	$data=array();

	
	$data['tb_app_move_id']=$id;
	$data['product_id']=$product_id;
	$data['count']=$count;
	$data['employee_id']=$user_id;
	$data['movement_type']=$movement_type;
	$data['sale_id']=$sale_id;
	$data['date_of_movement']=$date;
	
	$db->AutoExecute('tb_app_stock_movement',$data, 'INSERT');

	$response['success']=1;
	$response['message']="sync stock out Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>