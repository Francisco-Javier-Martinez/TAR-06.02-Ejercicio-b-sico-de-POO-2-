<?php
    require "ValidarFecha.php";

    $fecha=$_GET['fecha'];
    $validar= new ValidarFecha();
    //valido que la fecha tenga 10 caracteres
    if(strlen($fecha)==10){
            echo '<h1>'.$validar -> validar($fecha).'</h1>'; //llamo al metodo validar
    }else{
        echo '<a href="formu.html">Formato incorrecto o caracter incorrecto. Volver</a>';
    }
    

?>