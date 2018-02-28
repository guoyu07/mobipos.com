<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['id'])){

	$id=$_REQUEST['id'];
	
	$data=array();

	$data['active_status']=0;
	
	$db->AutoExecute('tb_products',$data, 'UPDATE','product_id='.$id);

	
	$response['success']=1;
	$response['message']='product deleted successfully';

	echo json_encode($response);



}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>