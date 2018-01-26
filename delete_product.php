<?php

require_once('product_class.php');


$prod=new Product();

$prod->id=$_GET['id'];

$prod->delete_product();

header("location:All_Products.php");
exit;






?>