<?php

/** 
 * 10/03/2020
 * PROXECTO 2ª AVALIACIÓN
 *
 * OS MÉTODOS ESPECIALMENTE DESENVOLVIDOS PARA O SEU USO NALGUNHA ACTIVIDADE, TEÑEN UN COMENTARIO PREVIO NO QUE SE PODE
 * AVERIGUAR PARA QUE ACTIVIDADE FOI IMPLANTADO, ASÍ COMO O COLABORADOR AO CARGO DE DITA ACTIVIDADE.
 * 
 * @author Breo Beceiro
 * @version 1.0
 * @todo DEPURAR validaXogador() -> SE SE LLE PASAN NÚMEROS, DEVOLVE TRUE.
 * @todo DEPURAR validaRangoNumerico() -> SE UN DOS VALORES LÍMITE VALE 0 E COINCIDE CON $numero, DEVOLVE FALSE.
 * HAI DOUS MÉTODOS QUE VALIDAN IMAXES, O MÁIS FUNCIONAL É O SEGUNDO (validaImaxe2()), POIS O PRIMEIRO PRESENTA
 * PROBLEMAS Á HORA DE PROCESAR AS RUTAS.
 * NOS DEMAIS MÉTODOS NON SE DETECTARON EXCEPCIÓNS (PERO PODERÍA HABELAS, DADO QUE NAS PROBAS PUIDERON QUEDAR CASOS SEN
 * COMPROBAR).
 */
class Validacion {

