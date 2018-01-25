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
				return "success";
			}
		}
		else{
			echo "connection error";
		}
	}
}