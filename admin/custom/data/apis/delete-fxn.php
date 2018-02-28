<?php

include('./db.php');
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['id'])&&isset($_REQUEST['tb_name'])&&isset($_REQUEST['col_name'])){

	$id=$_REQUEST['id'];
	$tb_name=$_REQUEST['tb_name'];
	$col_name=$_REQUEST['col_name'];
	$clause=$col_name.'='.$id;
	
	$data=array();

	$data['active_status']=0;
	
	$db->AutoExecute($tb_name,$data, 'UPDATE',$clause);

	
	$response['success']=1;
	$response['message']='Deleted successful';

	echo json_encode($response);



}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>