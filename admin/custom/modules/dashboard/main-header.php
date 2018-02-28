 <?php

    include('class.php');
    @session_start();
 ?>

 <div class="row quick-stats">
                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                                <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'total_sale')); ?></h2>
                                <small>Total Sales</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">6,4,8,6,5,6,7,8,3,5,9</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                               <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'todays_sale')); ?></h2>
                                <small>Todays Sales</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">4,7,6,2,5,3,8,6,6,4,8</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                               <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'todays_inventory')); ?></h2>
                                <small>Todays Inventory</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">9,4,6,5,6,4,5,7,9,3,6</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <div class="quick-stats__item">
                            <div class="quick-stats__info">
                               <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'todays_sale')-Dashboard:: total_sales($_SESSION['user']['userid'],'todays_inventory')); ?></h2>
                                <small>Todays Profit Gain</small>
                            </div>

                            <div class="quick-stats__chart peity-bar">5,6,3,9,7,5,4,6,5,6,4</div>
                        </div>
                    </div>
                </div>