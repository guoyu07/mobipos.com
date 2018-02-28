<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];

    $branch_id=$db->GetOne("SELECT outlet_posted FROM `tb_employees` WHERE id=$user_id");

		$printers = $db->GetArray("SELECT * FROM `tb_printers` WHERE branch_id=$branch_id and active_status=1");

		foreach ($printers as $row) {
			$data=array();

			$data['id']=$row["id"];
			$data['printer_name']=$row["tb_printer_name"];
      $data['printer_mac']=$row["tb_printer_mac"];
			array_push($response['data'], $data);
		}
		$response['success']=1;
		$response['message']='data retrieved successfully';

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>
