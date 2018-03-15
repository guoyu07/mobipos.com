<?php

include('./class.php');
@session_start();
?>
 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h5>Enter the Printer Name</label>
                                        <input type="text" id="this_printer_name" class="form-control is-valid" placeholder="e.g Printer A">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                   <div class="form-group">
                                        <h5>Enter the Printer MAC Address</label>
                                        <input type="text" id="this_printer_mac" class="form-control is-valid" placeholder="e.g 9E:AS:3D:34:9C">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                               
                        </div>

                         <div class="row">
                               <div class="dropdown-demo">
                                 <div class="dropup">
                                    <button class="btn btn-light" data-toggle="dropdown">Click here to select store</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                      <?php echo Settings:: get_outlet($_SESSION['user']['userid']); ?> 
                                        <div class="dropdown-divider"></div>
                                       <!--  <a href="#" class="dropdown-item">Separated link</a> -->
                                    </div>
                                </div>
                                <input class="form-control is-valid" type="text" name="this_cat_branch" 
                                id="this_cat_branch" placeholder="selected store" disabled></div>
                               
                            </div>
                      <input type="number" name="vat_value" id="vat_value" hidden>

                            <a href="#" class="btn btn-success" style="float: right;" 
                            onclick="new_printer()">ADD PRINTER</a>
                        </div>
                    </div>