<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['id'])&&isset($_REQUEST['new_inv'])){

	$id=$_REQUEST['id'];
	$new_inv=$_REQUEST['new_inv'];

	
	$data=array();

	$data['product_id']=$id;
	$data['movement_type']='STOCK_IN';
	$data['quantity_moved']=$new_inv;
	$data['time_of_movement']=$db->GetOne("select now();");

	$db->AutoExecute('tb_stock_movement',$data, 'INSERT');

	
	$response['success']=1;
	$response['message']='product inventory updated successfully';

	echo json_encode($response);



}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>