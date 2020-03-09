<?php

/**
 * Autor: Azael Otero Santamariña
 * Fecha: 5 de Febrero de 2020
 * Descripción: Clase de configuración para la conexión a la base de datos
 */
class Config {

    public static $datos = "mysql:host=localhost;dbname=tienda"; //Host del servidor y nombre de la base de datos
    public static $nombre = "phpmyadmin"; //Nombre del usuario que se conecta al servidor (Tiene que tener los privilegios suficientes)
    public static $contrasena = "admin"; //Contrasena del usuario
    
    /**
     *
     * @var string Ruta absoluta da aplicación no servidor
     * Exemplo: C:/xampp/htdocs/
     * Exemplo de uso: {$rutaRootHTML}{'Vista/imaxes/nenos.jpg'}
     * É importante a "/" do final.
     */
    public static $rutaRootPHP = "D:/xampp/proxecto/";
    
    /**
     *
     * @var string Nome do servidor. Pode ser a dirección do host virtual ou localhost. 
     * Exemplo: http://localhost/proxecto1/    ou     http://proxecto.com/    (http://NOME_SERVIDOR/)
     * Exemplo de uso: {include file="{$rutaRootPHP}{'Vista/layout/pe.tpl'}"}
     * É importante a "/" do final.
     */
    public static $rutaRootHTML = "http://proxecto.com/";

    /**
     * @property boolean $LOG_ERRO_XENERICO Habilita ou deshabilita o log de erros xenéricos.
     */
    const LOG_ERRO_XENERICO = true;

    /**
     * @property boolean $LOG_ERRO_BBDO Habilita ou deshabilita o log de erros relacionados coa base de datos.
     */
    const LOG_ERRO_BBDO = true;

    /**
     * @property boolean $LOG_ERRO_XENERICO Habilita ou deshabilita o log de erros relacionados coas validacións.
     */
    const LOG_ERRO_VALIDACIONS = true;

}
