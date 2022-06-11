<?php
require_once '../modelos/DocumentoModelo.php';


/**
 *
 */

class DocumentoControlador
{
  private $model;
  function __construct()
  {
    $this->model = new DocumentoModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }
}
