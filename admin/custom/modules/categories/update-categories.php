 <?php

include('./class.php');
 ?>

 <div class="card">
                        <div class="card-body">
                    
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" id="update_category_name" class="form-control is-valid" value="<?php echo Category::category_name($_REQUEST['id']); ?>">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                      

                            <a href="#" class="btn btn-success" style="float: right;" 
                            onclick="update_category('<?php echo $_REQUEST['id']; ?>')">Update Category</a>
                        </div>
                    </div>