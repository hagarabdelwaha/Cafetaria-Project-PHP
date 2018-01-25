<?php
class Model{
	public $conn;

	public function __construct(){
		////CHANGE THIS CREDINTIALS TO YOURS YA MENNA , HAGER AND ALAA
		$this->conn = new mysqli("localhost","rania","rania2017","Cafeteria");
		if (! $this->conn ) {
			echo "connection error";
		}
	}

	/**
	*this function  gets table name dynamically based on caller class
	**/
	function getTableName(){
		return strtolower(get_class($this)."s");
	}

	/**
	* 	this function to connect to mysql db
	*
	**/
	public function connect(){
		if ($this->conn->connect_errno){
			trigger_error($this->conn->connect_error);
	 		return false;
		}
		return true;
	}

	/**
	*
	*	internal function used in insert function
	*
	**/

	public function prepareStmt($query){
			if(! $stmt = $this->conn->prepare($query) ){
					     echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;

						echo " msh tmam1";
				return false;
			}
			$id=NULL;
			if(! $stmt->execute()){
				  echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
			}
			$stmt->close();
			return true;
	}

	
	/**
	*	dynamic insert can be used by any table
	*	@param $variableList is a variable list of any size ex(x1,x2,x3,...)
	**/
	public function insert($variableList){
		$keys = array();
		$values = array();
		
		//to remove last element as it's info about obj
		array_pop($variableList);

		foreach ($variableList as $key => $value) {
			$keys[] = $key;
			$values[] = "'".$value."'";
		}

		$query = sprintf("insert into ".$this->getTableName()." (%s) values (%s);",implode(',',$keys),implode(',',$values));

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

	/**
	* close the connection
	**/
	public function __destruct(){
		$this->conn->close();  
	}
}