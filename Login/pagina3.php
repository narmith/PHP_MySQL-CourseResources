<?php
session_start()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
if (isset($_SESSION['usuario'])){
	echo 'Bienvenido '.$_SESSION['usuario'];
	echo '<br /><a href="pagina2.php">Pagina 2</a>';
	echo '<br /><a href="salir.php">Cerrar sesion</a>';
}
else {
?>
	<script type="text/javascript">
		alert('Para acceder a este contenido tiene que estar logueado');
		window.location='inicio.html'
	</script>
<?php
}
?>
</body>
</html>