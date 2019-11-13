<?php
    // BreoBeceiro:12/11/2019
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

?>