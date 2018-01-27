<?php

session_start();
//chk_product.php
//chech product data before inserting in database

//require_once('models/product_class.php');
require_once('models/product_class.php');

//***********************************

$check=false;


//*************************************check name*******************



//**********************************
if($check)
{


$_SESSION['proname']=$_POST['product_name'];
$_SESSION['proprice']=$_POST['product_price'];
$_SESSION['proquantity']=$_POST['product_quantity'];
$_SESSION['procat']=$_POST['category'];



 $errors=$pherror.'</br> '.$nameerror;
 header("location:edit_product.php?errormsg=$errors");

 exit;
}
else
{


$obj=new Product();

//$pro_img='products_imgs/'.$_FILES['product_picture']['name'];

//move_uploaded_file($_FILES['product_picture']['tmp_name'], $pro_img);



$obj->name=$_POST['product_name'];
$obj->price=$_POST['product_price'];
$obj->quantity=$_POST['product_quantity'];
$obj->category_id=$_POST['category'];
//$obj->imagepath=$pro_img;
$obj->id=$_SESSION['proid'];

 $test=$obj->Edit_Product();

  unset($_SESSION['proname']);
  unset($_SESSION['proprice']);
  unset($_SESSION['proquantity']);
  unset($_SESSION['procat']);
  unset($_SESSION['proid']);
 // echo "product edited sucssessfully";

header("location:All_Products.php");


}





?>
