     <script type="text/javascript">
    function open_data_module(path){
        $("#data-table").html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');
        var promise=Smartjax.ajax({
            url: path,
            data:{ },
            type: 'POST',
            force:true,
            store: false,
        });
        promise.then(function (apiResult) {
            $("#data-table").html(apiResult)
        },function(){
            $("#data-table").html("failed!!");
        })
    }
                            
    function showAjaxModal_data(url){
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div class="page-loader__spinner"> <svg viewBox="25 25 50 50"> <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg> </div>');       
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});            
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response){
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
</script>
        <!-- Javascript -->
        <!-- Vendors -->
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js"></script>

        <!-- Vendors: Data tables -->
        <script src="vendors/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
        <script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>

         <script src="js/smartjax.min.js"></script>
        <script src="js/smart-main.hestable.min.js"></script>
      <!--   <script src="js/sweetalert2.js"></script> -->
        <script src="js/add-items.js"></script>