
<?php include 'getClients.php';?>
<!DOCTYPE html>
<html lang="en">
<?php
$start_date=$_REQUEST['startDate'];
$end_date=$_REQUEST['endDate'];
$user_name=$_REQUEST['selectedUser'];

echo $start_date." ".$end_date." ".$user_name;

//select users from data base for specific datefmt_create
function getAllUsersOrders(){


}

//  $Users_orderTotal=array(
// "alaa:100:1/1/2001,8/9/2001,9/7/2000:50,40,10:tea,coffe/tea/tea,juice:1,2/3/2,3" ,
// "shymaa:90:4/4/2401,8/4/2001,9/7/2004:50,90,100:tea,coffe/tea/tea,juice:1,2/3/2,3",
// "menna:190:4/4/2401,8/4/2001,9/7/2004:50,90,100:tea,coffe/tea/tea,juice:1,2/3/2,2" );
$usersName=array();
$admin=new Admin();
$admin->openDBconn();
$usersOrderTotal=$admin->selectUsersOrdersTotal($start_date,$end_date);
$SearchUser=$admin->matched_user;
if($user_name)
   $SearchUser=[$user_name];

$allUsersData=$admin->getforAllusers($start_date,$end_date,$SearchUser,$usersOrderTotal);

$Users_orderTotal= $allUsersData;
//$products_price=array("tea,10","coffe,20","juice,15");
$drinks=$admin->getAllProductInfo();
$usersName=$admin->getCafeUsers();
$products_price=$drinks;
$arrLen=sizeof($Users_orderTotal);



$admin->closeDBconn();
$arrLen=sizeof($usersName);

?>
<form id="form" action="Checks.php" method='post'>
    <input name="usersData" value="<?php echo implode("$",$Users_orderTotal); ?>">
      <input name="productInfo" value="<?php echo implode("$",$products_price); ?>">
</form>
<script type="text/javascript">
document.getElementById("form").submit();
</script>

</html>
