<?php
require_once '../modelos/UsuarioModelo.php';


/**
 *
 */

class UsuarioControlador
{
  private $model;
  function __construct()
  {
    $this->model = new UsuarioModelo();
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
    if ($this->model->eliminar($_POST['id']) > 0) {
      setcookie('eliminada', 'eliminada', time() + 3, '/');
      header("location:../vistas/gestionarUsuarios.php");
    } else {
      setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
      header("location:../vistas/gestionarUsuarios.php");
    }
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
    if (!empty($_POST['codigo']) || !empty($_POST['email'])) {
      $new_password = rand(99999, 999999);
      $password_encripted = password_hash($new_password, PASSWORD_DEFAULT);


      if ($this->model->recuperarContrasena($_POST['codigo'], $password_encripted, $_POST['email']) > 0) {
        $mensaje = "su nueva contraseña es: " . $new_password . " Se recomienda realizar el cambio al ingresar";
        $destinatario = $_POST["email"];
        $asunto = "contraseña ingreso premio al merito";
        $headers = 'From: adrean130320@gmail.com' . "\r\n" .
          'Reply-To: adrean130320@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

        $exito = mail($destinatario, $asunto, $mensaje, $headers);
        if ($exito) {
          header("location:../vistas/recuperar.php?msg=enviado");
        } else {
          header("location:../vistas/recuperar.php?msg=tarde");
        }
      } else {
        header("location:../vistas/recuperar.php?msg=incorrecto");
      }
    } else {
      header("location:../vistas/recuperar.php?msg=incompletos");
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
        header("location:../vistas/cambiarContrasenaAdmin.php");
      }
    } else {
      if ($_SESSION['rol'] == 1) {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/cambiarContrasena.php");
      } else {
        setcookie('datosincompletos', 'datosIncompletos', time() + 3, '/');
        header("location:../vistas/cambiarContrasenaAdmin.php");
      }
    }
  }
}
