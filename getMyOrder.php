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

    //get second table my order
    $product=array();
    $sql = "SELECT name,price,imagePath from products WHERE id=63 ";
    $stmt = $conn->stmt_init();
    if ($stmt->prepare($sql)) {
      $stmt->bind_result($name,$price,$imagePath);
      $result = $stmt->execute();
     while($fetch = $stmt->fetch()) {
           array_push($product,"$name".","."$price".","."$imagePath");
        }
      $stmt->close();
    }



    $_SESSION['first_table']=$order;
    $_SESSION['second_table']=$product;

?>


</body>
</html>
