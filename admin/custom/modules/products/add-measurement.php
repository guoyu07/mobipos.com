<?php
include('./class.php');
@session_start();
?>

 <div class="card">
                        <div class="card-body">
                    
                         <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Measurement Name</label>
                                        <input type="text" id="measure_name" class="form-control is-valid" placeholder="e.g Kilograms">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>

                                 <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Measure per unit e.g 1 per bottle or 12 per box</label>
                                        <input type="number" id="unit_measure" class="form-control is-valid" value="1">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                               
                            </div>
                          

                            
                           
                       
                           </div>  
                           <div class="row">  <a href="#" class="btn btn-success" style="float: right;" onclick="new_measurement()">Save</a></div>
                          
                        </div>
                    </div>