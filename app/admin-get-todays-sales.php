<?php

include('controllers/db.php');
global $db;


if(isset($_REQUEST['user_id'])){

	$id=$_REQUEST['user_id'];

	$shops=$db->GetArray("SELECT * FROM tb_shops where client_id='$id' and active_status=1");
	$response['shops']=array();
	foreach ($shops as $row) {

		
		$shops=array();

		$shops['shop_id']=$row["tb_shop_id"];
		$shops['shop_name']=$row["tb_shop_name"];

		$shopId=$row['tb_shop_id'];
		$total_today_sales=$db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_app_sales.date_of_sale >= CURDATE() AND tb_employees.outlet_posted=$shopId");

		$total_today_inventory=$db->GetOne("SELECT SUM(tb_app_stock_movement.count * tb_product_prices.buying_price) AS TOTAL FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_app_stock_movement.product_id=tb_product_prices.product_id INNER JOIN tb_products ON tb_product_prices.product_id=tb_products.product_id INNER JOIN tb_categories ON tb_categories.category_id=tb_products.category_id WHERE tb_app_stock_movement.date_of_movement >=CURDATE() 
AND tb_categories.shop_id=$shopId");

	

		if($total_today_sales==null){
			$total_today_sales=0;
		}if($total_today_inventory==null){
			$total_today_inventory=0;
		}

	
		$shops['total_today_sale']=$total_today_sales;
		$shops['total_today_inventory']=$total_today_inventory;

		array_push($response['shops'],$shops);
	}
	$response['success']=1;
	echo json_encode($response);

}else{
	
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);

}

?>