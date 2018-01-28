<html>
<head>
</head>
<body>
<?php

session_start();

//getMyclients;

//public $matched_user=array();

$conn = new mysqli("localhost","menna","54321again");
mysqli_select_db($conn,"Cafeteria");
if($conn->connect_errno) {
trigger_error($conn->connect_error);
}





/*function selectUsersOrdersTotal(){
  return $order;
}*/

  //get first table in myOrder
    $order=array();
    $sql = "SELECT orders.date ,status,price from orders WHERE orders.date >='2018-03-03' AND orders.date <= '2018-12-12'";
    $stmt = $conn->stmt_init();
    if ($stmt->prepare($sql)) {
      $stmt->bind_result($date,$status,$price);
      $result = $stmt->execute();
     while($fetch = $stmt->fetch()) {
           array_push($order,"$date".","."$status".","."$price");
        }
      $stmt->close();
    }

    //print_r($order);
    $_SESSION['first_table']=$order;
    // print_r($_SESSION['first_table']);
    // exit;

  /*private $conn;
  public $matched_user=array();
  public function openDBconn(){
      $this->conn= new mysqli("localhost","menna","54321again");
      class Admin{
      mysqli_select_db($this->conn, "Cafeteria");

      if ($this->conn->connect_errno) {
      trigger_error($db->connect_error);
      }

  }
  public function getAllProductInfo(){
    $order=array();
    $sql = "SELECT orders.date ,status,price from orders";
    $stmt = $this->conn->stmt_init();
    if ($stmt->prepare($sql)) {
      $stmt->bind_result($date,$status,$price);
      $result = $stmt->execute();
     while($fetch = $stmt->fetch()) {
           array_push($order,"$date".","."$status".","."$price");
        }
      $stmt->close();
        }
        return $order;
    }

}*/
// header("location: models/myOrder.php");
  ?>
</body>
</html>
