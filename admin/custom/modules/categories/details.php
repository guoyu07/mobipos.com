<?php

    include('./class.php');
    @session_start();

    echo Category::Details($_REQUEST['categoryId']);

 ?>  