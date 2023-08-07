<?php
class Carrito {
    public $array_prod=[];
    public $productos;
    public function __construct($productos){
        $this->productos=$productos;
        if(!isset($_SESSION["productos_carrito"]))$_SESSION["productos_carrito"]=[];
        $this->array_prod=$_SESSION["productos_carrito"];
    }
    public function introduce_producto($codigo){
       $producto = $this->productos->getProducto($codigo);
       array_push($this->array_prod,$producto);
       $_SESSION["productos_carrito"] = $this->array_prod;
       
    }
    public function getProductosCarrito(){
        return $this->array_prod;
        throw new Exception();
    }
    public function eliminarProducto($indice){
        unset($this->array_prod[$indice]);
        $_SESSION["productos_carrito"] = $this->array_prod;
    }
}