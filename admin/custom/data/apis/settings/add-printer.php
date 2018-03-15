<?php

include("../db.php");

global $db;
@session_start();

$response;

$user_id=$_SESSION['user']['userid'];
if(isset($_REQUEST['printer_mac'])
&&isset($_REQUEST['printer_name'])
&&isset($_REQUEST['branch'])){

	$name=$_REQUEST['printer_name'];
  $mac=$_REQUEST['printer_mac'];
  $branch=$_REQUEST['branch'];

	$branch_id=$db->GetOne("select tb_shop_id from tb_shops where tb_shop_name = '$branch' AND client_id='$user_id'");

	$data=array();

	$data['tb_printer_name']=$name;
	$data['client_id']=$user_id;
  $data['tb_printer_mac']=$mac;
  $data['tb_branch']=$user_id;
	$data['active_status']='1';

	$db->AutoExecute('tb_printers',$data, 'INSERT');

	$response['success']=1;
	$response['message']="Printer Added Successfully";

		echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']="Some information required";

		echo json_encode($response);
}
?>
