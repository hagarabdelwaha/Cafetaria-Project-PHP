<?php

session_start();
//chk_product.php
//chech product data before inserting in database

//require_once('models/product_class.php');
require_once('product_class.php');


//***********************************

$check=false;


if(empty($_POST['product_name']))
{
$check=true;
$n="name is required <br>";
}

if(empty($_POST['product_price'])){

	$check=true;
	$pr="price is required <br>";
}

if(empty($_POST['product_quantity'])){

	$check=true;
	$pq="quantity is required <br>";
}

if(empty($_POST['category'])){

	$check=true;
	$pc="category is required";
}


//***************************check photo********************

   $file_ext=strtolower(end(explode('.',$_FILES['product_picture']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $pherror="extension not allowed, please choose a JPEG or PNG  or JPG file.";
         $check=true;
        }

//*************************************check name*******************
    $obj=new Product();
    $obnm=trim($_POST['product_name']);
    
    if($obnm !== "")
    {
    	 

	    $obj->name=$obnm;
	    $pro_exist=$obj->check_product_name();

		if($pro_exist > 0)
		{
			$nameerror="Product Name is exist please enter Unique Name";
			$check=true;
		}
		

    }else
    {
    	$nameerror="Enter Product Name ";
			$check=true;
    }
 
   



//**********************************
if($check)
{

/*
$_SESSION['proname']=$_POST['product_name'];
$_SESSION['proprice']=$_POST['product_price'];
$_SESSION['proquantity']=$_POST['product_quantity'];
$_SESSION['procat']=$_POST['category'];*/

$name=$_POST['product_name'];
$price=$_POST['product_price'];
$quant=$_POST['product_quantity'];
$cat=$_POST['category'];

$pimg=$_FILES['product_picture']['name'];

 $errors=$pherror.'</br> '.$nameerror.$n.$pr.$pq.$pc;
 header("location:Add_Product.php?errormsg=$errors&price=$price&name=$name&cat=$cat&quant=$quant&img=$pimg");
 exit;

}
else
{


  /*unset($_SESSION['proname']);
  unset($_SESSION['proprice']);
  unset($_SESSION['proquantity']);
  unset($_SESSION['procat']);*/



$productobj=new Product();

$pro_img_path='products_imgs/'.$_FILES['product_picture']['name'];

move_uploaded_file($_FILES['product_picture']['tmp_name'], $pro_img_path);


$productobj->name=trim($_POST['product_name']);

$productobj->price=$_POST['product_price'];
$productobj->quantity=$_POST['product_quantity'];
$productobj->category_id=$_POST['category'];

$productobj->imagepath=$pro_img_path;

$productobj->Add_Product();


//echo "product added sucssessfully";

header("location:All_Products.php");


}





?>