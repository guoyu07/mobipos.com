<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['id'])&&isset($_REQUEST['name'])){

	$id=$_REQUEST['id'];
	$name=$_REQUEST['name'];


	$data=array();

	$data['tb_shop_name']=$name;

	$db->AutoExecute('tb_shops',$data, 'UPDATE','tb_shop_id='.$id);

	$response['success']=1;
	$response['message']="Retail updated Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>