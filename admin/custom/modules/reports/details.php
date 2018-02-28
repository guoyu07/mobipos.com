<?php

//require_once('../../data/class.php');
//include('./class.php');

@session_start();

?>

<div class="row">
	
	<div class="col-lg-4">
			
				<div class="card">
				
				<div class="card-body">
					<div class="form-group">
           			
          			  <input type="date" id="date_from" class="form-control is-valid" placeholder="select date">
         			   <i class="form-group__bar"></i>
        			 </div>
				</div>
			</div>
		</div>

		<div class="col-lg-4">	
			<div class="card">
				
				<div class="card-body">
					 <div class="form-group">
          
            <input type="date" id="date_to" class="form-control is-valid" placeholder="select date">
            <i class="form-group__bar"></i>
         </div>
				</div>
			</div>	
		</div>

		<div class="col-lg-4">
			<div class="card-body">
				 <button href="#" class="btn btn-outline-secondary" onclick="get_report_details()">View</button>
			</div>	
		</div>

</div>
		
<div class="row" id='load_branch_graphs'>
	
</div>