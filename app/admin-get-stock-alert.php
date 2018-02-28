<?php

include('controllers/db.php');


$response["data"]=array();
if(isset($_REQUEST['user_id'])
){

	$user_id=$_REQUEST['user_id'];
	
	
	$data=array();

		$results=$db->GetArray("SELECT * FROM tb_app_low_stock_alert where client_id=$user_id and view_status=0 GROUP BY product_id ORDER BY alert_id desc");


		foreach ($results as $row) {
			$product_id=$row["product_id"];
			$last_message=$db->GetOne("SELECT alert_message FROM tb_app_low_stock_alert where product_id=$product_id ORDER BY alert_id DESC limit 1");
			$last_alert=$db->GetOne("SELECT alert_type FROM tb_app_low_stock_alert where product_id=$product_id ORDER BY alert_id DESC limit 1");
			$product_name=$db->GetOne("SELECT product_name FROM tb_products where product_id=$product_id");
			$category_id=$db->GetOne("SELECT category_id FROM tb_products where product_id=$product_id");
			$category_name=$db->GetOne("SELECT category_name FROM tb_categories where category_id=$category_id");

			 $stock_in=$db->GetOne("SELECT SUM(quantity_moved) as total FROM `tb_stock_movement` WHERE
         product_id=$product_id");
        $stock_out=$db->GetOne("SELECT SUM(count) as total FROM `tb_app_stock_movement` WHERE product_id=$product_id");
        $stock_remaining=$stock_in-$stock_out;

			$data=array();
			$data["product_id"]=$product_id;
			$data["product_name"]=$product_name;
			$data["category_name"]=$category_name;
			$data["message"]=$last_message;
			$data["alert_type"]=$last_alert;
			$data["remainder"]=$stock_remaining;

			array_push($response["data"],$data);
		}

		$response['success']=1;
		$response['message']="alerts pulled successfully";

		echo json_encode($response);

	
}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>