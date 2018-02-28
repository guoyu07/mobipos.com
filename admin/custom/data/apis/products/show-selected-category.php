<?php

include("../db.php");
require_once("../dbconfig.php");

global $db;

$response;
if(isset($_REQUEST['id'])){

	
	$id=$_REQUEST['id'];
	$row_id = $db->GetRow("select * from tb_categories where category_id = '$id'");

	if($row_id){
		$response['success']=1;
		$response['message']=$row_id['category_name'];
		echo json_encode($response);
	}else{
		$response['success']=1;
		$response['message']="Error in retreving the category name";
		echo json_encode($response);
	}

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>