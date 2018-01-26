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
	<div id="right-header"><img  src="imgs/person.png"><h3 id="username">User Name</h3></div>
</header>

<section>
	<div id="container">
		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice Tea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice Tea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice Tea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice Tea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice Tea</figcaption>
		</figure>

		<figure class="item">
			<img src="imgs/can2.png" width="35px">
			<figcaption>Ice Tea</figcaption>
		</figure>
		
		
	</div>
	
	<aside>
		<form action="controllers/orderController.php">
			Tea <input type="" name="">
			Cola <input type="" name="">
			Notes <textarea></textarea>
			Room <select>
				<option>Room 1</option>
				<option>Room 2</option>
			</select>
			<br>
			<br>
			<br>
			<input type="submit" name="">
		</form>
		
	</aside>
</section>
</body>
</html>