<?php

class Estatisticas {
    
    public $codactividade;
    public $nomexogador;
    public $data;
    public $puntos;
    public $dificultade;
    
    
    public function __construct($codactividade,$nomexogador,$data,$puntos,$dificultade) {
        $this->codactividade = $codactividade;
        $this->nomexogador = $nomexogador;
        $this->data = $data;
        $this->puntos = $puntos;
        $this->dificultade = $dificultade;
        
    }
    public function gardar_estatistica(Estatistica $estatistica){
        //
    }
    
    
    public function estatisticas_actividade($codactividade){       
        /*Faltan las condiciones*/
        $array_estatisticas = Array();
        $campos=array("codactividade","nomexogador","data","puntos","dificultade"); 
        foreach(DAO::leerDatos('estatisticas',$campos)/**/ as $estatistica){
            $est = new Estatisticas($estatistica['codactividade'], $estatistica['nomexogador'],
                    $estatistica['data'], $estatistica['puntos'],$estatistica['dificultade']);
            array_push($array_estatisticas,$est);
        }
        return $array_estatisticas;        
    }
    public function estatisticas_xogador($nomexogador){
        /*Faltan las condiciones*/
        $array_estatisticas = Array();
        foreach(DAO::estatisticas_xogador($nomexogador) as $estatistica){
            $est = new Estatisticas($estatistica['codactividade'], $estatistica['nomexogador'],
                    $estatistica['data'], $estatistica['puntos'],$estatistica['dificultade']);
            array_push($array_estatisticas,$est);
        }
        return $array_estatisticas; 
    }
    
    
    
}
