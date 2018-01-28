<!DOCTYPE html>
<html lang="en">
<body>

<?php
$conn = new mysqli("localhost","menna","54321again");
mysqli_select_db($conn,"Cafeteria");
if($conn->connect_errno) {
trigger_error($conn->connect_error);
}
$array=[];
$retDate=[];
$retStatus=[];
$retPrice=[];
$matched=0;

$sql = "SELECT orders.date FROM orders WHERE orders.date >= ? and orders.date <=? ";
$stmt = $conn->stmt_init();
if ($stmt->prepare($sql)) {
  $start_date='2017-03-10';
  $end_date='2017-07-10';

  //$start_date=$_REQUEST['startDate'];
  //$end_date=$_REQUEST['endDate'];
  $stmt->bind_param("ss", $start_date,$end_date);
  $stmt->bind_result($retDate);
  $result = $stmt->execute();
  $fetch = $stmt->fetch();
  while($fetch = $stmt->fetch())
{
  array_push($array,$retDate);
  $stmt->close();
}
}

?>

</body>
</html>
