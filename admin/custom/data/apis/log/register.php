<?php 

include('../db.php');

global $db;

$response["resultvalue"]=array();

if(isset($_REQUEST['name'])||
isset($_REQUEST['biz'])||
isset($_REQUEST['residence'])||
isset($_REQUEST['email'])||
isset($_REQUEST['password'])||
isset($_REQUEST['phoneValue'])){

	$name=$_REQUEST['name'];
	$biz=$_REQUEST['biz'];
	$residence=$_REQUEST['residence'];
	$email=$_REQUEST['email'];
	$password=$_REQUEST['password'];
	$phoneValue=$_REQUEST['phoneValue'];

	$data = array();
	$data['username'] = $name;
	$data['phone_number'] = $phoneValue;
	$data['residence'] = $residence;
	$data['email'] = $email;
	$data['password'] = md5(sha1($password));
	$data['business_name'] = $biz;
	$data['active_status'] = '1';
	
	
	$db->AutoExecute('tb_users',$data, 'INSERT');

	$row = $db->GetRow("select * from tb_users where email = '$email' and password = '" . md5(sha1($password)) . "'");
	if($row){
		if($row ["active_status"] == '1'){
			$myresults = array();
			$myresults["UserID"] = $row["user_id"];
			 $myresults["success"] = 1;
			$myresults["message"] = $row["user_id"];
			
	
			array_push($response["resultvalue"], $myresults);
		}else{
			$myresults = array();
			$myresults["success"] = 0;
			$myresults["message"] = 'Account is not Active, Contact Admin';
			array_push($response["resultvalue"], $myresults);
		}

	}

	echo json_encode($response);
}else{
	$myresults = array();
	$myresults["success"] = 0;
	$myresults["message"] = "Error!!! Missing some information";
	array_push($response["resultvalue"], $myresults);
    echo json_enCode($response);

}
?>