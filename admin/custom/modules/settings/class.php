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
}

?>