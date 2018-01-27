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
$p=array("10/10/2001:alaa:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"10/10/2001:alaa:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"10/10/2001:alaa:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"10/10/2001:alaa:0910:3333:tea,coffe,juice,tea:3,1,2,3:100",
"10/10/2001:manonaaa:0910:3333:tea,coffe,juice,tea:2,3,3,4:100");
$arrLen=sizeof($p);

?>
</body>
</html>
