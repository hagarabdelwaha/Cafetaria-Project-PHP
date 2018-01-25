<?php

function __autoload($name){
	include_once "../models/".$name.".php";
}

// include("../models/orders.php");
$order = new Order();
$order->selectOrders();

/**
	public $id;
	public $user_id;
	public $date;
	public $price;
	public $status;
	public $notes;
**/
//remove this comment when session id is ready
// $user_id = 2;//$SESSION["id"];

// //get current date
// $date = date("Y-m-d");

// $products = $_POST["products[]"];
// $prices = $_POST["prices[]"];
// //calculate price from products table
// $price = 0 ;

// //inital state 
// $status="processing";

// $notes = $_POST['notes'];
