<?php
require_once '../modelos/TipoUsuarioModelo.php';


/**
 *
 */

class TipoUsuarioControlador
{
  private $model;
  function __construct()
  {
    $this->model = new TipoUsuarioModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }
}
