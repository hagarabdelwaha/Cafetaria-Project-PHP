<?php

//require_once('models/product_class.php');
require_once('models/user_class.php');

$user=new User();
//<td>Ext.</td>

$users_res=$user->getAllUsers();


              echo '<table border=1 class="t01" >';
              echo "<tr>

                <td>Name</td>
                <td>Room</td>
                <td>Image</td>
                 
                <td>Action</td>
                </tr>";

                $rowid;

		     while($row= $users_res->fetch(PDO::FETCH_ASSOC))
		     {

               //show users data
		     	echo "<tr>";
               foreach ($row as $key => $value)
                        {
                          if($key=="name")
                          {
                            if($value=="Deleted")
                            {
                                break;
                            }
                          }

                            	if($key=="id")
                            	{
                            		$rowid=$value;
                            	}
                                else if($key=="image_path") //imagePath
                                {

                                    echo ' <td> <img src="'.$value.'" width="100" height="100"/> </td> ';

                                }
                            	else
                            	{

                            		echo "<td>$value</td>";

                            	}

			             }


         if(!empty($rowid))
         {
           echo "<td>
   				  <a href= edit_user.php?id=$rowid> Edit </a>
   				  <a href= delete_user.php?id=$rowid> Delete </a>
   				  </td>
   				  ";


                   echo "</tr>";
         }

		        }

		         echo "</table>";


?>
