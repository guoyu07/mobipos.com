<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];
		
		$shops = $db->GetArray("SELECT * FROM `tb_shops` WHERE client_id=$user_id and active_status=1");

		foreach ($shops as $row) {
			$data=array();
			$shop_id=$row["tb_shop_id"];
			$data['shop_id']=$row["tb_shop_id"];
			$data['shop_name']=$row["tb_shop_name"];

			$data['categories']=array();
			$categoriesData=$db->GetArray("SELECT * FROM `tb_categories` WHERE shop_id=$shop_id and active_status=1");

			foreach ($categoriesData as $row_data) {
				$categories=array();

				$categories['category_id']=$row_data["category_id"];
				$categories['category_name']=$row_data["category_name"];

				$categories['products']=array();

				$cat_id=$row_data["category_id"];

				$products_data=$db->GetArray("SELECT tb_products.product_id,tb_products.product_name,tb_product_prices.buying_price,tb_product_prices.selling_price,tb_measurements.measurement_name FROM tb_products INNER JOIN tb_product_prices ON
					tb_product_prices.product_id=tb_products.product_id INNER JOIN tb_measurements ON tb_measurements.measurement_id=tb_products.measurement_type WHERE tb_products.category_id=$cat_id AND tb_products.active_status=1");

				foreach ($products_data as $row_products) {
					$products=array();
					$products['product_id']=$row_products["product_id"];
					$products['product_name']=$row_products["product_name"];
					$products['buying_price']=$row_products["buying_price"];
					$products['selling_price']=$row_products["selling_price"];
					$products['measurement']=$row_products["measurement_name"];

					array_push($categories['products'], $products);
				}

				array_push($data['categories'], $categories);

			}

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