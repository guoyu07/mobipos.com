<?php

include('controllers/db.php');

$response=array();

global $db;

if(isset($_REQUEST['branch_id'])){

		$branch_id=$_REQUEST['branch_id'];

			$categories=$db->GetArray("SELECT * FROM tb_categories where shop_id=$branch_id AND active_status
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

		
		

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>