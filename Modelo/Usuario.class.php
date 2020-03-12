<?php
/**
* @Autor: Cristóbal Romero
* @GitHub: ZerinhoRomero
* @DataCreacion: 04/03/2020
* @UltimaModificacion: 05/03/2020
* @Version: 0.0.1b
**/

  /**
   *
   */
  class Usuario {
    const ROL_NORMAL = 0;
    const ROL_ADMINISTRADOR = 1;
    private $nome;
    private $contrasinal;
    private $rol;
    private $dataAlta;
    private $bloqueado;

    function __construct($nome, $contrasinal, $rol, $dataAlta, $bloqueado) {
      $this->nome = $nome;
      $this->contrasinal = $contrasinal;
      $this->rol = $rol;
      $this->dataAlta = $dataAlta;
      $this->bloqueado = $bloqueado;
    }

    function insertarNovoUsuario(Usuario $usuario) {
      $usuario->contrasinal = (crypt($this.contrasinal, 'L0saluMnosTheDAWm0L4n!*'));
      $campos = ["nome", "contrasinal", "rol", "dataAlta", "bloqueado"];
      $valores = [$usuario->getNome(), $usuario->getContrasinal(), $usuario->getRol(), $usuario->getAlta(), 0];
      if (!existeUsuario($usuario)) {
        DAO::escribirDatos("usuarios", $campos, $valores);
        return true;
      } else {
        return false;
      }
    }

    function existeUsuario(Usuario $usuario) {
      $campos = ["nome", "contrasinal", "rol", "dataAlta", "bloqueado"];
      $campo_condicion = ["nome"];
      $tipo_condicion = ['='];
      $valor_condicion = [$usuario->getNome()];
      $datos = DAO::leerDatosCondicion('usuarios', $campos, $campo_condicion, $tipo_condicion, $valor_condicion);
      if (count($datos > 0)) {
        return false;
      } else {
        return true;
      }
    }

    function getNome() {
      return $this->nome;
    }

    function getContrasinal() {
      return $this->contrasinal;
    }

    function getRol() {
      return $this->rol;
    }

    function getAlta() {
      return $this->dataAlta;
    }

    function loginUsuario($nome, $contrasinal) {
      $campos = ["nome", "contrasinal", "rol", "dataAlta", "bloqueado"];
      $campo_condicion = "nome";
      $tipo_condicion = '=';
      $valor_condicion = $nome;
      $datos = DAO::leerDatosCondicion('usuarios', $campos, $campo_condicion, $tipo_condicion, $valor_condicion);
      if (count($datos > 0) && hash_equals($datos[0][1], crypt($contrasinal, $datos[0][1]))) {
        $u = new Usuario($datos[0][0], $datos[0][1], $datos[0][3], $datos[0][4]);
        return $u;
      } else {
        return false;
      }
    }

  }

?>
