<?php
    // BreoBeceiro:03/03/2020
    // PROXECTO 2º AVALIACIÓN | Versión 1.0

    session_start();

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);

    header("Location: actividadeDoada.php");
?>