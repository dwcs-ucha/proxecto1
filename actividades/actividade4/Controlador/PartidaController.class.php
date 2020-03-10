<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PartidaController
 *
 * @author Santiago
 */
include 'Modelo/PartidaVO.class.php';
include 'Modelo/CategoriasDAO.class.php';

class PartidaController {

    function partidaNova() {
        $categoriasFicheiro = CategoriasDAO::getCategorias();
        $categoriasPartida = array_slice($categoriasFicheiro, PartidaVO::NUMERO_CATEGORIAS_NORMAL);
        foreach ($categoriasPartida as $categoria) {
            $categoria->seleccionarImaxesAleatoriamente();
        }
        $partida = new PartidaVO();
        
    }

}
