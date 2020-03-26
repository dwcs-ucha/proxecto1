<?php


/**
 * Datos da partida que se está xogando. Garda a dificultade, a fase na que se atopa a partida, as categorías que se
 * usarán na partida e as imaxes que haberá que clasificar e a puntuación.
 *
 * @author Santiago
 */
class PartidaVO {

    /**
     * @param int NUMERO_CATEGORIAS_FACIL Número de categorías que se usarán na partida se a dificultade é 'facil'.
     */
    const NUMERO_CATEGORIAS_FACIL = 2;
    /**
     * @param int NUMERO_CATEGORIAS_NORMAL Número de categorías que se usarán na partida se a dificultade é 'normal'.
     */
    const NUMERO_CATEGORIAS_NORMAL = 3;
    /**
     * @param int NUMERO_CATEGORIAS_DIFICIL Número de categorías que se usarán na partida se a dificultade é 'dificil'.
     */
    const NUMERO_CATEGORIAS_DIFICIL = 4;
    
    /**
     * @param int NUMERO_IMAXES_CATEGORIA_MINIMO Número mínimo de imaxes que terá cada categoría da partida.
     */
    const NUMERO_IMAXES_CATEGORIA_MINIMO = 5;
    /**
     * @param int NUMERO_IMAXES_CATEGORIA_MAXIMO Número máximo de imaxes que terá cada categoría da partida.
     */
    const NUMERO_IMAXES_CATEGORIA_MAXIMO = 10;
    
    /**
     * @param int FASE_CREAR_PARTIDA Fase na que estará a partida se non hai ningunha partida en sesión.
     */
    const FASE_CREAR_PARTIDA = 0;
    /**
     * @param int FASE_CONFIGURAR Fase na que estará a partida cando xa está creada pero aínda non se lle deu a xogar.
     */
    const FASE_CONFIGURAR = 1;
    /**
     * @param int FASE_MEMORIZAR_IMAXES Fase na que a partida xa comezou e o usuario ten que memorizar as imaxes de cada
     * categoría.
     */
    const FASE_MEMORIZAR_IMAXES = 2;
    /**
     * @param int FASE_CLASIFICAR_IMAXES Fase final do xogo no que o usuario ten que clasificar as imaxes por categoría.
     */
    const FASE_CLASIFICAR_IMAXES = 3;

    private $categorias;
    private $dificultade;
    private $numImaxesCategoria;
    private $puntuacion;
    private $imaxesClasificar;
    private $fasePartida;

    public function __construct(array $categorias, string $dificultade = "media", int $numImaxesCategoria = self::NUMERO_IMAXES_CATEGORIA_MINIMO) {
        $this->dificultade = $dificultade;
        $this->numImaxesCategoria = $numImaxesCategoria;
        $this->categorias = $categorias;
        $this->puntuacion = 0;
        $this->fasePartida = self::FASE_CONFIGURAR;
    }
    
    /**
     * 
     * @return int Código correspondente ás constantes da clase que comezan por 'FASE_'.
     */
    public function getFasePartida() {
        return $this->fasePartida;
    }
    
    public function setFasePartida(int $fasePartida) {
        $this->fasePartida = $fasePartida;
    }

    public function setDificultade(string $dificultade) {
        $this->dificultade = $dificultade;
    }

    public function setCategorias(array $categorias) {
        $this->categorias = $categorias;
    }

    public function setNumImaxesCategoria(int $numImaxesCategoria) {
        $this->numImaxesCategoria = $numImaxesCategoria;
    }

    /**
     * Para cada categoría da partida selecciona aleatoriamente as imaxes que se usarán para a partida.
     */
    public function seleccionarImaxes() {
        foreach ($this->categorias as $categoria) {
            $categoria->seleccionarImaxesAleatoriamente($this->numImaxesCategoria);
        }
    }

    /**
     * Xunta todas as imaxes que se usarán na partida nun único array e o desordea
     */
    public function xerarImaxesClasificar() {
        $this->imaxesClasificar = array();
        foreach ($this->categorias as $categoria) {
            $this->imaxesClasificar = array_merge($this->imaxesClasificar, $categoria->getImaxesXogo());
        }
        shuffle($this->imaxesClasificar);
    }

    /**
     * 
     * @return array Rutas das imaxes que forman parte da partida e se teñen que clasificar
     */
    public function getImaxesClasificar() {
        return $this->imaxesClasificar;
    }

    /**
     * 
     * @return int Número de imaxes que terá cada categoría da partida
     */
    public function getNumeroImaxesCategoria() {
        return $this->numImaxesCategoria;
    }

    /**
     * 
     * @return string Pode ser 'facil', 'normal' ou 'dificil'.
     */
    public function getDificultade() {
        return $this->dificultade;
    }

    /**
     * 
     * @return array Obxetos CategoriaVO que forman parte da partida
     */
    public function getCategorias() {
        return $this->categorias;
    }

    /**
     * Obtén o número de categorías que terá a partida en función da dificultade
     * @param string $dificultade Pode ser 'facil', 'normal' ou 'dificil'.
     * @return int Número de categorías da partida
     */
    public static function getNumeroCategorias(string $dificultade) {
        switch ($dificultade) {
            case "baixa":
                $numeroCategorias = self::NUMERO_CATEGORIAS_FACIL;
                break;
            case "media":
                $numeroCategorias = self::NUMERO_CATEGORIAS_NORMAL;
                break;
            case "dificil":
                $numeroCategorias = self::NUMERO_CATEGORIAS_DIFICIL;
                break;
        }
        return $numeroCategorias;
    }

    /**
     * 
     * @return int Puntuación do xogador na partida.
     */
    public function getPuntuacion() {
        return $this->puntuacion;
    }

    public function sumarPunto() {
        $this->puntuacion++;
    }

    public function restarPunto() {
        if ($this->puntuacion > 0) {
            $this->puntuacion--;
        }
    }

    /**
     * Elimina a primeira imaxe dentro do array de imaxes que se teñen que clasificar a seguinte imaxe pasa a ser
     * a primeira
     * @return null Se non hai máis imaxes que clasificar.
     */
    public function seguinteImaxeClasificar() {
        if (count($this->imaxesClasificar) > 0) {
            $this->imaxesClasificar = array_slice($this->imaxesClasificar, 1);
        } else {
            return null;
        }
    }

}
