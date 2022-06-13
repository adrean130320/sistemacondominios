<?php
require_once '../modelos/FacturaModelo.php';
/**
 *
 */
class FacturaControlador
{
    private $model;
    function __construct()
    {
        $this->model = new FacturaModelo();
    }
    public function listar($id='')
    {
        return $this->model->listar($id);
    }
    public function listarPagos($id='')
    {
        return $this->model->listarPagos($id);
    }
    public function insertar($valor, $descripcion,$usuario,$fecha,$motivo)
    {
       return $this->model->insertar($valor, $descripcion,$usuario,$fecha,$motivo);
    }
    public function pagar()
    {
        if ($this->model->pagar($_POST['id'], date('Y-m-d')) > 0) {
            unlink( '../facturas/'.$_POST['id'].'.pdf' );
            setcookie('actualizada', 'creada', time() + 3, '/');
            header('location:../vistas/facturas.php');
        } else {
            
            setcookie('datosincompletos', 'gestionarSanciones', time() + 3, '/');
            header('location:../vistas/facturas.php');
        }
    }
}
