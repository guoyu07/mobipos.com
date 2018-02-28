<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];
		
		$client_id=$db->GetOne("SELECT client_id FROM `tb_employees` WHERE id=$user_id ");

		$results=$db->GetArray("SELECT * FROM tb_tax_margins WHERE client_id=$client_id and active_status=1 and sync_status=0");

		foreach ($results as $row) {
			$data=array();
			$data["tb_tax_id"]=$row["tb_tax_id"];
			$data["tax_margin"]=$row["tax_margin"];
			$data["margin_mode"]=$row["margin_mode"];
			
			array_push($response['data'],$data);

		}
		$response['success']=1;
	

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>