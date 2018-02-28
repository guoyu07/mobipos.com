<?php

include('controllers/db.php');

$response['result']=array();

if(isset($_REQUEST['employee_id'])){

		$employee_id=$_REQUEST['employee_id'];
		$outlet;

		$row = $db->GetRow("select * from tb_employees where employee_id='$employee_id' AND active_status=1");

		if($row){
			if($row['active_status']=='1'){
				$result=array();

				$result['user_id']=$row['id'];
				$result['username']=$row['employee_name'];
				$result['email']=$row['email'];
				$result['client_id']=$row['client_id'];
				$result['employee_id']=$employee_id;
				$result['branchId']=$row['outlet_posted'];
				$result['phoneNumber']=$row['phone_number'];
				$outlet=$row['outlet_posted'];
				

				
				array_push($response['result'], $result);
				
				$branchname=$db->GetOne('SELECT tb_shop_name FROM `tb_shops` WHERE tb_shop_id='.$outlet);
				$response['branchId']=$outlet;
				$response['branchname']=$branchname;
				$response['success']=1;
				$response['message']='Check successful';

				echo json_encode($response);

			}else{
				$response['success']=0;
				$response['message']='Your account is inactive';
				echo json_encode($response);
			}
		}else{
			$response['success']=0;
			$response['message']='Incorrect employee id';
			echo json_encode($response);

		}

}else{
	$response['success']=0;
	$response['message']='some information is required';

	echo json_encode($response);
}

?>