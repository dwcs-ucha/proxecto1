<?php
    // BreoBeceiro:12/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // Módulo de funcións de validación e saneamento:
    include('actividadeDoada_moduloFuncions.php');

    //var_dump(validaSilaba("LE", "LA")); // Mándaselle un LE, e ten que haber un LA -> Devolve FALSE
    //var_dump(sizeSilaba("L")); // Mándaselle un caracter e teñen que ser dous -> Devolve FALSE

    if(!validaSilaba(strtoupper($_POST['silabaLA']), "LA")){
        $erroLA= "Tes que poñer LA...";
    }else{
        $silabaLA= $_POST['silabaLA'];
    }

    $silabaLE= $_POST['silabaLE'];
    $silabaLI= $_POST['silabaLI'];
    $silabaLO= $_POST['silabaLO'];
    $silabaLU= $_POST['silabaLU'];

    // HAI QUE VALIDALOS CAMPOS ANTES DE PASALOS AO VECTOR E COMPROBAR QUE NON TEÑAN UNHA LONXITUDE SUPERIOR A 2 CARACTERES
    //   (OS inputs VAN LIMITADOS A 2 CARACTERES NO HTML, PERO ESTE PODE SER MODIFICADO DENDE O CLIENTE, POLO QUE HAI QUE
    //   VALIDALO IGUALMENTE NO SERVIDOR).

    $silabas= array("LA"=>$silabaLA, "LE"=>$silabaLE, "LI"=>$silabaLI, "LO"=>$silabaLO, "LO"=>$silabaLU);
?>