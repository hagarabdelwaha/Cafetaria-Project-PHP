<?php

require_once('models/user_class.php');



//$delusr=new User();
//$uname=$delusr->get_user_name();

$prod=new User();
$prod->id=$_GET['id'];
$prod->name='Deleted';
$rownum=$prod->delete_user();
header("location:All_Users.php");
exit;
//
// if($rownum >0)
// {
// 	header("location:All_Users.php");
// exit;
// }else
// {
// 	echo "Cant Delete user";
// }
//






?>
