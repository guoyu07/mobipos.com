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