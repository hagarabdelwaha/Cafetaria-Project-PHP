<html>
<head>
</head>
<body>
<?php

class Admin{
  private $conn;
  public $matched_user=array();
  public function openDBconn(){
      $this->conn= new mysqli("localhost","alaa","1111");
      mysqli_select_db($this->conn, "cafe");

      if ($this->conn->connect_errno) {
      trigger_error($db->connect_error);
      }

  }

  public function getAllProductInfo(){
    $drinks=array();
    $sql = "SELECT name ,price from products";
    $stmt = $this->conn->stmt_init();
    if ($stmt->prepare($sql)) {
      $stmt->bind_result($name,$price);
      $result = $stmt->execute();
     while($fetch = $stmt->fetch()) {
           array_push($drinks,"$name".","."$price");
        }
      $stmt->close();
        }
        return $drinks;
    }

  public function getCafeUsers(){

      $users=array();
      $sql = "SELECT name from users";
      $stmt = $this->conn->stmt_init();
      if ($stmt->prepare($sql)) {
        $stmt->bind_result($fname);
        $result = $stmt->execute();
       while($fetch = $stmt->fetch()) {
            array_push($users,$fname);
             // echo "<p>$fname</p>";
          }
        $stmt->close();
          }
          return $users;
      }

    public function selectUsersOrdersTotal($startDate,$endDate){//get first table in checks
      $usersOrderTotal=array();
      $sql = " select name,sum(price) from orders,users where date
        between ? and ? and orders.user_id=users.id group by(name);";
      $stmt = $this->conn->stmt_init();
      if ($stmt->prepare($sql)) {
        $stmt->bind_param("ss",$startDate,$endDate);
        $stmt->bind_result($userName,$TotalPrice);
        $result = $stmt->execute();
       while($fetch = $stmt->fetch()) {
           array_push($usersOrderTotal,$userName.":".$TotalPrice);
           array_push($this->matched_user,$userName);
           // echo "<p>$userName $TotalPrice</p>";
          }
        $stmt->close();
          }
          return $usersOrderTotal;
      }

      public function selectUserOrderDate($startDate,$endDate,$userName){//get table 2

        $dates="";
        $dprices="";
        $sql = "select date ,price from orders,users where
        date between ? and ? and orders.user_id=users.id  and name=?;";
        $stmt = $this->conn->stmt_init();
        if ($stmt->prepare($sql)) {
          $stmt->bind_param("sss",$startDate,$endDate,$userName);
          $stmt->bind_result($date,$ToDPrice);
          $result = $stmt->execute();
         while($fetch = $stmt->fetch()) {
            $dates.=$date.",";
            $dprices.=$ToDPrice.",";

            }
            $dates=rtrim($dates,",");
            $dprices=rtrim($dprices,",");
            $dates.=":".$dprices;
          $stmt->close();
            }
            return $dates;
        }

        public function getUsersOrdersId($startDate,$endDate,$userName){
          $usersOrders=array();
          $sql = "select orders.id from orders,users,products,order_products
          where date between ? and ? and orders.user_id=users.id and
          order_products.order_id=orders.id and users.name=? group by (orders.id);";
          $stmt = $this->conn->stmt_init();
          if ($stmt->prepare($sql)) {
            $stmt->bind_param("sss",$startDate,$endDate,$userName);
            $stmt->bind_result($orderId);
            $result = $stmt->execute();
           while($fetch = $stmt->fetch()) {
              // echo "<br>$orderId<br>";
               array_push($usersOrders,$orderId);
              }
            $stmt->close();
              }
              // echo "<br> herrrrrr".implode(', ',$usersOrders)."<br>";
              return $usersOrders;
        }
        public function selectUserOrderDrinks($startDate,$endDate,$userName){//get table 3 products&quan
          $quantityArr="";
          $productNameArr="";
          $ordersId=array();
          // echo "function";
          $ordersId=$this->getUsersOrdersId($startDate,$endDate,$userName);
          // echo "<br> herrrrrr".implode(', ',$ordersId)."<br>";
          // echo implode(" ",$ordersId);
          for ($i=0;$i<count($ordersId);$i++)
          {
             // echo "here.$ordersId[$i]";
                $sql ="select users.name,date,order_products.quantity,products.name
                from orders,users,products,order_products where date between ? and ?
                and orders.user_id=users.id and products.id=order_products.product_id and
                 order_products.order_id=orders.id and users.name=? and orders.id=?;";

                $stmt = $this->conn->stmt_init();
                if ($stmt->prepare($sql)) {
                  $stmt->bind_param("ssss",$startDate,$endDate,$userName,$ordersId[$i]);
                  $stmt->bind_result($NameUser,$date,$Quantity,$productName);
                  $result = $stmt->execute();
                 while($fetch = $stmt->fetch()) {
                      $quantityArr.=$Quantity.",";
                      $productNameArr.=$productName.",";
                    }
                    $quantityArr=rtrim($quantityArr,",");
                    $productNameArr=rtrim($productNameArr,",");
                  }
                  $quantityArr.="/";
                  $productNameArr.="/";
              }
            $quantityArr=rtrim($quantityArr,"/");
            $productNameArr=rtrim($productNameArr,"/");
              $productNameArr.=":".$quantityArr;

              return $productNameArr;
            }

         public function getforAllusers($startDate,$endDate,$MatcusersName,&$usersOrderTotal){
               for($i=0;$i<count($MatcusersName);$i++){
                 // echo "name   : "."$MatcusersName[$i]"."<br>";
                 $usersOrderTotal[$i].=":".$this->selectUserOrderDate($startDate,$endDate,$MatcusersName[$i]);
                 $usersOrderTotal[$i].=":".$this->selectUserOrderDrinks($startDate,$endDate,$MatcusersName[$i]);
                  // echo $usersOrderTotal[$i]."<br>";
               }
               return $usersOrderTotal;
            }

    public function closeDBconn(){
          $this->conn->close();
      }
}
$usersName=array();
$admin=new Admin();
$admin->openDBconn();
//$usersOrderTotal=$admin->selectUsersOrdersTotal('2018-01-27','2018-01-28');
//$allUsersData=$admin->getforAllusers('2018-01-27','2018-01-28',$admin->matched_user,$usersOrderTotal);
//
$drinks=$admin->getAllProductInfo();
$usersName=$admin->getCafeUsers();

$admin->closeDBconn();
$arrLen=sizeof($usersName);

// echo "<br>".implode("",$allUsersData)."<br>";
//  echo " users  ".implode ($admin->matched_user,", ")."<br>";
 // echo "drinks " .implode($drinks," ,  ")."<br>";
// // echo "matched Users".implode($admin->matched_user," ")."<br>";
// // echo "total for user  ".implode($usersOrderTotal,",");




?>
</body>
</html>
