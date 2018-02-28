<!DOCTYPE>
<html lang="en">

<?php include('css.php'); ?>

<?php require_once("./data/class.php"); ?>
<body data-sa-theme="4">

	<?php include('header.php'); ?>
	  <main class="main">
            <div class="page-loader">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                    </svg>
                </div>
            </div>

            <?php include('header.php'); ?>
            <?php include('navbar.php'); ?>
            <?php include('modal.php'); ?>
            <?php include('modal-xl.php'); ?>

             <section class="content" id="container">
                
                	
                  <?php require_once('modules/dashboard/dashboard.php'); ?> 

                </div>	
             </section>   
      </main> 


      <?php include('js.php'); ?>

      <script type="text/javascript">
	function open_module(path){
		$("#container").html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');
		var promise=Smartjax.ajax({
			url: path,
			data:{ },
			type: 'POST',
			force:true,
			store: false,
		});
		promise.then(function (apiResult) {
			$("#container").html(apiResult)
		},function(){
			$("#container").html("failed!!");
		})
	}
							
	function showAjaxModal(url,title){
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modal_ajax .modal-body').html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');		
		// LOADING THE AJAX MODAL
		jQuery('#modal_ajax').modal('show', {backdrop: 'true'});			
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response){
				jQuery('#modal_ajax .modal-body').html(response);
				jQuery('#modal_ajax .modal-title').html(title);
			}
		});
	}

	function showLargeModal(url,title){
		// SHOWING AJAX PRELOADER IMAGE
		jQuery('#modalxl .modal-body').html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');		
		// LOADING THE AJAX MODAL
		jQuery('#modalxl').modal('show', {backdrop: 'true'});			
		// SHOW AJAX RESPONSE ON REQUEST SUCCESS
		$.ajax({
			url: url,
			success: function(response){
				jQuery('#modal_xl .modal-body').html(response);
				jQuery('#modal_xl .modal-title').html(title);
			}
		});
	}

	function refreshDetailsModule(id,path){
		// SHOWING AJAX PRELOADER IMAGE
		var queryId="#"+id;
		$(queryId).html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');
		var promise=Smartjax.ajax({
			url: path,
			data:{ },
			type: 'POST',
			force:true,
			store: false,
		});
		promise.then(function (apiResult) {
			$(queryId).html(apiResult)
		},function(){
			$(queryId).html("failed!!");
		})
	}

	function dataredirect(open_url,title,employeeStatus){
		var url="./data/data-checker.php?";
		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
			//	alert(employeeStatus);
				if(newData==1){
					showAjaxModal('./modules/shops/new-outlet.php',response.message);
				}else if(newData==2  || newData==3  && employeeStatus){
					//alert('return logic 4')
					showAjaxModal('./modules/employees/new-employee.php','New Employee');
				}else if(newData==2){
					showAjaxModal('./modules/categories/new-category.php',response.message);
				}else if(newData==3){
					showAjaxModal('./modules/products/add-measurement.php',response.message);
				}else if(newData==2 && !employeeStatus){
					
					showAjaxModal(open_url,title);
				}else if(newData==5){
					showAjaxModal('./modules/settings/add-tax-margin.php',response.message);
				}
				else{
					
					open_module(open_url);
				}
			}

		});	
	}

	function showGraphs(path){
		
			$('#load_graphs').hide();
			$("#load_branch_graphs").html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');
		var promise=Smartjax.ajax({
			url: path,
			data:{ },
			type: 'POST',
			force:true,
			store: false,
		});
		promise.then(function (apiResult) {
			
			$("#load_branch_graphs").html(apiResult)
		},function(){
			$("#load_branch_graphs").html("failed!!");
		});
	}

	function showDashboardTabs(path,id){

		//var queryId="#"+id;
		$("#home-2").html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');
		var promise=Smartjax.ajax({
			url: path,
			data:{ },
			type: 'POST',
			force:true,
			store: false,
		});
		promise.then(function (apiResult) {
			$("#home-2").html(apiResult)
		},function(){
			$(queryId).html("failed!!");
		})
	}


</script>
</body>

</html>    
