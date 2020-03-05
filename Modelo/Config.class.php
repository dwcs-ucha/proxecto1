<?php
/**
 * Autor: Azael Otero Santamariña
 * Fecha: 5 de Febrero de 2020
 * Descripción: Clase de configuración para la conexión a la base de datos
 */

 class Config {
    public static $datos = "mysql:host=localhost;dbname=asd";//Host del servidor y nombre de la base de datos
    public static $nombre = "phpmyadmin";//Nombre del usuario que se conecta al servidor (Tiene que tener los privilegios suficientes)
    public static $contrasena = "admin";//Contrasena del usuario
 }
