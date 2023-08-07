<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
include ('conect.php');

$result = mysql_query("SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND password = '".$_POST['password']."' ") or die(mysql_error());

$row = mysql_fetch_array($result);
if (mysql_num_rows($result) !=0){
	$_SESSION['usuario'] = $_POST['usuario'];
	$_SESSION['password'] = $_POST['password'];
?>
	<script type="text/javascript">
		window.location='pagina2.php'
	</script>
<?php
}
else {
?>
	<script type="text/javascript">
		alert('Usuario y/o password inexistentes');
		window.location='inicio.html'
	</script>
<?php
}

?>
</body>
</html>