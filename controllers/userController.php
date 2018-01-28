<?php
 include_once("../models/user.php");
 include_once("../models/admin.php");
 session_start();
 $user = new User();
 $user->login();
$_SESSION['user_id']=$user->selectLastId();
//echo $_SESSION['user_id'];
$_SESSION['username']=$user->selectLastName();
//echo $_SESSION['username'];
if($user->isAdmin()){
  $admin= new Admin();
  
}
header("location:../models/AdminHomeAll.php");

exit;
?>
