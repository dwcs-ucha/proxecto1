<?php
    // BreoBeceiro:20/02/2020
    // PROXECTO 2ª AVALIACIÓN | Versión 1.0

    // OS MÉTODOS obterProduto() E obterProdutos() NON TEÑEN CABIDA NESTE PROXECTO, POIS A APLICACIÓN É 'Xogoteca',
    //   SÓ HAI XOGADORES E PARTIDAS.
    // FALTA UN MÉTODO gardarPuntuacion($id) QUE FAGA UN insert NA TÁBOA PARTIDAS PARA ESE USUARIO COA PUNTUACIÓN
    //   QUE OBTIVO.

    class DAO{

        // Conecta coa BBDD 'actividade1_BBDD' por medio do usuario 'breogan'.
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
        // Devolve o obxecto Usuario se existen os campos no CSV e FALSE, se non.
        public static function comprobaUsuario($usuario, $contrasinal){
            // SELECT usuario, contrasinal FROM actividade1_BBDD WHERE usuario=:usuario AND contrasinal=.contrasinal;
            // Compróbase a coincidencia de ambos campos e se devolvce o obxecto Xogador.
            return true;
        }

        // Parámetro: O código do produto a obter.
        // Devolve: Un obxecto PDO
        public static function obterProduto($cod){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT * FROM produtos WHERE codigo=:codigo');
                $consulta->bindParam(":codigo", $cod);
                $consulta->execute();

                $resultado= $consulta->rowCount();

            }catch(PDOException $e){
                $conexion= "Erro conectando coa base de datos ". $e->getMessage();

            }finally{
                if($resultado==1){
                    return $resultado;
                }else{
                    return false;
                }
            }
        }

        // Devolve: Un obxecto 
        public static function obterUsuario($cod){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT * FROM usuarios WHERE codigo=:codigo');
                $consulta->bindParam(":codigo", $cod);
                $consulta->execute();

                $resultado= $consulta->rowCount();

            }catch(PDOException $e){
                $conexion= "Erro conectando coa base de datos ". $e->getMessage();

            }finally{
                if($resultado==1){
                    return $resultado;
                }else{
                    return false;
                }
            }
        }

        // Devolve: Un obxecto PDO 
        public static function obterProdutos(){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT * FROM produtos');
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

        // Devolve: Un obxecto PDO
        public static function obterUsuarios(){
            try{
                $conexion= DAO::conectaBBDD();

                $consulta= $conexion->prepare('SELECT * FROM usuarios');
                $consulta->execute();
                
                $resultado= $consulta->rowCount();

            }catch(PDOException $e){
                $conexion= "Erro conectando coa base de datos ". $e->getMessage();

            }finally{
                if(isset($resultado)){
                    if($resultado>=1){
                        return $resultado;
                    }
                }else{
                    return false;
                }
            }
        }

    }