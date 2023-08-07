<?php
class Producto
	{
		private $db;
		public function Producto($database)
			{$this->db = $database;}
		public function __Producto()
			{$this->db = null;}
		/*
		public function insertProduct($product,$desc,$price){		
			$msgReturn = $this->db->sendQuery("insert into productos values (null, '$product', '$desc', $price)");		
			
			if (!$msgReturn){
				echo $this->db->error;
				return false;
			}
			else{
				return $msgReturn;
			}
		}
		*/
		public function getAllProducts(){
			$msgReturn = $this->db->sendQuery("select * from productos");
			if (!$msgReturn and $this->db->error!=''){
				echo $this->db->error;
				throw new Exception("PRODUCTO: $this->db->error.");
				return false;
			}
			else{
				if (!$msgReturn){
					throw new Exception("PRODUCTO: Something went wrong...");
					return false;
				}
				else {
					return $msgReturn;
				}
			}
		}

		public function getSingleProduct($id){
			$msgReturn = $this->db->sendQuery("select * from productos where codigo = $id");
			if (!$msgReturn and $this->db->error!=''){
				echo $this->db->error;
				throw new Exception("PRODUCTO: $this->db->error.");
				return false;
			}
			else{
				if (!$msgReturn){
					throw new Exception("PRODUCTO: Something went wrong...");
					return false;
				}
				else {
					return $msgReturn;
				}
			}
		}
		/*
		public function updateProduct($id,$product,$desc,$price){		
			$msgReturn = $this->db->sendQuery("UPDATE productos SET producto = '$product',
																	descripcion = '$desc',
																	precio = $price
																	WHERE codigo = $id");
			if (!$msgReturn and $this->db->error!=''){
				echo $this->db->error; 
				return false;
			}
			else{
				if (!$msgReturn){
					return true;
				}
				else {
					return $msgReturn;
				}
			}
		}
		
		public function deleteProduct($id){		
			$msgReturn = $this->db->sendQuery("DELETE FROM productos WHERE codigo = $id");	
			
			if (!$msgReturn and $this->db->error!=''){
				echo $this->db->error; 
				return false;
			}
			else{return $msgReturn;}
		}
		*/
	}
?>