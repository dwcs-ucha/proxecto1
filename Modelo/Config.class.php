<?php

/**
 * Autor: Azael Otero Santamariña
 * Fecha: 5 de Febrero de 2020
 * Descripción: Clase de configuración para la conexión a la base de datos
 */
class Config {

    public static $datos = "mysql:host=localhost;dbname=xogoteca"; //Host del servidor y nombre de la base de datos
    public static $nombre = "phpmyadmin"; //Nombre del usuario que se conecta al servidor (Tiene que tener los privilegios suficientes)
    public static $contrasena = "admin"; //Contrasena del usuario
    public static $rutaRootPHP;
    public static $rutaRootHTML;

    /**
     * @property boolean $LOG_ERRO_XENERICO Habilita ou deshabilita o log de erros xenéricos.
     */
    const LOG_ERRO_XENERICO = true;

    /**
     * @property boolean $LOG_ERRO_BBDO Habilita ou deshabilita o log de erros relacionados coa base de datos.
     */
    const LOG_ERRO_BBDO = true;

    /**
     * @property boolean $LOG_ERRO_VALIDACIONS Habilita ou deshabilita o log de erros relacionados coas validacións.
     */
    const LOG_ERRO_VALIDACIONS = true;
    
    /**
     * @property boolean $LOG_USUARIOS Habilita ou deshabilita o log relacionado cos usuarios.
     */
    const LOG_USUARIOS = true;

    /**
     * @descripción Devolve a ruta do cartafol raíz do proxecto
     * @return string Cartafol raíz do proxecto
     */
    public static function getRutaRootPHP() {
        return self::$rutaRootPHP;
    }

    /**
     * @descripción Devolve a dirección do dominio
     * @return string Nome de dominio co protocolo http
     */
    public static function getRutaRootHTML() {
        return self::$rutaRootHTML;
    }

    /**
     * @descripción Asigna o cartafol raíz do servidor. O máis probable é que $_SERVER["DOCUMENT_ROOT"] sexa o cartafol "/var/www/html" así que o que hai que indicar o nome do proxecto.
     * Exemplo se a aplicación se garda no cartafol "Xogoteca": $_SERVER["DOCUMENT_ROOT"] . "/Xogoteca/"
     */
    public static function setRutaRootPHP() {
        self::$rutaRootPHP = $_SERVER["DOCUMENT_ROOT"] . "/Xogoteca/";
    }

    /**
     * @descripción Asigna a ruta do dominio. O máis probable é que $_SERVER["SERVER_NAME"] sexa "localhost" así que o que hai que indicar o nome do proxecto.
     * Exemplo se a aplicación se garda no cartafol "Xogoteca": $_SERVER["SERVER_NAME"] . "/Xogoteca/"
     */
    public static function setRutaRootHTML() {
        self::$rutaRootHTML = "http://" . $_SERVER["SERVER_NAME"] . "/Xogoteca/";
    }

}

//Asígnanse as rutas necesarias para facer funcionar a páxina web
Config::setRutaRootPHP();
Config::setRutaRootHTML();
