<?php
session_start();
//require_once('models/product_class.php');
//require_once('models/category_class.php');
require_once('product_class.php');
require_once('category_class.php');

$cats=new Category();

$cats_arr=$cats->get_Categories();



if(!empty($_GET['id']))
{

  $_SESSION['proid']=$_GET['id'];
   
   $pro=new Product();
   $pro->id=$_GET['id'];

   $pro_data=$pro->get_product();   
   

       while($row= $pro_data->fetch(PDO::FETCH_ASSOC))
         {
                   
               
          
               foreach ($row as $key => $value) 
                      {

                               if($key=="name")
                               {
                                $_SESSION['proname']=$value;
                               }
                               else if($key=="price")
                               {
                                $_SESSION['proprice']=$value;
                               }
                              else if($key=="quantity")
                               {
                                $_SESSION['proquantity']=$value;
                               }
                              else if($key=="category_id")
                               {
                                $_SESSION['procat']=$value;
                               }/*
                               else if($key=="imagepath")
                               {
                                $_SESSION['imgpath']=$value;
                               }*/
                         
                         
                         

                      }

          }
  


}



?>

<htm></!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
</head>
<body>

<form action="edit.php" method="post" enctype="multipart/form-data" >

<table>
 <tr>
 	<h1> Edit Product </h1>
 	
 </tr>	
 <tr>
 	<td><label>Product</label></td>
 	<td><input type="text" name="product_name" required  value=" <?php if(isset($_SESSION['proname'])){echo $_SESSION['proname'];}?>"/></td>
 </tr>
  <tr>
 	<td><label>Price</label></td>
 	<td><input type="number" name="product_price" min="0"  required  value="<?php echo $_SESSION['proprice'];?>" />EGP</td>
 </tr>

 <tr>
 	<td><label>Category</label></td>
 	<td>
 		<select  name="category"   required>

          <?php

              $cid;
              $catnam;
             
              while ($row=$cats_arr->fetch(PDO::FETCH_ASSOC))
               {
                      
                  foreach ($row as $key => $value) 
                        {
                          if($key=='id')
                          {
                              $cid=$value;
                          }else if($key=='name')
                          {
                            $catnam=$value;
                          }

                          
                        }
                      
                       echo '<option class="category"  name="category" value=" ';
                       echo $cid.' " ';
                        echo '>'.$catnam.'</option> ';  
                
               }


             ?>

 			<!-- option class="category" name="category" value="" selected="selected"></option>
 			<option class="category"  name="category"  value="1" >Hot Drinks</option>
 			<option class="category"  name="category"   value="2" >Juice </option>
 			<option class="category"  name="category"  value="3" >cold Drinks</option> -->
 			
 		</select>
 	</td>

 </tr>
  <tr>
 	<td><label>Quantity</label></td>
 	<td><input type="number" name="product_quantity" min="0"  required  value="<?php echo $_SESSION['proquantity'];?>" /></td>
 </tr>
  <tr>
 	<td><label>Product Picture</label></td>
 	<td><input type="file" name="product_picture" required></td>
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
