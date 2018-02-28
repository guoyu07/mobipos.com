 <?php

include('./class.php');

@session_start();

?>

 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control is-valid" value="<?php echo Products::product_name($_REQUEST['id']); ?>" disabled>
                                        <i class="form-group__bar"></i>
                                    </div>
                                    <div class="form-group">
                                        <label>Current Inventory In Store</label>
                                        <input type="text" class="form-control is-valid" value="<?php echo Products::inventory_count($_REQUEST['id']); ?> <?php echo $_REQUEST['measure']; ?>" disabled>
                                        <i class="form-group__bar"></i>
                                    </div>

                                      <div class="form-group">
                                        <label>Enter new inventory</label>
                                        <input type="text" class="form-control is-valid" value="0" id="inventory_id">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>                          
                            <a href="#" class="btn btn-success" style="float: right; margin-top: 10px;" 
                            onclick="update_inventory('<?php echo $_REQUEST['id']; ?>')">Update 
                        Inventory</a>
                        </div>
                    </div>