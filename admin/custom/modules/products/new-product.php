<?php
include('./class.php');
@session_start();
?>

 <div class="card">
                        <div class="card-body">
                    
                        <div class="row">
                               <div class="dropdown-demo">
                                 <div class="dropup">
                                    <button class="btn btn-light" data-toggle="dropdown">Click here to select store</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <?php echo Products:: get_outlet($_SESSION['user']['userid']); ?> 
                                        <div class="dropdown-divider"></div>
                                       <!--  <a href="#" class="dropdown-item">Separated link</a> -->
                                    </div>
                                </div>
                              </div>
                              <br>
                                <input class="form-control is-valid" type="text" name="branch_select" 
                                id="branch_select" placeholder="selected store" disabled>
                        </div>

                         <div class="row">
                               <div class="dropdown-demo">
                                 <div class="dropup">
                                    <button class="btn btn-light" data-toggle="dropdown">Click here to select Category</button>
                                    <div class="dropdown-menu dropdown-menu-right" id="branch_categories">
                                    
                                    </div>
                                </div>
                              </div>
                              <br>
                                <input class="form-control is-valid" type="text" name="cat_selected" 
                                id="cat_selected" placeholder="selected Category" disabled>
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
                                id="measure_select" placeholder="selected store" disabled>
                        </div>

                        <br>
                         <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" id="product_name" class="form-control is-valid" placeholder="e.g soda">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>

                         <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Initial stock</label>
                                        <input type="number" id="initial_stock" class="form-control is-valid" placeholder="e.g 100" value="">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>

                         <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Buying Price</label>
                                        <input type="number" id="buying_price" class="form-control is-valid" placeholder="e.g 100" value="">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>

                         <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <input type="number" id="selling_price" class="form-control is-valid" placeholder="e.g 120">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                          <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Low Stock Alert Number</label>
                                        <input type="number" id="low_stock_count" class="form-control is-valid" placeholder="e.g 10">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                         <div class="row">
                                <div class="col-lg-12">
                                  <?php echo Products::get_tax_margins($_SESSION['user']['userid']); ?>

                                   <label class="custom-control custom-radio">
                                <input id="radio" name="radio" id="inc" type="radio" class="custom-control-input" checked onchange="radios('0')">
                                
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">No Tax</span>
                            </label>
                                </div>  

                        </div>
                        <div class="row">
                        <div class="col-lg-6">  <a href="#" class="btn btn-success" style="float: right;" onclick="new_product()"> Save </a></div>  
                        </div>


                     
                            </div>
            
                            
                             <input type="text"  id="no_tx" value="1" hidden />
                       
                           </div>  
                         
                          
                        </div>
                    </div>
