<?php

include('controllers/db.php');

$response=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];
		
		$active_status=$db->GetOne("SELECT active_status FROM `tb_employees` WHERE id=$user_id");

		if($active_status=="0"){
			$response['success']=2;
			$response['message']='Account inactive contact Administrator';

			echo json_encode($response);
		}else{
			$shopId = $db->GetOne("SELECT outlet_posted FROM `tb_employees` WHERE id=$user_id");

			$results=$db->GetArray("SELECT tb_products.product_id,tb_products.product_name,tb_categories.category_id,tb_measurements.measurement_name,tb_shops.tb_shop_name FROM tb_products INNER JOIN tb_categories ON tb_categories.category_id=tb_products.category_id INNER JOIN tb_measurements ON tb_measurements.measurement_id=tb_products.measurement_type INNER JOIN tb_shops ON tb_shops.tb_shop_id=tb_categories.shop_id WHERE tb_shops.tb_shop_id=$shopId");
			$response['data']=array();

			
				foreach($results as $row) {
				$data=array();

				$data["product_id"]=$row["product_id"];
				$data["product_name"]=$row["product_name"];
				$data["category_id"]=$row["category_id"];
				$data["measurement_name"]=$row["measurement_name"];

				array_push($response['data'], $data);
				

			
			}
			

			$response['success']=1;
			$response['message']='items pulled';

			echo json_encode($response);

		}
		

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>