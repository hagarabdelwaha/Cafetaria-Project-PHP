
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Orders</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/Checks.css">
</head>
<body>
<header class="container">
	<ul id="left-header" class="tab">
		<li><a>Home</a></li> 
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

<section>

	<div class ="container">
	<h3 class="latest_order_header">Latest Order</h3>
		<?php 
		foreach($_SESSION["latest_orders"] as $product ){ ?>
		<figure class="item" name="<?php echo $product[1]; ?>"
		price="<?php echo $product[2]; ?>" id="<?php echo $product[0]; ?>" >
			<img src="imgs/can2.png" width="35px">
			<figcaption><?php echo $product[1]; ?></figcaption>
			<figcaption><?php echo $product[2]."LE" ; ?></figcaption>
			<input type="hidden" class="quantity" value="<?php echo $product[3]; ?>">
		</figure>
		<?php } ?>
	</div>
	<hr>
</section>

<section>
	<br>
	<div id="container" class="container">
		<?php 
		foreach($_SESSION["products"] as $product ){ ?>
		<figure class="item" name="<?php echo $product[1]; ?>"
		price="<?php echo $product[2]; ?>" id="<?php echo $product[0]; ?>" >
			<img src="imgs/can2.png" width="35px">
			<figcaption><?php echo $product[1]; ?></figcaption>
			<figcaption><?php echo $product[2]."LE" ; ?></figcaption>
			<input type="hidden" class="quantity" value="<?php echo $product[3]; ?>">
		</figure>
		<?php } ?>

		<!-- <figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice TeaTeaTea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice TeaTeaTea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice TeaTeaTea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice TeaTeaTea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice TeaTeaTea</figcaption>
		</figure> -->
		
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