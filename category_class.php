<?php


class Category{

public $id;
public $name;



public function get_Categories()
{
    $dbname="Cafeteria";
    $host="localhost";
    $dbuser="go12";
    $upasswd="1234";
  
  //data source name
   $dsn = "mysql:host=$host;dbname=$dbname";

   $db_connection = new PDO($dsn, $dbuser, $upasswd);

   $db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
   $query="select * from  category";

   $select_cats=$db_connection->prepare($query);

   $select_cats->execute();
 
  return $select_cats;


}




}










?>