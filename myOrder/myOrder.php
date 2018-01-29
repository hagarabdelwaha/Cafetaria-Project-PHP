<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>My Orders</title>
    <link rel="stylesheet" type="text/css" href="myOrder.css">

  </head>
  <body>
<form  action="getMyOrder.php" method="post"  name="myForm" >
<div class="container">
    <div class="tab">
        <button class="tablinks" >Home</button>
        <button class="tablinks" >My Orders</button>

        <img id="userImg" src="user.png"/>
        <label name="UserName">user name Islam</label>
    </div>

      <div>
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
              <script src="myOrder.js"></script>
							 <script>
                 userOrders = '<?php if(!empty($_REQUEST['usersData']) ){
		                echo trim($_REQUEST['usersData']);
									}else echo "null";?>';

									productInfo = '<?php if(!empty($_REQUEST['productInfo']) ){
										 echo trim($_REQUEST['productInfo']);
									 }else echo "null";?>';

                  if(userOrders!='null')
                  {
										// console.log("herr",userOrders.split('$').length);
										console.log(userOrders.split('$'))
										update_order(userOrders.split('$').length,userOrders.split('$'),productInfo.split('$'))
									}

							 </script>

  </body>


</html>
