function new_employee(){
	
	var name=document.getElementById("this_name").value;
	var id_no=document.getElementById("this_id").value;
	var phone_number=document.getElementById("this_number").value;
	var residence=document.getElementById("this_res").value;
	var email=document.getElementById("this_email").value;
	var shop=document.getElementById("this_shop").value;

	var values="name="+name+"&id="+id_no+"&phone_number="+phone_number+"&residence="+residence+
	"&email="+email+"&shop="+shop;
	var url="./data/apis/employees/new-user.php?"+values;
		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'User Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
											
			//		jQuery('#modal_ajax').toggle();
				open_module('./modules/employees/all.php');
				}else{
					 swal({
                    title: 'User Status!',
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

function new_shop(){
	var shop_name=document.getElementById("this_shop").value;
	var url="./data/apis/shops/new-shop.php?name="+shop_name;

		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Outlet Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
										
				//	jQuery('#modal_ajax').toggle();
					open_module('./modules/shops/all.php');	
				}else{
					 swal({
                    title: 'Outlet Status!',
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

function new_category(val){
	var category=document.getElementById("this_category").value;
	var branch=document.getElementById("this_cat_branch").value;

	var values="category_name="+category+"&branch="+branch;
	var url="./data/apis/category/new-category.php?"+values;


		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Category Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
											
				if(val==='1'){
					open_module('./modules/categories/all.php');
				}else if(val==='2'){
					open_module('./modules/products/new-product.php');
				}
				}else{
					 swal({
                    title: 'Outlet Status!',
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
function new_product(){
	var product_name=document.getElementById("product_name").value;
	var category_name=document.getElementById("cat_selected").value;
	var initial_stock=document.getElementById("initial_stock").value;
	var shop_name=document.getElementById("branch_select").value;
	var unit_of_measure=document.getElementById("measure_select").value;
	var buying_price=document.getElementById("buying_price").value;
	var selling_price=document.getElementById("selling_price").value;
	var low_stock_count=document.getElementById("low_stock_count").value;
	var tax_mode=document.getElementById("no_tx").value;

	var values="product_name="+product_name+"&category_name="+category_name+"&initial_stock="+
	initial_stock+"&shop_name="+shop_name;
	var values_2="&measure="+unit_of_measure+"&buying_price="+
	buying_price+"&selling_price="+selling_price+"&tax_mode="+tax_mode+"&low_stock_count="+low_stock_count;
	var url="./data/apis/products/new-product.php?"+values+values_2;

	
		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'product Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
											
				//	jQuery('#modal_ajax').toggle();
					open_module('./modules/products/all.php');
				}else{
					 swal({
                    title: 'Outlet Status!',
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

function new_measurement(){
	var measure_name=document.getElementById("measure_name").value;
	var unit_measure=document.getElementById("unit_measure").value;
	
	var values="measure_name="+measure_name+"&unit="+unit_measure;
	var url="./data/apis/products/add-measurement.php?"+values;

		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Unit of meaure Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
											
				//	jQuery('#modal_ajax').toggle();
					open_module('./modules/products/all.php');
				}else{
					 swal({
                    title: 'Outlet Status!',
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

function new_tax(){
	var tax_margin=document.getElementById("this_vat").value;
	var mode=document.getElementById("vat_value").value;
	var url="./data/apis/settings/add-tax-margin.php?tax_margin="+tax_margin+"&mode="+mode;

		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Settings Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
										
				//	jQuery('#modal_ajax').toggle();
					open_module('./modules/settings/all.php');	
				}else{
					 swal({
                    title: 'Settings Status!',
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


