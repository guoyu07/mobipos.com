<?php

include("controllers/db.php");
global $db;

Class ReceiptData{
  public static function client_id($orderId){

    global $db;
    $employee_id=$db->GetOne("SELECT employee_id FROM tb_app_orders WHERE order_no='".$orderId."'");

    $client_id=$db->GetOne("SELECT client_id FROM tb_employees WHERE id=$employee_id");

    return $client_id;

  }
}

?>
