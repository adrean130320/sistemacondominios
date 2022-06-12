<?php
require_once 'Conexion.php';
/**
 *
 */
class SancionesModelo extends Conexion
{
  function __construct()
  {
  }
  public function listar()
  {
    $sql = "SELECT s.id,CONCAT(u.nombre,' ',u.apellido) nombre, ts.razon ,
  s.descripcion , s.valor as valor
  from sanciones s 
  join Usuarios u on u.id = s.usuario 
  join tipo_sanciones ts on ts.id = s.sancion";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function eliminar($id)
  {
    $sql = "DELETE from sanciones
  where id = $id";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }

  public function insertar($id, $sancion, $descripcion, $valor)
  {
    $sql = "INSERT INTO sanciones
  (usuario, sancion, descripcion, valor)
  VALUES($id, $sancion, '$descripcion', $valor);
  ";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
  public function actualizar($id, $sancion, $descripcion, $valor)
  {
    $sql = "UPDATE sanciones set descripcion='$descripcion', valor = $valor , sancion=$sancion
  where id=$id";
    echo $sql;
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
}
