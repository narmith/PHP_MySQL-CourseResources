<?php
class Carrito
	{
		public $producto_array=[];
		public $productos;
		
		public function Carrito($productos)
		{
			$this->productos=$productos;
			if(!isset($_SESSION["changuito"]))
				{$_SESSION["changuito"]=[];}
			$this->producto_array=$_SESSION["changuito"];
		}
		
		public function addProducto($codigo_producto)
		{		
			$elemento=$this->productos->getSingleProduct($codigo_producto);
			array_push($this->producto_array,$elemento[0]);
			$_SESSION["changuito"]=$this->producto_array;
		}
			
		public function listProductos()
		{
			return $this->producto_array;
			throw new Exception("CARRITO: Cannot get list of products.");
		}

		public function removeProducto($codigo_producto)
		{
			unset($this->producto_array[$codigo_producto]);
			$_SESSION["changuito"]=$this->producto_array;
		}
	}
?>