    /**
     * Esta función valida o nome do xogador. As que ten que cumprir o nome son: Minimo de 4 caracteres e máximo de 8.
     * Acéptanse caracteres alfabéticos e especiais.
     * @param string $login nome de usuario que tenta acceder á aplicación 'Xogoteca'.
     * @return boolean TRUE en caso de cumprir coas regras de formato consensuadas polos desenvolvedores da aplicación.
     *  FALSE en caso contrario.
     */
    public static function validaXogador($login) {
        if (strlen($login) >= 4 && strlen($login) <= 8) {
            if (filter_var($login, FILTER_SANITIZE_STRING)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /** 
     * Esta función valida o contrasinal do usuario. As que ten que cumprir o contrasinal son: Minimo de 4 caracteres e máximo de 8.
     *  Acéptanse caracteres alfanuméricos.
     * 
     * @param string $password contrasinal do usuario que tenta acceder á aplicación 'Xogoteca'.
     * @return boolean TRUE en caso de cumprir coas regras de formato consensuadas polos desenvolvedores da aplicación.
     * FALSE en caso contrario.
     */
    public static function validaContrasinal($password) {
        if (strlen($password) >= 4 && strlen($password) <= 8) {
            if (filter_var($password, FILTER_SANITIZE_STRING)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
     * Valida que un número se atopa nun determinado rango numérico e que sexa realmente un número enteiro.
     * @param int $numero Número que se quere validar.
     * @param int $min Valor mínimo que pode ter o número.
     * @param int $max Valor máximo que pode ter o número.
     * @return boolean TRUE soamente se $numero está dentro do rango indicado, ámbolos dous valores incluídos.
     * FALSE en caso contrario.
     */
    public static function validaRangoNumerico($numero, $min, $max) {
        if (is_numeric($numero) && is_numeric($min) && is_numeric($max)) {
            if ($numero >= intval($min) && $numero <= intval($max)) {
                if (self::validaInt($numero)) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            } else {
                $resultado = false;
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
     * Valida que o nome da categoría teña menos de 30 caracteres e non teña números.
     * @param string $nomeCategoria Nome da categoría que se quere validar
     * @return boolean TRUE se é válido. FALSE en caso contrario.
     */
    public static function validaNomeCategoria($nomeCategoria) {
        if (is_string($nomeCategoria)) {
            if (strlen($nomeCategoria) < 30) {
                if (filter_var($nomeCategoria, FILTER_SANITIZE_STRING)) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
     * Valida que a palabra recibida se atope no array.
     * @param string $cadeaABuscar
     * @param array $vector
     * @return boolean Devolve TRUE se a cadea atópase no array e FALSE, se non.
     */
    public static function buscaStringEnArray($cadeaABuscar, $vector) {
        if (in_array($cadeaABuscar, $vector)) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }
    
    /**
     * MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
     * Valida que unha imaxe sexa válida.
     * @param string $ruta
     * @return boolean TRUE se a variable de entrada contén esa extensión e FALSE, se non.
     */
    public static function validaImaxe1($ruta) {
        $formatos = array("jpg", "gif", "png", "jpeg");
        $regex_formato = "#.+\.(" . implode('|', $formatos) . ")$#";

        if (preg_match($regex_formato, $ruta) && preg_match("#^image/[a-z0-9]+$#", $ruta)) {
            $resultado = true;
        } else {
            $resultado = false;
        }
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A 'actividade4' (Santiago Calvo Piñeiro).
     * Valida que unha imaxe teña extensión '.jpg', 'jpeg', '.gif' ou '.png'.
     * @param string $ruta
     * @return boolean TRUE se a variable de entrada contén esa extensión e FALSE, se non.
     */
    public static function validaImaxe2($ruta) {
        $patron = "%\.(gif|jpe?g|png)$%i";

        if (preg_match($patron, $ruta)) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A DIFICULTADE BAIXA DA 'actividade6' (Luis Corral de Cal).
     * Valida que un número esté no intervalo [0,100) 0 incluído e 100 sen incluír.
     * @param int $numero Número que se quere validar.
     * @return boolean TRUE se está no rango. FALSE do contrario.
     */
    public static function validaNumero_facil($numero) {
        if (is_int($numero)) {
            if ($numero < 0) {
                $resultado = false;
            } elseif ($numero >= 100) {
                $resultado = false;
            } else {
                if (self::validaInt($numero)) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A DIFICULTADE MEDIA DA 'actividade6' (Luis Corral de Cal).
     * Valida que un número esté no intervalo [0,1000) 0 incluído e 1000 sen incluír.
     * @param int $numero Número que se quere validar.
     * @return boolean TRUE se está no rango. FALSE do contrario.
     */
    public static function validaNumero_medio($numero) {
        if (is_int($numero)) {
            if ($numero < 0) {
                $resultado = false;
            } elseif ($numero >= 1000) {
                $resultado = false;
            } else {
                if (self::validaInt($numero)) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * MÉTODO DE VALIDACIÓN PARA A DIFICULTADE DIFÍCIL DA 'actividade6' (Luis Corral de Cal).
     * Valida que un número esté no intervalo [0,10000) 0 incluído e 10000 sen incluír.
     * @param int $numero Número que se quere validar.
     * @return boolean TRUE se está no rango. FALSE do contrario.
     */
    public static function validaNumero_dificil($numero) {
        if (is_int($numero)) {
            if ($numero < 0) {
                $resultado = false;
            } elseif ($numero >= 10000) {
                $resultado = false;
            } else {
                if (self::validaInt($numero)) {
                    $resultado = true;
                } else {
                    $resultado = false;
                }
            }
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * Corrixe unha cadea de caracteres de entrada para que cumpra formato de correo electrónico.
     * @param string $email
     * @return boolean TRUE en caso de éxito ou FALSE, en caso contrario.
     */
    public static function validaCorreo($email) {
        if (filter_var($email, FILTER_SANITIZE_EMAIL)) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * Valida que unha variable conteña un número enteiro.
     * @param mixed $enteiro Valor recibido que se quere validar.
     * @return boolean TRUE se é INT e FALSE, se non.
     */
    public static function validaInt($enteiro) {
        if (filter_var($enteiro, FILTER_VALIDATE_INT)) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * Valida que unha variable conteña un número decimal.
     * @param mixed $decimal Valor recibido que se quere validar.
     * @return boolean TRUE se é FLOAT e FALSE, se non.
     */
    public static function validaFloat($decimal) {
        if (filter_var($decimal, FILTER_VALIDATE_FLOAT)) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        return $resultado;
    }

    /**
     * Valida se a data recibida cumple co formato 'aaaa-mm-dd' e se existe esa data no calendario.
     * @param string $date data a validar
     * @return boolean TRUE se a data é correcta, tanto no tocante ao seu formato coma a se existe de acordo co calendario, e FALSE se non.
     */
    public static function validaData($date) {
        $partesData = explode("-", $date);
        $data = checkdate($partesData[1], $partesData[2], $partesData[0]);

        if ($data) {
            $validado = true;
        } else {
            $validado = false;
        }
        return $validado;
    }
    
    /**
     * Valida que a dificultade da actividade esté dentro da lista permitida de valores
     * @param string $dificultade
     * @return bool TRUE se é válida. FALSE se non.
     */
    public static function validarDificultade($dificultade) {
        $dificultadesPermitidas = ["baixa", "media", "dificil"];
        $dificultadeValida = in_array($dificultade, $dificultadesPermitidas);
        return $dificultadeValida;
    }
    
    /**
     * Comproba que todos os elementos dun array están dentro dun máis grande
     * @param array $datosComprobar Lista de valores do que se quere comprobar se hai algún fóra dos valores permitidos
     * @param array $listaValores Array máis grande que debería conter todos os valores de $datosComprobar
     * @return type
     */
    public static function validarListaContenDatos($datosComprobar, $listaValores) {
        $listaElementosComuns = array_intersect($datosComprobar, $listaValores);
        $cantidadeElementosComuns = count($listaElementosComuns);
        $isDatosContidoEnLista = $cantidadeElementosComuns === count($datosComprobar);
        return $isDatosContidoEnLista;
    }
}

?>