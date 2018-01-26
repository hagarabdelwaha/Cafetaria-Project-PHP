<?php
session_start();

if(isset($_GET['cat']))
{

	$selectedcat=$_GET['cat'];
	echo $selectedcat;
}


require_once('category_class.php');

$cats=new Category();

$cats_arr=$cats->get_Categories();


?>

<htm></!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>

<form action="chk_product.php" method="post" enctype="multipart/form-data" >

<nav>
  <a href="">Home</a>|
  <a href="All_Products.php">Products</a>|
  <a href="All_Users.php">Users</a>|
  <a href="">Manual Order</a>|
  <a href="">Checks</a>|
</nav>

<section>
<table>
 <tr>
 	<h1> Add Product </h1>
 	
 </tr>	
 <tr>
 	<td><label>Product</label></td>
 	<td><input type="text" name="product_name" required  value="<?php if(!empty($_GET)){ if(isset($_GET['name'])){echo $_GET['name'];}} ?>"/></td>
 </tr>
  <tr>
 	<td><label>Price</label></td>
 	<td><input type="number" name="product_price" min="0"  required  value="<?php if(isset($_GET['price'])){echo $_GET['price'];}?>" />EGP</td>
 </tr>

 <tr>
 	<td><label>Category</label></td>
 	<td>
 		<select  name="category"   required>
 			
             <?php

              $cid;
              $catnam;
             
              while ($row=$cats_arr->fetch(PDO::FETCH_ASSOC))
               {
                    	
                  foreach ($row as $key => $value) 
                        {
                        	if($key=='id')
                        	{
                              $cid=$value;
                        	}else if($key=='name')
                        	{
                        		$catnam=$value;
                        	}

                        	
                        }
                      
                       echo '<option class="category"  name="category" value=" ';
                       echo $cid.' " ';

                        if(isset($_GET['cat']))
                        { 

	                        if($cid==$_GET['cat'])
	                        {
	                          echo 'selected="selected"';
	                        } 

                        }
                        

                       echo '>'.$catnam.'</option> ';  

               }


             ?>

 			<!-- <option class="category" name="category" value="" selected="selected"></option>
 			<option class="category"  name="category"  value="1" >Hot Drinks</option>
 			<option class="category"  name="category"   value="2" >Juice </option>
 			
 			<option class="category"  name="category"  value="3" >cold Drinks</option> -->
 			
 		</select>
 	</td>
 	<td><a href="Add_Category.html">Add Category</a></td>
 </tr>
  <tr>
 	<td><label>Quantity</label></td>
 	<td><input type="number" name="product_quantity" min="0"  required  value="<?php if(isset($_GET['quant'])){echo $_GET['quant'];}?>" /></td>
 </tr>
  <tr>
 	<td><label>Product Picture</label></td>
 	<td><input type="file" name="product_picture" required  ></td>
 </tr>
 <tr>
 	<td><input type="submit" name="btn_Save"></td>
 	<td><input type="reset" name="btn_rest"></td>
 </tr>
 <tr>
 	<td colspan="2"> <center><label name="lblerror" style="color: red"> <?php 
       
       if(!empty($_GET['errormsg']))
       {

       	$error= $_GET['errormsg'];
         echo $error;
       }
 	?> </label></center></td>
 </tr>
</table>
</section>

</form>
</body>
</html>
