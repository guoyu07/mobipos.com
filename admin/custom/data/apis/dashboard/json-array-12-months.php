<?php

include("../db.php");
global $db;
@session_start();

$year=date("Y");
$back_date=$year-1;

$month=11;
$branch=$_REQUEST['branch'];
$id=$_SESSION['user']['userid'];

$response=array();

$color=["#FF0F00", "#FF6600","#FF9E01","#FCD202","#F8FF01","#B0DE09","#04D215","#0D8ECF","#0D52D1" ,"#2A0CD0"
 ,"#8A0CCF","#CD0D74"];

 do{
 	$data=array();
	$new_month=date('m-Y',strtotime('-'.$month.' months'));


	if($branch==0){
		$total= $db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_employees.client_id=$id AND 
DATE_FORMAT(tb_app_sales.date_of_sale, '%m-%Y') = '".$new_month."'");
	}else{
		$total= $db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id  WHERE tb_employees.outlet_posted=$branch AND DATE_FORMAT(tb_app_sales.date_of_sale, '%m-%Y')  = '".$new_month."'");
	}
	

	if($total==null){
		$total=0;
	}

	$data["month"]=date('M',strtotime('-'.$month.' months'));

	$data["total"]=$total;
	$data["color"]=$color[$month];

	array_push($response, $data);

	$month--;
	
 }while($month>=0);

echo json_encode($response);

?>

