<?php

    include('./class.php');
    @session_start();

    echo Shops::Details($_SESSION['user']['userid'],$_REQUEST['shopId']);

 ?>  