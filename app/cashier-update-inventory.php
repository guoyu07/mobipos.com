<?php

include('controllers/db.php');

$response=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];
		
			$client_id = $db->GetOne("SELECT client_id FROM `tb_employees` WHERE id=$user_id");

			$results=$db->GetArray("SELECT tb_stock_movement.movement_id,tb_stock_movement.product_id,tb_stock_movement.quantity_moved FROM tb_stock_movement INNER JOIN tb_products ON tb_stock_movement.product_id=tb_products.product_id WHERE tb_products.client_id=$client_id AND tb_stock_movement.sync_status=0");

			$count=0;

			$response['data']=array();

			
				foreach($results as $row) {
				$data=array();

				$data["movement_id"]=$row["movement_id"];
				$data["product_id"]=$row["product_id"];
				$data["quantity"]=$row["quantity_moved"];
				array_push($response['data'], $data);
				$count++;

			
			}
			

			$response['success']=1;
			$response['count']=$count;
			$response['message']='items pulled';

			echo json_encode($response);

		
		

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>