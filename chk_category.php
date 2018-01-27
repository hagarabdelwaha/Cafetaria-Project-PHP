<?php

require_once('models/category_class.php');

$check=false;
if(isset($_POST['catname']))
{


    $testcat=new Category();
    $cname=trim($_POST['catname']);

    if($cname !== "")
    {


	    $testcat->name=$cname;
	    $cat_exist=$testcat->check_cat_name();

		if($cat_exist > 0)
		{
			$nameerror="Category Name is exist please enter Unique Name";
			$check=true;
		}


    }else
    {
    	$nameerror="Enter Category Name ";
			$check=true;
    }


if($check)
{
	header("location:Add_Category.php?errormsg=$nameerror");

}else
{

 $cat=new Category();
 $cat->name=$_POST['catname'];
 $cat->Add_Category();
 header("location:Add_Product.php");

}




}

?>
