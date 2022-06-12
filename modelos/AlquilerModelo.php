<?php
require_once 'Conexion.php';
/**
 *
 */
class AlquilerModelo extends Conexion
{
    function __construct()
    {
    }
    public function listar($id = '')
    {
        if ($id == '') {
            $sql = "SELECT a.id , e.nombre , CONCAT(u.nombre,' ',u.apellido) nombres, a.fecha  from alquiler a
            join Usuarios u on u.id = a.usuario 
            join escenario e on e.id = a.escenario ";
        } else {
            $sql = "SELECT a.id , e.nombre , a.fecha 
            FROM alquiler a 
            join escenario e on e.id = a.escenario 
            where usuario=$id";
        }
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
        $sql = "DELETE from alquiler
  where id = $id";
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        $afectadas = $datos->rowCount();
        $datos = null;
        return $afectadas;
    }

    public function insertar($escenario, $usuario, $fecha)
    {
        $sql = "INSERT into alquiler
  (escenario,usuario,fecha) SELECT
  $escenario,$usuario,'$fecha'
  FROM dual
  WHERE NOT EXISTS (select * from alquiler
  where escenario=$escenario and fecha='$fecha')
  LIMIT 1";
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        $afectadas = $datos->rowCount();
        $datos = null;
        return $afectadas;
    }
}
