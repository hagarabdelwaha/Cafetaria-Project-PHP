<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

$conn = new mysqli("localhost","menna","54321again");
mysqli_select_db($conn,"Cafeteria");
if ($conn->connect_errno) {
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

    header('Location: ' ."regist.php?");
}
else{
    header('Location: ' ."login.php?");
}


?>
