<?php
require_once 'Conexion.php';
/**
 *
 */
class ViviendaModelo extends Conexion
{

  function __construct()
  {
  }


  public function listarResidentes()
  {
    $sql = "SELECT v.id,v.direccion , v.costo_mensual ,
    ( SELECT CONCAT(u2.nombre,' ',u2.apellido) 
    FROM Usuarios u2
    WHERE u2.rol = 2 and v.id = u2.vivienda 
    ) propietario,
    count(u.vivienda) residentes
    from vivienda v 
    join Usuarios u on u.vivienda = v.id
    GROUP by v.direccion ";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function listar($vivienda = "")
  {
    $sql = "SELECT * from vivienda";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }


  public function listarAsignar($vivienda = "")
  {
    $sql = "SELECT * from vivienda
  ";
    $datos = $this->conectar()->prepare($sql);
    $datos->execute();
    while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
    }
    $datos->closeCursor();
    $datos = null;
    return $filas;
  }

  public function insertar($direccion, $plantas, $costo)
  {
    $sql = "INSERT into vivienda
  (direccion,plantas,costo_mensual) SELECT
  :direccion,:plantas,:costo
  FROM dual
  WHERE NOT EXISTS (select * from vivienda
  where direccion=:direccion)
  LIMIT 1";
    $datos = $this->conectar()->prepare($sql);
    $datos->bindValue(':direccion', $direccion);
    $datos->bindValue(':plantas', $plantas);
    $datos->bindValue(':costo', $costo);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
  public function actualizar($direccion, $plantas, $costo)
  {
    $sql = "UPDATE vivienda set plantas=:plantas,costo_mensual=:costo
  where direccion=:direccion";
    $datos = $this->conectar()->prepare($sql);
    $datos->bindValue(':direccion', $direccion);
    $datos->bindValue(':plantas', $plantas);
    $datos->bindValue(':costo', $costo);
    $datos->execute();
    $afectadas = $datos->rowCount();
    $datos = null;
    return $afectadas;
  }
}
