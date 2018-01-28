<!DOCTYPE html>

<?php include '../getMyOrder.php';?>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>My Orders</title>
    <link rel="stylesheet" type="text/css" href="../css/myOrder.css">

  </head>
  <body>
<div class="container">
    <div class="tab">
        <button class="tablinks" >Home</button>
        <button class="tablinks" >My Orders</button>

        <img id="userImg" src="../imgs/user.png"/>
        <label name="UserName">user name Islam</label>
    </div>

      <div>
		<form action="../getMyOrder.php" method="post" name="myform">

        <p> My Order </p>

      </div>
			<div>
				<label for="meeting" >Start Date : </label>
				<input id="startDate" name="startDate" type="date" />

				<label  for="meeting">End Date : </label>
				<input id="EndDate" name="endDate" type="date"/>
		</div>

        <div>


							 <input type="submit" value="confirm">

      </div>

    </div>
	</form>

		<script src="../js/myOrder.js"></script>

  </body>

</html>
