<?php

    include('./class.php');

    @session_start();

 ?>   

<div class="row">
           <div class="col-md-8">
              <div class="card">
                 <div class="card-header"><h3>All Settings </h3>
                 </div>  
                   <div class="card-body">
                    <div class="row">
                      <div class="col-md-6" style="margin-left: 0px;">
                          <div class="card">
                             <div class="card-header"><h3> Tax Margins</h3></div>  
                             <div class="card-body">
                                <div style="float: right;">
                                  <button href="#" class="btn btn-light btn--icon" onclick='showAjaxModal("./modules/settings/add-tax-margin.php","Add Tax Margin")' ><i class="zmdi zmdi-plus"></i></button></div>

                                 
                          </div>
                         </div>
                  
                     </div> 
                     <div class="col-md-6" style="margin-left: 0px;">
                          <div class="card">
                             <div class="card-header"><h3> Discounts</h3></div>  
                             <div class="card-body" >
                   
                          </div>
                         </div>
                  
                     </div> 
                    </div>
                     <div class="row">
                      <div class="col-md-6" style="margin-left: 0px;">
                          <div class="card">
                             <div class="card-header"><h3> Printers</h3></div>  
                             <div class="card-body" >
                   
                          </div>
                         </div>
                  
                     </div> 
                     <div class="col-md-6" style="margin-left: 0px;">
                          <div class="card">
                             <div class="card-header"><h3> Stock Alert Settings</h3></div>  
                             <div class="card-body">
                   
                          </div>
                         </div>
                  
                     </div> 
                    </div>
                      
                   </div>
              </div>
                
            </div>

              <div class="col-md-4" style="margin-left: 0px;">
                <div class="card">
                   <div class="card-header"><h3> Details</h3></div>  
                   <div class="card-body" id="setting_data">
                        <?php echo Settings::get_tax_margins($_SESSION['user']['userid']); ?>
                    </div>
                </div>
                  
            </div>  


 </div>
                
             
