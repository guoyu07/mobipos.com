<?php

require_once('../../data/db.php');

class Products{

	 public static function get_outlet($id){
        global $db;
        $results = $db->GetArray("SELECT * FROM `tb_shops` WHERE client_id=$id");
        foreach($results as $row){?>
            <!-- <option value="<?php echo $row["tb_shop_id"]; ?>"><?php echo $row["tb_shop_name"]; ?></option> -->
              <a href="#" class="dropdown-item" id="<?php echo $row['tb_shop_id']; ?>"
              onclick="select_category(this,'<?php echo $row["tb_shop_name"]; ?>')"><?php echo $row["tb_shop_name"]; ?></a>
        <?php }
    }


    public static function list_products($id,$page,$per_page){

		global $db;

//WHERE client_id=$id
     if($page==1){
        $results=$db->GetArray("SELECT tb_products.product_id,tb_products.product_name,tb_categories.category_name,tb_measurements.measurement_name,tb_shops.tb_shop_name FROM tb_products INNER JOIN tb_categories ON tb_categories.category_id=tb_products.category_id INNER JOIN tb_measurements ON tb_measurements.measurement_id=tb_products.measurement_type INNER JOIN tb_shops ON tb_shops.tb_shop_id=tb_categories.shop_id WHERE tb_products.active_status=1 and tb_measurements.client_id=$id and tb_shops.active_status=1 limit $per_page");
     }else{
       $offset_value=$page*$per_page-$per_page;

       $results=$db->GetArray("SELECT tb_products.product_id,tb_products.product_name,tb_categories.category_name,tb_measurements.measurement_name,tb_shops.tb_shop_name FROM tb_products INNER JOIN tb_categories ON tb_categories.category_id=tb_products.category_id INNER JOIN tb_measurements ON tb_measurements.measurement_id=tb_products.measurement_type INNER JOIN tb_shops ON tb_shops.tb_shop_id=tb_categories.shop_id WHERE tb_products.active_status=1  and tb_measurements.client_id=$id and tb_shops.active_status=1 limit $per_page 
        OFFSET $offset_value");

     }
		

		?>
		
                            	  <thead>
                                    <tr>
                                    	
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Shop</th>
                                        <th>Items in Store</th>
                                        <th>Details</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        <th>Update Inventory</th>
                                       

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($results as $row){ 
                                      $prod=$row["product_id"];
                                  ?>            
                                <tr>

                                  	<td><?php echo $row["product_id"]; ?></td>
								                  	<td><?php echo $row["product_name"]; ?></td>
                                    <td><?php echo $row["category_name"]; ?></td>
                                    <td><?php echo $row["tb_shop_name"]; ?></td>
                                      <td><?php echo Products::inventory_count($prod); ?></td> 
                                    <td><button class="btn btn-light btn--icon"><i class="zmdi zmdi-more-vert"></i></button></td>
                                   <td><button class="btn btn-light btn--icon" onclick='showAjaxModal("./modules/products/update-product.php?id=<?php echo $row['product_id']; ?>&measure=<?php echo $row['measurement_name']; ?>","Update Product Name")'><i class="zmdi zmdi-edit"></i></button></td>
                                   <td><button class="btn btn-light btn--icon" onclick="deleteFxn('<?php echo $row["product_id"]; ?>','tb_products','product_id','products')"><i class="zmdi zmdi-close"></i></button></td>
                                   <td><button class="btn btn-light btn--icon" onclick='showAjaxModal("./modules/products/update-inventory.php?id=<?php echo $row['product_id']; ?>&measure=<?php echo $row['measurement_name']; ?>","Update Inventory")'><i class="zmdi zmdi-apps"></i></button></td>

								 </tr>	
								  <?php } ?> 

                                </tbody>
	                             
	<?php }

  public static function select_measurement($id){
        global $db;
        $results = $db->GetArray("SELECT * FROM `tb_measurements` WHERE client_id=$id");
        foreach($results as $row){?>
            <!-- <option value="<?php echo $row["tb_shop_id"]; ?>"><?php echo $row["tb_shop_name"]; ?></option> -->
              <a href="#" class="dropdown-item" id="<?php echo $row['measurement_id']; ?>"
              onclick="select_measurement(this)"><?php echo $row["measurement_name"]."(".$row["single_unit"]." per unit)"; ?></a>
        <?php }
    }

     public static function product_name($id){
        global $db;
        $name=$db->GetOne("SELECT product_name FROM `tb_products` WHERE product_id=$id");
        return $name;
    
    }

    public static function inventory_count($productId){
        global $db;

        $stock_in=$db->GetOne("SELECT SUM(quantity_moved) as total FROM `tb_stock_movement` WHERE
         product_id=$productId");
        $stock_out=$db->GetOne("SELECT SUM(count) as total FROM `tb_app_stock_movement` WHERE product_id=$productId");
        if($stock_out==null){
          $stock_out=0;
        }

        return $stock_in-$stock_out;

    }

    public static function get_tax_margins($id){
        global $db;
        $results=$db->GetArray("SELECT tb_tax_margins.tb_tax_id,tb_tax_margins.tax_margin,tb_tax_modes.mode FROM `tb_tax_margins` INNER JOIN tb_tax_modes on tb_tax_margins.margin_mode=tb_tax_modes.mode_id WHERE tb_tax_margins.client_id=$id and tb_tax_margins.active_status=1");

        foreach ($results as $row ) { ?>
                  
                              <label class="custom-control custom-radio">
                                <input id="radio" name="radio" id="inc" type="radio" class="custom-control-input" checked onchange="radios('<?php echo $row["tb_tax_id"]; ?>')">
                                
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"><?php echo $row["tax_margin"]; ?>% <?php echo $row["mode"]; ?></span>
                            </label>

                            <div class="clearfix mb-2"></div>

                 

        <?php }
    }
    

}



?>
