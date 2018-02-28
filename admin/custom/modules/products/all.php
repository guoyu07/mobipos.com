<?php

    include('./class.php');
    require_once('../../data/class.php');

    @session_start();

 ?>   

 <header class="content__title">
                  

                    <div class="actions">
                           
                        </div>
                </header>
<div class="row">
           <div class="card col-md-12">
                 <div class="card-header"><h3>Products</h3></div>  
                   <div class="card-body">
                      <div>
                         <button href="#" class="btn btn-secondary btn--icon" 
                            onclick="dataredirect('./modules/products/new-product.php','New Product',false)" style="float: left;"><i class="zmdi zmdi-plus"></i></button>

                           <button href="#" class="btn btn-secondary btn--icon--text" 
                           onclick="showAjaxModal('./modules/products/add-measurement.php','Add New Measurement')" style="float: right;"><i class="zmdi zmdi-plus"></i>add measurement</button>
                              
                           
                      </div>
                      <div class="table-responsive">
                         <?php if(!isset($_REQUEST["page"])) { $page = 1; } else { $page = $_REQUEST["page"]; } ?>
                            <table id="data-table" class="table">
                                <?php echo Products::list_products($_SESSION['user']['userid'],
                                $page,7); ?>

                            </table>
                             <?php App::datatable_display_pagination(7, $page, 'tb_products', 
                            'products',$_SESSION['user']['userid']); ?>
                      </div>                    
            
                    </div>
            </div>

            <!--   <div class="card col-md-4" style="margin-left: 0px;">
                   <div class="card-title"><h3 id="category_details"></h3><h3> Details</h3></div>  
                   <div class="card-body" id="shop_data">
                     
                                        
            
                    </div>
            </div>   -->


 </div>
                
             
