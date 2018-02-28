
 <?php

 
  $id=$_REQUEST['id']; 
  $name=$_REQUEST['name']; 


  ?>
<div> <input id='branch_name' value="<?php echo $id; ?>" hidden>
<div class="row">
    <?php  include('monthly-sale.php'); ?> 
<div class="col-lg-12">
                        <div class="card">
                             <h4 class="card-header">
                               <?php echo $name; ?> <?php echo date("F Y"); ?> Sales</h4>
                            <div class="card-body">
                                


                        <div class="tab-container">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home-2" role="tab" onclick="showDashboardTabs('./modules/dashboard/branch-sales-graph.php?id=<?php echo $id; ?>&name=<?php echo $name; ?>','#home-2')">Month sale(Graph)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile-2" role="tab" onclick="showDashboardTabs('./modules/dashboard/branch-todays-sale.php?id=<?php echo $id ?>','#home-2')">Todays Sale</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages-2" role="tab">Stats</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings-4" role="tab">Settings</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active fade show" id="home-2" role="tabpanel">

                                   <?php include("branch-sales-graph.php"); ?>
                                </div>
                             
                                </div>
                            </div>
                        </div>
                               
                            </div>
                        </div>
</div>


</div>