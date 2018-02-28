<?php

    include('./class.php');

    @session_start();

 ?>   

 <header class="content__title">
                    <h1>Employees</h1>

                    <div class="actions">
                          
                           
                        </div>
                </header>
                
 <div class="card">
     <div class="card-body">
              <button href="#" class="btn btn-secondary  btn--icon" 
                            onclick="dataredirect('./modules/employees/new-employee.php','New Employee',true)" style="float: center;"><i class="zmdi zmdi-account-add"></i></button>
            <div class="table-responsive">
                            <table id="data-table" class="table">
                                <?php echo Employees::list_employees($_SESSION['user']['userid']); ?>
                            </table>
            </div>                    
            
     </div>
</div>


