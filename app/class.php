<?php

include("controllers/db.php");
global $db;

 $db->debug=0;


Class ReceiptData{
	public static function client_id($orderId){

		global $db;
		$employee_id=$db->GetOne("SELECT employee_id FROM tb_app_orders WHERE order_no='".$orderId."'");

		$client_id=$db->GetOne("SELECT client_id FROM tb_employees WHERE id=$employee_id");

		return "2";

	}

	public static function business_name($client_id){
		global $db;

		$biz_name=$db->GetOne("SELECT business_name FROM tb_users where user_id=$client_id");

		return $biz_name;
	}

  public static function payment_method($order_id){
      global $db;
        ?>
        <table>
          <tr>
            <th>Order No</th>
            <th>Transaction Type</th>
            <th>Transaction Code</th>
          </tr>
          <tbody>
          <tr>
            <td><?php echo $order_id; ?></td>
            <td><?php $type=$db->GetOne("SELECT transaction_type FROM `tb_app_sales` WHERE order_id='".$order_id."'");
                              echo $type; ?> </td>
            <td><?php $code=$db->GetOne("SELECT transaction_code FROM `tb_app_sales` WHERE order_id='".$order_id."'");
                              echo $code; ?> </td>
          <tr>
          </tbody>
        </table>

  <?php }

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

		$results=$db->GetArray("SELECT tb_app_stock_movement.product_id,tb_app_stock_movement.count,
      tb_product_prices.selling_price,tb_products.tax_mode,
      tb_products.product_name,tb_tax_margins.tax_margin,tb_tax_margins.margin_mode
      FROM tb_app_stock_movement INNER JOIN tb_product_prices ON
      tb_product_prices.product_id=tb_app_stock_movement.product_id
      INNER JOIN tb_products ON tb_products.product_id=tb_app_stock_movement.product_id
      INNER JOIN tb_tax_margins ON tb_tax_margins.tb_tax_id=tb_products.tax_mode
       WHERE tb_app_stock_movement.sale_id='".$orderId."'");

       $net_sale=0;
       $inc_tax=0;
       $exc_tac=0;


		foreach ($results as $row) { ?>
			<tr>
						<?php $tax_margin=$row['tax_margin'];
                  $margin_mode=$row['margin_mode'];
                  $sel=$row["selling_price"];
      						$cou=$row["count"];
      						$total_amount=$sel*$cou;

                  $total_tax=$total_amount*$tax_margin/100;

                  $net_sale+=$total_amount;

                  ?>
						<td><?php echo $row["product_name"]; ?></td>
						<td><?php echo $row["count"]; ?></td>
						<td><?php echo $row["selling_price"]; ?></td>


						<td><?php

								  echo number_format($total_amount);
						?></td>
            <td><?php if($margin_mode=="1"){

                echo $row['tax_margin']."(INC)";
            } else{
              echo $row['tax_margin']."(EXC)";
            } ?> </td>

            <td><?php
            if($margin_mode=="1"){
                $inc_tax+=$total_tax;
            }else{
              $exc_tac+=$total_tax;
            }
            echo number_format($total_tax); ?> </td>

			</tr>

	  <?php	} ?>
  </table>
<table class="total_tables">
  <tr>
    <td><b> TOTAL SALE </b></td><td><b><?php echo number_format($net_sale); ?></b></td>
  </tr>
  <tr>
    <td><b> INCLUSIVE TAX </b></td><td><b><?php echo number_format($inc_tax); ?></b></td>
  </tr>
  <tr>
    <td><b> EXCLUSIVE TAX </b></td><td><b><?php echo number_format($exc_tac); ?></b></td>
  </tr>
  <tr>
    <td><b> DISCOUNT </b></td><td><b></b></td>
  </tr>
</table>

<?php
	}

	public static function payment_details($orderId){
		global $db;

		$results=$db->GetOne("SELECT * FROM tb_app_sales WHERE order_id='".$orderId."'");

		foreach ($results as $row) {

		}
	}

	public static function get_client_email($client_id){
		global $db;

		$email=$db->GetOne("SELECT email FROM tb_users where user_id=$client_id");

		return $email;
	}

}

?>
