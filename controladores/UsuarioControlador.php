<?php
require_once '../modelos/UsuarioModelo.php';
require '../vendor/autoload.php';
use \Mailjet\Resources;


class UsuarioControlador
{
  private $model;
  function __construct()
  {
    $this->model = new UsuarioModelo();
  }
  public function insertarResidente()
  {
    if (
      !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["fecha"])
      && !empty($_POST["email"])
      &&  !empty($_POST["documento"])
    ) {

      $usuario = array(
        'nombre' => $_POST["nombre"],
        'apellidos' => $_POST["apellidos"],
        'fecha' => $_POST["fecha"],
        'email' => $_POST["email"],
        'contrasena' => '',
        'numero_documento' => $_POST["documento"],
        'tipo_documento' => $_POST["tipo"],
        'vivienda' =>  $_POST["vivienda"],
        'rol' => 3,
      );
      if ($this->model->insertar($usuario) > 0) {
        setcookie('creada', 'creada', time() + 3, '/');
        header("location:../vistas/residentes.php");
      } else {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/residentes.php");
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header("location:../vistas/residentes.php");
    }
  }

  public function insertar()
  {
    if (
      !empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["fecha"])
      && !empty($_POST["email"]) && !empty($_POST["contrasena"])
      && !empty($_POST["tipo"]) &&  !empty($_POST["documento"]) &&
      !empty($_POST["tipoUsuario"])
    ) {
      $contrasena = password_hash($_POST["contrasena"], PASSWORD_DEFAULT);
      $usuario = array(
        'nombre' => $_POST["nombre"],
        'apellidos' => $_POST["apellidos"],
        'fecha' => $_POST["fecha"],
        'email' => $_POST["email"],
        'contrasena' => $contrasena,
        'numero_documento' => $_POST["documento"],
        'tipo_documento' => $_POST["tipo"],
        'vivienda' =>  $_POST["vivienda"],
        'rol' => $_POST["tipoUsuario"],
      );
      var_dump($_POST);
      if ($this->model->insertar($usuario) > 0) {
        setcookie('creada', 'creada', time() + 3, '/');
        header("location:../vistas/gestionarUsuarios.php");
      } else {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/gestionarUsuarios.php");
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header("location:../vistas/gestionarUsuarios.php");
    }
  }
  public function eliminar()
  {
    session_start();
    if ($this->model->eliminar($_POST['id']) > 0) {
      setcookie('eliminada', 'eliminada', time() + 3, '/');
      if ($_SESSION['rol'] == 1) {
        header("location:../vistas/gestionarUsuarios.php");
      } else {
        header("location:../vistas/residentes.php");
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      if ($_SESSION['rol'] == 1) {
        header("location:../vistas/gestionarUsuarios.php");
      } else {
        header("location:../vistas/residentes.php");
      }
    }
  }
  public function listarResidentes($id)
  {
    return  $this->model->listarResidentes($id);;
  }

  public function listarId($id)
  {
    return  $this->model->listarId($id);;
  }

  public function listar($codigo = '')
  {
    return $this->model->listar($codigo);
  }
  public function listarPropietarios()
  {
    return $this->model->listarPropietarios();
  }
  public function recuperarContrasena()
  {
    if (!empty($_POST['cedula']) || !empty($_POST['email'])) {
      $new_password = rand(9999999, 99999999);
      $password_encripted = password_hash($new_password, PASSWORD_DEFAULT);
      if ($this->model->recuperarContrasena($_POST['cedula'], $password_encripted, $_POST['email']) > 0) {
        $asunto="Restablecer contraseña";
        $mensaje="Su nueva contraseña para acceso al sistema de condominio es $new_password";
        $this->enviarCorreo($asunto,$mensaje,$_POST['email']);


        setcookie('creada', 'creada', time() + 3, '/');
        header("location:../vistas/recuperarContrasena.php");
      } else {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/recuperarContrasena.php");
      }
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header("location:../vistas/recuperarContrasena.php");
    }
  }


  public function iniciarSesion()
  {
    if (!empty($_POST['email']) || !empty($_POST['contrasena'])) {
      $usuario = $this->listar($_POST['email']);
      if (count($usuario) > 1 &&  password_verify($_POST["contrasena"], $usuario[0]->contrasena)) {
        echo "entro";
        session_start();
        $_SESSION['usuario'] = $_POST['email'];
        $_SESSION['rol'] = $usuario[0]->rol;
        $_SESSION['nombres'] =  $usuario[0]->nombre . ' ' . $usuario[0]->apellido;
        $_SESSION['vivienda'] = $usuario[0]->vivienda;
        $_SESSION['id'] = $usuario[0]->usuario;
        if ($_SESSION['rol'] == 1) {
          header("location:../vistas/historialCasas.php");
        } else if ($_SESSION['rol'] == 2) {

          header("location:../vistas/residentes.php");
        } else {
          setcookie('erroriniciarsesion', 'erroriniciarsesion', '', '/');
          header("location:../vistas/login.php");
        }
      } else {
        setcookie('erroriniciarsesion', 'erroriniciarsesion', '', '/');
        header("location:../vistas/login.php");
      }
    } else {
      setcookie('erroriniciarsesion', 'erroriniciarsesion', '', '/');
      header("location:../vistas/login.php");
    }
  }

  public function cerrarSesion()
  {
    session_start();
    session_destroy();
    header("location:../index.php");
  }

  public function cambiarContrasena()
  {
    session_start();
    $usuario = $this->listar($_SESSION["usuario"]);
    if (password_verify($_POST['actual'], $usuario[0]->contrasena) && $_POST['nueva'] == $_POST['nueva2']) {
      $this->model->cambiarContrasena($_SESSION['usuario'], password_hash($_POST['nueva'], PASSWORD_DEFAULT));
      if ($_SESSION['rol'] == "1") {
        setcookie('actualizada', 'actualizada', time() + 3, '/');
        header("location:../vistas/cambiarContrasena.php");
      } else {
        setcookie('actualizada', 'actualizada', time() + 3, '/');
        header("location:../vistas/cambiarContrasenaUser.php");
      }
    } else {
      if ($_SESSION['rol'] == 1) {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/cambiarContrasena.php");
      } else {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/cambiarContrasenaUser.php");
      }
    }
  }

  public function enviarCorreo($asunto, $mensaje, $destinatario)
  {

  $mj = new \Mailjet\Client('9588160c4d1af70c3a75c656a83b1aeb','437347bdb9015fb8198f0edbbb2d2376',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "sistemacondominiocwc@outlook.com",
        ],
        'To' => [
          [
            'Email' => $destinatario,
          ]
        ],
        'Subject' => $asunto,
        'TextPart' => 'Administracion de condominio',
        'HTMLPart' => $mensaje,
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());
  }
}
