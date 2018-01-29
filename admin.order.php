
<?php
session_start();
include_once('models/user.php');
 if(!isset($_SESSION['all_users']) && empty($_SESSION['all_users']))
 	header('location:controllers/orderController.php');
$user = new User();
if($user->isAdmin()){
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Orders</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<ul id="left-header">
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
	<br>
	<div id="container" class="container">
		<?php 
		foreach($_SESSION["products"] as $product ){ ?>
		<figure class="item" name="<?php echo $product[1]; ?>"
		price="<?php echo $product[2]; ?>" id="<?php echo $product[0]; ?>" >
			<img src="<?php echo isset($product[5])&& !empty($product[5])?$product[5]:'imgs/coffe.png' ?>" width="35px">
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
			<div class="user_id" >User name  <select name="user_id">
				<?php foreach ($_SESSION["all_users"] as $key => $value) { ?>
					<option value="<?php echo $value[0]; ?>"><?php echo $value[1]; ?></option>
				<?php } ?>
			</select></div>
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
<?php }else{
	header('location:login.php');
}
?>