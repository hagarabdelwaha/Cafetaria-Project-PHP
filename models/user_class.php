<?php

class User
{

 public $id;
 public $name;
 public $email;
 public $password;
 public $room_num;
 public $ext_room;
 public $imagepath;

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




 public function Edit_User()
 {

   $query="update users set  name=?,room_number=?,extra_room=? where id=?";
   $edit_statm=$this->db_connection->prepare($query);
   $edit_parameters=[$this->name,$this->room_num,$this->ext_room,$this->id];
    $edit_statm->execute($edit_parameters);
    return $edit_statm->rowcount();

 }



public function getAllUsers()
{

   $query="select id,name,room_number, image_path ,extra_room from  users ";
   $users=$this->db_connection->prepare($query);
    $users->execute();
  return $users;


}


public function delete_user()
{

     $query="delete  from users where id= ?";
     $param=[$this->id];
     $usr=$this->db_connection->prepare($query);
      $usr->execute($param);
      return $usr->rowcount();

}



public function get_user()
{

   $query="select * from  users where id = ? ";
    $param=[$this->id];
   $select_product=$this->db_connection->prepare($query);
    $select_product->execute($param);
  return $select_product;


}


public function get_rooms()
{

     $query="select * from rooms";
     $select_rooms=$this->db_connection->prepare($query);
      $select_rooms->execute();
    return $select_rooms;

}



}




?>
