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
  public function listarResidentes()
  {
    return $this->model->listarResidentes();
  }

  public function listarAsignar()
  {
    return $this->model->listarAsignar();
  }

  public function insertar()
  {
    if (!empty($_POST['direccion']) && !empty($_POST['plantas']) && !empty($_POST['costo'])) {
      if ($this->model->insertar($_POST['direccion'], $_POST['plantas'], $_POST['costo']) > 0) {
        setcookie('creada', 'creada', time() + 3, '/');
        header('location:../vistas/gestionarViviendas.php');
      } else {
        header('location:../vistas/gestionarViviendas.php');
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header('location:../vistas/gestionarViviendas.php');
    }
  }

  public function actualizar()
  {
    if (!empty($_POST['direccion']) && !empty($_POST['plantas']) && !empty($_POST['costo'])) {
      if ($this->model->actualizar($_POST['direccion'], $_POST['plantas'], $_POST['costo']) > 0) {
        setcookie('actualizada', 'creada', time() + 3, '/');
        header('location:../vistas/gestionarViviendas.php');
      } else {
        header('location:../vistas/gestionarViviendas.php');
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header('location:../vistas/gestionarViviendas.php');
    }
  }
}
