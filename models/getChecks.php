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

 $Users_orderTotal=array(
"alaa:100:1/1/2001,8/9/2001,9/7/2000:50,40,10:tea,coffe/tea/tea,juice:1,2/3/2,3" ,
"shymaa:90:4/4/2401,8/4/2001,9/7/2004:50,90,100:tea,coffe/tea/tea/juice:1,2/3/2,3",
"menna:190:4/4/2401,8/4/2001,9/7/2004:50,90,100:tea,coffe/tea/tea,juice:1,2/3/2,2" );

$arrLen=sizeof($Users_orderTotal);

?>
<form id="form" action="Checks.php" method='post'>
    <input name="usersData" value="<?php echo implode("$",$Users_orderTotal); ?>">
</form>
<script type="text/javascript">
document.getElementById("form").submit();
</script>

</html>
