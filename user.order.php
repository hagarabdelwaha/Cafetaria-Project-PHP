
<?php session_start();


 if(!isset($_SESSION["latest_orders"])) {
 	header('location:controllers/orderController.php');
}
 if(!isset($_SESSION['login']) && empty($_SESSION['login']))
 	header('location:login.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Orders</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<ul id="left-header" class="tab">
<!-- 		<li><a>Home</a></li> 
 -->		<li><a href="controllers/logoutController.php">Logout</a></li>
		    <li><a>My Orders</a></li>
	</ul>
	<div id="right-header"><img  src="imgs/person.png"><h3 id="username">User Name</h3>
	</div>

</header>
<section class="search_form">
<form method="post" action="controllers/orderController.php">
		<input type="text" name="search_key">
		<input type="submit" name="search_submit">
	</form>
</section>
<?php 
if(isset($_GET['success']) && !empty($_GET['success']))
	echo "<section  style='height:10px;text-align: center;'>
	<label>Your Order will be ready in 10 minutes,Thank You</label>
</section>";

?>
<?php if(isset($_SESSION["latest_orders"]) && !empty($_SESSION["latest_orders"])){
?>
<section>

	<div class ="container">
	<h3 class="latest_order_header">Latest Order</h3>
		<?php 
		foreach($_SESSION["latest_orders"] as $product ){ ?>
		<figure class="item" name="<?php echo $product[1]; ?>"
		price="<?php echo $product[2]; ?>" id="<?php echo $product[0]; ?>" >
			<img src="<?php echo isset($product[5])&& !empty($product[5])?$product[5]:'imgs/coffe.png' ?>" width="35px">
			<figcaption><?php echo $product[1]; ?></figcaption>
			<figcaption><?php echo $product[2]."LE" ; ?></figcaption>
			<input type="hidden" class="quantity" value="<?php echo $product[3]; ?>">
		</figure>
		<?php }  ?>
	</div>
	<hr>
</section>
		<?php }  ?>

<section>
	<br>
	<div id="container" class="container">
		<?php 
		foreach($_SESSION["products"] as $product ){ ?>
		<figure class="item" name="<?php echo $product[1]; ?>"
		price="<?php echo $product[2]; ?>" id="<?php echo $product[0]; ?>" >
			<img src="<?php echo (isset($product[5]) && !empty($product[5]))?$product[5]:'imgs/coffe.png' ?>" width="35px">
			<figcaption><?php echo $product[1]; ?></figcaption>
			<figcaption><?php echo $product[2]."LE" ; ?></figcaption>
			<input type="hidden" class="quantity" value="<?php echo $product[3]; ?>">
		</figure>
		<?php } ?>		
	</div>
</section>
<aside>
		<form method="post" action="controllers/orderController.php">
			<!-- Tea <input type="" name="">
			Cola <input type="" name=""> -->
			<div id="products"></div>
			Notes <textarea name="notes"></textarea>
			Room <select name="room_id">
			<?php foreach($_SESSION["rooms"] as $room){ ?>
				<option  id="<?php echo $room[0]; ?>"> Room <?php echo $room[0]; ?> </option>
			<?php } ?>
			</select>
			<input type="hidden" id="total_price" name="total_price">
			<label name="total" id="total" >0</label><label>EGP</label>
			<br>
			<br>
			<br>
			<input type="submit" name="">
		</form>
		
	</aside>
	<script type="text/javascript" src="js/append_items_to_order.js"></script>
</body>
</html>