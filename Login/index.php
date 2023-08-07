<?php
require("includes/system.ini.php");
try{
    $bd = new BasedeDatosmysqli("localhost","root","","carrocompras");

    $productos = new Productos($bd);
    $carrito = new Carrito($productos);

}catch(Exception $e ){
    
}
if(isset($_GET["codigo"])){
    //Agregar al carrito
    $carrito->introduce_producto($_GET["codigo"]);
    header("Location: /carrito");
}
if(isset($_GET["eliminar"])){
    //Agregar al carrito
    try{
        $carrito->eliminarProducto($_GET["eliminar"]);
    }catch(Exception $e ){

    }
    header("Location: /carrito");
}
try{
    $datos = $productos->getProductos();
    $datos_carrito = $carrito->getProductosCarrito();
}catch(Exception $e ){

}


?>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
        <h2>Carrito</h2>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach($datos_carrito as $k=>$v){
              ?>
                <tr>
                    <td><?php echo $v["codigo"] ?></td>
                    <td><?php echo $v["producto"] ?></td>
                    <td><?php echo $v["precio"] ?></td>
                    <td><a href="/carrito/index.php?eliminar=<?php echo $k?>">Eliminar</a></td>
                </tr>
              <?php                  
            }
        ?>
            </tbody>
        </table>

        <h2>Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach($datos as $k=>$v){
              ?>
                <tr>
                    <td><?php echo $v["codigo"] ?></td>
                    <td><?php echo $v["producto"] ?></td>
                    <td><?php echo $v["descripcion"] ?></td>
                    <td><?php echo $v["precio"] ?></td>
                    <td><a href="/carrito/index.php?codigo=<?php echo $v["codigo"]?>">Introducir</a></td>
                </tr>
              <?php                  
            }
        ?>
            </tbody>
        </table>


        
    </body>
</html>