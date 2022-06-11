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

public function listar($vivienda="")
{
  $sql="SELECT * from vivienda";
  $datos=$this->conectar()->prepare($sql);
  $datos->execute(array(":numero_documento"=>$numero_documento));
  while ($filas[]=$datos->fetch(PDO::FETCH_OBJ)) {
    }
  $datos->closeCursor();
  $datos=null;
  return $filas;
}


}
