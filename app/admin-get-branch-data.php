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