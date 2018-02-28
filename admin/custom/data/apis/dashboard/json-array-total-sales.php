<?php

include("../db.php");
global $db;
@session_start();

$year=date("Y");
$this_month=date("m");

$today=date("d");

$branch=$_REQUEST['branch'];

$id=$_SESSION['user']['userid'];

$today_days=1;

$max_value=0;

$response['data']=array();

 while ($today_days <= 31) {
 	$dater=$today_days;
 	if($today_days<10){
 		$dater="0".$today_days;
 	}
 
 	$new_date=$dater."-".$this_month."-".$year;
 	if($this_month > 9){
 		$new_date=$dater."-".$this_month."-".$year;
 	}

 	if($branch==0){
 			$total= $db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_employees.client_id=$id AND 
DATE_FORMAT(tb_app_sales.date_of_sale, '%d-%m-%Y') = '".$new_date."'");
 		}else{
 				$total= $db->GetOne("SELECT SUM(tb_app_sales.amount_total) AS total FROM `tb_app_sales` INNER JOIN tb_employees ON tb_app_sales.employee_id=tb_employees.id WHERE tb_employees.outlet_posted=$branch AND DATE_FORMAT(tb_app_sales.date_of_sale, '%d-%m-%Y') = '".$new_date."'");
 		}

 

	if($total==null){
		$total=0;
	}
	$data=array();
	$data["day"]=$today_days;
	$data["total"]=$total;

	array_push($response['data'], $data);

	if($max_value<$total){
		$max_value=$total;
	}

	$today_days++;

 }

 $response['max_val']=$max_value;


echo json_encode($response);

?>
