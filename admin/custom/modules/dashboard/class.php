<?php
include('./data/db.php');
Class Dashboard{

	public static function total_sales($id,$type){
		global $db;
		$get_total_sales;
		if($type=='total_sale'){
			$get_total_sales=$db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_employees.client_id=$id");
		}else if($type=='todays_sale'){
			$get_total_sales=$db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_app_sales.date_of_sale >= CURDATE() AND tb_employees.client_id=$id");
		}else if($type=='todays_inventory'){
			$get_total_sales=$db->GetOne("SELECT SUM(tb_app_stock_movement.count * tb_product_prices.buying_price) AS TOTAL FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_app_stock_movement.product_id=tb_product_prices.product_id INNER JOIN tb_products ON tb_products.product_id=tb_product_prices.product_id WHERE 
tb_app_stock_movement.date_of_movement >=CURDATE() AND tb_products.client_id=$id");
		}
		

		if($get_total_sales==null){
			return 0;
		}else{
		return $get_total_sales;
		}
		
	}

	public static function load_branches($id){
		global $db;
		$results=$db->GetArray("SELECT * FROM tb_shops WHERE client_id=$id");
		?>
	
		<?php				 	
		 foreach($results as $row){?>
           <button type="button" class="btn btn-outline-secondary" onclick='showGraphs("./modules/dashboard/branch-details.php?id=<?php echo $row['tb_shop_id']; ?>&name=<?php echo $row['tb_shop_name']; ?>")'>
					 	<?php echo $row['tb_shop_name']; ?></button>
        <?php }
		
	}

	public static function load_branch_name($id){
		global $db;
		$name=$db->GetOne("SELECT tb_shop_name from tb_shops where tb_shop_id=8");
		return $name;
	}

	public static function popover_data($id){
		global $db;

		$outlets=$db ->GetArray("SELECT * FROM tb_shops WHERE client_id=$id");

		foreach ($outlets as $outlet) {
			$outlet_id=$outlet['tb_shop_id'];
			$results = $db-> GetArray("SELECT tb_shops.tb_shop_id,tb_shops.tb_shop_name,tb_employees.id,SUM(tb_app_sales.amount_total) as total FROM tb_shops INNER JOIN tb_employees ON tb_shops.tb_shop_id=tb_employees.outlet_posted 
				INNER JOIN tb_app_sales ON tb_app_sales.employee_id=tb_employees.id WHERE tb_shops.client_id=$id AND tb_shops.tb_shop_id=$outlet_id");

		foreach ($results as $row) { 

				 $shopname= $outlet['tb_shop_name'];
				  $shopTotal= $row['total'];
				  if($shopTotal==null){
				  	$shopTotal=0;
				  }
				  echo $shopname." \n ".number_format($shopTotal);
		}
		echo "\n";
		}
		
	}

	public static function popover_data_todays($id){
		global $db;

		$outlets=$db ->GetArray("SELECT * FROM tb_shops WHERE client_id=$id");

		foreach ($outlets as $outlet) {
			$outlet_id=$outlet['tb_shop_id'];
			$results = $db-> GetArray("SELECT tb_shops.tb_shop_id,tb_shops.tb_shop_name,tb_employees.id,SUM(tb_app_sales.amount_total) as total FROM tb_shops INNER JOIN tb_employees ON tb_shops.tb_shop_id=tb_employees.outlet_posted 
				INNER JOIN tb_app_sales ON tb_app_sales.employee_id=tb_employees.id WHERE tb_shops.client_id=$id AND tb_shops.tb_shop_id=$outlet_id AND tb_app_sales.date_of_sale >=CURDATE()");

		foreach ($results as $row) { 

				 $shopname= $outlet['tb_shop_name'];
				  $shopTotal= $row['total'];
				  if($shopTotal==null){
				  	$shopTotal=0;
				  }
				  echo $shopname." \n ".number_format($shopTotal);
		}
		echo "\n";
		}
		
	}

	public static function popover_data_todays_inventory($id){
		global $db;

		$outlets=$db ->GetArray("SELECT * FROM tb_shops WHERE client_id=$id");

		foreach ($outlets as $outlet) {
			$outlet_id=$outlet['tb_shop_id'];
			$results = $db-> GetArray("SELECT SUM(tb_app_stock_movement.count * tb_product_prices.buying_price) AS TOTAL FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_app_stock_movement.product_id=tb_product_prices.product_id INNER JOIN tb_products ON tb_products.product_id=tb_product_prices.product_id INNER JOIN tb_employees ON tb_employees.id=tb_app_stock_movement.employee_id WHERE 
tb_app_stock_movement.date_of_movement >=CURDATE() AND tb_products.client_id=$id AND tb_employees.outlet_posted=$outlet_id");

		foreach ($results as $row) { 

				 $shopname= $outlet['tb_shop_name'];
				  $shopTotal= $row['TOTAL'];
				  if($shopTotal==null){
				  	$shopTotal=0;
				  }
				  echo $shopname." \n ".number_format($shopTotal);
		}
		echo "\n";
		}
		
	}

public static function popover_data_todays_profit($id){
		global $db;

		$outlets=$db ->GetArray("SELECT * FROM tb_shops WHERE client_id=$id");

		foreach ($outlets as $outlet) {
			$outlet_id=$outlet['tb_shop_id'];
			$pro_total_sales=$db->GetOne("SELECT SUM(tb_app_sales.amount_total) as total FROM tb_app_sales INNER JOIN tb_employees ON tb_employees.id=tb_app_sales.employee_id WHERE tb_app_sales.date_of_sale >= CURDATE() AND tb_employees.client_id=$id AND tb_employees.outlet_posted=$outlet_id");

			$pro_total_inv=$db->GetOne("SELECT SUM(tb_app_stock_movement.count * tb_product_prices.buying_price) AS TOTAL FROM tb_app_stock_movement INNER JOIN tb_product_prices ON tb_app_stock_movement.product_id=tb_product_prices.product_id INNER JOIN tb_products ON tb_products.product_id=tb_product_prices.product_id INNER JOIN tb_employees ON tb_employees.id=tb_app_stock_movement.employee_id WHERE 
tb_app_stock_movement.date_of_movement >=CURDATE() AND tb_products.client_id=$id AND tb_employees.outlet_posted=$outlet_id");


				 $shopname= $outlet['tb_shop_name'];
				  $shopTotal= $pro_total_sales-$pro_total_inv;
				  if($shopTotal==null){
				  	$shopTotal=0;
				  }
				  echo $shopname." \n ".number_format($shopTotal);
		
		echo "\n";
		}
		
	}

	

}
?>