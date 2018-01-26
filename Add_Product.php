<?php
session_start();



if(isset($_SESSION['proname']))
{	
	echo $_SESSION['proname'];
	echo $_SESSION['proprice'];
	echo $_SESSION['proquantity'];
	echo $_SESSION['procat'];	
}

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

<table>
 <tr>
 	<h1> Add Product </h1>
 	
 </tr>	
 <tr>
 	<td><label>Product</label></td>
 	<td><input type="text" name="product_name" required  value=" <?php echo $_GET['name']; ?>"/></td>
 </tr>
  <tr>
 	<td><label>Price</label></td>
 	<td><input type="number" name="product_price" min="0"  required  value="<?php echo $_GET['price'];?>" />EGP</td>
 </tr>

 <tr>
 	<td><label>Category</label></td>
 	<td>
 		<select  name="category"   required>
 			<option class="category" name="category" value="" selected="selected"></option>
 			<option class="category"  name="category"  value="1" >Hot Drinks</option>
 			<option class="category"  name="category"   value="2" >Juice </option>
 			<option class="category"  name="category"  value="3" >cold Drinks</option>
 			
 		</select>
 	</td>
 	<td><a href="Add_Category.html">Add Category</a></td>
 </tr>
  <tr>
 	<td><label>Quantity</label></td>
 	<td><input type="number" name="product_quantity" min="0"  required  value="<?php echo $_GET['quant'];?>" /></td>
 </tr>
  <tr>
 	<td><label>Product Picture</label></td>
 	<td><input type="file" name="product_picture" required></td>
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


</form>
</body>
</html>
