<?php

include("../db.php");
require_once("../dbconfig.php");

global $db;

$response['data']=array();
if(isset($_REQUEST['id'])){

	$id=$_REQUEST['id'];
	$category_count=$db->GetOne("select Count(category_id) as total from tb_categories where shop_id=$id and active_status=1");

	if($category_count != "0"){
		
		$result = $db->GetArray("select * from tb_categories where shop_id = '$id' AND active_status=1");

		foreach ($result as $row) {
			$data=array();
			$data['id']=$row['category_id'];
			$data['name']=$row['category_name'];

			array_push($response['data'], $data);
		}
		$response['success']=1;
		$response['message']="data retrieved successfully";

		echo json_encode($response);
	}else{
		$response['success']=2;
		$response['message']=$id;

		echo json_encode($response);
	}

	
	

}else{
	$response['success']=0;
	$response['message']="Some information required";

	echo json_encode($response);
}
?>