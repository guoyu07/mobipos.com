
<?php include('amchart.php'); ?>
 <?php  include('monthly-sale.php'); ?> 
<div class="row">
<div class="col-lg-6">
                        <div class="card">
                             <h4 class="card-header"><?php echo date("F Y"); ?> Sales</h4>
                            <div class="card-body">
                                 <div id="this_month" style="width: 100%;height: 400px;"></div>
                               
                            </div>
                        </div>
</div>
<div class="col-lg-6">
                        <div class="card">
                             <h4 class="card-header"><?php echo date('F Y',strtotime('-11 months')).' to '.
                             date('F Y',strtotime('-0 months')).' Sales'; ?></h4>
                            <div class="card-body">
                                  <div id="chartdiv_12_months" style="width: 100%;height: 400px;"></div>
                            </div>
                        </div>
</div>

</div>