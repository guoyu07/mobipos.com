<?php

include("../../data/db.php");

Class DashBoard{

	public static function load_todays_sale($id,$page,$per_page){
		global $db;
		  if($page==1){
		  	$results=$db->GetArray("SELECT tb_app_sales.order_id,tb_employees.outlet_posted,tb_app_sales.amount_total,tb_app_sales.transaction_type, tb_app_sales.transaction_code,tb_app_sales.date_of_sale FROM `tb_app_sales` INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_employees.outlet_posted=$id AND tb_app_sales.date_of_sale >=curdate() limit $per_page");
		  }else{
        $offset_value=$page*$per_page-$per_page;
		  		$results=$db->GetArray("SELECT tb_app_sales.order_id,tb_employees.outlet_posted,tb_app_sales.amount_total,tb_app_sales.transaction_type, tb_app_sales.transaction_code,tb_app_sales.date_of_sale FROM `tb_app_sales` INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_employees.outlet_posted=$id AND tb_app_sales.date_of_sale >=curdate() limit $per_page 
        OFFSET $offset_value");
		  }
	

	?>
		
			 <thead>
                                    <tr>
                                    	
                                        <th>Order No</th>
                                        <th>Amount</th>
                                        <th>Time</th>
                                        <th>More Details</th>
                                                                             
                                    </tr>
                                </thead>

                                 <tbody>
                                 <?php foreach($results as $row){ 
                                    
                                  ?>            
                                <tr>

                                  	<td><?php echo $row["order_id"]; ?></td>
								    <td><?php echo number_format($row["amount_total"]); ?></td>
                                    <td><?php echo $row["date_of_sale"]; ?></td>
                                    <td><button class="btn btn-light btn--icon" 
                     onclick='refreshDetailsModule("order_details","./modules/dashboard/orderno-details.php?orderno=<?php echo $row['order_id']; ?>")'><i class="zmdi zmdi-more-vert"></i></button></td>
								 </tr>	
								  <?php } ?> 

                                </tbody>

		
		
                                ?>
<?php	}

	public static function datatable_display_pagination($per_page, $page, $table, $module,$id){
		global $db;
		$group = $db->GetOne("select ceil(((select count(tb_app_sales.order_id) from tb_app_sales INNER JOIN tb_employees ON tb_app_sales.employee_id=tb_employees.id WHERE tb_employees.outlet_posted=$id AND tb_app_sales.date_of_sale >=CURDATE()) / $per_page)) as groups;");
		if ( ($group * 10) >= 10) {
			echo "<ul class='pagination margin-bottom-10' style='padding: 10px;'>"; ?>
				<?php if($page > 1 ) { ?>
					<li class='page-item' > <a href='#' class="page-link"  onclick="showDashboardTabs('./modules/<?php echo $module; ?>/branch-todays-sale.php?id=$id&page=<?php echo ($page - 1); ?>');"> << Prev </a> </li>
				<?php } ?>
				
			<?php	for($pager = 1; $pager <= $group; $pager ++){
						if($pager == $page){ ?>
							<li class='active page-item'> <a href='#' class="page-link" onclick="showDashboardTabs('./modules/<?php echo $module; ?>/branch-todays-sale.php?id=<?php echo $id; ?>&page=<?php echo $pager; ?>');"> <?php echo $pager; ?> </a> </li>
						<?php }else{ ?>
							<li class='page-item'> <a href='#' class="page-link" onclick="showDashboardTabs('./modules/<?php echo $module; ?>/branch-todays-sale.php?id=<?php echo $id; ?>&page=<?php echo $pager; ?>');"> <?php echo $pager; ?> </a> </li>
						<?php }
					} ?>
				<?php if($page != $group ) { ?>
					<li class='page-item' > <a href='#' class="page-link"  onclick="showDashboardTabs('./modules/<?php echo $module; ?>/all.php?id=<?php echo $id; ?>page=<?php echo $group; ?>');"> Last >> </a> </li>
				<?php } ?>
				<?php 
			echo "</ul>";
		}
    }

    public static function order_details($orderno){
    	global $db;

    	$transaction_type=$db->GetOne("SELECT transaction_type from tb_app_sales WHERE order_id='$orderno'");
    	$transaction_code=$db->GetOne("SELECT transaction_code from tb_app_sales WHERE order_id='$orderno'");

    	$products_details=$db->GetArray("SELECT tb_app_stock_movement.product_id,tb_app_stock_movement.count,tb_product_prices.selling_price,tb_products.product_name FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_app_stock_movement.product_id=tb_product_prices.product_id INNER JOIN tb_products ON tb_product_prices.product_id=tb_products.product_id WHERE tb_app_stock_movement.sale_id=".$orderno."");

    	?>

    		<div class="row">
    			<div class="col-lg-12">
                   				<div class="card">
                   					<div class="class-body">
                                  <h5> Transcation Type: <?php echo $transaction_type; ?></h4>
                   		<h5> Transcation Code: <?php echo $transaction_code; ?></h4>
                   		
                   					</div>
                   				</div>
                   			</div>
                   		

                   		<?php foreach ($products_details as $row) { ?>

                   			<div class="col-lg-12">
                   				<div class="card">
                   					<div class="class-body">
                   						 <div class="listview__heading"><h5><?php echo $row["product_name"] ?></div>
                                    <p><b>QTY: <?php echo $row["count"]; ?> </p>
                                    <p><b>@: <?php echo number_format($row["selling_price"]); ?> </p>
                                    <p><b>Total: <?php
                                    	$selling=$row['selling_price'];$count=$row["count"];

                                     echo number_format($selling*$count); ?> </p>
                   					</div>
                   				</div>
                   			</div>
                   		 
    		</div>		
                                   	
                               
                   			
                   	<?php } ?>
                 


   <?php }


}

?>