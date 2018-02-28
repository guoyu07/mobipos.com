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
                                        <input type="text" id="update_product_name" class="form-control is-valid" value="<?php echo Products::product_name($_REQUEST['id']); ?>">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                              <div class="row">
                               <div class="dropdown-demo">
                                 <div class="dropup">
                                    <button class="btn btn-light" data-toggle="dropdown">Click here to select unit of Measure</button>
                                    <div class="dropdown-menu dropdown-menu-right" >
                                      <?php echo Products:: select_measurement($_SESSION['user']['userid']); ?> 
                                        <div class="dropdown-divider"></div>
                                       <!--  <a href="#" class="dropdown-item">Separated link</a> -->
                                    </div>
                                </div>
                              </div>
                              <br>
                                <input class="form-control is-valid" type="text" name="measure_select" 
                                id="measure_select" value="<?php echo $_REQUEST['measure']; ?>" disabled>
                        </div>

                            <a href="#" class="btn btn-success" style="float: right; margin-top: 10px;" 
                            onclick="update_product('<?php echo $_REQUEST['id']; ?>')">Update 
                        Product</a>
                        </div>
                    </div>