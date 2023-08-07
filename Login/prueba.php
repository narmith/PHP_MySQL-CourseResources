<?php

error_reporting(E_ALL) ;

function error($error, $mensaje, $fichero, $linea)

{ echo "ERROR"."<br>" ;  

  echo $error.", ".$mensaje.", ".$linea ;

}

set_error_handler("error") ;

$conexion=mysql_connect("localhost", "root", "") ; //el error acá es que mysql_connect no esta difinido 

?>