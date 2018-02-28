<?php

include('controllers/db.php');
global $db;

$response;
if(isset($_REQUEST['user_id'])&&
	isset($_REQUEST['product_name'])&&
	isset($_REQUEST['category_id'])&&
	isset($_REQUEST['shop_id'])&&
	isset($_REQUEST['measure'])&&
	isset($_REQUEST['selling_price'])&&
	isset($_REQUEST['buying_price'])&&
	isset($_REQUEST['tax_mode'])&&
	isset($_REQUEST['low_stock_count'])&&
	isset($_REQUEST['initial_stock'])){

	$user_id=$_REQUEST['user_id'];
	$product_name=$_REQUEST['product_name'];
	$cat_id=$_REQUEST['category_id'];
	$initial_stock=$_REQUEST['initial_stock'];
	$shop_name=$_REQUEST['shop_id'];
	$measure_id=$_REQUEST['measure'];
	$selling_price=$_REQUEST['selling_price'];
	$buying_price=$_REQUEST['buying_price'];
	$tax_mode=$_REQUEST['tax_mode'];
	$low_stock_count=$_REQUEST['low_stock_count'];
	

	// $cat_id=$db->GetOne("select tb_categories.category_id from tb_categories inner join tb_shops on 
	// tb_shops.tb_shop_id=tb_categories.shop_id where tb_categories.category_name = '$category_name' AND tb_shops.tb_shop_name='$shop_name'");

	// $measure_id = $db->GetOne("select measurement_id from tb_measurements where 
	// 	measurement_name = '$measure' and client_id=$user_id");
	

	$data=array();

	$data['product_name']=$product_name;
	$data['category_id']=$cat_id;
	$data['client_id']=$user_id;
	$data['measurement_type']=$measure_id;
	$data['tax_mode']=$tax_mode;
	$data['low_stock_count']=$low_stock_count;
	$data['active_status']='1';
	
	$db->AutoExecute('tb_products',$data, 'INSERT');

	$product_id=$db->GetOne("SELECT product_id from tb_products where category_id=$cat_id ORDER BY product_id DESC LIMIT 1");

	$stock_data=array();
	$stock_data['product_id']=$product_id;
	$stock_data['opening_stock']=$initial_stock;

	$db->AutoExecute('tb_stocks',$stock_data, 'INSERT');

	$movement_data=array();
	$movement_data['product_id']=$product_id;
	$movement_data['quantity_moved']=$initial_stock;
	$movement_data['movement_type']='STOCK_IN';
	$movement_data['client_id']=$user_id;
	$movement_data['time_of_movement']=$db->GetOne("select now();");


	$db->AutoExecute('tb_stock_movement',$movement_data, 'INSERT');

	$price=array();
	$price['product_id']=$product_id;
	$price['buying_price']=$buying_price;
	$price['selling_price']=$selling_price;
	$price['date_of_update']=$db->GetOne("select now();");


	$db->AutoExecute('tb_product_prices',$price, 'INSERT');

	$response['success']=1;
	$response['message']='product inserted successfully';

	echo json_encode($response);



}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>