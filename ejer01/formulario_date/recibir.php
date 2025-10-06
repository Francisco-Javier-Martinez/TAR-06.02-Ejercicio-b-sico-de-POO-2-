<?php
    require "ValidarFecha.php";

    $fecha=$_GET['fecha'];
    $validar= new ValidarFecha();
    //https://www.php.net/manual/es/function.explode.php informacion sacada de aqui
    $trozo= explode('-',$fecha); //separo la fecha en 3 partes mediante el - porque el formato es aaaa-mm-dd
    //valido que el array tenga 3 partes
    if(count($trozo)==3){
        $ano = $trozo[0];//el primer trozo es el año
        $mes = $trozo[1];//el segundo trozo es el mes
        $dia = $trozo[2];//el tercer trozo es el dia
        echo '<h1>'.$validar -> monstrarFechaEscrita($dia,$mes,$ano).'</h1>';//llamo al metodo monstrarFechaEscrita
        }else{
            echo "formato incorecto";
        }

?>
