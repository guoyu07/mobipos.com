<?php
include('./class.php');
@session_start();

$id=$_REQUEST['id'];
?>

 <div class="card">
                        <div class="card-body">
                             <div class="row">
                               
                                <input class="form-control is-valid" type="text" name="this_cat_branch" 
                                id="this_cat_branch" value="<?php echo Category::shop_name($id); ?>" disabled></div>
                               
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" id="this_category" class="form-control is-valid" placeholder="e.g Drinks">
                                        <i class="form-group__bar"></i>
                                    </div>
                                </div>
                        </div>
                    
                           </div>  
                           <div class="row">  <a href="#" class="btn btn-success" style="float: right;" onclick="new_category('2','2')">Save</a></div>
                          
                        </div>
                    </div>