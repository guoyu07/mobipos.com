function update_shop(id){
	var name=document.getElementById('update_shop_name').value;

	var values='id='+id+'&name='+name;
	var url="./data/apis/shops/update-shop.php?"+values;

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

function update_category(id){
	var name=document.getElementById('update_category_name').value;

	var values='id='+id+'&name='+name;
	var url="./data/apis/category/update-category.php?"+values;

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
										
				//	jQuery('#modal_ajax').toggle();
					open_module('./modules/categories/all.php');	
				}else{
					 swal({
                    title: 'Category Status!',
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


function update_product(id){
	var name=document.getElementById('update_product_name').value;
	var measure=document.getElementById('measure_select').value;

	var values='id='+id+'&name='+name+'&measure='+measure;
	var url="./data/apis/products/update-product.php?"+values;

		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Product Status!',
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
                    title: 'Product Status!',
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
function update_inventory(id){
	var new_inv=document.getElementById('inventory_id').value;

	var values='id='+id+'&new_inv='+new_inv;
	var url="./data/apis/products/update-inventory.php?"+values;

		$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Product Status!',
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
                    title: 'Product Status!',
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