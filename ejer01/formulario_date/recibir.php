<?php
    require "ValidarFecha.php";

    $fecha=$_GET['fecha'];
    //Creo un objeto de la clase ValidarFecha
    $validar= new ValidarFecha();

    //Comprobar si se ha introducido una fecha
    if($fecha==""){
        die("No has introducido ninguna fecha");
    }else{
        echo '<h1>'.$validar -> monstrarFechaEscrita($fecha).'</h1>';//llamo al metodo monstrarFechaEscrita
    }
?>
