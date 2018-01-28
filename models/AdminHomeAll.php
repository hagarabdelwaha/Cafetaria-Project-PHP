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
        <button class="tablinks">Home</button>
        <button class="tablinks" >Produts</button>
        <button class="tablinks">Users</button>
        <button class="tablinks">Manual</button>
        <button class="tablinks" onClick="document.location.href='Checks.php'" >Checks</button>

        <img id="userImg" src="../imgs/user.png"/>
        <label name="UserName">user name Islam</label>
    </div>

      <div>
        <p> Orders</p>
      </div>



</div>


   	<script src="CurrentOrder.js"></script>

		<script>

			var orders_Array=<?php echo json_encode($users_orders);?>;
			var arr_length=<?php echo $arrLen;?>;
			var productsInfo_arr=<?php echo json_encode($products_price); ?>;
			console.log(arr_length,orders_Array);

       for(var num=0;num<arr_length;num++){
			    var order = orders_Array[num].split(":");
		        update_html(order[0],order[1],order[2],order[3],order[4].split(','),order[5].split(','),order[6],productsInfo_arr);
		  }
     console.log(order_date);
		</script>

		<div hidden>
				<form id="form" action="Admin.php" method='post'>
						<input id="done_order" name="done_order">
				</form>
		</div>
  </body>
</html>
