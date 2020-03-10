<?php

/**
 * Clase que xestiona a escritura no ficheiro de log
 *
 * @author Santiago Calvo Piñeiro
 */
class Log {

    /**
     * @param int $ERRO_XENERICO Tipo de erro non específico
     */
    const ERRO_XENERICO = 0;

    /**
     * @param int $ERRO_BBDO Tipo de erro relacionado coa base de datos
     */
    const ERRO_BBDO = 1;

    /**
     * @param int $ERRO_VALIDACIONS Tipo de erro relacionado coas validacións
     */
    const ERRO_VALIDACIONS = 2;
    
    /**
     * @param int $LOG_USUARIOS Dato asociado aos usuarios
     */
    const LOG_USUARIOS = 3;

    /**
     * 
     * @return string Ruta do ficheiro de log
     */
    private static function getLog() {
        $arquivoLog = Config::$rutaRootPHP . "/log/Rexistros.log"; // Definida na clase ou no arquivo config.php
        return $arquivoLog;
    }

    /**
     * 
     * @return string Devolve a ip do usuario que chamou á función
     */
    private static function getIP() {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER ['HTTP_VIA']))
            $ip = $_SERVER['HTTP_VIA'];
        else if (isset($_SERVER ['REMOTE_ADDR']))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = null;
        return $ip;
    }

    /**
     * Escribe unha mensaxe no log en caso de que o tipo de erro recibido esté habilitado no ficheiro de configuración
     * @param string $mensaxe Mensaxe que se gardará no log
     * @param int $tipoLog O valor é unha das constantes definidas nesta clase
     */
    public static function escribeLog(string $mensaxe, int $tipoLog) {
        if (self::isLogHabilitado($tipoLog)) {
            $infoLog = date("d-m-Y H:i:s.u") . " - " . self::getIP() . " - " . $mensaxe . "\n";
            error_log($infoLog, 3, self::getLog());
        }
    }

    /**
     * 
     * @param int $tipoLog O valor é unha das constantes definidas nesta clase
     * @return boolean Devolve se o tipo de erro recibido está habilitado ou non no ficheiro de configuración
     */
    private static function isLogHabilitado(int $tipoLog) {
        switch ($tipoLog) {
            case self::ERRO_XENERICO:
                return Config::LOG_ERRO_XENERICO;
                break;
            case self::ERRO_BBDO:
                return Config::LOG_ERRO_BBDO;
                break;
            case self::ERRO_VALIDACIONS:
                return Config::LOG_ERRO_VALIDACIONS;
                break;
            case self::LOG_USUARIOS:
                return Config::LOG_USUARIOS;
                break;
            default:
                return false;
                break;
        }
    }
    
}