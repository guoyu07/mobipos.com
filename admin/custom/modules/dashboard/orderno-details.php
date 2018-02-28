<?php

    include('./details.php');
    @session_start();

    echo DashBoard::order_details($_REQUEST['orderno']);

 ?>  