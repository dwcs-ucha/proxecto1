<?php
    // BreoBeceiro:20/02/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    // ESTA CLASE SERÁ POSTA A DISPOSICIÓN DE TODO O GRUPO.

    class Validacion{

        // Corrixe unha cadea de caracteres de entrada.
        // Devolve TRUE en caso de éxito ou FALSE, en caso contrario.
        public static function validaString($cadea){
            if(filter_var($cadea, FILTER_SANITIZE_EMAIL)){
                $resultado= true;
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        public static function validaInt($enteiro){
            if(filter_var($enteiro, FILTER_VALIDATE_INT)){
                $resultado= true;
            }else{
                $resultado= false;
            }
    
            return $resultado;
        }

        // Corrixe e valida un número decimal de entrada.
        // Devolve TRUE en caso de éxito ou FALSE, en caso contrario.
        public static function validaFloat($decimal){
            if(filter_var($decimal, FILTER_VALIDATE_FLOAT)){
                $resultado= true;
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // Recibe unha data co formato 'aaaa-mm--dd'.
        public static function validaData($date){
    
            $partesData= explode("-", $date);
            $data= checkdate($partesData[1], $partesData[2], $partesData[0]);
    
            if($data){
                $validado= true;
            }else{
                $validado= false;
            }
            return $validado;
        }
    }
?>