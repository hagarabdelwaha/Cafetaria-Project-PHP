<?php

require_once('models/user_class.php');


$prod=new User();

$prod->id=$_GET['id'];

$rownum=$prod->delete_user();

if($rownum >0)
{
	header("location:All_Users.php");
exit;
}else
{
	echo "Cant Delete user";
}







?>
