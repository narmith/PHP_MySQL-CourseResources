<?php
	include 'dbconnect.php';
	//include 'abm.php'; //ABM: muy lindo, pero me estaba mareando.
	include 'producto.php';
	include 'carrito.php';
	
	define('SERVER','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','carro_compras');
	
	session_start();
	
	// Definicion de funcion "ERRORES" ->
	error_reporting (0); // 0 para no mostrar, E_ALL para ver algo en pantalla.
	function error($errortext)
	{
		$errorfile=fopen('error.log','a');
		fwrite($errorfile,"[".date("r")."]".session_id()." Error: $errortext\r\n");
		fclose($errorfile);
		session_unset(); //Deletes variables from this session. Cleans data and cookies.
		session_destroy(); //Destroys the session. Does not unset global variables or session cookies.
		header('Location: ERROR.php');
	}
	set_error_handler("error"); 
?>