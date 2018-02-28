

<?php @session_start() ?>
<aside class="sidebar">
                <div class="scrollbar-inner">
                    <div class="user">
                        <div class="user__info" data-toggle="dropdown">
                            <img class="user__img" src="demo/img/profile-pics/8.jpg" alt="">
                            <div>
                                <div class="user__name">
                                     <?php echo User::get_details($_SESSION['user']['userid'])["user_details"]["name"]; ?>
                                </div>
                                <div class="user__email"> <?php echo User::get_details($_SESSION['user']['userid'])["user_details"]["email"]; ?></div>
                            </div>
                        </div>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">View Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="login.php">Logout</a>
                        </div>
                    </div>

                    <ul class="navigation">
                        <li class="@@widgetactive"><a href="./"><i class="zmdi zmdi-widgets"></i> Dashboard</a></li>

                       
                       <!--  <li class="data-name="money-box" data-code="f198""><a href="#"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Sales</a></li> -->
                         <li class="@@indexactive"><a href="#" onclick="open_module('./modules/shops/all.php')"><i class="zmdi zmdi-home zmdi-hc-fw"></i> Retail Outlets</a></li>
                         <li class="@@widgetactive"><a href="#" onclick="open_module('./modules/categories/all.php')"><i class="zmdi zmdi-menu zmdi-hc-fw"></i> Categories</a></li>
                         <li class="@@typeactive"><a href="#" onclick="dataredirect('./modules/products/all.php')"><i class="zmdi zmdi-tag zmdi-hc-fw"></i> Products</a></li>
                        

                        <li class="@@widgetactive"><a href="#" onclick="open_module('./modules/employees/all.php')"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> Employees</a></li>
                         <li class="@@widgetactive"><a href="#" onclick="open_module('./modules/reports/details.php')">
                          <i class="zmdi zmdi-chart zmdi-hc-fw"></i> Reports</a></li>
                         <li class="@@widgetactive"><a href="#" onclick="open_module('./modules/settings/all.php')"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> Mobile App Settings</a></li>

                    </ul>
                </div>
            </aside>