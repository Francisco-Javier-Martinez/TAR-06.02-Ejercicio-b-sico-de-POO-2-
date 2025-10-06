<?php

    class ValidarFecha{
        //Array con los meses del año
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
        //sacar el nombre del mes
        private function sacarNombre($mes){
            foreach($this->arrayMeses as $valor){
                if($mes==$valor['numeroMes']){
                    return $valor['nombreMes'];               
                }
            }
        }
        //sacar los dias del mes
        private function diasMes($mes,$ano){
            foreach($this->arrayMeses as $valor){
                //Comprobar si el mes es febrero y si el año es bisiesto
                if($mes==$valor['numeroMes']){
                    if($mes==2 && $this->operacionBisiesto($ano)){ //Si es febrero y el año es bisiesto
                        $valor['diasMes']=29; //Cambio los dias de febrero a 29
                        return $valor['diasMes'];
                    }
                    return $valor['diasMes'];
                }
            }
        }
        //Comprobar si el año es bisiesto
        private function operacionBisiesto($ano){
            if(($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)){
                return true;
            }else{
                return false;
            }
        }

        //Mostrar la fecha escrita y los dias del mes
        public function monstrarFechaEscrita($fecha){
            $trozo= explode('-',$fecha); //separo la fecha en 3 partes mediante el - porque el formato es aaaa-mm-dd
            $diasFebrero= $this->diasMes(2,$trozo[0]); //Dias de febrero del año introducido
            return $trozo[2] .'/' .$this->sacarNombre($trozo[1]). '/' .$trozo[0]. ' este mes tiene '. $this->diasMes($trozo[1],$trozo[0]). ' dias <br> Dias de febrero: '.$diasFebrero ;
        }
    }
?>
