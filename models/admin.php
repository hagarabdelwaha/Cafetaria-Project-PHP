<?php include_once("Model.php");
class Admin extends Model
{

  function __construct()
  {
    parent::__construct();
  }
  public function validate()
  {
    $errors="?";
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if (empty($_POST["name"]) || empty($_POST["email"])|| empty($_POST["psw"]) || empty($_POST["psw-repeat"]) ||
       empty($_POST["roomNo"]) || empty($_POST["Ext"]) || empty($_POST["file"]))
       {
         if (empty($_POST["name"]))
         {
        $nameErr=" name is required";
        $errors .="nameErr=$nameErr"."&";
         }
         if (empty($_POST["email"]))
         {
        $mailErr="Email is required";
        $errors .="mailErr=$mailErr"."&";
         }
         if (empty($_POST["psw"]))
         {
        $pswErr="Password is required";
        $errors .="pswErr=$pswErr"."&";
         }
         if (empty($_POST["psw-repeat"]))
         {
        $pswrErr="confirm password";
        $errors .="pswrErr=$pswrErr"."&";
         }
         if (empty($_POST["roomNo"]))
         {
        $roomErr="room no is required";
        $errors .="roomErr=$roomErr"."&";
         }
         if (empty($_POST["Ext"]))
         {
        $extErr="Ext is required";
        $errors .="extErr=$extErr"."&";
         }
         if (empty($_POST["file"]))
         {
        $fileErr="profile picture is required";
        $errors .="fileErr=$fileErr"."&";
         }

    }
    if($_POST["psw-repeat"] != $_POST["psw"])
    {
      $confirmErr=" password doesn`t match";
       $errors .="confirmErr=$confirmErr"."&";
    }

  //  header("Location: regist.php$errors");
    //exit;
    }
  }

  public function addUser()
  {
    $this->validate();

    ini_set('display_errors','On');
    error_reporting(E_ALL);
    $conn=$this->conn;
    //$conn = new mysqli("localhost","menna","54321again");
    //mysqli_select_db($conn,"Cafeteria");
    if ($conn->connect_errno) {
    trigger_error($conn->connect_error);
    }


    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $psw= $_REQUEST['psw'];
    $psw_hash=md5($psw);
    $pswr= $_REQUEST['psw-repeat'];
    $roomno= $_REQUEST['roomNo'];
    $ext = $_REQUEST['Ext'];
    $file= $_REQUEST['file'];


    //echo $name.$email.$psw_hash.$file.$roomno;



    $stmt=$conn->stmt_init();
    $sql = "insert into users values(NULL,?,?,?,?,?)";
    $inserted="";
    if($stmt->prepare($sql))
    {
      //echo "<br />hereee";
      $stmt->bind_param("sssss",$email,$psw_hash,$file,$roomno,$name);
      $result=$stmt->execute();
      //echo $sql;
      $inserted=$result;
      //echo "<br /> aaaaaaaaaaaaaaaa".$inserted."eee".$result;
      $stmt->close();
    }
    //echo "<br />fff".$inserted;

  }
}
?>
