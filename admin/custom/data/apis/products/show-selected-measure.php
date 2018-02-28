<?php

include("../db.php");
require_once("../dbconfig.php");

global $db;

$response;
if(isset($_REQUEST['id'])){

	
	$id=$_REQUEST['id'];
	$row_id = $db->GetRow("select * from tb_measurements where measurement_id =$id");

	if($row_id){
		$unit=$row_id["single_unit"];
		$response['success']=1;
		$response['message']=$row_id['measurement_name'];
		echo json_encode($response);
	}else{
		$response['success']=0;
		$response['message']="Error in retreving the measurement name";
		echo json_encode($response);
	}

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>