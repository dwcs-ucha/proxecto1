<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoriaController
 *
 * @author Santiago
 */
include Config::getRutaRootPHP() . 'actividades/actividade4/Modelo/CategoriaVO.class.php';

class CategoriaController {
    static function getCategoriasAleatoriamente(int $numCategorias) {
        $categorias = self::getCategorias();
      //  var_dump($categorias);
        shuffle($categorias);
        $categorias = array_slice($categorias, 0, $numCategorias);
        return $categorias;
    }
    
    static function getCategorias() {
        $categorias = array();
        $camposCategoria = ["*"];
        $datosCategorias = DAO::leerDatos("a4_categorias", $camposCategoria);
        foreach ($datosCategorias as $datosCategoria) {
            $codcategoria = $datosCategoria[1];
            $nome = $datosCategoria[2];
            $imaxeprincipal = $datosCategoria[3];
            
            $camposImaxe = ["rutaimaxe"];
            $imaxesCategoria = DAO::leerDatosCondicion("a4_imaxes", $camposImaxe, "a4_categorias_codcategoria", "=", $codcategoria, PDO::FETCH_COLUMN);
            $categoria = new Categoria($nome, $imaxeprincipal, $imaxesCategoria);
            $categorias[] = $categoria;
        }
        return $categorias;
    }
    
    static function getCategoriasSeleccionadas(array $nomesCategorias) {
        $categoriasTotais = self::getCategorias();
        $categoriasSeleccionadas = array();
        foreach ($categoriasTotais as $categoria) {
            if (in_array($categoria->getNome(), $nomesCategorias)) {
                $categoriasSeleccionadas[] = $categoria;
            }
        }
        return $categoriasSeleccionadas;
    }
}
