<?php
	require_once("config.php");
		// querybase Class::
	class Database{
		//Deklarimi i variablave te querybase:
		public $host     = DB_HOST;
		public $user     = DB_USER;
		public $password = DB_PASS;
		public $dbname   = DB_NAME;

		public $link;
		public $error;
			// Konstruktori aktivizohet gjithmon edhe nese klasa nuk thirret.
		function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
				// Create connection : $conn = new mysqli($servername, $username, $password);
			$this->link = new mysqli($this->host,$this->user,$this->password,$this->dbname);
				//
			if (!$this->link) {
					//Kur perdorim new mysqli::$connect_error -- mysqli_connect_error — 
					//Ateher connect_error->Returns a string description of the last connect error
			 	$this->error = "Connection failed. -> ".$this->link->connect_error;
			 	echo "Lidhja me Database nuk eshte realizuar.";
			 	return false;
			}else{
				// echo "Lidhja me querybase eshte realizuar.";
			} 
		}
		// Insert query:
		public function insert($query){
											//__LINE__ – The current line number of the file.
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($insert_row) {
				header("Location: index.php?msg=".urlencode('Data Inserted successfully.'));
				exit();
			}else{
				die("Error : (".$this->link->error.")".$this->link->error);
			}
		}
		// Update query:
		public function update($query){
											//__LINE__ – The current line number of the file.
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($update_row) {
				header("Location: index.php?msg=".urlencode('Data Updated successfully.'));
				exit();
			}else{
				die("Error : (".$this->link->error.")".$this->link->error);
			}
		}
		//Select query:
		public function select($query){
											//__LINE__ – The current line number of the file.
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
				//mysqli_result::$num_rows -- mysqli_num_rows — 
				//num_rows->Gets the number of rows in a result
			if ($result->num_rows > 0) {
				// echo "....result";
				return $result;
			}else{
				return false;
			}
		} 
		//Delete query:
		public function delete($query){
											//__LINE__ – The current line number of the file.
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($delete_row) {
				header("Location: index.php?msg=".urlencode('Data Deleted successfully.'));
				exit();
			}else{
				die("Error : (".$this->link->error.")".$this->link->error);
			}
		} 
	}
?>