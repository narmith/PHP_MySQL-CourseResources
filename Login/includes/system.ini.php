<?php

session_start();
function autoload($clase){
    require("clases/$clase.php");
}
function manejar_error(){
    
}
spl_autoload_register("autoload");

set_error_handler("manejar_error");