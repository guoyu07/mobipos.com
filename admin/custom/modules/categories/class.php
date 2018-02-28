<?php

require_once('../../data/db.php');
require_once('../products/class.php');

class Category{

	 public static function get_outlet($id){
        global $db;
        $results = $db->GetArray("SELECT * FROM `tb_shops` WHERE client_id=$id");
        foreach($results as $row){?>
            <!-- <option value="<?php echo $row["tb_shop_id"]; ?>"><?php echo $row["tb_shop_name"]; ?></option> -->
              <a href="#" class="dropdown-item" id="<?php echo $row['tb_shop_id']; ?>"
              onclick="select_shop(this,'this_cat_branch')"><?php echo $row["tb_shop_name"]; ?></a>
        <?php }
    }


    public static function list_categories($id,$page,$per_page){

		global $db;

        if($page==1){
            $results=$db->GetArray("SELECT * FROM `tb_categories` inner join tb_shops on tb_categories.shop_id=tb_shops.tb_shop_id WHERE tb_shops.active_status=1 and tb_categories.client_id=$id AND tb_categories.active_status=1 limit $per_page");
        }else{

             $offset_value=$page*$per_page-$per_page;
             // echo "total limit=".$offset_value;
             // echo "<br>page=".$page;

              $results=$db->GetArray("SELECT * FROM `tb_categories` inner join tb_shops on tb_categories.shop_id=tb_shops.tb_shop_id WHERE tb_shops.active_status=1 and tb_categories.client_id=$id AND tb_categories.active_status=1 limit $per_page OFFSET $offset_value");
        }
     
       

		?>
		
                            	  <thead>
                                    <tr>
                                    	
                                        <th>Category Id</th>
                                        <th>Category Name</th>
                                        <th>Retail</th>
                                        <th>Details</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                       

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($results as $row){ ?>            
                                <tr>
                                	<td><?php echo $row["category_id"]; ?></td>
									<td><?php echo $row["category_name"]; ?></td>
                                    <td><?php echo $row["tb_shop_name"]; ?></td>
                                    <td><button class="btn btn-light btn--icon" 
                                         onclick='refreshDetailsModule("category_data","./modules/categories/details.php?categoryId=<?php echo $row['category_id']; ?>")'><i class="zmdi zmdi-more-vert"></i></button></td>
                                   <td><button class="btn btn-light btn--icon" onclick='showAjaxModal("./modules/categories/update-categories.php?id=<?php echo $row['category_id']; ?>","Update Category Name")'><i class="zmdi zmdi-edit"></i></button></td>
                                   <td><button class="btn btn-light btn--icon" onclick="deleteFxn('<?php echo $row["category_id"]; ?>','tb_categories','category_id','categories')"><i class="zmdi zmdi-close"></i></button></td>

								 </tr>	
								  <?php } ?> 

                                </tbody>
	                             
	<?php }


    public static function datatable_display_pagination($per_page, $page, $table, $module,$id){
        global $db;
        $group = $db->GetOne("select ceil(((select count(*) from $table WHERE client_id=$id) / $per_page)) as groups;");
        if ( ($group * 10) >= 10) {
            echo "<ul class='pagination margin-bottom-10' style='padding: 10px;'>"; ?>
                <?php if($page > 1 ) { ?>
                    <li class='page-item' > <a href='#' class="page-link"  onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo ($page - 1); ?>');"> << Prev </a> </li>
                <?php } ?>
                
            <?php   for($pager = 1; $pager <= $group; $pager ++){
                        if($pager == $page){ ?>
                            <li class='active page-item'> <a href='#' class="page-link" onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo $pager; ?>');"> <?php echo $pager; ?> </a> </li>
                        <?php }else{ ?>
                            <li class='page-item'> <a href='#' class="page-link" onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo $pager; ?>');"> <?php echo $pager; ?> </a> </li>
                        <?php }
                    } ?>
                <?php if($page != $group ) { ?>
                    <li class='page-item' > <a href='#' class="page-link"  onclick="open_module('./modules/<?php echo $module; ?>/all.php?page=<?php echo $group; ?>');"> Last >> </a> </li>
                <?php } ?>
                <?php 
            echo "</ul>";
        }
    }

    public static function Details($categoryId){
          global $db;
        $results=$db->GetArray("SELECT * FROM `tb_products` WHERE category_id=$categoryId AND active_status=1");

        ?>
           <div class="listview listview--bordered">

                <?php
                    foreach ($results as $row) { 
                        $prod=$row["product_id"];
                        ?>


                         <div class="listview__item">
                                <label class="custom-control custom-checkbox align-self-start">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                </label>
                                <div class="listview__content">
                                    <div class="listview__heading"><?php echo $row['product_name'] ?></div>
                                    <p><b>Items in Stock: <?php echo products::inventory_count($prod); ?> </p>
                                </div>
                            </div>
                <?php        
                    }
                 ?>
        <?php
    }

      public static function category_name($id){
        global $db;
        $name=$db->GetOne("SELECT category_name FROM `tb_categories` WHERE category_id=$id");
        return $name;
    
    }
      public static function shop_name($id){
        global $db;
        $name=$db->GetOne("SELECT tb_shop_name FROM `tb_shops` WHERE tb_shop_id=$id");
        return $name;
    
    }
}

?>