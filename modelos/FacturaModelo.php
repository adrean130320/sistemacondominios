<?php
require_once 'Conexion.php';
/**
 *
 */
class FacturaModelo extends Conexion
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
    public function insertar($valor, $descripcion,$usuario,$fecha)
    {
        $sql = "INSERT INTO Factura
        (valor, descripcion, usuario, fecha)
        VALUES($valor, '$descripcion', $usuario, '$fecha');
        ";
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
