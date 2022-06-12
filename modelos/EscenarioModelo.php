<?php
require_once 'Conexion.php';
/**
 *
 */
class EscenarioModelo extends Conexion
{
    function __construct()
    {
    }
    public function listar()
    {
        $sql = "SELECT * from escenario";
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
        $sql = "DELETE from escenario
  where id = $id";
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        $afectadas = $datos->rowCount();
        $datos = null;
        return $afectadas;
    }

    public function insertar($nombre, $descripcion)
    {
        $sql = "INSERT into escenario
  (nombre,descripcion) SELECT
  '$nombre','$descripcion'
  FROM dual
  WHERE NOT EXISTS (select * from escenario
  where nombre='$nombre')
  LIMIT 1";
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        $afectadas = $datos->rowCount();
        $datos = null;
        return $afectadas;
    }
    public function actualizar($id, $descripcion)
    {
        $sql = "UPDATE escenario set descripcion='$descripcion'
  where id=$id";
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        $afectadas = $datos->rowCount();
        $datos = null;
        return $afectadas;
    }
}
