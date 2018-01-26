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


	//to be removed later 
	public function selectProducts()
	{
		$query = sprintf("select * from products");

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