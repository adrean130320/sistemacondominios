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
    public function listar($id = '')
    {
        if ($id == '') {
            $sql = "SELECT f.*,concat(u.nombre,' ',u.apellido) nombres
        from Factura f 
        join Usuarios u on f.usuario = u.id 
        where fecha_pago is null";
        } else {
            $sql = "SELECT f.*
        from Factura f 
        where usuario=$id
        and  fecha_pago is null
        ";
        }
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
        }
        $datos->closeCursor();
        $datos = null;
        return $filas;
    }

    public function listarPagos($id = '')
    {
        if ($id == '') {
            $sql = "SELECT f.*,concat(u.nombre,' ',u.apellido) nombres
        from Factura f 
        join Usuarios u on f.usuario = u.id 
        where fecha_pago is not null";
        } else {
            $sql = "SELECT f.*
        from Factura f 
        where usuario=$id
        and  fecha_pago is not null
        ";
        }
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        while ($filas[] = $datos->fetch(PDO::FETCH_OBJ)) {
        }
        $datos->closeCursor();
        $datos = null;
        return $filas;
    }

    public function insertar($valor, $descripcion, $usuario, $fecha, $motivo)
    {
        $sql = "INSERT INTO Factura
        (valor, descripcion, usuario, fecha, motivo)
        VALUES($valor, '$descripcion', $usuario, '$fecha', '$motivo' );
        ";
        $datos = $this->conectar();
        $resultado = $datos->prepare($sql);
        $resultado->execute();
        $id = $datos->lastInsertId();
        $datos = null;
        return $id;
    }
    public function pagar($id, $fecha)
    {
        $sql = "UPDATE Factura set fecha_pago='$fecha'
        where id=$id";
        $datos = $this->conectar()->prepare($sql);
        $datos->execute();
        $afectadas = $datos->rowCount();
        $datos = null;
        return $afectadas;
    }
}
