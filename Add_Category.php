<!DOCTYPE html>
<html>
<head>
	<title> Add Category</title>
	<link rel="stylesheet" type="text/css" href="css/pro.css">
</head>
<body>
<form action="chk_category.php" method="post">
	<div class="tab">
		<a href="models/AdminHomeAll.php">Home</a>
		<a href="All_Products.php">Products</a>
		<a href="All_Users.php">Users</a>
		<a href="admin.order.php">Manual Order</a>
		<a href="models/Checks.php">Checks</a>

		<img id="userImg" src="imgs/user.png" width="40" height="40"/>
		<label name="UserName">user name Islam</label>
	</div>

<h1> Add Category </h1>
<p align="right"><a href="Add_Product.php" >Add_Product</a> </p>

<table>

	<tr>
		<td><label>Category Name:</label></td>
		<td><input type="text" name="catname" required></td>
	</tr>
    <tr><td><input type="submit" name="Add Category" value="Add Category"></td></tr>
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
