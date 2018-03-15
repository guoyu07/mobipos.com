<?php
require_once('../../data/db.php');

Class Settings{
	public static function get_tax_margins($id){
		global $db;

		$results=$db->GetArray("SELECT * FROM `tb_tax_margins` WHERE client_id=$id and active_status=1");

		foreach ($results as $row) {?>
			 <div class="listview__item">
                               <!--  <label class="custom-control custom-checkbox align-self-start">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                </label> -->
                                <div class="listview__content">
                                    <div class="listview__heading">Tax Margin: <?php echo $row['tax_margin']."%"; ?></div>
                                   
                                </div>
                            </div>
		<?php }
	}

    public static function get_outlet($id){
        global $db;
        $results = $db->GetArray("SELECT * FROM `tb_shops` WHERE client_id=$id");
        foreach($results as $row){?>
            <!-- <option value="<?php echo $row["tb_shop_id"]; ?>"><?php echo $row["tb_shop_name"]; ?></option> -->
              <a href="#" class="dropdown-item" id="<?php echo $row['tb_shop_id']; ?>"
              onclick="select_shop(this,'this_cat_branch')"><?php echo $row["tb_shop_name"]; ?></a>
        <?php }
    }
}

?>