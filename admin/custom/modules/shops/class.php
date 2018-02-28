<?php
require_once('../../data/db.php');

class Shops{

	public static function list_shops($id){

		global $db;

//WHERE client_id=$id
		$results=$db->GetArray("SELECT * FROM `tb_shops` WHERE client_id=$id AND active_status=1");

		?>
		
                            	  <thead>
                                    <tr>
                                    	
                                        <th>Retail Id</th>
                                        <th>Retail Name</th>
                                        <th>Details</th>
                                         <th>Edit</th>
                                         <th>Deactivate</th>
                                       

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($results as $row){ ?>            
                                <tr>
                                	<td><?php echo $row["tb_shop_id"]; ?></td>
									<td><?php echo $row["tb_shop_name"]; ?></td>
                                  <td><button class="btn btn-light btn--icon" 
                     onclick='refreshDetailsModule("shop_data","./modules/shops/details.php?shopId=<?php echo $row['tb_shop_id']; ?>")'><i class="zmdi zmdi-more-vert"></i></button></td>
                                   <td><button class="btn btn-light btn--icon"  onclick='showAjaxModal("./modules/shops/update-shop-name.php?id=<?php echo $row['tb_shop_id']; ?>","Update Shop Name")'>
                                    <i class="zmdi zmdi-edit"></i></button></td>
                                   <td><button class="btn btn-light btn--icon" onclick="deleteFxn('<?php echo $row["tb_shop_id"]; ?>','tb_shops','tb_shop_id','shops')"><i class="zmdi zmdi-close"></i></button></td>

								 </tr>	
								  <?php } ?> 

                                </tbody>
	                             
	<?php }

    public static function employeeCount($id,$branchId){
        global $db;
        $count=$db->GetOne("SELECT count(id) FROM `tb_employees` WHERE client_id=$id AND outlet_posted=$branchId");
        return $count;
    }
    public static function product($id,$branchId){
        global $db;
        $count=$db->GetOne("SELECT count(product_id) FROM `tb_products` INNER JOIN tb_categories ON tb_categories.category_id=tb_products.category_id WHERE tb_categories.shop_id=$branchId AND tb_products.client_id=$id");
        return $count;
    }

    public static function  Details($id,$branchId){
        ?>
         <div class="listview listview--bordered">
                            <div class="listview__item">
                                <label class="custom-control custom-checkbox align-self-start">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <div class="listview__content">
                                    <div class="listview__heading">No of Employees</div>
                                    <p><b><?php echo Shops::employeeCount($id,$branchId); ?></p>
                                </div>
                            </div>

                            <div class="listview__item">
                                <label class="custom-control custom-checkbox align-self-start">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <div class="listview__content">
                                    <div class="listview__heading">No Of Products</div>
                                    <p><b><?php echo Shops::product($id,$branchId); ?></p>
                                </div>
                            </div>
          </div>                  

       <?php                     
    }

    public static function shop_name($id){
        global $db;
        $name=$db->GetOne("SELECT tb_shop_name FROM `tb_shops` WHERE tb_shop_id=$id");
        return $name;
    
    }
}

?>