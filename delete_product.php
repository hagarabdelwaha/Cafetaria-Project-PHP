<?php

require_once('models/product_class.php');


$prod=new Product();

$prod->id=$_GET['id'];

$rownum=$prod->delete_product();

if($rownum >0)
{
	header("location:All_Products.php");
exit;
}else
{
	echo "Cant Delete Product";
}







?>
