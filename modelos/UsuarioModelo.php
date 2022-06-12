<?php
require_once 'Conexion.php';
/**
 *
 */
class UsuarioModelo extends Conexion
{

  function __construct()
  {
  }

  public function insertar($usuario = array())
  {
    foreach ($usuario as $key => $datos) {
      $$key = $datos;
    }
    $sql = "INSERT into Usuarios
      (nombre, apellido, fecha_nacimiento, email, contrasena, numero_documento, tipo_documento, rol, vivienda) SELECT
      '$nombre', '$apellidos', '$fecha', '$email', '$contrasena', '$numero_documento', $tipo_documento, $rol, $vivienda
      FROM dual
      WHERE NOT EXISTS (select * from Usuarios
      where (numero_documento= '$numero_documento' or email='$email')  )
      LIMIT 1
      ";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $datos->closeCursor();
    $count = $datos->rowcount();
    $datos = null;
    return $count;
  }

  public function listarPropietarios()
  {
    $sql = "SELECT u.id , CONCAT(u.nombre,' ', u.apellido) nombre
from Usuarios u
where u.rol = 2";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function listarResidentes($id)
  {
    $sql = "SELECT * from Usuarios where vivienda=$id";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function listar($numero_documento = '')
  {
    if ($numero_documento == '') {
      $sql = "select td.tipo_documento, u.numero_documento, CONCAT(u.nombre,' ',u.apellido) nombres,
      u.fecha_nacimiento, u.email , r.rol , v.direccion, v.id
      from Usuarios u
      join rol r on r.id = u.rol
      join tipo_documento td on td.id = u.tipo_documento
      left join vivienda v on v.id = u.vivienda ";
    } else {
      $sql = "select *,v.id vivienda from Usuarios u
      left join vivienda v on v.id = u.vivienda
      where numero_documento=:numero_documento";
    }
    $datos = $this->conectar()->prepare($sql);
    $datos->execute(array(":numero_documento" => $numero_documento));
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function recuperarContrasena($numero_documento, $contrasena)
  {

    $sql = "UPDATE Usuarios set contrasena='$contrasena' where numero_documento=$numero_documento";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }

  public function cambiarContrasena($numero_documento, $contrasena)
  {
    $sql = "UPDATE Usuarios set contrasena='$contrasena' where numero_documento=$numero_documento";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $verificacion = $datos->rowCount();
    $datos = null;
    return $verificacion;
  }

  public function eliminar($id)
  {
    $sql = "DELETE from Usuarios
    where numero_documento=$id";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
}
