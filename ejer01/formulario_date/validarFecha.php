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
                if($mes==$valor['numeroMes']){
                    //Comprobar si es febrero y si el año es bisiesto
                    if($mes==2){
                        //Comprobar si es bisiesto
                        $bisi= $this->bisiesto($ano);
                        //Si es bisiesto cambiar los dias del mes a 29
                        if($bisi==true){
                            $valor['diasMes']=29;
                            return $valor['diasMes'];
                        }else{
                            return $valor['diasMes'];
                        }
                    }else{
                        return $valor['diasMes'];
                    }
                }
            }
        }
        //Comprobar si el año es bisiesto
        private function bisiesto($ano){
            if(($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0)){
                return true;
            }else{
                return false;
            }
        }

        //Mostrar la fecha escrita y los dias del mes
        public function monstrarFechaEscrita($dia,$mes,$ano){
            $diasFebrero= $this->diasMes(2,$ano); //Dias de febrero del año introducido
            return $dia .'/' .$this->sacarNombre($mes). '/' .$ano. ' este mes tiene '. $this->diasMes($mes,$ano). ' dias <br> Dias de febrero: '.$diasFebrero ;
        }

    }
?>