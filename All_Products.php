<?php include_once('models/user.php');
session_start();
$user = new User();

if($user->isAdmin()){    ?>
<!DOCTYPE html>
<html>
<head>
	<title> All Products</title>
	<link rel="stylesheet" type="text/css" href="css/pro.css">
</head>
<body>
	<div class="tab">
		<a href="models/AdminHomeAll.php">Home</a>
		<a href="All_Products.php">Products</a>
		<a href="All_Users.php">Users</a>
		<a href="order_done.php">Manual Order</a>
		<a href="models/Checks.php">Checks</a>

		<img id="userImg" src="imgs/user.png" width="40" height="40"/>
		<label name="UserName">user name Islam</label>
	</div>

<h1> All Products </h1>
<p align="right"><a href="Add_Product.php" >Add_Product</a> </p>


<?php


require_once('Products.php');




?>


</body>
</html>
<?php }else{
  header('location:user.order.php');
}
?>