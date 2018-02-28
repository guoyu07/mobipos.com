<?php

    include('./class.php');

    @session_start();

 ?>   

 <header class="content__title">
                  

                    <div class="actions">
                           
                        </div>
                </header>
<div class="row">
           <div class="col-md-8">
              <div class="card">
                 <div class="card-header"><h3>Retail Outlets </h3></div>  
                   <div class="card-body">
                       <button href="#" class="btn btn-secondary btn--icon" 
                            onclick="showAjaxModal('./modules/shops/new-outlet.php','New Shop Outlet')" style="float: left;"><i class="zmdi zmdi-plus"></i></button>

                      <div class="table-responsive">
                            <table id="data-table" class="table">
                                <?php echo Shops::list_shops($_SESSION['user']['userid']); ?>
                            </table>
                      </div>                    
            
                    </div>
              </div>
                
            </div>

              <div class="col-md-4" style="margin-left: 0px;">
                <div class="card">
                   <div class="card-header"><h3 id="shop_details"></h3><h3> Details</h3></div>  
                   <div class="card-body" id="shop_data">
                 
                    </div>
                </div>
                  
            </div>  


 </div>
                
             
