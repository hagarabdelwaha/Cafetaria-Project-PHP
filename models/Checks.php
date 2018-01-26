<!DOCTYPE html>
<?php include 'getClients.php';?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Checks</title>
    <link rel="stylesheet" type="text/css" href="Checks.css">

  </head>
  <body>
<form  action="getChecks.php" method="post"  name="myForm" >
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
        <p> Checks </p>
      </div>
        <div>
          <label for="meeting" >Start Date : </label>
          <input id="startDate" name="startDate" type="date" />

          <label  for="meeting">End Date : </label>
          <input id="EndDate" name="endDate" type="date"/>
      </div>

        <div>
              <input id="clientList" list="Clients" placeholder="Clients" name="selectedUser">

              <datalist id="Clients" >
                  <?php
                    for($i=0;$i<$arrLen;$i++)
									     echo "<option value=".$users[$i].">";
									 ?>
              </datalist>

							 <input type="submit" value="confirm">

      </div>

    </div>
</form>
              <script src="checks.js"></script>
							 <script>
                 usersOrders = '<?php if(!empty($_REQUEST['usersData']) ){
		                echo trim($_REQUEST['usersData']);
									}else echo "null";?>';

									productInfo = '<?php if(!empty($_REQUEST['productInfo']) ){
										 echo trim($_REQUEST['productInfo']);
									 }else echo "null";?>';

                  if(usersOrders!='null')
                  {
										console.log("herr",usersOrders.split('$').length);
										update_Checks(usersOrders.split('$').length,usersOrders.split('$'),productInfo.split('$'))
									}

							 </script>

  </body>


</html>
