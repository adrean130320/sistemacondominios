<?php
require_once '../modelos/AlquilerModelo.php';


class AlquilerControlador
{
    private $model;
    function __construct()
    {
        $this->model = new AlquilerModelo();
    }

    public function listar($id = '')
    {
        return $this->model->listar($id);
    }

    public function insertar()
    {
        if (!empty($_POST['fecha'])) {
            if ($this->model->insertar($_POST['escenario'], $_POST['usuario'], $_POST['fecha']) > 0) {
                setcookie('creada', 'creada', time() + 3, '/');
                header('location:../vistas/alquiler.php');
            } else {
                setcookie('existe', 'existe', time() + 3, '/');
                header('location:../vistas/alquiler.php');
            }
        } else {
            setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
            header('location:../vistas/alquiler.php');

        }
    }
    public function eliminar()
    {
        if ($this->model->eliminar($_POST['id']) > 0) {
            setcookie('eliminada', 'eliminada', time() + 3, '/');
            header("location:../vistas/reservaciones.php");
        } else {
            setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
            header("location:../vistas/reservaciones|.php");
        }
    }
}
