<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$id=$_REQUEST['user_id'];
		
		
						$results=$db->GetArray("SELECT * FROM `tb_employees` inner join tb_shops on tb_shops.tb_shop_id=tb_employees.outlet_posted WHERE tb_shops.client_id=$id AND tb_employees.active_status=1");

						foreach ($results as $row) {
							$data=array();
							$out_id=$row['outlet_posted'];
							$data['employee_id']=$row['employee_id'];
							$data['employee_name']=$row['employee_name'];
							$data['branch']=$db->GetOne("SELECT tb_shops.tb_shop_name FROM `tb_shops` inner join tb_employees on tb_employees.outlet_posted=tb_shops.tb_shop_id where tb_employees.outlet_posted=$out_id");
							
							array_push($response['data'],$data);
						}

						$response['success']=1;
						$response['message']='Employees retrieved successfully';
						echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>