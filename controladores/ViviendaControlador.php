<?php
require_once '../modelos/ViviendaModelo.php';


/**
 *
 */

class ViviendaControlador
{
  private $model;
  function __construct()
  {
    $this->model = new ViviendaModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }
}
