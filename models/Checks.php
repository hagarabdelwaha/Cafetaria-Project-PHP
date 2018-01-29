<?php include_once('user.php');
session_start();
$user = new User();
 if($user->isAdmin()){  ?>
<!DOCTYPE html>
<?php include 'getClients.php';?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Checks</title>
    <link rel="stylesheet" type="text/css" href="../css/Checks.css">

  </head>
  <body>

<div class="container">
    <div class="tab">
        <button class="tablinks" onClick="document.location.href='AdminHomeAll.php'">Home</button>
        <button class="tablinks"><a href="../All_Products.php">Produts</a></button>
        <button class="tablinks"><a href="../All_Products.php">Users</a></button>
        <button class="tablinks"><a href="../admin.order.php">Manual</a></button>
        <button class="tablinks">Checks</button>
        <img id="userImg" src="../imgs/user.png"/>
        <label name="UserName">Admin</label>
    </div>

      <div>
<form  action="getChecks.php" method="post"  name="myForm" >
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
									     echo "<option value=".$usersName[$i].">";
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
<?php }else{
   header('location:../user.order.php');
 }
?>