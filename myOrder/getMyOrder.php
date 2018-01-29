<!DOCTYPE html>
<html lang="en">
<?php
$start_date=$_REQUEST['startDate'];
$end_date=$_REQUEST['endDate'];
//$user_name='omgamal';

//echo $start_date." ".$end_date." ";

//select users from data base for specific datefmt_create
function getAllUsersOrders(){

}
$conn = new mysqli("localhost","rania","rania2017");
mysqli_select_db($conn,"Cafeteria");
if($conn->connect_errno) {
trigger_error($conn->connect_error);
}
    $order=array();
    $sql = "SELECT orders.date ,status,price from orders WHERE orders.date >= ? AND orders.date <= ?";
    $stmt = $conn->stmt_init();
    if ($stmt->prepare($sql)) {
      $stmt->bind_param('ss',$start_date,$end_date);
      $stmt->bind_result($date,$status,$price);
      $result = $stmt->execute();
     while($fetch = $stmt->fetch()) {
           array_push($order,"$date".","."$status".","."$price");
        }
      $stmt->close();
    }

print_r($order);
$Users_orderTotal=array();
for($i=0;$i<count($order);$i++)
{
//  echo "<br>".$order[$i]."<br>";
array_push($Users_orderTotal,$order[$i]);
}

// function GetProcessingOrdersId($start_date,$end_date,$user_name){
//   $processedOrdersId=array();
//   $sql = "select orders.id  from
//   orders,users  where orders.date= ? and orders.date= ?;  ";
//
//   $stmt = $conn->stmt_init();
//   if ($stmt->prepare($sql)) {
//     $stmt->bind_param('ss',$start_date,$end_date);
//     $stmt->bind_result($OrderId);
//     $result = $stmt->execute();
//    while($fetch = $stmt->fetch()) {
//          array_push($processedOrdersId,$OrderId);
//       }
//     $stmt->close();
//       }
//     return $processedOrdersId;
//
// }
//
//  function GetProcessingOrdersItem($orderId){
//   //$processedOrdersItem=array();
//   $ordersQuan="";
//   $ordersItem="";
//   $sql = "select order_products.quantity,products.name from orders,users,products,order_products
//    where  orders.user_id=users.id and products.id=order_products.product_id and
//     order_products.order_id=orders.id and  orders.id=?;";
//   $stmt = $this->conn->stmt_init();
//   if ($stmt->prepare($sql)) {
//     $stmt->bind_param('s',$orderId);
//     $stmt->bind_result($OrderQuan,$orderItem);
//     $result = $stmt->execute();
//    while($fetch = $stmt->fetch()) {
//         $ordersQuan.=$OrderQuan.",";
//         $ordersItem.=$orderItem.",";
//          //array_push($processedOrdersId,$OrderId);
//       }
//       $ordersQuan=rtrim($ordersQuan,",");
//       $ordersItem=rtrim($ordersItem,",");
//     $stmt->close();
//       }
//     return $ordersItem.":".$ordersQuan;
//
// }
// $id=array();
// $id=GetProcessingOrdersId($start_date,$end_date,$user_name);
// for ($i=0;$i<count($id);$i++)
// {
// GetProcessingOrdersItem($id[$i]);
//   echo GetProcessingOrdersItem($id[$i]);
//
// }
// $product=array();
// $sql = "SELECT products.name,price,imagePath from products WHERE id=63 ";
// $stmt = $conn->stmt_init();
// if ($stmt->prepare($sql)) {
//   $stmt->bind_result($name,$price,$imagePath);
//   $result = $stmt->execute();
//  while($fetch = $stmt->fetch()) {
//        array_push($product,"$name".","."$price".","."$imagePath");
//     }
//   $stmt->close();
// }
// //  $Users_orderTotal=array(
// // "1/1/2001:processing:55EGP:tea,coffe,juice:2,3,4" ,
// // "15/3/2001:Done:70EGP:tea,coffe,juice:3,2,5" ,
// // "10/4/2001:out for delivery:60EGP:tea,coffe,juice:2,3,4" );
echo implode(",",$Users_orderTotal);

$products_price=array("tea,10","coffe,20","juice,15");

?>
<form id="form" action="myOrder.php" method='post'>
    <input name="usersData" value="<?php echo implode("$",$Users_orderTotal); ?>">
      <input name="productInfo" value="<?php echo implode("$",$products_price); ?>">
</form>
<script type="text/javascript">
document.getElementById("form").submit();
</script>
</html>
