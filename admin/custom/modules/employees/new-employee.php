<?php
include('./class.php');
@session_start();
?>

 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <input type="text" id="this_name" class="form-control is-valid" placeholder="e.g John Doe">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                       <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>ID/Passport Number</label>
                                        <input type="number" id="this_id" class="form-control is-valid" placeholder="e.g 05032819383">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="number" id="this_number" class="form-control is-valid" placeholder="e.g 25XXXXX">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>

                             <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Place of Residence</label>
                                        <input type="text" id="this_res" class="form-control is-valid" placeholder="e.g Nairobi">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" id="this_email" class="form-control is-valid" placeholder="e.g johndoe@gmail.com">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                            </div>
                         
                           <div class="row">
                               <div class="dropdown-demo">
                                 <div class="dropup">
                                    <button class="btn btn-light" data-toggle="dropdown">Click here to select store</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <?php echo Employees:: get_outlet($_SESSION['user']['userid']); ?> 
                                        <div class="dropdown-divider"></div>
                                       <!--  <a href="#" class="dropdown-item">Separated link</a> -->
                                    </div>
                                </div>
                                <input class="form-control is-valid" type="text" name="this_shop" 
                                id="this_shop" placeholder="selected store" disabled></div>
                               
                            </div>
                           </div>  
                           <div class="row">  <a href="#" class="btn btn-success" style="float: right;" onclick="new_employee()">Save</a></div>
                          
                        </div>
                    </div>