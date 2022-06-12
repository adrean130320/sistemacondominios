<?php
require_once 'Conexion.php';
/**
 *
 */
class TipoSancionesModelo extends Conexion
{
  function __construct()
  {
  }
  public function listar()
  {
    $sql = "SELECT * from tipo_sanciones";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function listarId($id)
  {
    $sql = "SELECT * from tipo_sanciones where id=$id";
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
    $sql = "DELETE from tipo_sanciones
  where id = $id";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }

  public function insertar($razon, $descripcion)
  {
    $sql = "INSERT into tipo_sanciones
  (razon,descripcion) SELECT
  '$razon','$descripcion'
  FROM dual
  WHERE NOT EXISTS (select * from tipo_sanciones
  where razon='$razon')
  LIMIT 1";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
  public function actualizar($id, $descripcion)
  {
    $sql = "UPDATE tipo_sanciones set descripcion='$descripcion'
  where id=$id";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
}
