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
        //funcion que devuelve el nombre del mes
        private function saberMes($mes){
            foreach($this->arrayMeses as $valor){
                if($mes==$valor['numeroMes']){
                    return $valor['nombreMes'];               
                }
            }
        }

        //funcion que devuelve los dias del mes
        private function diasMes($mes,$ano){
            foreach($this->arrayMeses as $valor){
                if($mes==$valor['numeroMes']){
                    //si el mes es febrero compruebo si es bisiesto
                    if($mes==2){
                        $bisi= $this->bisiesto($ano);
                        //si es bisiesto cambio los dias a 29
                        if($bisi==true){
                            $valor['diasMes']=29;
                            return $valor['diasMes']; //devuelvo 29
                        }else{
                            return $valor['diasMes']; //devuelvo 28
                        }
                    }else{
                        return $valor['diasMes']; //devuelvo los dias del mes
                    }

                }
            }
        }
        //funcion que comprueba si el año es bisiesto
        private function bisiesto($ano){
            if(($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)){
                return true;
            }else{
                return false;
            }
        }

        //funcion que valida la fecha
        public function validar($dia,$mes,$ano){
            $anioActual= date('Y'); //año actual
            //compruebo que el mes, dia y año sean correctos
            if($mes<1 || $mes>12){
                return "Mes no existente";
            }
            if($ano<=1950 || $ano>$anioActual){
                return "Año erroneo";
            }
            if($dia<1 || $dia > $this->diasMes($mes,$ano)){
                return "Dia erroneo";
            }
            $diasFebrero= $this->diasMes(2,$ano); //dias que tiene febrero
            //si todo es correcto devuelvo la fecha con el nombre del mes y los dias que tiene
            return $dia .'/' .$this->saberMes($mes). '/' .$ano. ' este mes tiene '. $this->diasMes($mes,$ano). ' dias <br> Dias de febrero: '.$diasFebrero ;
        }

    }
?>