<?php
require_once('../../data/db.php');
global $db;
class Employees{

	public static function list_employees($id){

		global $db;

//WHERE client_id=$id
		$results=$db->GetArray("SELECT * FROM `tb_employees` inner join tb_shops on tb_shops.tb_shop_id=tb_employees.outlet_posted WHERE tb_shops.client_id=$id AND tb_employees.active_status=1");

		?>
		
                            	  <thead>
                                    <tr>
                                    	
                                        <th>Employee Id</th>
                                        <th>Employee Name</th>
                                        <th>ID NO</th>
                                        <th>Retail Outlet</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Deactivate User</th>

                                        
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($results as $row){ ?>            
                                <tr>
                                	<td><?php echo $row["employee_id"]; ?></td>
									<td><?php echo $row["employee_name"]; ?></td>
                                    <td><?php echo $row["ID_NO"]; ?></td>
                                    <td><?php echo $row["tb_shop_name"]; ?></td>
									<td><?php echo $row["email"]; ?></td>
									<td><?php echo $row["phone_number"]; ?></td>
                                     <td><button class="btn btn-light btn--icon" onclick="deleteFxn('<?php echo $row["id"]; ?>','tb_employees','id','employees')"><i class="zmdi zmdi-close"></i></button></td>

								 </tr>	
								  <?php } ?> 

                                </tbody>
	                             
	<?php }



    public static function get_outlet($id){
        global $db;
        $results = $db->GetArray("SELECT * FROM `tb_shops` WHERE client_id=$id");
        foreach($results as $row){?>
            <!-- <option value="<?php echo $row["tb_shop_id"]; ?>"><?php echo $row["tb_shop_name"]; ?></option> -->
              <a href="#" class="dropdown-item" id="<?php echo $row['tb_shop_id']; ?>"
              onclick="select_shop(this,'this_shop')"><?php echo $row["tb_shop_name"]; ?></a>
        <?php }
    }
}

?>