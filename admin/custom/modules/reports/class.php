<?php

include("../../data/db.php");

Class Reports{
	
	public static function Sales_Orders($id,$page,$per_page,$from,$to){


		global $db;

		$TOTAL_AMOUNT_SOLD=0;
		$TOTAL_VAT=0;
		$TOTAL_NET_PROFIT=0;

		 if($page==1){
		 	$results=$db->GetArray("SELECT tb_app_sales.order_id,tb_app_sales.amount_total,tb_app_sales.transaction_type,tb_app_sales.transaction_code,tb_employees.employee_name,tb_shops.tb_shop_name,tb_app_sales.date_of_sale FROM `tb_app_sales` INNER JOIN tb_employees ON tb_app_sales.employee_id=tb_employees.id INNER JOIN tb_shops ON tb_shops.tb_shop_id=tb_employees.outlet_posted WHERE 
tb_app_sales.date_of_sale>='".$from."' AND tb_app_sales.date_of_sale<='".$to."'
 AND tb_employees.client_id=".$id." ORDER BY tb_app_sales.date_of_sale DESC limit $per_page");
		 }else{

		 	$offset_value=$page*$per_page-$per_page;
		 	$results=$db->GetArray("SELECT tb_app_sales.order_id,tb_app_sales.amount_total,tb_app_sales.transaction_type,tb_app_sales.transaction_code,tb_employees.employee_name,tb_shops.tb_shop_name,tb_app_sales.date_of_sale FROM `tb_app_sales` INNER JOIN tb_employees ON tb_app_sales.employee_id=tb_employees.id INNER JOIN tb_shops ON tb_shops.tb_shop_id=tb_employees.outlet_posted WHERE 
tb_app_sales.date_of_sale>='".$from."' AND tb_app_sales.date_of_sale<='".$to."'
 AND tb_employees.client_id=".$id." ORDER BY tb_app_sales.date_of_sale DESC limit $per_page 
        OFFSET $offset_value");
		 }	
		

 ?>

			 <thead>
                                    <tr>
                                    	
                                        <th>Order No</th>
                                        <th>SHOP NAME</th>
                                        <th>TRANSCATION TYPE</th>
                                        <th>TRANSCATION CODE</th>
                                        <th>TOTAL AMOUNT</th>
                                        <th>VAT</th>
                                        <th>NET PROFIT</th>
                                        <th>DATE OF SALE</th>
                                                                             
                                    </tr>
                                </thead>

                                 <tbody>
                                 <?php foreach($results as $row){ 
                                    
                                  ?>            
                                <tr>

                                  	<td><?php echo $row["order_id"]; ?></td>
								    <td><?php echo $row["tb_shop_name"]; ?></td>
								    <td><?php echo $row["transaction_type"]; ?></td>
								    <td><?php echo $row["transaction_code"]; ?></td>
								    <td><?php echo $row["amount_total"]; ?></td>

								    <?php

								    $order_no=$row["order_id"];

				 $tax_query=$db->GetArray("SELECT tb_app_stock_movement.product_id,tb_app_stock_movement.count,tb_product_prices.selling_price,tb_products.tax_mode,tb_tax_margins.tax_margin FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_product_prices.product_id=tb_app_stock_movement.product_id INNER JOIN tb_products ON tb_products.product_id=tb_app_stock_movement.product_id INNER JOIN tb_tax_margins ON tb_tax_margins.tb_tax_id=tb_products.tax_mode WHERE tb_app_stock_movement.sale_id='".$order_no."'");

				 		$TOTAL_AMOUNT_SOLD=$TOTAL_AMOUNT_SOLD+$row['amount_total'];
 						$total_tax=0;
				 			foreach ($tax_query as $key) {
				 				$item_count=$key['count'];
 								$selling_price=$key['selling_price'];
 								$tax_margin=$key['tax_margin'];
 								$total_item_tax=$item_count*$selling_price*($tax_margin/100);
 								$total_tax=$total_tax+$total_item_tax;
 								$TOTAL_VAT+=$total_tax;
				 			}

								    ?>
								     <td><?php echo number_format($total_tax); ?></td>
								     <?php
								      		 $grand_total=$row['amount_total'];
 											 $net_profit=$grand_total-$total_tax;
 								   			  $TOTAL_NET_PROFIT += $net_profit;

 								   			   $dater=strtotime($row['date_of_sale']);
								      ?>
								   
                                    <td><?php echo $net_profit; ?></td>
                                    <td><?php echo date('d-m-Y',$dater); ?></td>
                              
								 </tr>	
								  <?php } ?> 

                                </tbody>


	<?php } 

		public static function datatable_display_pagination($id,$per_page, $page, $module,$from,$to){
		global $db;
		$group = $db->GetOne("select ceil((select count(tb_app_orders.id) from tb_app_orders INNER JOIN tb_employees ON tb_app_orders.employee_id=tb_employees.id WHERE tb_employees.client_id=".$id." AND tb_app_orders.date_of_sale tb_app_orders.date_of_sale >='".$from."' AND tb_app_orders.date_of_sale <='".$to."')/10) as groups;");
		if ( ($group * 10) >= 10) {
			echo "<ul class='pagination margin-bottom-10' style='padding: 10px;'>"; ?>
				<?php if($page > 1 ) { ?>
					<li class='page-item' > <a href='#' class="page-link"  onclick="showDashboardTabs('./modules/<?php echo $module; ?>/order-reports.php?&page=<?php echo ($page - 1); ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>');"> << Prev </a> </li>
				<?php } ?>
				
			<?php	for($pager = 1; $pager <= $group; $pager ++){
						if($pager == $page){ ?>
							<li class='active page-item'> <a href='#' class="page-link" onclick="showDashboardTabs('./modules/<?php echo $module; ?>/order-reports.php?page=<?php echo $pager; ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>');"> <?php echo $pager; ?> </a> </li>
						<?php }else{ ?>
							<li class='page-item'> <a href='#' class="page-link" onclick="showDashboardTabs('./modules/<?php echo $module; ?>/order-reports.php?page=<?php echo $pager; ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>');"> <?php echo $pager; ?> </a> </li>
						<?php }
					} ?>
				<?php if($page != $group ) { ?>
					<li class='page-item' > <a href='#' class="page-link"  onclick="showDashboardTabs('./modules/<?php echo $module; ?>/order-reports.php?page=<?php echo $group; ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>');"> Last >> </a> </li>
				<?php } ?>
				<?php 
			echo "</ul>";
		}
    }
}
?>