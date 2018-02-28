<?php

    include('./class.php');
    require_once('../../data/class.php');

    @session_start();

 ?>   

 <header class="content__title">
                  

                    <div class="actions">
                           
                          <!--   <a href="#" class="actions__item zmdi zmdi-check-all"></a> -->
                        </div>
                </header>
<div class="row">
           <div class="col-md-8">
                <div class="card">
                       <div class="card-header"><h3>Categories</h3></div>  
                   <div class="card-body">
                    <div>
                      <button class="btn btn-secondary  btn--icon" 
                            onclick="dataredirect('./modules/categories/new-category.php','New Category',false)" style="float: center;"><i class="zmdi zmdi-plus"></i></button>

                    </div>
                       
                      <div class="table-responsive">
                        <?php if(!isset($_REQUEST["page"])) { $page = 1; } else { $page = $_REQUEST["page"]; } ?>
                            <table id="data-table" class="table">
                                <?php echo Category::list_categories($_SESSION['user']['userid'],
                                $page,5); ?>
                            </table>
                            <div>
                               <?php App::datatable_display_pagination(5, $page, 'tb_categories', 
                            'categories',$_SESSION['user']['userid']); ?>
                            </div>
                           
                      </div>                    
            
                    </div>
            </div>
                </div>
                

              <div class="col-md-4" style="margin-left: 0px;">
                <div class="card">
                  <div class="card-header"><h3 id="category_details"></h3><h3> Details</h3></div>  
                   <div class="card-body" id="category_data">
                 
                    </div>
                </div>
                   
            </div>  


 </div>
                
             
