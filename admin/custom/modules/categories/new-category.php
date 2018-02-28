<?php
include('./class.php');
@session_start();
?>

 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" id="this_category" class="form-control is-valid" placeholder="e.g Drinks">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                        <div class="row">
                               <div class="dropdown-demo">
                                 <div class="dropup">
                                    <button class="btn btn-light" data-toggle="dropdown">Click here to select store</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <?php echo Category:: get_outlet($_SESSION['user']['userid']); ?> 
                                        <div class="dropdown-divider"></div>
                                       <!--  <a href="#" class="dropdown-item">Separated link</a> -->
                                    </div>
                                </div>
                                <input class="form-control is-valid" type="text" name="this_cat_branch" 
                                id="this_cat_branch" placeholder="selected store" disabled></div>
                               
                            </div>
                          

                            
                           
                       
                           </div>  
                           <div class="row">  <a href="#" class="btn btn-success" style="float: right;" onclick="new_category('1')">Save</a></div>
                          
                        </div>
                    </div>