<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 5 de Febrero de 2020
 * Descripción: Información de la clase "DAO" (Data Access Object)
 */

require "Config.class.php";//Se meten los datos para la conexión a la base de datos
require "Log.class.php";//Se meten los datos para escribir los errores en un log personalizado

 class DAO {
    
    /**
     * Nombre: establecerConexion()
     * Descripción: Establece la conexión con la base de datos a partir del nombre y contraseña especificados
     */
    private static function establecerConexion() {
        return new PDO(Config::$datos, Config::$nombre, Config::$contrasena);
    }

    /**
     * Nombre: configurarPDO()
     * Descripción: Configura la instancia de la clase PDO
     */
    private static function configurarPDO($instancia_conexion) {
        $PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//Desactiva en las consultas la emulación de consultas preparadas, lo que fuerza a realizar todas las consultas como preparadas
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Permite a esa clase lanzar excepciones del tipo PDOException
    }

    /**
     * Nombre: leerDatos()
     * Descripción: Lee algunos datos de la tabla especificada
     */
    public static function leerDatos($tabla, $campos) {
        try {//Se prueban los datos siguientes:
            $conexion = self::establecerConexion();//Se ejecuta la función "establecerConexion()" a partir de la clase "DAO" y se recoge su valor en la variable "$conexion"
            self::configurarPDO($conexion);//Se ejecuta la función configurarPDO() con el parámetro "$conexion"
            $total_campos = self::concatenarDatos($campos);//Se ejecuta la función "concatenarDatos()" con el parámetro "$campos"
            $sentencia = "SELECT " . $total_campos . " FROM " . $tabla;//Sentencia SQL a ejecutar

            $resultado = $conexion->query($sentencia);//Se ejecuta esa instrucción SQL para la base de datos y se recoge el resultado en esta variable

            $lista = $resultado->fetchAll();//Se recogen todos los datos en esta variable
        } catch (PDOException $e) {//Si salta un error del tipo "PDOException":
            $mensaje_error = $e->getMessage();//Mensaje de error

            Log::escribeLog($mensaje_error);//Se ejecuta la función "escribeLog()" a partir de la clase "Log" con el parámetro "$mensaje_error"
        }
        
        return $lista;//Se devuelve la lista con los datos específicos de la tabla específica
    }

    /**
     * Nombre: escribirDatos()
     * Descripción: Escribe el dato a partir de la información contenida en los arrays "$campos" y "$valores"
     */
    public static function escribirDatos($tabla, $campos, $valores) {
        try {//Se prueban los datos siguientes:
            $conexion = self::establecerConexion();//Se ejecuta la función "establecerConexion()" a partir de la clase "DAO" y se recoge su valor en la variable "$conexion"
            self::configurarPDO($conexion);//Se ejecuta la función configurarPDO() con el parámetro "$conexion"
            $total_campos = self::concatenarDatos($campos);//Se ejecuta la función "concatenarDatos()" con el parámetro "$campos"
            $total_valores = self::concatenarInterrogaciones($campos);//Se ejecuta la función "concatenarInterrogaciones()" con el parámetro "$campos"

            $sentencia = "INSERT INTO " . $tabla . "(" . $total_campos . ") VALUES (" . $total_valores . ")";//Sentencia SQL a preparar
            $consulta = $conexion->prepare($sentencia);//Se prepara esa sentencia SQL y se recoge su valor en esta variable
            $consulta->execute($valores);//Se ejecuta la sentencia con los datos del array "$valores"
        } catch (PDOException $e) {//Si salta un error del tipo "PDOException":
            $mensaje_error = $e->getMessage();//Mensaje de error

            Log::escribeLog($mensaje_error);//Se ejecuta la función "escribeLog()" a partir de la clase "Log" con el parámetro "$mensaje_error"
        }
    }

    /**
     * Nombre: modificarDatos()
     * Descripción: Modifica los datos específicos
     */
    public static function modificarDatos($tabla, $campos_modificaciones, $valores_modificaciones, $campos_condiciones, $tipos_condiciones, $valores_condiciones) {
        try {//Se prueban los datos siguientes:
            $conexion = self::establecerConexion();//Se ejecuta la función "establecerConexion()" a partir de la clase "DAO" y se recoge su valor de retorno en la variable "$conexion"
            self::configurarPDO($conexion);//Se ejecuta la función configurarPDO() con el parámetro "$conexion"
            $modificaciones = self::concatenarModificaciones($campos_modificaciones);//Se ejecuta la función "concatenarCondiciones()" con el parámetro "$campos_modificaciones" y se recoge su valor de retorno en la variable "$modificaciones"
            $condiciones = self::concatenarCondiciones($campos_condiciones, $tipos_condiciones);//Se ejecuta la función "concatenarCondiciones()" con los parámetros "$campos_condiciones" y "$tipos_condiciones" y se recoge su valor de retorno en la variable "$condiciones"
            $total_valores = array_merge($valores_modificaciones, $valores_condiciones);//Se junta en un solo array ($total_valores) los valores de las modificaciones y de las condiciones, en ese orden

            $sentencia = "UPDATE $tabla SET $modificaciones WHERE $condiciones";//Sentencia SQL a preparar
            $consulta = $conexion->prepare($sentencia);//Se prepara una sentencia SQL y se recoge su valor en esta variable
            $consulta->execute($total_valores);//Se ejecuta la sentencia con los datos del array "$total_valores"
        } catch (PDOException $e) {//Si salta un error del tipo "PDOException":
            $mensaje_error = $e->getMessage();//Mensaje de error

            Log::escribeLog($mensaje_error);//Se ejecuta la función "escribeLog()" a partir de la clase "Log" con el parámetro "$mensaje_error"
        }
    }

    /**
     * Nombre: borrarDatos()
     * Descripción: Borra los datos a partir de la/s condicion/es específica/s
     */
    public static function borrarDatos($tabla, $campos_condiciones, $tipos_condiciones, $valores_condiciones) {
        try {//Se prueban los datos siguientes:
            $conexion = self::establecerConexion();//Se ejecuta la función "establecerConexion()" a partir de la clase "DAO" y se recoge su valor en la variable "$conexion"
            self::configurarPDO($conexion);//Se ejecuta la función configurarPDO() con el parámetro "$conexion"
            $condiciones = self::concatenarCondiciones($campos_condiciones, $tipos_condiciones);//Se ejecuta la función "concatenarCondiciones()" con los parámetros "$campos_condiciones" y "$tipos_condiciones" y se recoge su valor de retorno en la variable "$condiciones"

            $sentencia = "DELETE FROM $tabla WHERE $condiciones";//Sentencia SQL a preparar
            $consulta = $conexion->prepare($sentencia);//Se prepara una sentencia SQL y se recoge su valor en esta variable
            $consulta->execute($valores_condiciones);//Se ejecuta la sentencia con los datos del array "$valores_condiciones"
        } catch (PDOException $e) {//Si salta un error del tipo "PDOException":
            $mensaje_error = $e->getMessage();//Mensaje de error

            Log::escribeLog($mensaje_error);//Se ejecuta la función "escribeLog()" a partir de la clase "Log" con el parámetro "$mensaje_error"
        }
    }

    /**
     * Nombre: concatenarDatos()
     * Descripción: Se concatenan los datos del array del parámetro y se devuelve el resultado
     */
    private static function concatenarDatos($lista_datos) {
        $total_datos = "";//Cadena donde se van a guardar los datos del array

        for ($cont = 0; $cont < count($lista_datos); $cont++) {//Cada vez que se ejecuta este bucle:
            $total_datos .= $lista_datos[$cont];//Se concatena uno de los datos a la cadena
            if ($cont < (count($lista_datos) - 1)) {//Si el contador es menor que el tamaño del array con los datos menos uno, se añade una coma después de cada dato
                $total_datos .= ", ";
            }
        }
        return $total_datos;//Se devuelve el resultado
    }

    /**
     * Nombre: concatenarInterrogaciones()
     * Descripción: Se concatenan interrogaciones a partir de la longitud del array del parámetro y se devuelve el resultado
     */
    private static function concatenarInterrogaciones($lista_datos) {
        $total_datos = "";//Cadena donde se van a guardar las interrogaciones

        for ($cont = 0; $cont < count($lista_datos); $cont++) {//Cada vez que se ejecuta este bucle:
            $total_datos .= "?";//Se concatena una de las interrogaciones a la cadena
            if ($cont < (count($lista_datos) - 1)) {//Si el contador es menor que el tamaño del array con los datos menos uno, se añade una coma después de cada dato
                $total_datos .= ", ";
            }
        }
        return $total_datos;//Se devuelve el resultado
    }

    /**
     * Nombre: concatenarCondiciones()
     * Descripción: Se concatenan los datos del array del parámetro para representar condiciones SQL y se devuelve el resultado
     */
    private static function concatenarCondiciones($campos, $tipos) {
        $total_datos = "";//Cadena donde se van a guardar los datos de los arrays

        for ($cont = 0; $cont < count($campos); $cont++) {//Cada vez que se ejecuta este bucle:
            $total_datos .= $campos[$cont] . " " . $tipos[$cont] . " ?";//Se concatena el campo y el tipo específico a la cadena
            if ($cont < (count($campos) - 1)) {//Si el contador es menor que el tamaño del array con los datos menos uno, se añade una coma después de cada dato
                $total_datos .= ", ";
            }
        }
        return $total_datos;//Se devuelve el resultado
    }

    /**
     * Nombre: concatenarModificaciones()
     * Descripción: Se concatenan los datos del array del parámetro para representar modificaciones SQL y se devuelve el resultado
     */
    private static function concatenarModificaciones($campos) {
        $total_datos = "";//Cadena donde se van a guardar los datos de los arrays

        for ($cont = 0; $cont < count($campos); $cont++) {//Cada vez que se ejecuta este bucle:
            $total_datos .= $campos[$cont] . " = ?";//Se concatenan el campo específico a la cadena
            if ($cont < (count($campos) - 1)) {//Si el contador es menor que el tamaño del array con los datos menos uno, se añade una coma después de cada dato
                $total_datos .= ", ";
            }
        }
        return $total_datos;//Se devuelve el resultado
    }
 }