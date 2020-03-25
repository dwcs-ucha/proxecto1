<?php

/**
 * Description of CategoriaController
 *
 * @author Santiago
 */
include Config::getRutaRootPHP() . 'actividades/actividade4/Modelo/CategoriaVO.class.php';

class CategoriaController {
    /**
     * Obtén unha lista aleatoria do tamaño indicado das categorías almacenadas
     * @param int $numCategorias Número de categorías que se queren obter
     * @return array Array de obxetos CategoriaVO
     */
    static function getCategoriasAleatoriamente(int $numCategorias) {
        $categorias = self::getCategorias();
        shuffle($categorias); //Desordea as categorías
        $categorias = array_slice($categorias, 0, $numCategorias); //Obtén un trozo do tamaño indicado do array desordeado
        return $categorias;
    }
    
    /**
     * Obtén unha lista das categorías almacenadas
     * @return array Lista de obxetos CategoriaVO almacenadas
     */
    static function getCategorias() {
        $categorias = array();
        $camposCategoria = ["*"];
        $datosCategorias = DAO::leerDatos("a4_categorias", $camposCategoria);
        foreach ($datosCategorias as $datosCategoria) {
            $codcategoria = $datosCategoria[1]; //O primeiro campo da consulta correponde á columna 'codcategoria'
            $nome = $datosCategoria[2]; //O segundo campo da consulta correponde á columna 'nome'
            $imaxeprincipal = $datosCategoria[3]; //O terceiro campo da consulta correponde á columna 'imaxeprincipal'
            
            $camposImaxe = ["rutaimaxe"]; //A función do DAO require que todos os campos estén nun array
            $imaxesCategoria = DAO::leerDatosCondicion("a4_imaxes", $camposImaxe, "a4_categorias_codcategoria",
                    "=", $codcategoria, PDO::FETCH_COLUMN); //PDO::FETCH_COLUMN fai que devolva o resultado da consulta
                                                            //nun array unidimensional
            $categoria = new Categoria($nome, $imaxeprincipal, $imaxesCategoria);
            $categorias[] = $categoria;
        }
        return $categorias;
    }
    
    /**
     * 
     * @return array Contén os nomes das categorías almacenadas
     */
    public static function getNomesCategoriasAlmacenadas() {
        $categorias = self::getCategorias();
        $nomesCategorias = array();
        foreach ($categorias as $categoria) {
            $nomesCategorias[] = $categoria->getNome();
        }
        return $nomesCategorias;
    }


    /**
     * Obtén unha lista de categorías que se corresponden co nomes suministrados
     * @param array $nomesCategorias Serven de clave para obter a categoría á que corresponde cada nome
     * @return array Array de obxetos CategoriaVO
     */
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
