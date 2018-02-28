<?php

include('controllers/db.php');


$response;
if(isset($_REQUEST['product_id'])
){

	$product_id=$_REQUEST['product_id'];
	
	$data=array();

	$data['sync_status']='1';

	$db->AutoExecute('tb_stock_movement',$data, 'UPDATE','product_id='.$product_id);

	$response['success']=1;
	$response['message']="movement updated Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>