<?php

//require_once('models/product_class.php');
require_once('models/user_class.php');

$user=new User();

$users_res=$user->getAllUsers();


              echo "<table border=1>";
              echo "<tr>

                <td>Name</td>
                <td>Room</td>
                <td>Image</td>
                 <td>Ext.</td>
                <td>Action</td>
                </tr>";

                $rowid;

		     while($row= $users_res->fetch(PDO::FETCH_ASSOC))
		     {

               //show users data
		     	echo "<tr>";
               foreach ($row as $key => $value)
                        {

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

				echo "<td>
				  <a href= edit_user.php?id=$rowid> Edit </a>
				  <a href= delete_user.php?id=$rowid> Delete </a>
				  </td>
				  ";


                echo "</tr>";
		        }

		         echo "</table>";


?>
