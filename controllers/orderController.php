<?php

function __autoload($name){
	include_once "../models/".$name.".php";
}
session_start();

// include("../models/orders.php");
$order = new Order();
if (!isset($_POST)) {
	$_SESSION["products"] =( $order->selectProducts());
	$_SESSION["rooms"] =( $order->selectRooms());

	//echo json_encode($_SESSION["products"] );
	header("location:../user.order.php");
	exit;
}




/**
	public $id;
	public $user_id;
	public $date;
	public $price;
	public $status;
	public $notes;
**/

//remove this comment when session id is ready
$order->id = NULL;
$order->user_id = 1;//$SESSION["id"];

// //get current date
$order->date = date("Y-m-d");
// //calculate price from products table
$order->price = $_POST["total_price"];
// //inital state 
$order->status="processing";

$order->notes = $_POST['notes'];

echo json_encode($_POST);
if(isset($_POST["room_id"])){
	$order->room_id = explode(" ", $_POST["room_id"])[1];
}
else if(isset($_SESSION["room_id"])){
	$order->room_id = $_SESSION["room_id"] ;
}

if($order->insertOrder()){
	header("location:../order_done.php");
	exit;
}
 //$products = $_POST["products[]"];
 //$prices = $_POST["prices[]"];
