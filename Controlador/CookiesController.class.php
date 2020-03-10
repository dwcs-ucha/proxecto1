<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CookiesController
 *
 * @author Santiago
 */
class CookiesController {

    static function isPoliticaCookiesAceptada() {
        return isset($_COOKIE["avisoCookiesMostrado"]);
    }

    static function aceptarPoliticaCookies() {
        setcookie("avisoCookiesMostrado", true, time()+3600 * 24 * 365, "/"); //Aceptará as cookies durante 1 ano
    }
}
