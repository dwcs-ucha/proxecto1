<?php
    // BreoBeceiro:03/03/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    // ESTA CLASE SERÁ POSTA A DISPOSICIÓN DE TODO O GRUPO.

    class Validacion{

        // Recibe unha cadea de caracteres correspondente co nome do usuario que tenta acceder á aplicación 'Xogoteca'.
        // Devolve TRUE en caso de cumprir coas regras de formato consensuadas polos desenvolvedores da aplicación. As
        //   regras son: Minimo de 4 caracteres e máximo de 8. Acéptanse caracteres alfabéticos e especiais.
        public static function validaXogador($login){
            if(strlen($login)>=4 && strlen($login)<=8){
                if(filter_var($login, FILTER_SANITIZE_STRING)){
                    $resultado= true;
                }else{
                    $resultado= false;
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // Recibe unha cadea de caracteres correspondente coa contrasinal do usuario que tenta acceder á aplicación 'Xogoteca'.
        // Devolve TRUE en caso de cumprir coas regras de formato consensuadas polos desenvolvedores da aplicación. As
        //   regras son: Minimo de 4 caracteres e máximo de 8. Acéptanse caracteres alfanuméricos.
        public static function validaContrasinal($password){
            if(strlen($password)>=4 && strlen($password)<=8){
                if(filter_var($password, FILTER_SANITIZE_STRING)){
                    $resultado= true;
                }else{
                    $resultado= false;
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // Corrixe unha cadea de caracteres de entrada.
        // Devolve TRUE en caso de éxito ou FALSE, en caso contrario.
        public static function validaCorreo($email){
            if(filter_var($email, FILTER_SANITIZE_EMAIL)){
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