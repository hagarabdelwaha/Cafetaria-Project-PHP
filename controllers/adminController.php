<?php include_once("../models/admin.php");

$admin= new Admin();
$admin->addUser();
header('location:../admin.order.php');
?>
