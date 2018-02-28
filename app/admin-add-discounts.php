<?php

include('controllers/db.php');

global $db;

$response;
if(isset($_REQUEST['name'])&&isset($_REQUEST['value'])&&isset($_REQUEST['user_id'])){

	$name=$_REQUEST['name'];
	$value=$_REQUEST['value'];
	$user_id=$_REQUEST['user_id'];


	$data=array();

	$data['discount name']=$name;
	$data['discount_value']=$value;
	$data['client_id']=$user_id;
	$data['active_status']='1';

	$db->AutoExecute('tb_discounts',$data, 'INSERT');

	$response['success']=1;
	$response['message']="Discount created Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>
