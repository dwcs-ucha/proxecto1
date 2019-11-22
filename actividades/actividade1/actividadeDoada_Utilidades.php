<?php
    // BreoBeceiro:12/11/2019
    // PROXECTO 1º AVALIACIÓN | Versión 1.0

    // HAI QUE DEFINIR UN ARRAY NO QUE SE ALMACENEN AS IMAXES DA ACTIVIDADE.
    $silabasFinais= array("1"=>"PIZ", "2"=>"CHE", "3"=>"BRO", "4"=>"RO", "5"=>"NA");

    // Recibe a sílaba final dunha palabra do xogo e, en función dela, devolve a sílaba inicial.
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

    // Recibe a sílaba final dunha palabra do xogo e, en función dela, amosa a imaxe correspondente coa palabra.
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