<?php
include('./class.php');

@session_start();
?>

<div class="row">
           <div class=" col-lg-12">
           	<div class="card">
                
                  <div class="card-body">
                      <div class="row">
                       <?php echo $_REQUEST['from']; ?>
                                
                      </div>
                      <div class="table-responsive">
                         <?php if(!isset($_REQUEST["page"])) { $page = 1; } else { $page = $_REQUEST["page"]; } ?>
                            <table id="data-table" class="table">
                             <?php  echo Reports::Sales_Orders($_SESSION['user']['userid'],$page,10,$_REQUEST['from'],$_REQUEST['to']);  ?>

                            </table>
                             <?php Reports::datatable_display_pagination($_SESSION['user']['userid'],10, $page, 'reports', 
                            $_REQUEST['from'],$_REQUEST['to']); ?>
                      </div>                    
            
                    </div> 
           	 </div>
                  
            </div>
 </div>