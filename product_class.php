<?php

class Product
{
 
 public $id;
 public $name;
 public $price;
 public $quantity;
 public $category_id;
 public $imagepath;


 public function Add_Product()
 {
 	
 	//*************************************connect to database**************************** 
 	$dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="insert into products (name,price,quantity,category_id,imagepath) values (?,?,?,?,?)";


   $insert_statm=$db_connection->prepare($query);

   $insert_parameters=[$this->name,$this->price,$this->quantity,$this->category_id,$this->imagepath];
   
    $insert_statm->execute($insert_parameters);
 
 }

//*******************

 public function Edit_Product()
 {
 	
 	//*************************************connect to database**************************** 
 	$dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="update products  set name=? ,price=?,quantity=?,category_id=?,imagepath=? where id=?";


   $edit_statm=$db_connection->prepare($query);

   $edit_parameters=[$this->name,$this->price,$this->quantity,$this->category_id,$this->imagepath,$this->id];
   
    $edit_statm->execute($edit_parameters);
 
 }









//************get products names

 public function check_product_name()
 {


 	$dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="select name from  products where name= ? ";

   $param=[$this->name];

   $product_name=$db_connection->prepare($query);
   
    $product_name->execute($param);

    return $product_name->rowcount();

 }




public function getAllProducts()
{

  	$dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="select id,name,price,quantity,imagepath from  products ";

   $select_products=$db_connection->prepare($query);

    $select_products->execute();
 
  return $select_products;


}


public function delete_product()
{

  $dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="delete  from products where id= ?";

   $param=[$this->id];

   $product_name=$db_connection->prepare($query);
   
    $product_name->execute($param);

    return $product_name->rowcount();

}



public function get_product()
{

  $dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="select * from  products where id = ? ";

    $param=[$this->id];
   $select_product=$db_connection->prepare($query);

   
    $select_product->execute($param);
 
  return $select_product;


}



}











?>