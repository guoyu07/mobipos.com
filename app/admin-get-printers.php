<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];

    $branch_ids=$db->GetArray("SELECT * FROM `tb_shops` WHERE clinet_id=$user_id where active_status=1");



		foreach ($branch_ids as $row) {

			$data=array();
			$data['branch_name']=$row["tb_shop_name"];
			$branch_id=$row["tb_shop_id"];

				$printers = $db->GetArray("SELECT * FROM `tb_printers` WHERE branch_id=$branch_id and active_status=1");

				$data["branch_printers"]=array();
				foreach ($printers as $p_row) {
								$branch_printers=array();
								$branch_printers['id']=$p_row["id"];
								$branch_printers['printer_name']=$p_row["tb_printer_name"];
								$branch_printers['printer_mac']=$p_row["tb_printer_mac"];

								array_push($response['branch_printers'], $branch_printers);
				}

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
