<?php
include('./details.php');
 require_once('../../data/class.php');

$id=$_REQUEST['id'];


?>

<div class="row">
           <div class=" col-md-8">
           	<div class="card">
                 <div class="card-header"><h3>Orders</h3></div> 
                  <div class="card-body">
                      <div class="row">
                       
                                
                      </div>
                      <div class="table-responsive">
                         <?php if(!isset($_REQUEST["page"])) { $page = 1; } else { $page = $_REQUEST["page"]; } ?>
                            <table id="data-table" class="table">
                             <?php  echo Dashboard::load_todays_sale($id,$page,10);  ?>

                            </table>
                             <?php Dashboard::datatable_display_pagination(10, $page, 'tb_products', 
                            'dashboard',$id); ?>
                      </div>                    
            
                    </div> 
           	 </div>
                  
            </div>
            <div class="col-md-4">
            	<div class="card">
                 <div class="card-header"><h3> Details</h3></div>  
                   <div class="card-body" id="order_details">
                   
                    </div>
            </div>

            </div>
             

          


 </div>