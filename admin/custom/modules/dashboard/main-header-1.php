 <?php

 //   include('class.php');
    @session_start() ;
 ?>

<div class="row ">
	<div class="col-sm-2 col-md-3">
		
		<div class="card  " style="padding-left: 5px;">
	 <div class="card-header"><h5>Total Sales</h5></div>
	  <div class="card-body" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Branch Performance" data-content="<?php echo Dashboard::popover_data($_SESSION['user']['userid']); ?>"> 
	   <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'total_sale')); ?></h2> </div>
</div>
	</div>

	<div class="col-sm-2 col-md-3">
		
		<div class="card  " style="padding-left: 5px;">
	 <div class="card-header"><h5>Today's Sales(Plus Tax)</h5></div>
	  <div class="card-body" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Branch Performance" data-content="<?php echo Dashboard::popover_data_todays($_SESSION['user']['userid']); ?>"> 
	   <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'todays_sale')); ?></h2> </div>
</div>
	</div>
	

	<div class="col-sm-2 col-md-3">
		
		<div class="card  " style="padding-left: 5px;">
	 <div class="card-header"><h5>Today's Inventory</h5></div>
	  <div class="card-body" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Branch Performance" data-content="<?php echo Dashboard::popover_data_todays_inventory($_SESSION['user']['userid']); ?>"> 
	   <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'todays_inventory')); ?></h2> </div>
</div>
	</div>
	

<div class="col-sm-2 col-md-3">
		
		<div class="card  " style="padding-left: 5px;">
	  <div class="card-header"><h5>Todays Gross Profit Gain</h5></div>
	  <div class="card-body" data-toggle="popover" data-trigger="hover" data-placement="bottom" title="Branch Performance" data-content="<?php echo Dashboard::popover_data_todays_profit($_SESSION['user']['userid']); ?>"> 
	   <h2><?php echo number_format(Dashboard:: total_sales($_SESSION['user']['userid'],'todays_sale')-Dashboard:: total_sales($_SESSION['user']['userid'],'todays_inventory')); ?></h2> </div>
</div>
	</div>
	



</div>
