<!DOCTYPE html>
<html lang="en">
    

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Vendor styles -->
        <link rel="stylesheet" href="vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="vendors/bower_components/animate.css/animate.min.css">

        <!-- App styles -->
        <link rel="stylesheet" href="css/app.min.css">
    </head>
<?php require_once("data/class.php"); ?>
    <body data-sa-theme="4">
        <div id="loading_point"></div>  
        <div class="login">
            <!-- Login -->

            <div class="login__block active" id="l-login">
                <h1><?php echo App:: get_app_details()["app_details"]["name"]; ?></h1>
                <div class="login__block__header">
                    <i class="zmdi zmdi-account-circle"></i>
                    Sign in

                    <div class="actions actions--inverse login__block__actions">
                        <div class="dropdown">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-register" href="#" onclick="show_register_page()">Create an account</a>
                                <a class="dropdown-item" data-sa-action="login-switch" data-sa-target="#l-forget-password" href="#">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="login__block__body">
                    <div class="form-group">
                        <input type="text" id="email" class="form-control text-center" placeholder="Email Address">
                    </div>

                    <div class="form-group">
                        <input type="password" id="password" class="form-control text-center" placeholder="Password">
                    </div>

                    <a href="#" id='lnklog' class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></a>

                    <br><br>
                  New User? click <a href="#" onclick="show_register_page()">click here </a>to register
                    <br><br>
                   <a href="#" onclick="show_forgot_password()">Forgot Password?</a>
                  
                </div>
            </div>

            <!-- Register -->
            <?php include('register.php'); ?>

            <!-- Forgot Password -->
            
          <?php include('forget-password.php'); ?> 
        </div>

        <footer  class="footer hidden-xs-down">
            <?php echo App::get_app_details()["app_details"]["copyright"]; ?>
        </footer>

    <script type="text/javascript">
        function show_register_page(){
            $('#l-login').hide();$('#l-register').show();$('#l-forget-password').hide();
            $('#l-login').removeClass('active'); $('#l-register').addClass('active');
            $('#l-forget-password').removeClass('active');
            
           
        }

        function show_login(){
            $('#l-login').show(); $('#l-register').hide(); $('#l-forget-password').hide();
            $('#l-login').addClass('active');$('#l-register').removeClass('active');
            $('#l-forget-password').removeClass('active');
           
            
        }

        function show_forgot_password(){
            $('#l-login').hide(); $('#l-register').hide();
            $('#l-forget-password').show();
             $('#l-forget-password').addClass('active');
            $('#l-login').removeClass('active'); $('#l-register').removeClass('active'); 
           
           
           
        }


    </script>
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="vendors/bower_components/popper.js/dist/umd/popper.min.js"></script>
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- App functions and actions -->
        <script src="js/app.min.js"></script>
        <script src="js/smart-main.hestable.min.js"></script>
        <script src="js/smartjax.min.js"></script>
          <script src="js/sweetalert2.js"></script>
    </body>

</html>