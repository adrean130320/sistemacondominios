<?php
require_once '../modelos/SancionesModelo.php';
require_once '../controladores/FacturaControlador.php';
require_once '../controladores/TipoSancionesControlador.php';
require_once '../modelos/UsuarioModelo.php';
require_once '../controladores/Factura.php';

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
    if (!empty($_POST['id']) && !empty($_POST['sancion']) && !empty($_POST['descripcion']) && !empty($_POST['costo'])) {
      if ($this->model->insertar($_POST['id'], $_POST['sancion'], $_POST['descripcion'], $_POST['costo']) > 0) {
        $factura = new FacturaControlador();
        $tipoSancion=new TipoSancionesControlador();
        $sancion=$tipoSancion->listarId($_POST['sancion']);
        //!primero creo la factura luego guardo en la base de datos
        $idFactura=$factura->insertar( $_POST['costo'], $sancion[0]->razon, $_POST['id'],date('Y-m-d'),'sancion');
        echo $idFactura;
        $usuario=new UsuarioModelo();
        $usuarioDatos= $usuario->listarId($_POST['id']);
        $factura= new Factura();
        $factura->generarFactura($_POST['descripcion'],$_POST['costo'],'sancion',$usuarioDatos[0]->nombres,$usuarioDatos[0]->direccion,$usuarioDatos[0]->numero_documento,$usuarioDatos[0]->email,$idFactura);
        setcookie('creada', 'creada', time() + 3, '/');
        header('location:../vistas/sancionar.php');
      } else {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header('location:../vistas/sancionar.php');
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header('location:../vistas/sancionar.php');
    }
  }
  public function eliminar()
  {
    if ($this->model->eliminar($_POST['id']) > 0) {
      setcookie('eliminada', 'eliminada', time() + 3, '/');
      header("location:../vistas/sancionar.php");
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header("location:../vistas/sancionar.php");
    }
  }
  public function actualizar()
  {
    if ($this->model->actualizar($_POST['id'], $_POST['sancion'], $_POST['descripcion'], $_POST['valor']) > 0) {
      setcookie('actualizada', 'creada', time() + 3, '/');
      header('location:../vistas/sancionar.php');
    } else {
      setcookie('datosincompletos', 'gestionarSanciones', time() + 3, '/');
      header('location:../vistas/sancionar.php');
    }
  }
}
