<?php

include('controllers/db.php');

$response=array();

global $db;

if(isset($_REQUEST['user_id'])){
		$user_id=$_REQUEST['user_id'];

		$get_branch_count=$db->GetOne("SELECT COUNT(tb_shop_id) as total from tb_shops where 
			client_id=$user_id and active_status=1");

		if($get_branch_count > 0){
		
			$get_measurement_count=$db->GetOne("SELECT COUNT(measurement_id) from tb_measurements where client_id=$user_id and active_status=1");

			if($get_measurement_count > 0){
				$get_tax_count=$db->GetOne("SELECT COUNT(tb_tax_id) from tb_tax_margins where client_id=$user_id and active_status=1");
				if($get_tax_count > 0){

					$get_category_count=$db->GetOne("SELECT COUNT(category_id) from tb_categories where client_id=$user_id and active_status=1");

					if($get_category_count > 0){
						$response['branch_data']=array();
						$get_branch_data=$db->GetArray("SELECT * from tb_shops where client_id=$user_id and active_status=1");

						foreach ($get_branch_data as $row ) {
							$branch_data=array();
							$shop_id=$row['tb_shop_id'];
							$branch_data['shop_name']=$row['tb_shop_name'];
							$branch_data['categories']=array();

							$get_categories=$db->GetArray("SELECT * from tb_categories where shop_id=$shop_id and active_status=1");

							foreach($get_categories as $cat_row) {
								$categories=array();
								$categories['category_id']=$cat_row['category_id'];
								$categories['category_name']=$cat_row['category_name'];

								array_push($branch_data['categories'],$categories);
							}

						array_push($response['branch_data'], $branch_data);
						}
						$response['success']=1;
						$response['message']='parameters set successfully';
						echo json_encode($response);	

					}else{
						$response['success']=400;
						$response['message']='missing tax margins. Create tax margin first';
						echo json_encode($response);
					}
					
				}else{
					$response['success']=300;
					$response['message']='missing tax margins. Create tax margin first';
					echo json_encode($response);
				}
				
			}else{
				$response['success']=200;
				$response['message']='missing measurement units. Create measurement unit first';
				echo json_encode($response);
			}
		}else{
			$response['success']=100;
			$response['message']='missing branch. Create branch first';
			echo json_encode($response);
		}
}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>