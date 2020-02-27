<?php
    // BreoBeceiro:27/02/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    // FALTA UN MÉTODO gardarPuntuacion($id) QUE FAGA UN insert NA TÁBOA PARTIDAS PARA ESE USUARIO COA PUNTUACIÓN
    //   QUE OBTIVO.

    class DAO{

        // Conecta coa BBDD 'actividade1_BBDD' por medio do usuario 'breo'.
        // Devolve o obxecto PDO da conexión coa BBDD en caso de éxito, ou unha mensaxe de erro, en caso contrario.
        public static function conectaBBDD(){
            try{
                $conexion= new PDO("mysql:host=localhost;dbname=xogoteca", "breo", "4321");

                $conexion->exec("set names utf8");

                $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(PDOException $e){
                $conexion= "Erro conectando coa base de datos ". $e->getMessage();

            }finally{
                return $conexion;
            }
        }

        // Recibe un nome de usuario e o seu contrasinal. 
        // Devolve TRUE se o obxecto Usuario existe e FALSE, se non.
        public static function comprobaXogador($xogador, $contrasinal){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT usuario, contrasinal FROM actividade1_BBDD WHERE usuario=:usuario AND contrasinal=:contrasinal');
                $consulta->bindParam(":usuario", $xogador);
                $consulta->bindParam(":contrasinal", $contrasinal);

                if($consulta->execute()){
                    $resultado= true;
                }else{
                    $resultado= false;
                }

            }catch(PDOException $e){
                $conexion= "Erro na conexión coa BBDD: ". $e->getMessage();

            }finally{
                return $resultado;

            }
        }

        // Devolve: Un obxecto Xogador en caso de éxito ou unha mensaxe de erro, en caso contrario.
        public static function obterXogador($cod){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT * FROM a1_xogador WHERE codigo=:codigo');
                $consulta->bindParam(":codigo", $cod);
                $consulta->execute();

                $xogador= $resultado->fetch(PDO::FETCH_OBJ);

            }catch(PDOException $e){
                $xogador= "Erro conectando coa base de datos ". $e->getMessage();

            }finally{
                return $xogador;
            }
        }

        // Devolve: Un obxecto PDO 
        public static function obterXogadores(){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT * FROM a1_xogadores');
                $consulta->execute();

                $resultado= $consulta->rowCount();

            }catch(PDOException $e){
                $conexion= "Erro conectando coa base de datos ". $e->getMessage();

            }finally{
                if($resultado>=1){
                    return $resultado;
                }else{
                    return false;
                }
            }
        }

        // Fai un INSERT na táboa a1_partidas para a tupla na que o campo 'codigo' coincida co parámetro recibido.
        // Devolve TRUE en caso de éxito e FALSE, en caso de erro.
        public static function gardarPuntuacion($id){
            // Código para gardar os puntos do xogador...
            return true;
        }

    }