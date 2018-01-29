<?php

/**
* this class to handel interaction of orders table with this application
*/
class Order extends Model{

	public $id;
	public $user_id;
	public $date;
	public $price;
	public $status;
	public $notes;
	public $room_id;
	
	function __construct()
	{
		parent::__construct();	
	}

	public function selectLastOrderId()
	{
		$query = sprintf("select max(id) from %s where user_id=%s",$this->getTableName(),$_SESSION["user_id"]);

		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;
			return false;
		}
		//$stmt->close();
		return $this->getData($result_set)[0][0];
	}

	public function insertOrder()
	{
		if($this->connect()){

			//get all parameters values of this class
			//ex: $id,$user_id,$date,.....
			$variableList = array_combine(array_keys(get_class_vars(get_class($this))), get_object_vars(($this)));

			//execute Model insert function
			if(!$result = $this->insert($variableList) ) {
				echo $result;
			}
			else{
				return "success";
			}
		}
		else{
			echo "connection error";
		}
		return true;
	}

	public function selectOrders()
	{
		if($this->connect()){

			//get all parameters values of this class
			//ex: $id,$user_id,$date,.....
			$variableList = array_combine(array_keys(get_class_vars(get_class($this))), get_object_vars(($this)));

			//execute Model insert function
			if(!$result = $this->select($variableList) ) {
				echo $result;
			}
			else{
				return $result;
			}
		}
		else{
			echo "connection error";
		}
	}
	public function selectLastOrderProducts()
	{
		if(! $order_id = $this->selectLastOrderId())
			$order_id = -1;



		$query = sprintf("select product_id from order_products where order_id=%s order by order_id desc limit 3",$order_id);
echo $order_id. " ". $query." ".$_SESSION["user_id"];
//exit;
		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;

			return false;
		}

		//$stmt->close();
		//return 

		$product_ids = $this->getColumnData($result_set);
		$query = sprintf("select * from products where id in (%s)",implode(",", ($product_ids)));

		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;
			return false;
		}
		//$stmt->close();
		return  $this->getData($result_set); 

		
	}
	public function insertOrderProducts($values)
	{
		echo json_encode($values);
		$query = sprintf("insert into order_products (product_id,quantity,order_id) values (%s);",implode(',',$values));

		echo "query : ".$query."<br>";

		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;
					echo " msh tmam";

			return false;
		}
		//$stmt->close();
		echo "tmam";
		return true;
	}


	// public function selectProducts()
	// {
	// 	$query = sprintf("select * from products where quantity > 0");

	// 	if(! $result_set = $this->prepareStmt($query)){
	// 		echo $this->conn->connect_error;
	// 		return false;
	// 	}
	// 	//$stmt->close();
	// 	return $this->getData($result_set);

	// }

	public function selectSearchProducts($product_name)
	{
		$query = "select * from products where name Like '%".$product_name."%'";
		//echo $query;
		

		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;
			return false;
		}
		//$stmt->close();
		return $this->getData($result_set);

	}
	public function selectRooms()
	{
		
		$query = sprintf("select * from rooms");

		if(! $result_set = $this->prepareStmt($query)){
			echo $this->conn->connect_error;
					echo " msh tmam";

			return false;
		}
		//$stmt->close();
		echo "tmam";
		return $this->getData($result_set);

	}
}