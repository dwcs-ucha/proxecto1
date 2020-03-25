<?php

/**
 * Categoría con imaxes que hai que clasificar.
 *
 * @author Santiago Calvo Piñeiro
 */
class Categoria {

    private $nome;
    private $imaxePrincipal;
    private $imaxesXogo;

    public function __construct(string $nome, string $imaxePrincipal , array $imaxesXogo) {
        $this->nome = $nome;
        $this->imaxePrincipal = $imaxePrincipal;
        $this->imaxesXogo = $imaxesXogo;
    }

    /**
     * 
     * @return string Nome da categoría
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * 
     * @return string Ruta da imaxe principal representativa da categoría
     */
    public function getImaxeCategoria() {
        return $this->imaxePrincipal;
    }


    /**
     * 
     * @return array Imaxes da categoría que se usarán no xogo
     */
    public function getImaxesXogo() {
        return $this->imaxesXogo;
    }

    /**
     * Recorta as imaxes da categoría e as selecciona aleatoriamente.
     * @param int $numeroImaxes Número de imaxes que terá a categoría.
     */
    public function seleccionarImaxesAleatoriamente(int $numeroImaxes) {
        shuffle($this->imaxesXogo);
        $this->imaxesXogo = array_slice($this->imaxesXogo, 0,$numeroImaxes);
    }
    
}
