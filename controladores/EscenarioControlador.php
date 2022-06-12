<?php
require_once '../modelos/EscenarioModelo.php';


/**
 *
 */

class EscenarioControlador
{
    private $model;
    function __construct()
    {
        $this->model = new EscenarioModelo();
    }

    public function listar()
    {
        return $this->model->listar();
    }

    public function insertar()
    {
        if (!empty($_POST['nombre'])) {
            if ($this->model->insertar($_POST['nombre'], $_POST['descripcion']) > 0) {
                setcookie('creada', 'creada', time() + 3, '/');
                header('location:../vistas/gestionarEscenario.php');
            } else {
                setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
                header('location:../vistas/gestionarEscenario.php');
            }
        } else {
            setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
            header('location:../vistas/gestionarEscenario.php');
        }
    }
    public function eliminar()
    {
        if ($this->model->eliminar($_POST['id']) > 0) {
            setcookie('eliminada', 'eliminada', time() + 3, '/');
            header("location:../vistas/gestionarEscenario.php");
        } else {
            setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
            header("location:../vistas/gestionarEscenario.php");
        }
    }

    public function actualizar()
    {
        if ($this->model->actualizar($_POST['id'], $_POST['descripcion']) > 0) {
            setcookie('actualizada', 'creada', time() + 3, '/');
            header('location:../vistas/gestionarEscenario.php');
        } else {
            header('location:../vistas/gestionarViviendas.php');
            setcookie('datosincompletos', 'gestionarEscenario', time() + 3, '/');
        }
    }
}
