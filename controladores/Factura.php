<?php
/// Powered by Evilnapsis go to http://evilnapsis.com
include "../fpdf/fpdf.php";


class Factura
{
    public function generarFactura($descripcion,$valor,$motivo,$nombre,$direccion,$cedula,$email,$id)
    {
        $pdf = new FPDF($orientation = 'P', $unit = 'mm');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 20);
        $textypos = 5;
        $pdf->setY(12);
        $pdf->setX(10);
        // Agregamos los datos de la empresa
        $pdf->Cell(5, $textypos, "Factura del condominio");
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->setY(30);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "DE:");
        $pdf->SetFont('Arial', '', 10);
        $pdf->setY(35);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "Sistema de gestion de condominios");
        $pdf->setY(40);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "Cucuta");
        $pdf->setY(45);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "300000000000");
        $pdf->setY(50);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "sistemacondominiocwc@outlook.com");

        // Agregamos los datos del cliente
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->setY(30);
        $pdf->setX(75);
        $pdf->Cell(5, $textypos, "PARA:");
        $pdf->SetFont('Arial', '', 10);
        $pdf->setY(35);
        $pdf->setX(75);
        $pdf->Cell(5, $textypos, $nombre);
        $pdf->setY(40);
        $pdf->setX(75);
        $pdf->Cell(5, $textypos, $direccion);
        $pdf->setY(45);
        $pdf->setX(75);
        $pdf->Cell(5, $textypos, $email);
        $pdf->setY(50);
        $pdf->setX(75);
        $pdf->Cell(5, $textypos, $cedula);

        // Agregamos los datos del cliente
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->setY(30);
        $pdf->setX(135);
        $pdf->Cell(5, $textypos, "FACTURA #12345");
        $pdf->SetFont('Arial', '', 10);
        $pdf->setY(35);
        $pdf->setX(135);
        $pdf->Cell(5, $textypos, "Fecha: " . date('Y-m-d'));
        $pdf->setY(40);
        $pdf->setX(135);
        $pdf->Cell(5, $textypos, "");
        $pdf->setY(45);
        $pdf->setX(135);
        $pdf->Cell(5, $textypos, "");
        $pdf->setY(50);
        $pdf->setX(135);
        $pdf->Cell(5, $textypos, "");

        /// Apartir de aqui empezamos con la tabla de productos
        $pdf->setY(60);
        $pdf->setX(135);
        $pdf->Ln();
        /////////////////////////////
        //// Array de Cabecera
        $header = array("motivo", "descripcion","valor");
        //// Arrar de Productos
        $products = array(
            array($motivo, $descripcion,$valor),
        );
        // Column widths
        $w = array(20, 95, 20, 25, 25);
        // Header
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
        $pdf->Ln();
        // Data
        $total = 0;
        foreach ($products as $row) {
            $pdf->Cell($w[0], 6, $row[0], 1);
            $pdf->Cell($w[1], 6, $row[1], 1);
            $pdf->Cell($w[2], 6, number_format($row[2]), '1', 0, 'R');
            $pdf->Ln();
        }
        /////////////////////////////
        //// Apartir de aqui esta la tabla con los subtotales y totales
        $yposdinamic = 60 + (count($products) * 10);

        $pdf->setY($yposdinamic);
        $pdf->setX(235);
        $pdf->Ln();
        /////////////////////////////
        $header = array("", "");
        $data2 = 0;
        // Column widths
        $w2 = array(40, 40);
        // Header

        $pdf->Ln();
        // Data
        /////////////////////////////

        $yposdinamic += ($data2 * 10);
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->setY($yposdinamic + 20);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "TERMINOS Y CONDICIONES");
        $pdf->SetFont('Arial', '', 10);

        $pdf->setY($yposdinamic + 25);
        $pdf->setX(10);
        $pdf->Cell(5, $textypos, "El cliente se compromete a pagar la factura.");
        $pdf->setY($yposdinamic + 20);
        $pdf->setX(10);
        $ruta='../documentos/factura.pdf';
        $pdf->output('F', '../facturas/'.$id.'.pdf');
    }
}
