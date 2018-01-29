<?php 
include("Model.php");
//session_start();
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
   
  ini_set('display_errors','On');
  error_reporting(E_ALL);


   $conn=$this->conn;
  //$conn = new mysqli("localhost","menna","54321again");
  //mysqli_select_db($conn,"Cafeteria");
  if($conn->connect_errno) {
  trigger_error($conn->connect_error);
  }

  $matched=0;
  $retEmail="";
  $retID="";
  $retName="";

  $sql = "SELECT email,id,name FROM users WHERE email = ? and password = ? ";

  $stmt = $conn->stmt_init();
  if ($stmt->prepare($sql)) {
    $email=$_POST['email'];
    $password=$_POST['psw'];
    $password=md5($password);
    $stmt->bind_param("ss",$email,$password);

    $result = $stmt->execute();
    $stmt->bind_result($retEmail,$retID,$retName);
    $fetch = $stmt->fetch();

    if($result && $fetch){
        if($retEmail)
          $matched=1;

      }

    $stmt->close();

  }

  if($matched)
  {

    //set user session
    $_SESSION['login'] =1;
    $_SESSION['user_id']=$retID;
    $_SESSION['username']=$retName;
    $_SESSION['email']=$retEmail;

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
  //$isadmin=0;
  return ((isset($_POST['email']) && $_POST['email']=='omgamal@yahoo.com')
  || (isset($_SESSION['email']) && $_SESSION['email'] =='omgamal@yahoo.com'));
    $isadmin=1;

}
}