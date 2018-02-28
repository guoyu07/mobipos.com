<?php
$from=$_REQUEST['from'];
$to=$_REQUEST['to'];
 ?>

<div class="col-lg-12">
                        <div class="card">
                             <h4 class="card-header">
                              Reports</h4>
                            <div class="card-body">
                                


                        <div class="tab-container">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home-2" role="tab" onclick="showDashboardTabs('./modules/dashboard/order-reports.php?id=<?php echo $id; ?>&from=<?php echo $from; ?>&to=<?php echo $to; ?>','report-home')">Order Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile-2" role="tab">Product Information</a>
                                </li>
                               <!--  <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages-2" role="tab">Stats</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#settings-4" role="tab">Settings</a>
                                </li> -->
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active fade show" id="report-home" role="tabpanel">

                                   <?php
                                    $url="order-reports.php?from=".$from."&to=".$to;
                                    header("location:".$url); ?>
                                </div>
                             
                                </div>
                            </div>
                        </div>
                               
                            </div>
                        </div>
</div>

