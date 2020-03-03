<?php

/**
 * Description of Categoria
 *
 * @author Santiago Calvo Piñeiro
 */
class Categoria {

    const NUMERO_CATEGORIAS_FACIL = 2;
    const NUMERO_CATEGORIAS_NORMAL = 3;
    const NUMERO_CATEGORIAS_DIFICIL = 4;
    

    private $nome;
    private $imaxes;

    public function __construct(string $nome, array $imaxes, int $numeroImaxes) {
        $this->nome = $nome;
        $this->imaxes = $this->seleccionarImaxesAleatoriamente($imaxes, $numeroImaxes);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getImaxes() {
        return $this->imaxes;
    }

    private function seleccionarImaxesAleatoriamente(array $imaxes, int $numImaxes) {
        shuffle($imaxes);
        array_slice($imaxes, $numImaxes);
    }

}
