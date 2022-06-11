<?php
require_once '../modelos/SancionesModelo.php';


/**
 *
 */

class SancionesControlador
{
  private $model;
  function __construct()
  {
    $this->model = new SancionesModelo();
  }

  public function listar()
  {
    return $this->model->listar();
  }

  public function insertar()
  {
    if(!empty($_POST['id'])&&!empty($_POST['sancion'])&&!empty($_POST['descripcion'])&&!empty($_POST['costo'])){
      if($this->model->insertar($_POST['id'],$_POST['sancion'],$_POST['descripcion'],$_POST['costo'])>0){
        setcookie('creada','creada',time()+3,'/');
        header('location:../vistas/sancionar.php');
      }else{
        setcookie('datosincompletos','datosIncompletos',time()+3,'/');
        header('location:../vistas/sancionar.php');
      }
    }
    else {
      setcookie('datosincompletos','datosIncompletos',time()+3,'/');
      header('location:../vistas/sancionar.php');
    }
  }
  public function eliminar()
  {
    if($this->model->eliminar($_POST['id'])>0){
      setcookie('eliminada','eliminada',time()+3,'/');
      header("location:../vistas/sancionar.php");
    }else{
      
      setcookie('datosincompletos','datosIncompletos',time()+3,'/');
      header("location:../vistas/sancionar.php");
    }
  }

  public function actualizar()
  {
      if($this->model->actualizar($_POST['id'],$_POST['sancion'],$_POST['descripcion'],$_POST['valor'])>0){
        setcookie('actualizada','creada',time()+3,'/');
        header('location:../vistas/sancionar.php');
      }else{
        
        setcookie('datosincompletos','gestionarSanciones',time()+3,'/');
        header('location:../vistas/sancionar.php');

      }
  }

}
