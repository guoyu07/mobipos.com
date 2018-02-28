function deleteFxn(id,tb_name,col_id,module_name){
	
	var values="id="+id+"&tb_name="+tb_name+"&col_name="+col_id;
	var url="./data/apis/delete-fxn.php?"+values;
                swal({
                    title: 'Are you sure?',
                    text: 'This Item will be deleted permanently',
                    type: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonClass: 'btn btn-light',
                    background: 'rgba(0, 0, 0, 0.96)'
                }).then(function(){
                	$.ajax({
			url:url,
			type:"GET",
			url:url,
			dataType:"json",
			success: function(response){

				var newData = response.success;
				if(newData==1){
					 swal({
                    title: 'Delete Status!',
                    text:response.message,
                    type: 'success',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });
											
			
				open_module('./modules/'+module_name+'/all.php');
				}else{
					 swal({
                    title: 'Delete Status!',
                    text:response.message,
                    type: 'warning',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-sm btn-light',
                    background: '#4A7C43'
                });

				}
			}

		});	
                 
      });
            
}