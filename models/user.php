<?php 
include("Model.php");
class User extends Model
{
  public $id;
  public $name;
  public $email;
  public $room_number;
  public $extra_room;
  public $image_path;
  public $password;

  function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    session_start();
  ini_set('display_errors','On');
  error_reporting(E_ALL);


   $conn=$this->conn;
  //$conn = new mysqli("localhost","menna","54321again");
  //mysqli_select_db($conn,"Cafeteria");
  if($conn->connect_errno) {
  trigger_error($conn->connect_error);
  }

  $matched="";
  $retEmail="";

  $sql = "SELECT email,id,name FROM users WHERE email = ? and password = ? ";

  $stmt = $conn->stmt_init();
  if ($stmt->prepare($sql)) {
    $email=$_POST['email'];
    $password=$_POST['psw'];
    $password=md5($password);
    $stmt->bind_param("ss",$email,$password);
    $stmt->bind_result($retEmail);
    $result = $stmt->execute();
    $fetch = $stmt->fetch();

    if($result && $fetch)
        if($retEmail)
          $matched=1;

  
    //$login_user = $this->select($variableList);
    $query = "select id,name,email from users where email='".$_POST['email']."'";
    // $query = sprintf("select * from products");
    if(! $result_set = $this->prepareStmt($query)){
      echo $this->conn->connect_error;
          echo " msh tmam";
      return false;
    }
    //$stmt->close();
    $data= $this->getData($result_set);

    //echo "sss".json_encode($data);
    $_SESSION['user_id']=$data[0][0];
    //echo $_SESSION['user_id'];
    $_SESSION['username']=$data[0][1];
    $_SESSION['email']=$data[0][2];
    //echo $_SESSION['username'];
    
    $stmt->close();

  }
  if($matched)
  {

      header('Location: ' ."../controllers/userController.php?");
  }
  else{
      header('Location: ' ."../login.php?");
      exit;
  }
  }



public function selectLastId()
{
  $query = sprintf("select max(id) from %s ",$this->getTableName());

  if(! $result_set = $this->prepareStmt($query)){
    echo $this->conn->connect_error;
    return false;
  }
  //$stmt->close();
  return $this->getData($result_set)[0][0];
}

public function selectLastName()
{
  $query = sprintf("select name from %s order by id desc limit 1 ",$this->getTableName());

  if(! $result_set = $this->prepareStmt($query)){
    echo $this->conn->connect_error;
    return false;
  }
  //$stmt->close();
  return $this->getData($result_set)[0][0];
}


  public function getAllUsers()
  {
    if(!$users = $this->select(["id"=>"id","name"=>"name",0]) ) {
        return false;
      }
      else{
        return $users;
      }
  }

public function isAdmin()
{
  $isadmin=0;
  if((isset($_POST['email']) && $_POST['email']=='omgamal@yahoo.com')
  || (isset($_SESSION['email']) && $_SESSION['email'] =='omgamal@yahoo.com')){
    $isadmin=1;
    return $isadmin;
}
}
}