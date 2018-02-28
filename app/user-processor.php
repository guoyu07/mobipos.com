<?php

include('controllers/db.php');

$response['result']=array();

if(isset($_REQUEST['email'])&&isset($_REQUEST['password'])){

		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];

		$row = $db->GetRow("select * from tb_users where email = '$email' and password = '" . md5(sha1($password)) . "'");

		if($row){
			if($row['active_status']=='1'){
				$result=array();

				$result['user_id']=$row['user_id'];
				$result['username']=$row['username'];
				$result['email']=$row['email'];
				$result['password']=$password;
				$result['business_name']=$row['business_name'];

				array_push($response['result'], $result);

				$response['success']=1;
				$response['message']='login successful';

				echo json_encode($response);

			}else{
				$response['success']=0;
				$response['message']='Your account is inactive';
				echo json_encode($response);
			}
		}else{
			$response['success']=0;
			$response['message']='Incorrect email or password';
			echo json_encode($response);

		}

}else{
	$response['success']=0;
	$response['message']='some information is required';

	echo json_encode($response);
}

?>