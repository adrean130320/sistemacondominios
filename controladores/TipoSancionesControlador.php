<?php
require_once '../modelos/TipoSancionesModelo.php';


/**
 *
 */

class TipoSancionesControlador
{
  private $model;
  function __construct()
  {
    $this->model = new TipoSancionesModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    if(!empty($_POST['razon'])){
      if($this->model->insertar($_POST['razon'],$_POST['descripcion'])>0){
        setcookie('creada','creada',time()+3,'/');
        header('location:../vistas/gestionarSanciones.php');
      }else{
        setcookie('datosincompletos','datosIncompletos',time()+3,'/');
        header('location:../vistas/gestionarSanciones.php');
      }
    }
    else {
      setcookie('datosincompletos','datosIncompletos',time()+3,'/');
      header('location:../vistas/gestionarSanciones.php');
    }
  }
  public function eliminar()
  {
    if($this->model->eliminar($_POST['id'])>0){
      setcookie('eliminada','eliminada',time()+3,'/');
      header("location:../vistas/gestionarSanciones.php");
    }else{
      setcookie('datosincompletos','datosIncompletos',time()+3,'/');
      header("location:../vistas/gestionarSanciones.php");
    }
  }

  public function actualizar()
  {
      if($this->model->actualizar($_POST['id'],$_POST['descripcion'])>0){
        setcookie('actualizada','creada',time()+3,'/');
        header('location:../vistas/gestionarSanciones.php');
      }else{
        header('location:../vistas/gestionarViviendas.php');
        setcookie('datosincompletos','gestionarSanciones',time()+3,'/');

      }
  }

}
