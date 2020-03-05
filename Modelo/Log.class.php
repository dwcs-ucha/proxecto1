<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Log
 *
 * @author xubu
 */
class Log {

    const arquivoLog = "../log/errorLog.log"; // Definida na clase ou no arquivo config.php

    // Función que devolve o máis aproximado á IP dun usuario

    private function getIP() {
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

    // Escribe no log o erro xunto coa data e a IP do usuario que lanzou o script
    public function escribeLog($erro) {
        $infoLog = date("Y-m-d H:i:s.u") . " - " . $this->getIP() . " - " . $erro . "\n";
        error_log($infoLog, 3, self::arquivoLog);
    }

}
