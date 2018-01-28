<?php

session_start();
//chk_product.php
//chech product data before inserting in database

//require_once('models/product_class.php');
require_once('models/product_class.php');

//***********************************

$check=false;


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

// if(!empty($_POST['img']))
// {
//
//   $pimg_path='products_imgs/'.$_FILES['img']['name'];
//   echo $$pimg_path;
//   move_uploaded_file($_FILES['img']['tmp_name'], $pimg_path);
// }

$obj->name=$_POST['product_name'];
$obj->price=$_POST['product_price'];
$obj->quantity=$_POST['product_quantity'];
$obj->category_id=$_POST['category'];

// if(isset($pro_img))
// {
//   $obj->imagepath=$pro_img;
// }else {
//   $obj->imagepath=$_SESSION['imgpath'];
// }

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
