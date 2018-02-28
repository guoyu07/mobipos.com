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
			$branchId = $db->GetOne("SELECT outlet_posted FROM `tb_employees` WHERE id=$user_id");

			$categories=$db->GetArray("SELECT * FROM tb_categories where shop_id=$branchId AND active_status
				=1");
			$response['data']=array();

			
				foreach($categories as $row) {
				$data=array();

				$data["cat_id"]=$row["category_id"];
				$data["cat_name"]=$row["category_name"];

				array_push($response['data'], $data);
				

			
			}
			

			$response['success']=1;
			$response['message']='categories pulled';

			echo json_encode($response);

		}
		

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>