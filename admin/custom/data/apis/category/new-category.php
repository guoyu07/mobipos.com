<?php

include("../db.php");
require_once("../dbconfig.php");
@session_start();
global $db;

$user_id=$_SESSION['user']['userid'];

$response;
if(isset($_REQUEST['category_name'])&&isset($_REQUEST['branch'])){

	$cat_name=$_REQUEST['category_name'];
	$branch=$_REQUEST['branch'];

	$shop_id=$db->GetOne("select tb_shop_id from tb_shops where tb_shop_name = '$branch' AND client_id='$user_id'");
	
	$data=array();

	$data['category_name']=$cat_name;
	$data['client_id']=$user_id;
	$data['shop_id']=$shop_id;
	$data['active_status']='1';
	
	$db->AutoExecute('tb_categories',$data, 'INSERT');

	$response['success']=1;
	$response['message']="Category created Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>