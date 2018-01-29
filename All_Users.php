<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/pro.css">
</head>
<body>

	<div class="tab">
		<a href="models/AdminHomeAll.php">Home</a>
		<a href="All_Products.php">Products</a>
		<a href="All_Users.php">Users</a>
		<a href="admin.order.php">Manual Order</a>
		<a href="models/Checks.php">Checks</a>

		<img id="userImg" src="imgs/user.png" width="40" height="40"/>
		<label name="UserName">user name Islam</label>
	</div>

<table>
	<h1>All Users</h1>
	<tr><td width="800px"><a href="regist.php" align="right">add user</a></td></tr>
</table>

<?php

require_once('Users.php');

?>





</body>
</html>
