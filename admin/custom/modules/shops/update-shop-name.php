 <?php

include('./class.php');
 ?>

 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Name of shop</label>
                                        <input type="text" id="update_shop_name" class="form-control is-valid" value="<?php echo Shops::shop_name($_REQUEST['id']); ?>">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                      

                            <a href="#" class="btn btn-success" style="float: right;" 
                            onclick="update_shop('<?php echo $_REQUEST['id']; ?>')">Update Shop</a>
                        </div>
                    </div>