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
    public function listar()
    {
        return $this->model->listar();
    }
    public function insertar($valor, $descripcion,$usuario,$fecha)
    {
        $this->model->insertar($valor, $descripcion,$usuario,$fecha);
    }
    public function actualizar()
    {
        if ($this->model->actualizar($_POST['id'], $_POST['descripcion']) > 0) {
            setcookie('actualizada', 'creada', time() + 3, '/');
            header('location:../vistas/gestionarSanciones.php');
        } else {
            header('location:../vistas/gestionarViviendas.php');
            setcookie('datosincompletos', 'gestionarSanciones', time() + 3, '/');
        }
    }
}
