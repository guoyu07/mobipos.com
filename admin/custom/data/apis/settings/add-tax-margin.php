<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['tax_margin'])&&isset($_REQUEST['mode'])){

	$tax_margin=$_REQUEST['tax_margin'];
	$mode=$_REQUEST['mode'];
	
	$data=array();

	$data['tax_margin']=$tax_margin;
	$data['client_id']=$user_id;
	$data['margin_mode']=$mode;
	$data['active_status']='1';
	
	$db->AutoExecute('tb_tax_margins',$data, 'INSERT');

	$response['success']=1;
	$response['message']="VAT created Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>