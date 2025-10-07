<?php

    class ValidarFecha{
        //array con los meses del año
        private $arrayMeses = [
            ["numeroMes"=>1, "nombreMes"=>"Enero", "diasMes"=>31],
            ["numeroMes"=>2, "nombreMes"=>"Febrero", "diasMes"=>28],
            ["numeroMes"=>3, "nombreMes"=>"Marzo", "diasMes"=>31],
            ["numeroMes"=>4, "nombreMes"=>"Abril", "diasMes"=>30],
            ["numeroMes"=>5, "nombreMes"=>"Mayo", "diasMes"=>31],
            ["numeroMes"=>6, "nombreMes"=>"Junio", "diasMes"=>30],
            ["numeroMes"=>7, "nombreMes"=>"Julio", "diasMes"=>31],
            ["numeroMes"=>8, "nombreMes"=>"Agosto", "diasMes"=>31],
            ["numeroMes"=>9, "nombreMes"=>"Septiembre", "diasMes"=>30],
            ["numeroMes"=>10, "nombreMes"=>"Octubre", "diasMes"=>31],
            ["numeroMes"=>11, "nombreMes"=>"Noviembre", "diasMes"=>30],
            ["numeroMes"=>12, "nombreMes"=>"Diciembre", "diasMes"=>31]
        ];
        private $anioActual; //año actual
        private $fechaEntera = '';
       
        //constructor para inicializar el año actual
        public function __construct(){
            $this->anioActual= date('Y'); //año actual
        }

        //funcion que devuelve el nombre del mes
        private function nombreMes($mes){
            foreach($this->arrayMeses as $valor){
                if($mes==$valor['numeroMes']){
                    return $valor['nombreMes'];               
                }
            }
        }

        //funcion que modifica los dias de febrero si el año es bisiesto
        private function modificarFechas($ano){
            //si el mes es febrero compruebo si es bisiesto
            if(($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)){
                //si es bisiesto cambio los dias a 29
                $this->arrayMeses[1]['diasMes'] = 29; 
            }
        }

        //funcion que valida la fecha
        public function validar($fecha){
           //valido que los caracteres 2 y 5 sean /
            if($fecha[2]=='/' && $fecha[5]=='/' ){
                $dia = (int)substr($fecha, 0, 2); //extraigo dia, mes y año
                $mes = (int)substr($fecha, 3, 2);
                $ano = (int)substr($fecha, 6, 4);
            }else{
                return '<a href="formu.html">Formato incorrecto o caracter incorrecto. Volver</a>';
            }
            //compruebo que el mes, dia y año sean correctos
            if($mes<1 || $mes>12){
                return '<a href="formu.html">Mes no existente. Volver</a>';
            }
            if($ano<=1950 || $ano>$this->anioActual){
                return '<a href="formu.html">Año erróneo. Volver</a>';
            }
            //modifico los dias de febrero si es bisiesto
            $this->modificarFechas($ano);
            //una vez modificado los dias de febrero compruebo que el dia sea correcto
            if($dia<1 || $dia > $this->arrayMeses[$mes-1]['diasMes']){
                return '<a href="formu.html">Día erróneo. Volver</a>';
            }

            //si todo es correcto concateno la fecha en una variable con el formato dia/mes/año
            $this->fechaEntera = $dia .'/' .$this->nombreMes($mes). '/' .$ano;

            //si todo es correcto devuelvo la fecha con el nombre del mes y los dias que tiene
            return $this->fechaEntera. ' <br> Este mes tiene '. $this->arrayMeses[$mes-1]['diasMes']. ' dias <br> Dias de febrero: '.$this->arrayMeses[1]["diasMes"];
        }

    }
?>
