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
            $imaxesCategoria = DAO::leerDatosCondicion("a4_imaxes", $camposImaxe, "a4_categorias_codcategoria", "=", $codcategoria, PDO::FETCH_COLUMN); //PDO::FETCH_COLUMN fai que devolva o resultado da consulta
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

    static function borrarCategoria(string $nomeCategoria) {
        $rutaDirectorioImaxes = Config::getRutaRootPHP() . "/actividades/actividade4/Imaxes/";
        if (self::getCategoria($nomeCategoria) !== null) {
            self::borrarDirectorio($rutaDirectorioImaxes . $nomeCategoria);
            DAO::borrarDatos("a4_categorias", array("nome"), array("="), array($nomeCategoria));
            return true;
        } else {
            return false;
        }
    }

    private static function borrarDirectorio(string $rutaDirectorio) {
        if (file_exists($rutaDirectorio)) {
            $directorio = opendir($rutaDirectorio);
            while (($arquivoActual = readdir($directorio)) !== false) {
                if ($arquivoActual !== "." && $arquivoActual !== "..") {
                    unlink($rutaDirectorio . "/" . $arquivoActual);
                }
            }
            closedir($directorio);
            rmdir($rutaDirectorio);
        }
    }

    static function insertarCategoria(string $nomeCategoria, array $datosImaxePrincipal, array $datosImaxesCategoria) {
        $rutaDirectorioImaxes = "actividades/actividade4/Imaxes/";
        $rutaDirectorioCategoria = $rutaDirectorioImaxes . $nomeCategoria . "/";
        mkdir(Config::getRutaRootPHP() . $rutaDirectorioCategoria);
        $rutaTemporal = $datosImaxePrincipal["tmp_name"];
        $nomeImaxePrincipal = $datosImaxePrincipal["name"];
        $rutaDefinitivaImaxePrincipal = $rutaDirectorioCategoria . $nomeImaxePrincipal;
        move_uploaded_file($rutaTemporal, Config::getRutaRootPHP() . "/" . $rutaDefinitivaImaxePrincipal);

        for ($i = 0; $i < count($datosImaxesCategoria["name"]); $i++) {
            $rutaTemporal = $datosImaxesCategoria["tmp_name"][$i];
            $nomeImaxe = $datosImaxesCategoria["name"][$i];
            $rutaDefinitiva = $rutaDirectorioCategoria . $nomeImaxe;
            move_uploaded_file($rutaTemporal, Config::getRutaRootPHP() . $rutaDefinitiva);
            $rutasImaxesCategoria[] = $rutaDefinitiva;
        }

        DAO::escribirDatos("a4_categorias", array("codactividade", "nome", "imaxeprincipal")
                , array("a4", $nomeCategoria, $rutaDefinitivaImaxePrincipal));
        $codCategoriaInsertada = DAO::leerDatosCondicion("a4_categorias", array("codcategoria"), "nome"
                        , "=", $nomeCategoria, PDO::FETCH_COLUMN)[0];
        foreach ($rutasImaxesCategoria as $rutaImaxeCategoria) {
            DAO::escribirDatos("a4_imaxes", array("rutaimaxe", "a4_categorias_codcategoria")
                    , array($rutaImaxeCategoria, $codCategoriaInsertada));
        }
    }

    static function getCategoria(string $nomeCategoria) {
        $camposCategoria = ["*"];
        $datosCategoria = DAO::leerDatosCondicion("a4_categorias", $camposCategoria, "nome", "=", $nomeCategoria);
        if (!empty($datosCategoria)) { //Compróbase que exista unha categoría con ese nome
            $datosCategoria = $datosCategoria[0];
            $codcategoria = $datosCategoria[1]; //O primeiro campo da consulta correponde á columna 'codcategoria'
            $nome = $datosCategoria[2]; //O segundo campo da consulta correponde á columna 'nome'
            $imaxeprincipal = $datosCategoria[3]; //O terceiro campo da consulta correponde á columna 'imaxeprincipal'

            $camposImaxe = ["rutaimaxe"]; //A función do DAO require que todos os campos estén nun array
            $imaxesCategoria = DAO::leerDatosCondicion("a4_imaxes", $camposImaxe, "a4_categorias_codcategoria", "=", $codcategoria, PDO::FETCH_COLUMN); //PDO::FETCH_COLUMN fai que devolva o resultado da consulta
//nun array unidimensional
            $categoria = new Categoria($nome, $imaxeprincipal, $imaxesCategoria);
            return $categoria;
        } else {
            return null;
        }
    }

    static function borrarImaxeCategoria(string $rutaImaxeEliminar) {
        unlink(Config::getRutaRootPHP() . $rutaImaxeEliminar);
        DAO::borrarDatos("a4_imaxes", array("rutaimaxe"), array("="), array($rutaImaxeEliminar));
    }

    static function actualizarImaxePrincipal(Categoria $categoria, array $datosNovaImaxePrincipal) {
        $imaxePrincipalAntiga = $categoria->getImaxeCategoria();
        $rutaDirectorioImaxes = "actividades/actividade4/Imaxes/";
        $rutaDirectorioCategoria = $rutaDirectorioImaxes . $categoria->getNome() . "/";
        $rutaTemporal = $datosNovaImaxePrincipal["tmp_name"];
        $nomeImaxePrincipal = $datosNovaImaxePrincipal["name"];
        $rutaDefinitivaImaxePrincipal = $rutaDirectorioCategoria . $nomeImaxePrincipal;
        move_uploaded_file($rutaTemporal, Config::getRutaRootPHP() . "/" . $rutaDefinitivaImaxePrincipal);

        unlink(Config::getRutaRootPHP() . $imaxePrincipalAntiga);
        DAO::modificarDatos("a4_categorias", array("imaxeprincipal"), array($rutaDefinitivaImaxePrincipal)
                , array("nome"), array("="), array($categoria->getNome()));
    }

    static function engadirImaxes(Categoria $categoria, array $datosImaxes) {
        $rutaDirectorioImaxes = "actividades/actividade4/Imaxes/";
        $rutaDirectorioCategoria = $rutaDirectorioImaxes . $categoria->getNome() . "/";

        for ($i = 0; $i < count($datosImaxes["name"]); $i++) {
            $rutaTemporal = $datosImaxes["tmp_name"][$i];
            $nomeImaxe = $datosImaxes["name"][$i];
            $rutaDefinitiva = $rutaDirectorioCategoria . $nomeImaxe;
            move_uploaded_file($rutaTemporal, Config::getRutaRootPHP() . $rutaDefinitiva);
            $rutasImaxesCategoria[] = $rutaDefinitiva;
        }
        $codCategoria = DAO::leerDatosCondicion("a4_categorias", array("codcategoria"), "nome"
                        , "=", $categoria->getNome(), PDO::FETCH_COLUMN)[0];
        foreach ($rutasImaxesCategoria as $rutaImaxeCategoria) {
            DAO::escribirDatos("a4_imaxes", array("rutaimaxe", "a4_categorias_codcategoria")
                    , array($rutaImaxeCategoria, $codCategoria));
        }
    }

}
