
<?php
@$conexion=mysql_connect("localhost", "root", "") 
or exit("No se pudo establecer una conexión");
@$dbseleccionada=mysql_select_db("login", $conexion)
or exit("No se pudo seleccionar la base de datos");
?>





