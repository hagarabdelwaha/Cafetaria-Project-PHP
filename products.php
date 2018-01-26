<?php

require_once('product_class.php');

$product=new Product();

$pros=$product->getAllProducts();



              echo "<table border=1>";
              echo "<tr> 
                
                <td>Product</td>
                <td>Price</td>
                <td>image</td>
                <td>Action</td>
                </tr>";

                $rowid;
                $availability;
		     while($row= $pros->fetch(PDO::FETCH_ASSOC))
		     {
                   
               //show users data
		     	echo "<tr>";
               foreach ($row as $key => $value) 
                        {
                       

                        	if($key=="id")
                        	{
                        		$rowid=$value;
                        	}
                        	else if($key=="quantity")
                        	{
                        		if($value >0)
                        		{
                        			$availability="available";
                        		}else
                        		{
                        			$availability="unavailable";
                        		}
                           
                        	}
                        	else
                        	{
                        		echo "<td>$value</td>";
                        	}
							
			             }  
                
				echo "<td>".$availability."
				  <a href= edit_product.php?id=$rowid> Edit </a>
				  <a href= delete_product.php?id=$rowid> Delete </a>
				  </td>
				  ";
				
              
                echo "</tr>";
		        }

		         echo "</table>";
		     






?>