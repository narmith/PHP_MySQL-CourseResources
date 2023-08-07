<?php
class Productos {
    private $db;
    public function __construct($base){
        $this->db=$base;
    }
    
    public function getProductos(){
        $respuesta=$this->db->enviarQuery("select * from productos");
		if (!$respuesta and $this->db->error!=''){
		echo $this->db->error; 
		return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
	}
	public function getProducto($codigo){
        $respuesta=$this->db->enviarQuery("select * from productos where codigo=$codigo");
		if (!$respuesta and $this->db->error!=''){
		echo $this->db->error; 
		return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta[0];
			}
		}
    }
}