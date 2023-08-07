<body>
<?php
	require 'define.php';
	
	try
	{
		$database = new dbconnect(SERVER,USER,PASS,DB);
		$producto = new Producto($database);
		$carrito = new Carrito($producto);
	}catch(Exception $e) {error($e->getMessage());}
	
	if(isset($_GET["insertar"]))
	{
		//add to the changuitou!
		$carrito->addProducto($_GET["insertar"]);
		header("Location: /inicio.php");
	}
	if(isset($_GET["eliminar"]))
	{
		//remove from changuitou!
		try{
			$carrito->removeProducto($_GET["eliminar"]);
			}catch(Exception $e){error($e->getMessage());}
		header("Location: /inicio.php");
	}
	
	try
	{
		$datos = $producto->getAllProducts();
		//load the changuitou!
		$datos_carrito = $carrito->listProductos();
	}catch(Exception $e){error($e->getMessage());}
?>

<!DOCTYPE html>
<html lang="es-AR">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>CHANGUITO!</title>
		<style>
			th {
				style='text-align: center';
				font-style: italic;}
			table, th, td
				{border: 1px solid black;}
</style>
	</head>
	<body>
		<h3>Mi carrito de compras:</h3>
		<?php
		if ($datos_carrito == NULL) {echo "Actualmente vacío.<br><br>";}
		else
		{ ?>
		<table>
			<thead>
				<tr>
					<th>Cod.</th>
					<th>Producto</th>
					<th>Precio</th>
				</tr>
			</thead>
			<tbody>
			<?php
				/* //codigo de testeo, ignorar.
				echo "<br>-----------------<br>";			
				print_r(array_keys($datos_carrito));
				print_r($datos_carrito[0]);
				echo "<br>-----------------<br>";
				*/
				
				$suma=0;
				foreach($datos_carrito as $k=>$v)
				{ ?>
					<tr>
						<td><?php echo $v["codigo"]; ?></td>
						<td><?php echo $v["producto"]; ?></td>
						<td><?php echo $v["precio"]; ?></td>
						<?php $suma+=$v["precio"]; ?>
						<td><a href="/inicio.php?eliminar=<?php echo $k; ?>">Eliminar</a></td>
					</tr>
				<?php
				}
				echo "<tr><td colspan='2' style='text-align: center'>TOTAL:</td>";
				echo "<td>".$suma."</td></tr>";
				?>
			</tbody>
		</table>
		<?php } ?>
		
		<h3>Productos</h3>
		<table style="width:100%">
			<h4>
				<thead>
					<tr>
						<th>Cod.</th>
						<th>Producto</th>
						<th>Descripcion</th>
						<th>Precio</th>
						<th></th>
					</tr>
				</thead>
			</h4>
			<em>
				<tbody>			
				<?php	
					foreach($datos as $k=>$v)
					{ ?>
						<tr>
							<td><?php echo $v["codigo"]; ?></td>
							<td><?php echo $v["producto"]; ?></td>
							<td><?php echo $v["descripcion"]; ?></td>
							<td><?php echo $v["precio"]; ?></td>
							<td><a href="/inicio.php?insertar=<?php echo $v["codigo"];?>">Introducir</a></td>
						</tr>
					<?php } ?>
				</tbody>
			</em>
		</table>
	</body>
</html>
