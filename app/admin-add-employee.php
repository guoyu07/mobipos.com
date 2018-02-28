<?php

include('controllers/db.php');
require_once('dbconfig.php');
global $db;



$response;
if(isset($_REQUEST['name'])&&isset($_REQUEST['id'])&&isset($_REQUEST['phone_number'])&&
	isset($_REQUEST['residence'])&&isset($_REQUEST['email'])&&isset($_REQUEST['shop'])&&isset($_REQUEST['user_id'])){


	$user_id=$_REQUEST['user_id'];
	$name=$_REQUEST['name'];
	$id=$_REQUEST['id'];
	$email=$_REQUEST['email'];
	$residence=$_REQUEST['residence'];
	$phone_number=$_REQUEST['phone_number'];
	$shop=$_REQUEST['shop'];

	$shop_id=$db->GetOne("select tb_shop_id from tb_shops where tb_shop_name = '$shop' AND client_id='$user_id'");

	$row_id = $db->GetRow("select * from tb_employees where ID_NO = '$id'");

	if($row_id){
		$response['success']=0;
		$response['message']="The ID Number already exsists in the database";
		echo json_encode($response);
	}else{

	$data=array();

	$data['email']=$email;
	$data['employee_name']=$name;
	$data['phone_number']=$phone_number;
	$data['ID_NO']=$id;
	$data['residence']=$residence;
	$data['client_id']=$user_id;
	$data['active_status']='1';
	$data['account_type']='2';
	$data['outlet_posted']=$shop_id;

	$db->AutoExecute('tb_employees',$data, 'INSERT');


	$row=$db->GetRow("SELECT tb_employees.id,tb_employees.employee_name,tb_users.username FROM `tb_employees` INNER JOIN tb_users ON  tb_employees.client_id=tb_users.user_id WHERE tb_employees.ID_NO=$id");

		// $response['success']=1;
		// $response['message']="Data inserted success";
	 // 	echo json_encode($response);

	if($row){
		$emp_name=substr($row['employee_name'],0,2);
		$client_name=substr($row['username'],0,2);
		$this_id=substr($row['id'],0);
		
		$employee_id=$emp_name.'-'.$client_name.'-'.$this_id;
		$client=$row['id'];
		$sql_st="Update tb_employees set employee_id='".
		$employee_id."' WHERE id='".$client."'";
		
		$mysql_exe=mysqli_query($open_database_stream,$sql_st);
		if(!empty($mysql_exe)){
			$response['success']=1;
			 $response['message']="Data inserted success";
	   		echo json_encode($response);
		}else{
			$response['success']=0;
		 $response['message']=mysql_error();
	   	echo json_encode($response);
		}
		 
		}
	}

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>