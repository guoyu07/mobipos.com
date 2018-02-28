<?php

include('controllers/db.php');


$response;
if(isset($_REQUEST['user_id'])
&&isset($_REQUEST['branch_id'])
&&isset($_REQUEST['category_name'])
){

	$user_id=$_REQUEST['user_id'];
	$branch_id=$_REQUEST['branch_id'];
	$category_name=$_REQUEST['category_name'];

	
	$data=array();

	$data['category_name']=$category_name;
	$data['client_id']=$user_id;
	$data['shop_id']=$branch_id;
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