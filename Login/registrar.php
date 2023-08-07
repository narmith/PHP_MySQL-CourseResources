<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include ('conect.php');

mysql_query ("INSERT INTO usuarios VALUES ('".$_POST['usuario']."', '".$_POST['password']."', '".$_POST['nombre']."', '".$_POST['apellido']."', '".$_POST['email']."', ".$_POST['dni'].")");

if (mysql_errno() == 0){
	echo 'El usuario ha sido dado de alta';
	echo '<a href="inicio.html">Ingresar</a>';
}
else{
	if (mysql_errno() == 1062){

?>
		<script type="text/javascript">
			alert('Ese nombre de usuario ya existe en la base de datos');
			window.location='inicio.html'
        </script>
<?php		
	}
	else{
		 die ('Error al insertar: '.mysql_error());
	}
}
?>
</body>
</html>