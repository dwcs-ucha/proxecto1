<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaDAO
 *
 * @author Santiago
 */
class CategoriasDAO {
    private static function getRutaFicheiroCategorias() {
        $ruta = Config::$rutaRootPHP . "actividades/actividade4/categorias.csv";
        return $ruta;
    }
    public static function getCategorias() {
        $categorias = array();
        $ficheiroCategorias = fopen(self::getRutaFicheiroCategorias(), "r");
        while (($arrayCategoriaLida = fgetcsv($ficheiroCategorias, 0, ';')) !== false) {
            $nomeCategoria = $arrayCategoriaLida[Categoria::INDEX_NOME];
            $imaxePrincipalCategoria = $arrayCategoriaLida[Categoria::INDEX_IMAXE_PRINCIPAL];
            $imaxesCategoriaXogo = array_slice($arrayCategoriaLida, Categoria::INDEX_COMEZO_IMAXES_XOGO);
            $categoria = new Categoria($nomeCategoria, $imaxePrincipalCategoria, $imaxesCategoriaXogo);
            $categorias[] = $categoria;
        }
        fclose($ficheiroCategorias);
        return $categorias;
    }
}
