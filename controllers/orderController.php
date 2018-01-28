<?php

include_once "../models/user.php";
function __autoload($name){
	include_once "../models/".$name.".php";
}

session_start();

// include("../models/orders.php");
$order = new Order();
//echo json_encode($_POST);



$user = new User();
if($user->isAdmin()){
	echo json_encode($user->getAllUsers());
	$_SESSION['all_users'] = $user->getAllUsers();
	exit;
}

if(isset($_POST["search_submit"]) && !empty($_POST["search_submit"])){
	$_SESSION["user_id"] =1;
	$_SESSION["products"] =( $order->selectSearchProducts($_POST["search_key"]));
	$_SESSION["rooms"] =( $order->selectRooms());
	$_SESSION["latest_orders"] = $order->selectLastOrderProducts();

	//echo json_encode($_SESSION["latest_orders"] );
	  header("location:../user.order.php");
	  exit;
}
else if (!isset($_POST) || empty($_POST)) {
	//to be removed later
	echo 1;
	exit;
	$_SESSION["user_id"] =1;
	$_SESSION["products"] =( $order->selectProducts());
	$_SESSION["latest_orders"] = $order->selectLastOrderProducts();

	//echo json_encode($_SESSION["latest_orders"] );
	  header("location:../user.order.php");
	  exit;
}

if( $user->isAdmin()){
	$order->user_id = $_POST["user_id"];
}else if (isset($_SESSION["user_id"])) {
	$order->user_id =$_SESSION["user_id"];
}else{
	header("location:../login.php");
	 exit;
}

//remove this comment when session id is ready
$order->id = NULL;

// //get current date
$order->date = date("Y-m-d");
// //calculate price from products table
$order->price = $_POST["total_price"];
// //inital state 
$order->status="processing";

$order->notes = $_POST['notes'];
//echo "prod:".json_encode($_POST["product_id"]);

//echo json_encode($_POST);
if(isset($_POST["room_id"])){
	$order->room_id = explode(" ", $_POST["room_id"])[1];
}
else if(isset($_SESSION["room_id"])){
	$order->room_id = $_SESSION["room_id"] ;
}

if($order->insertOrder()){

	$order_id = $order->selectLastOrderId();
	//echo "id:".$order_id;
	$product_ids = $_POST["product_id"];
	$product_quantites = $_POST["product_quantity"];

	//insert order products to table order_products
	for ($i=0; $i <count($product_ids) ; $i++) { 
		$order->insertOrderProducts(array($product_ids[$i],$product_quantites[$i],$order_id));
	}
	 header("location:../order_done.php");
	 exit;
}
 //$products = $_POST["products[]"];
 //$prices = $_POST["prices[]"];
