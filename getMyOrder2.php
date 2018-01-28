<?php include 'getMyOrder.php';?>
<!DOCTYPE html>
<html lang="en">
<?php
$start_date=$_REQUEST['startDate'];
$end_date=$_REQUEST['endDate'];
//$user_name=$_REQUEST['selectedUser'];
$products_price=$order;

?>
<form id="form" action="../myOrder.php" method='post'>
      <input name="productInfo" value="<?php echo implode("$",$products_price); ?>">
</form>
<script type="text/javascript">
document.getElementById("form").submit();
</script>

</html>
