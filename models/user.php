<?php include("Model.php");
class User extends Model
{
  public $id;
  public $name;
  public $email;
  public $room_no;
  public $image_path;
  public $psw;

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

  $matched="";
  $retEmail="";

  $sql = "SELECT email FROM users WHERE email = ? and password = ? ";

  $stmt = $conn->stmt_init();
  if ($stmt->prepare($sql)) {
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    $psw=md5($psw);
    $stmt->bind_param("ss",$email,$psw);
    $stmt->bind_result($retEmail);
    $result = $stmt->execute();
    $fetch = $stmt->fetch();
    if($result && $fetch)
        if($retEmail)
          $matched=1;

    $stmt->close();
  }
  if($matched)
  {

      header('Location: ' ."../controllers/userController.php?");
  }
  else{
      header('Location: ' ."../login.php?");
  }
  }
<<<<<<< HEAD


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
  echo $this->getData($result_set)[0][0];
  return $this->getData($result_set)[0][0];
=======
  public function getAllUsers()
  {
    if(!$users = $this->select(["id"=>"id","name"=>"name",0]) ) {
        return false;
      }
      else{
        return $users;
      }
  }
>>>>>>> 35ab2d88c9d18229f018ade97d455c8ce3edc9bf
}

public function isAdmin()
{
  $isadmin=0;
  if($_POST['email']=='omgamal@yahoo.com'){
  $isadmin=1;
  return $isadmin;
  }
}


  }


?>
