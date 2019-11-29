<?php
    // BreoBeceiro:29/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // validaSilaba() comprobará que nas caixas de texto vaian as sílabas que teñen
    //   que ir (poden ser 'LA', 'LE', 'LI' ou 'LU').
    // A variable '$primeiraSilaba' contén o introducido na caixa de texto editable, 
    //   e '$segundaSilaba', contén a sílaba que ten que conter a primera variable.
    function validaSilaba($primeiraSilaba, $segundaSilaba){
        if(!preg_match("/\b$segundaSilaba\b/i", $primeiraSilaba)){
            $validado= false;
        }else{
            $validado= true;
        }
        return $validado;
    }

    // sizeSilaba() comproba que a lonxitude das sílabas introducidas nas caixas de
    //   texto sexa 2.
    function sizeSilaba($primeiraSilaba){
        if(strlen($primeiraSilaba)==2){
            $validado= true;
        }else{
            $validado= false;
        }
        return $validado;
    }

    // devolveSilabaInicial() recibe a sílaba final dunha palabra do xogo e, en función dela, devolve a sílaba inicial.
    // O cometido desta función é empregarse nos campos do formulario nos que @s nen@s poñerán a primeira sílaba, concretamente,
    //   chamarase nos atributos 'name', de xeito que en cada iteracción do 'foreach', dado que a sílaba final será diferente, 
    //   recibirá un parámetro distinto, producindo un 'name' chamado 'silabaLE' ou 'silabaLU', en función do valor da sílaba
    //   final.
    function devolveSilabaInicial($silabaFinal){
        switch($silabaFinal){
            case "PIZ":
                $silabaInicial= "LA";
                break;
            case "CHE":
                $silabaInicial= "LE";
                break;
            case "BRO":
                $silabaInicial= "LI";
                break;
            case "RO":
                $silabaInicial= "LO";
                break;
            case "NA":
                $silabaInicial= "LU";
                break;
            default:
                return false;
        }
        return $silabaInicial;
    }

    // devolveImaxe() recibe a sílaba final dunha palabra do xogo e, en función dela, amosa a imaxe correspondente coa palabra.
    function devolveImaxe($silabaFinal){
        switch($silabaFinal){
            case "PIZ":
                $imaxe= "<img src='Imaxes/ProxectoFacil_Imaxe1.jpg' class='imaxesNivel1' />";
                break;
            case "CHE":
                $imaxe= "<img src='Imaxes/ProxectoFacil_Imaxe2.jpg' class='imaxesNivel1' />";
                break;
            case "BRO":
                $imaxe= "<img src='Imaxes/ProxectoFacil_Imaxe3.jpg' class='imaxesNivel1' />";
                break;
            case "RO":
                $imaxe= "<img src='Imaxes/ProxectoFacil_Imaxe4.jpg' class='imaxesNivel1' />";
                break;
            case "NA":
                $imaxe= "<img src='Imaxes/ProxectoFacil_Imaxe5.jpg' class='imaxesNivel1' />";
                break;
            default:
                return false;
        }
        echo $imaxe;
    }

?>