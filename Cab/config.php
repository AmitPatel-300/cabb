<?php
class con{
	public $servername ;
	public $username;
	public $password;
	public $db;
	public $conn;
	// public $conn;

    public function connect(){
		$this->conn = new mysqli('localhost', 'root', "",'CAB_BOOKING');
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		  }
		  else{
			 return $this->conn;
		  }
	}		 
}


?>