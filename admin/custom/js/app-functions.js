function select_shop(value,id){
	 var new_value=$(value).attr("id");
	// alert(new_value);

	 var url="./data/apis/employees/show-selected-shop.php?id="+new_value;

	 $.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){

				
					document.getElementById(id).value=response.message;
					
				}else{
					 swal({
                    title: 'Status!',
                    text:response.message,
                    type: 'warning',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });

				}
			}

		});	
	
}

function select_category(outlet_id,branch_name){
	var branch_id=$(outlet_id).attr("id");
	
	document.getElementById("branch_select").value=branch_name;
	console.log(branch_name);

	 var url="./data/apis/products/show-selected-categories.php?id="+branch_id;

	 $.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){  

				var newData = response.success;
				var output ='';
				if(newData==1){
					
					for(var i in response.data){
					var item_name=response.data[i].name;
					output +='<a href="#" class="dropdown-item" id="'+response.data[i].id+
					'" onclick="get_selected_category(this)">'+response.data[i].name+'</a>';

					}

					$('#branch_categories').html(output);

					
				}else if(newData==2){
showAjaxModal('./modules/categories/quick-new-category.php?id='+response.message,"Create category for this outlet");
				}else{
					 swal({
                    title: 'Status!',
                    text:response.message,
                    type: 'warning',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });

				}
			}

		});	
	
}

function get_selected_category(id){
	 var new_value=$(id).attr("id");
	// console.log("the selected_category is "+new_value);

 var url="./data/apis/products/show-selected-category.php?id="+new_value;

	 $.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){

					document.getElementById('cat_selected').value=response.message;
					
				}else{
					 swal({
                    title: 'Status!',
                    text:response.message,
                    type: 'warning',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });

				}
			}

		});	
	// document.getElementById('cat_selected').value=cat_name;
}

function select_measurement(id){
	 var new_value=$(id).attr("id");
	 console.log(new_value);

 var url="./data/apis/products/show-selected-measure.php?id="+new_value;

	 $.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){

					document.getElementById('measure_select').value=response.message;
					
				}else{
					 swal({
                    title: 'Status!',
                    text:response.message,
                    type: 'warning',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });

				}
			}

		});	
	// document.getElementById('cat_selected').value=cat_name;
}
function get_vat_value(select){
	document.getElementById('vat_value').value=select;
}
function radios(val){
	document.getElementById('no_tx').value=val;
					
}

function get_report_details(){
	var from_date=document.getElementById("date_from").value;
	var to_date=document.getElementById("date_to").value;

	var url='./modules/reports/report-details.php?from='+from_date+'&to='+to_date;

	showGraphs(url);
}



