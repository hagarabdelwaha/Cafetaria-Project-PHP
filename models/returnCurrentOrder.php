<html>
<head>
</head>
<body>
<?php

class OrderForm
{
    public  $orderDate;
	  public  $clientName;
	  public  $Room;
	  public  $ExtRoom;

    public function __construct($orderDate,$clientName,$Room,$ExtRoom) {
						$this->orderDate=$orderDate;
						 $this->clientName=$clientName;
						 $this->Room=$Room;
						 $this->ExtRoom=$ExtRoom;
    }
};

$Krder=new orderForm("1","2","3","4");
$totalOrder=4;
$users_orders=array("13/2/2221:alaa:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"1/1/2001:mohamed:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"10/11/2111:shymaa:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"11/10/2001:ali:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"10/10/2001:manonaaa:0910:3333:tea,coffe,juice,tea:2,3,3,4:100");

$products_price=array("tea,10","coffe,20","juice,15");
$arrLen=sizeof($users_orders);

?>
</body>
</html>
