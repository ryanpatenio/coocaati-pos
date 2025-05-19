<?php

require_once(LIB_PATH.DS."config.php");


 class database{

 	
var $sql_string = '';
	var $error_no = 0;
	var $error_msg = '';
	private $conn;
	public $last_query;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	function __construct() {
		$this->open_connection();
		//$this->magic_quotes_active = get_magic_quotes_gpc();
		//$this->real_escape_string_exists = function_exists("mysql_real_escape_string");
	}

	public function open_connection() {
		$this->conn = mysqli_connect(server,user,pass);
		if(!$this->conn){
			echo "Problem in database connection! Contact administrator!";
			exit();
		}else{
			$db_select = mysqli_select_db($this->conn, database_name);
			
			if (!$db_select) {
				echo "Problem in selecting database! Contact administrator!";
				exit();
			}
		}

	}
	public function getConnection() {
   		 return $this->conn;
	}

	function setQuery($sql='') {
		$this->sql_string=$sql;
	}
	
	function executeQuery() {
		$result = mysqli_query($this->conn,$this->sql_string);
		$this->confirm_query($result);
		return $result;
	}	


	private function confirm_query($result) {
		if(!$result){
			$this->error_no = mysqli_errno( $this->conn );
			$this->error_msg = mysqli_error( $this->conn );
			return false;				
		}
		return $result;
	} 
	
	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}
	public function affected_rows() {
		return mysql_affected_rows($this->conn);
	}

	function loadSingleResult() {
		$cur = $this->executeQuery();
			
		while ($row = mysqli_fetch_object($cur)) {
			$data = $row;
		}
		
		mysqli_free_result( $cur );
		return $data;
	}
	function updateSinglePerson(){
		global $mydb;
		$mydb->executeQuery();
		return $mydb;
	}

	public function insert_id() {
    // get the last id inserted over the current db connection
		return mysqli_insert_id($this->conn);
	}
	

}



$mydb = new database(); 

?>
