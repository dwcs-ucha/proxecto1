<?php

/**
 * Description of Categoria
 *
 * @author Santiago Calvo Piñeiro
 */
class Categoria {

    const INDEX_NOME = 0;
    const INDEX_IMAXE_PRINCIPAL = 1;
    const INDEX_COMEZO_IMAXES_XOGO = 2;
    
    private $nome;
    private $imaxePrincipal;
    private $imaxesXogo;

    public function __construct(string $nome, string $imaxePrincipal , array $imaxesXogo) {
        $this->nome = $nome;
        $this->imaxePrincipal = $imaxePrincipal;
        $this->imaxesXogo = $imaxesXogo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getImaxeCategoria() {
        return $this->imaxePrincipal;
    }


    public function getImaxesXogo() {
        return $this->imaxesXogo;
    }

    public function seleccionarImaxesAleatoriamente(int $numeroImaxes) {
        shuffle($this->imaxesXogo);
        $this->imaxesXogo = array_slice($this->imaxesXogo, 0,$numeroImaxes);
    }
    
}
