<?php
session_start();

require_once('models/user_class.php');

$rom=new User();
$rooms=$rom->get_rooms();

$exrom=new User();
$extr_rooms=$exrom->get_rooms();


if(!empty($_GET['id']))
{

  $_SESSION['userid']=$_GET['id'];

   $usr=new User();
   $usr->id=$_GET['id'];

   $usr_data=$usr->get_user();


       while($row= $usr_data->fetch(PDO::FETCH_ASSOC))
         {


               foreach ($row as $key => $value)
                      {

                               if($key=="name")
                               {
                                $_SESSION['usrname']=$value;
                               }
                               else if($key=="room_number")
                               {
                                $_SESSION['romnum']=$value;
                               }
                              else if($key=="extra_room")
                               {
                                $_SESSION['extranum']=$value;
                               }
                               else if($key=="extra_room")
                                {
                                 $_SESSION['extranum']=$value;
                                }
                                else if($key=="image_path")
                                 {
                                  $_SESSION['img']=$value;
                                 }




                      }

          }



}



?>

<htm></!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
  <link rel="stylesheet" type="text/css" href="css/pro.css">
</head>
<body>

<form action="editusr.php" method="post"  >

  <div class="tab">
  	<a href="models/AdminHomeAll.php">Home</a>
  	<a href="All_Products.php">Products</a>
  	<a href="All_Users.php">Users</a>
  	<a href="order_done.php">Manual Order</a>
  	<a href="models/Checks.php">Checks</a>

  	<img id="userImg" src="imgs/user.png" width="40" height="40"/>
  	<label name="UserName">user name Islam</label>
  </div>

<table>
 <tr>
 	<h1> Edit User </h1>

 </tr>
 <tr>
 	<td><label>Name</label></td>
 	<td><input type="text" name="user_name" required  value=" <?php if(isset($_SESSION['usrname'])){echo $_SESSION['usrname'];}?>"/></td>
 </tr>

 <tr>
 	<td><label>Rooms_Numbers</label></td>
 	<td>
 		<select  name="rooms"   required>

          <?php


              while ($row=$rooms->fetch(PDO::FETCH_ASSOC))
               {


                      foreach ($row as $key => $value) {


                        echo '<option class="rooms"  name="rooms" value=" ';
                       echo $value.' " ';


                        if(isset($_SESSION['romnum']))
                        {

                           if($_SESSION['romnum']==$value)
                           {
                             echo 'selected="selected"';
                           }


                        }

                        echo '>'.$value.'</option> ';

                      }



               }


             ?>


 		</select>
 	</td>
 </tr>


<tr>
  <td><label>Extra_Rooms</label></td>
  <td>
    <select  name="exrooms"   required>

          <?php


              while ($exrow=$extr_rooms->fetch(PDO::FETCH_ASSOC))
               {


                      foreach ($exrow as $key => $value) {


                        echo '<option class="exrooms"  name="exrooms" value=" ';
                       echo $value.' " ';


                        if(isset($_SESSION['extranum']))
                        {

                          if($_SESSION['extranum']==$value)
                           {
                             echo 'selected="selected"';
                           }



                        }

                        echo '>'.$value.'</option> ';

                      }



               }


             ?>


    </select>
  </td>
 </tr>

<tr>
<td> <img src="<?php echo   $_SESSION['img']; ?>" width="150" height="150" /></td>
</tr>


 <tr>
 	<td><input type="submit" name="btn_Save" value="Edit"></td>
 	<td><input type="reset" name="btn_rest"></td>
 </tr>
 <tr>
 	<td colspan="2"> <center><label name="lblerror" style="color: red"> <?php

       if(!empty($_GET['errormsg']))
       {

       	$error= $_GET['errormsg'];
         echo $error;
       }
 	?> </label></center></td>
 </tr>
</table>


</form>
</body>
</html>
