<?php

include("../db.php");
global $db;
@session_start();

$year=date("Y");
$this_month=date("m");

$today=date("d");

$id=$user_id=$_SESSION['user']['userid'];

$today_days=1;

$response=array();

 while ($today_days <= 31) {
 	$dater=$today_days;
 	if($today_days<10){
 		$dater="0".$today_days;
 	}
 
 	$new_date=$dater."-".$this_month."-".$year;
 	if($this_month > 9){
 		$new_date=$dater."-".$this_month."-".$year;
 	}

 	$total= $db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_employees.client_id=$id AND 
DATE_FORMAT(tb_app_sales.date_of_sale, '%d-%m-%Y') = '".$new_date."'");

	if($total==null){
		$total=0;
	}

	$date_month=$today_days." ".date("M");
	$data=array($today_days,$total);

	array_push($response, $data);

	$today_days++;

 }


echo json_encode($response);

?>
