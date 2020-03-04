<?php
    // BreoBeceiro:04/03/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    // OS MÉTODOS ESPECIALMENTE DESENVOLVIDOS PARA O SEU USO NALGUNHA ACTIVIDADE, TEÑEN UN COMENTARIO PREVIO NO QUE SE PODE 
    //   AVERIGUAR PARA QUE ACTIVIDADE FOI IMPLANTADO, ASÍ COMO O COLABORADOR AO CARGO DE DITA ACTIVIDADE.

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

        // MÉTODO DE VALIDACIÓN PARA A DIFICULTADE BAIXA DA 'actividade6' (Luis Corral de Cal).
        // Recibe un número enteiro e devolve TRUE soamente se está dentro do rango do 0 (incluído) ata o 100 (sen incluír).
        public static function a6_validaNumero_facil($numero){
            if(is_int($numero)){
                if($numero<0){
                    $resultado= false;
                }elseif($numero>=100){
                    $resultado= false;
                }else{
                    if(Validacion::validaInt($numero)){
                        $resultado= true;
                    }else{
                        $resultado= false;
                    }
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A DIFICULTADE MEDIA DA 'actividade6' (Luis Corral de Cal).
        // Recibe un número enteiro e devolve TRUE soamente se está dentro do rango do 0 (incluído) ata o 1000 (sen incluír).
        public static function a6_validaNumero_medio($numero){
            if(is_int($numero)){
                if($numero<0){
                    $resultado= false;
                }elseif($numero>=1000){
                    $resultado= false;
                }else{
                    if(Validacion::validaInt($numero)){
                        $resultado= true;
                    }else{
                        $resultado= false;
                    }
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A DIFICULTADE ALTA DA 'actividade6' (Luis Corral de Cal).
        // Recibe un número enteiro e devolve TRUE soamente se está dentro do rango do 0 (incluído) ata o 10000 (sen incluír).
        public static function a6_validaNumero_dificil($numero){
            if(is_int($numero)){
                if($numero<0){
                    $resultado= false;
                }elseif($numero>=10000){
                    $resultado= false;
                }else{
                    if(Validacion::validaInt($numero)){
                        $resultado= true;
                    }else{
                        $resultado= false;
                    }
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A DIFICULTADE X DA 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe un número enteiro e devolve TRUE soamente se está dentro do rango do 5 (incluído) ao 10 (sen incluír).
        public static function a4_validaNumero($numero){
            if(is_int($numero)){
                if($numero<5){
                    $resultado= false;
                }elseif($numero>10){
                    $resultado= false;
                }else{
                    if(Validacion::validaInt($numero)){
                        $resultado= true;
                    }else{
                        $resultado= false;
                    }
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A DIFICULTADE X DA 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe un nome que, se ten menos de 30 caracteres e carece de números, producirá unha resposta positiva no
        //   método, é dicir, TRUE. En calquer outro caso, devolverá FALSE.
        public static function a4_validaNomeCategoria($nomeCategoria){
            if(is_string($nomeCategoria)){
                if(strlen($nomeCategoria)<30){
                    if(filter_var($nomeCategoria, FILTER_SANITIZE_STRING)){
                        $resultado= true;
                    }else{
                        $resultado= false;
                    }
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