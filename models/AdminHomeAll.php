<!DOCTYPE html>
<?php include 'returnCurrentOrder.php';?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Home</title>

    <link rel="stylesheet" type="text/css" href="../css/Checks.css">
  </head>
  <body>
<div class="container">
    <div class="tab">
        <button class="tablinks" >Home</button>
        <button class="tablinks" >Produts</button>
        <button class="tablinks">Users</button>
        <button class="tablinks">Manual</button>
        <button class="tablinks">Checks</button>

        <img id="userImg" src="../imgs/user.png"/>
        <label name="UserName">user name Islam</label>
    </div>

      <div>
        <p> Orders</p>
      </div>



</div>


   	<script src="CurrentOrder.js"></script>
		<script>

		</script>
		<div hidden>
				<form id="form" action="Admin.php" method='post'>
						<input id="done_order" name="done_order">
				</form>
		</div>
  </body>
</html>
