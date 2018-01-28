<?php

require_once('models/product_class.php');


$prod=new Product();

$prod->id=$_GET['id'];
$prod->quantity= -1;

$rownum=$prod->delete_product();

header("location:All_Products.php");
exit;
//
// if($rownum >0)
// {
// 	header("location:All_Products.php");
// exit;
// }else
// {
// 	echo "Cant Delete Product";
// }







?>
