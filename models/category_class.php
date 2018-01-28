<?php


class Category{

public $id;
public $name;
//****************
public $dbname;
public $host;
public $dbuser;
public $upasswd;
public $dsn;
public $db_connection ;


public function __construct()
{

   // $this->dbname="Cafeteria";
   //  $this->host="localhost";
   //  $this->dbuser="go12";
   //  $this->upasswd="1234";
  $this->dbname="Cafeteria";
    $this->host="localhost";
    $this->dbuser="rania";
    $this->upasswd="rania2017";
  //data source name
   $this->dsn = "mysql:host=$this->host;dbname=$this->dbname";

   $this->db_connection = new PDO($this->dsn, $this->dbuser,$this->upasswd);

   $this->db_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}




public function get_Categories()
{

   $query="select * from  category";
   $select_cats=$this->db_connection->prepare($query);
   $select_cats->execute();
  return $select_cats;
}


public function Add_Category()
{

   $query=" insert into category (name) values(?);";

   $select_cats=$this->db_connection->prepare($query);
   $param=[$this->name];

   $select_cats->execute($param);

  return $select_cats;

}

 public function check_cat_name()
 {
   $query="select name from  category where name= ? ";
   $param=[$this->name];
   $cat_name=$this->db_connection->prepare($query);
    $cat_name->execute($param);
    return $cat_name->rowcount();

 }



}



?>
