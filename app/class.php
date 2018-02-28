<?php 

include("controllers/db.php");

Class Mailer{

}

Class ReceiptData{

	global $db;

	public static function client_id($orderId){

		global $db;
		$employee_id=$db->GetOne("SELECT employee_id FROM tb_app_orders WHERE order_no='".$employee_id."'");
		$client_id=$db->GetOne("SELECT client_id FROM tb_employees WHERE id=$employee_id");

		return $client_id;

	}

	public static function business_name($client_id){
		global $db;

		$biz_name=$db->GetOne("SELECT business_name FROM tb_users where user_id=$client_id");

		return $biz_name;
	}

	public static function branch_name($orderId){
		global $db;
		$employee_id=$db->GetOne("SELECT employee_id FROM tb_app_orders WHERE order_no='".$orderId."'");
		$branch_id=$db->GetOne("SELECT outlet_posted FROM tb_employees WHERE id=$employee_id");

		$branch_name=$db->GetOne("SELECT tb_shop_name FROM tb_shops WHERE tb_shop_id=$branch_id");

		return $branch_name;

	}

	public static function cashier_name($orderId){
		global $db;
		$employee_id=$db->GetOne("SELECT employee_id FROM tb_app_orders WHERE order_no='".$orderId."'");
		$employee_name=$db->GetOne("SELECT employee_name FROM tb_employees WHERE id='".$employee_id."'");

		return $employee_name;

	}

	public static function sales_info($orderId){
		global $db;

		$TOTAL_INC_VAT=0;
		$TOTAL_EXC_VAT=0;

		$results=$db->GetArray("SELECT tb_app_stock_movement.product_id,tb_app_stock_movement.count,tb_product_prices.selling_price,tb_products.tax_mode,tb_products.product_name,tb_tax_margins.tax_margin FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_product_prices.product_id=tb_app_stock_movement.product_id INNER JOIN tb_products ON tb_products.product_id=tb_app_stock_movement.product_id INNER JOIN tb_tax_margins ON tb_tax_margins.tb_tax_id=tb_products.tax_mode WHERE tb_app_stock_movement.sale_id='".$orderId."'");

		foreach ($results as $row) { ?>
			<tr>
						<td><?php echo $row["product_id"]; ?></td>		
						<td><?php echo $row["product_name"]; ?></td>	
						<td><?php echo $row["count"]; ?></td>
						<td><?php echo $row["selling_price"]; ?></td>
						<td><?php $sel=$row["selling_price"];
								  $cou=$row["count"];
								  $total_amount=$sel*$cou;

								  echo number_format($total_amount);
								   ?></td>					
										
					
			</tr>
					
	  <?php	} 



	}

	public static function payment_details($orderId){
		global $db;

		$results=$db->GetOne("SELECT * FROM tb_app_sales WHERE order_id='".$orderId."'");

		foreach ($results as $row) {
			
		}
	}

}

?>
