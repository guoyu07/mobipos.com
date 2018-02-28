<?php

include('controllers/db.php');

$response['data']=array();

global $db;

if(isset($_REQUEST['user_id'])){

		$user_id=$_REQUEST['user_id'];
		
		$response["tax_margins"]=array();
						$get_tax_data=$db->GetArray("SELECT * from tb_tax_margins where client_id=$user_id and active_status=1");

						foreach ($get_tax_data as $tax_row) {
							$tax_margins=array();
							$tax_margins['tax_margin_id']=$tax_row['tb_tax_id'];
							$margin_mode=$tax_row['margin_mode'];
							$mode_name=$db->GetOne("SELECT mode FROM `tb_tax_modes` where mode_id=$margin_mode");
							$tax_margins['tax']=$tax_row['tax_margin'];
							$tax_margins['margin_mode']=$mode_name;

							array_push($response['tax_margins'],$tax_margins);
						}

						$response['success']=1;
						$response['message']='tax margins retrieved';
						echo json_encode($response);

}else{
	$response['success']=0;
	$response['message']='missing user id';

	echo json_encode($response);
}

?>