<?php
class dbconnect
	{
		private $connection;
		public $error;
		
		public function __construct($server,$user,$password,$db)
		{
			if ($this->_connect($server,$user,$password,$db))
			{
				$this->error = $this->connection->connect_error;
				throw new Exception("DBCONNECT-01: $this->error.");
			}
			$this->setNames();
		}
		
		public function __destruct()
		{$this->connection->close();}
		
		private function _connect($server,$user,$password,$db)
		{
			$this->connection = new mysqli($server,$user,$password,$db);
			if ($this->connection->connect_errno){
				$this->error = $this->connection->connect_error;
				throw new Exception("DBCONNECT-02: $this->error.");
				return false;
			}
			
		}

		private function setNames()
		{$this->connection->query('SET NAMES utf8');}
		
		public function sendQuery($query)
		{
			$queryType = strtoupper(substr($query,0,6));
			
			switch ($queryType){
				case 'SELECT':
					$resultMSG = $this->connection->query($query);
					if (!$resultMSG){
						$this->error = $this->connection->error;
						throw new Exception("DBCONNECT-03: $this->error.");
						return false;
					}
					else{
						if ($this->connection->affected_rows == 0){
							return false;
						}
						else{
							while ($row = $resultMSG->fetch_assoc()){
								$result_array[] = $row;
							}
							return $result_array;
						}
					}
					break;
				case 'INSERT':
					$resultMSG = $this->connection->query($query);
					if (!$resultMSG){
						$this->error = $this->connection->error;
						return false;
					}
					else{
						return $this->connection->insert_id;
					}
					break;
				case 'UPDATE':				
				case 'DELETE':
					$resultMSG = $this->connection->query($query);
					if (!$resultMSG){
						$this->error = $this->connection->error;
						return false;
					}
					else{
						return $this->connection->affected_rows;
					}		
					break;
				default:
					$this->error = "Tipo de consulta no permitida";
					throw new Exception("DBCONNECT-04: $this->error.");
			}
		}
		
	}
?>