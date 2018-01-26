<!DOCTYPE html>
<?php include 'returnCurrentOrder.php';?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="Checks.css">
  </head>
  <body>
<div class="container">
    <div class="tab">
        <button class="tablinks" >Home</button>
        <button class="tablinks" >Produts</button>
        <button class="tablinks">Users</button>
        <button class="tablinks">Manual</button>
        <button class="tablinks">Checks</button>
        <img id="userImg" src="user.png"/>
        <label name="UserName">user name Islam</label>
    </div>

      <div>
        <p> Orders</p>
      </div>



</div>

   	<script src="CurrentOrder.js"></script>
		<script>

			var orders_Array=<?php echo json_encode($p);?>;
			var arr_length=<?php echo $arrLen;?>;
			console.log(arr_length,orders_Array);

       for(var num=0;num<arr_length;num++){
			    var order = orders_Array[num].split(":");
		        update_html(order[0],order[1],order[2],order[3],order[4].split(','),order[5].split(','),order[6]);
		  }

		</script>
  </body>
</html>
