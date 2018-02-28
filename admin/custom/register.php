
       

            <!-- Register -->
            <div class="login__block" id="l-register">

                 <h1><?php echo App:: get_app_details()["app_details"]["name"]; ?></h1>
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Create an account

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item" ></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-login" href="#" onclick="show_login()">Already have an account?</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="#" onclick="show_forgot_password()">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" name="user_name" id="user_name" placeholder="Name">
                    </div>

                    <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" name="biz_name" id="biz_name" placeholder="Business Name">
                    </div>

                     <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" name="phone" id="phone" placeholder="Phone Number">
                    </div>

                     <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" name="residence" id="residence" placeholder="City of Residence">
                    </div>

                     <div class="form-group form-group--centered">
                        <input type="text" class="form-control text-center" name="this_email" id="this_email" placeholder="Email">
                    </div>

                    <div class="form-group form-group--centered">
                        <input type="password" class="form-control text-center" name="this_password" id="this_password" placeholder="Password">
                    </div>

                      <div class="form-group form-group--centered">
                        <input type="password" class="form-control text-center" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                    </div>

                    <!-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Accept the license agreement</span>
                        </label>
                    </div> -->

                    <a href="#" id='lnkadd' onclick="getDetails()" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-plus"></i></a>
                </div>
            </div>

          
        </div>
