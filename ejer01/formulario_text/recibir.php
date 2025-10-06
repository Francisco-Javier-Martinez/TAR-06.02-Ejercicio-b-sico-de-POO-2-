<?php
    require "ValidarFecha.php";

    $fecha=$_GET['fecha'];
    $validar= new ValidarFecha();
    //valido que la fecha tenga 10 caracteres
    if(strlen($fecha)==10){
        //valido que los caracteres 2 y 5 sean /
        if($fecha[2]=='/' && $fecha[5]=='/' ){
            $dia = substr($fecha, 0, 2); //extraigo dia, mes y año
            $mes = substr($fecha, 3, 2);
            $ano = substr($fecha, 6, 4);
            echo '<h1>'.$validar -> validar($dia,$mes,$ano).'</h1>'; //llamo al metodo validar
        }else{
        echo "formato incorecto";
        }
    }else{
        echo "formato incorecto";
    }
    

?>