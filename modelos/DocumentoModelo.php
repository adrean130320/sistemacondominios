<?php
require_once 'Conexion.php';
/**
 *
 */
class DocumentoModelo extends Conexion
{
  function __construct()
  {
  }
public function listar()
{
  $sql="SELECT * from tipo_documento";
  $datos=$this->conectar()->prepare($sql);
      $datos->execute();
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {
    }
  $datos->closeCursor();
  $datos=null;
  return $filas;
}
}
