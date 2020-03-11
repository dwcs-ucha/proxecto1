<?php
    // BreoBeceiro:10/03/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    // OS MÉTODOS ESPECIALMENTE DESENVOLVIDOS PARA O SEU USO NALGUNHA ACTIVIDADE, TEÑEN UN COMENTARIO PREVIO NO QUE SE PODE 
    //   AVERIGUAR PARA QUE ACTIVIDADE FOI IMPLANTADO, ASÍ COMO O COLABORADOR AO CARGO DE DITA ACTIVIDADE.

    // HAI QUE DEPURAR validaXogador() -> SE SE LLE PASAN NÚMEROS, DEVOLVE TRUE.
    // HAI QUE DEPURAR validaRangoNumerico() -> SE UN DOS VALORES LÍMITE VALE 0 E COINCIDE CON $numero, DEVOLVE FALSE.
    // HAI DOUS MÉTODOS QUE VALIDAN IMAXES, O MÁIS FUNCIONAL É O SEGUNDO (validaImaxe2()), POIS O PRIMEIRO PRESENTA
    //   PROBLEMAS Á HORA DE PROCESAR AS RUTAS.
    // NOS DEMAIS MÉTODOS NON SE DETECTARON EXCEPCIÓNS (PERO PODERÍA HABELAS, DADO QUE NAS PROBAS PUIDERON QUEDAR CASOS SEN 
    //   COMPROBAR).

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

        // MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe un número enteiro, o valor mínimo do rango, e o valor máximo do rango.
        // Devolve TRUE soamente se $numero está dentro do rango do 5 ao 10, ámbolos dous valores incluídos.
        public static function validaRangoNumerico($numero, $min, $max){
            if(is_int($numero) && is_int($min) && is_int($max)){
                if($numero>=intval($min) && $numero<=intval($max)){
                    if(Validacion::validaInt($numero)){
                        $resultado= true;
                    }else{
                        $resultado= false;
                    }
                }else{
                    $resultado= false;
                }
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe un nome que, se ten menos de 30 caracteres e carece de números, producirá unha resposta positiva no
        //   método, é dicir, TRUE. En calquer outro caso, devolverá FALSE.
        public static function validaNomeCategoria($nomeCategoria){
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

        // MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe unha cadea de texto e un array, por esa orde.
        // Devolve TRUE se a cadea atópase no array e FALSE, se non.
        public static function buscaStringEnArray($cadeaABuscar, $vector){
            if(in_array($cadeaABuscar, $vector)){
                $resultado= true;
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe o nome ou ruta dunha imaxe e valida que teña extensión '.jpg', '.gif' ou '.png'.
        // Devolve TRUE se a variable de entrada contén esa extensión e FALSE, se non.
        // OLLO: SE SE DESEXA ENGADIR EXTENSIÓNS DE IMAXES PARA VALIDAR, BASTA CON ENGADILAS AO ARRAY $formatos.
        public static function validaImaxe1($ruta){
            $formatos = array("jpg", "gif", "png");
            $regex_formato = "#.+\.(".implode('|', $formatos).")$#";

            if(preg_match($regex_formato, $ruta) && preg_match("#^image/[a-z0-9]+$#", $ruta)){
                $resultado= true;
            }else{
                $resultado= false;
            }
        }

        // MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
        // Recibe o nome ou ruta dunha imaxe e valida que teña extensión '.jpg', 'jpeg', '.gif' ou '.png'.
        // Devolve TRUE se a variable de entrada contén esa extensión e FALSE, se non.
        public static function validaImaxe2($ruta){
            $patron = "%\.(gif|jpe?g|png)$%i";

            if(preg_match($patron, $ruta)){
                $resultado= true;
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // MÉTODO DE VALIDACIÓN PARA A DIFICULTADE BAIXA DA 'actividade6' (Luis Corral de Cal).
        // Recibe un número enteiro e devolve TRUE soamente se está dentro do rango do 0 (incluído) ata o 100 (sen incluír).
        public static function validaNumero_facil($numero){
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
        public static function validaNumero_medio($numero){
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
        public static function validaNumero_dificil($numero){
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

        // Corrixe unha cadea de caracteres de entrada para que cumpra formato de correo electrónico.
        // Devolve TRUE en caso de éxito ou FALSE, en caso contrario.
        public static function validaCorreo($email){
            if(filter_var($email, FILTER_SANITIZE_EMAIL)){
                $resultado= true;
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // Valida que unha variable conteña un número enteiro.
        // Devolve TRUE se é INT e FALSE, se non.
        public static function validaInt($enteiro){
            if(filter_var($enteiro, FILTER_VALIDATE_INT)){
                $resultado= true;
            }else{
                $resultado= false;
            }
    
            return $resultado;
        }

        // Valida que unha variable conteña un número decimal.
        // Devolve TRUE se é FLOAT e FALSE, se non.
        public static function validaFloat($decimal){
            if(filter_var($decimal, FILTER_VALIDATE_FLOAT)){
                $resultado= true;
            }else{
                $resultado= false;
            }

            return $resultado;
        }

        // Recibe unha data co formato 'aaaa-mm--dd'.
        // Devolve TRUE se a data é correcta, tanto no tocante ao seu formato coma a se existe de acordo co calendario, e FALSE se non.
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