<?php

include('controllers/db.php');

$response=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];

			$discounts=$db->GetArray("SELECT * FROM tb_discounts where client_id=$user_id AND active_status
				=1");
			$response['data']=array();


				foreach($discounts as $row) {
				$data=array();

       		    $data["id"]=$row["id"];
				$data["discount_name"]=$row["discount name"];
				$data["discount_value"]=$row["discount_value"];

				array_push($response['data'], $data);



			}


			$response['success']=1;
			$response['message']='categories pulled';

			echo json_encode($response);




}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>
