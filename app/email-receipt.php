<?php

include('./Mailer.php');


if(isset($_REQUEST['order_id'])&&isset($_REQUEST['email'])){
	echo Mail::mailer($_REQUEST['order_id'],$_REQUEST['email'],Mail::generate_pdf($_REQUEST['order_id']));
}else{
	$response['success']=0;
	$response['message']="Missing some information";

	echo json_encode($response);
}


?>