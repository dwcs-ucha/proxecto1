<?php 
        /********************************/
	/*	Luis Corral de Cal      */
	/*	9 MArzo 2020	        */
    	/*	Xogoteca        	*/
    	/*  	Estatisticas->Modelo    */
    	/*	Version 1		*/
	/********************************/
?>
<?php
include_once 'DAO.class.php';
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

    public static function gardar_estatistica(Estatisticas $estatistica){
        $campos = array('codactividade','nomexogador','data','puntos','dificultade');
        $valores = array($estatistica->codactividade,$estatistica->nomexogador,$estatistica->data,$estatistica->puntos,$estatistica->dificultade);
        DAO::escribirDatos('estadisticas', $campos, $valores);
    }
    
    
    public static function estatisticas_actividade($codactividade){               
        $array_estatisticas = Array();
        $campos=array("codactividade","nomexogador","data","puntos","dificultade"); 
        foreach(DAO::leerDatosCondicion('estadisticas',$campos,'codactividade','=',$codactividade) as $estatistica){
            $est = new Estatisticas($estatistica['codactividade'], $estatistica['nomexogador'],
                    $estatistica['data'], $estatistica['puntos'],$estatistica['dificultade']);
            array_push($array_estatisticas,$est);
        }
        return $array_estatisticas;        
    }

    public static function estatisticas_xogador($nomexogador){        
        $array_estatisticas = Array();
        $campos=array("codactividade","nomexogador","data","puntos","dificultade"); 
        foreach(DAO::leerDatosCondicion('esditisticas',$campos,'nomexogador','=',$nomexogador) as $estatistica){
            $est = new Estatisticas($estatistica['codactividade'], $estatistica['nomexogador'],
                    $estatistica['data'], $estatistica['puntos'],$estatistica['dificultade']);
            array_push($array_estatisticas,$est);
        }
        return $array_estatisticas; 
    }
    
    
}
