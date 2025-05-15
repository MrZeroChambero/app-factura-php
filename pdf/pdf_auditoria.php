<?php
//ob_start ();
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/fpdf.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/rotacion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion/Conexion.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();

$data = new Conexion1();

$conexion = $data->conect();

$strquery = "SELECT * FROM auditoria ORDER BY id_au";



if (isset($_SESSION['auditoria_consulta']) and $_SESSION['auditoria_consulta']!="") {
  $strquery=$_SESSION['auditoria_consulta'];  
}
$result = $conexion->prepare($strquery);

$result->execute();

$data = $result->fetchall(PDO::FETCH_ASSOC);

if (count($data)==0) {
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'!Error, No se encontraron resultados!');
$pdf->Output();

    exit();
}

$id_us=$_SESSION['id_us'];

$data4 = new Conexion1();

 $conexion4 = $data4->conect();

$usuario="SELECT usuario.nom_us,usuario.cedula_us,usuario.apellido_us FROM usuario WHERE id_us = '{$id_us}'";
/*var_dump($usuario);*/

$resultado = $conexion4->prepare($usuario);

$resultado->execute();

$data4 = $resultado->fetchall(PDO::FETCH_ASSOC);

$_SERVER[0]['nom_us']=$data4[0]['nom_us'];
 $_SERVER[0]['cedula_us']=$data4[0]['cedula_us'];
 $_SERVER[0]['apellido_us']=$data4[0]['apellido_us'];
/*
 $_SERVER[0]['nom_us']=$data4[0]['nom_us'];
 $_SERVER[0]['cedula_us']=$data4[0]['cedula_us'];

$_SESSION[0]['estado']=$data[0]['estado_fac'];
$_SESSION[0]=$data[0]['fecha_fac'];
$_SESSION[0]['hora']=$data[0]['hora_fac'];
$_SESSION[0]['id_fac']=$data[0]['id_fac'];
$_SESSION[0]['iva']=$data[0]['iva_factura'];
$_SESSION[0]['iva']

*/
$_SESSION[0]['ubicacion']='Calle Ricaurte cruce con calle Andrés Bello, sector la atascosa,  local N° 1. Palo Negro, municipio Libertador Estado Aragua.';

class PDF extends PDF_Rotate {



// Cabecera de página

    function Header() {
//color de fondo rgb
        
 $this->Image('../logo.png', 0, 0, 28);

$this->SetFont('Times','b',8);
 //$this->Image('logo.png', 0, 0, 28);
   $this->SetFillColor(255, 255, 255); //color de fondo rgb
       $this->SetDrawColor(255, 255, 255); //color de linea  rgb
$this->SetFont('Times','b',190);

        $this->SetFont('Times','b',8);
$this->setXY(15, 35);
//$this->SetFillColor(245, 25, 123);
$this->Cell(100, 8, ucwords(strtolower(utf8_decode('Laboratorio clínico HEYLIN CABRERA F.P.'))), 0, 0, 'L', );
$this->setXY(15, 42);
$this->Cell(100, 8, utf8_decode('RIF:V-13770546-6'), 0, 0, 'L', 0);
$this->setXY(120, 35);
$this->Cell(10, 8, utf8_decode('TLF'), 0, 0, 'L', 0);
 $this->setXY(130, 35);
$this->Cell(30, 8, utf8_decode('04128864911'), 0, 0, 'L', 0);
$this->setXY(120, 45);
$this->Cell(10, 8, utf8_decode('Correo:'), 0, 0, 'L', 0);
$this->setXY(130, 45);
 $this->Cell(30, 8, utf8_decode('LaboratorioclinicoHEYLINCABRERAF.P@gmail.com'), 0, 0, 'L', 0);
$this->Setx(0);
$this->setXY(60, 49);
$this->Setale(array('L'));
  $this->Setwit(array(100));
       $this->wor(array(ucwords(strtolower(utf8_decode($_SESSION[0]['ubicacion'])))), 15,8);
       $this->SetFont('Times', 'B', 8);
       $this->Ln(2);
       $this->SetFont('Times','b',16);
$this->SetX(120);
        $this->Cell(30, 8, utf8_decode('Reporte de Auditorias'), 0, 0, 'L', 0);
        $this->SetX(50);
        $this->Ln(12);
        $this->SetFont('Times', 'B', 8);
$this->SetDrawColor(86, 61, 61);
$this->Setwit(array(10, 25, 20,60,30,90,20,20)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$this->Setale(array('C','C','C','C','C','C'));

/*$this->setXY(15, 135);*/
 $this->wor(array(utf8_decode("N°"), ucwords(strtolower(utf8_decode('Usuario'))),ucwords(strtolower(utf8_decode('Registro'))), utf8_decode('Acción realizada'),ucwords(strtolower(utf8_decode("Codigo del afectado"))),ucwords(strtolower(utf8_decode('Información adicional'))), 'Fecha','Hora'), 10,5);
/*if (!isset($_GET['fecha_incial']) and !isset($_GET['fecha_final'])){   
    $this->Cell(100, 8, ucwords(strtolower(utf8_decode('Reporte General de Consumo '))), 0, 1, 'C', 0);
$this->Ln(5);
}else{
       $this->Cell(100, 8, ucwords(strtolower(utf8_decode("Reporte de Consumo"))), 0, 1, 'C', 0);
             $this->SetX(50);
             $fecha_i= date("d-m-Y", strtotime($_GET['fecha_incial'])); 
             $fecha_f= date("d-m-Y", strtotime($_GET['fecha_final'])); 
       $this->Cell(100, 8, ucwords(strtolower(utf8_decode("desde ".$fecha_i.' hasta '.$fecha_f))), 0, 1, 'C', 0);
$this->Ln(5);
}*/
               //$this->SetFillColor(255, 255, 255); //color de fondo rgb
       //$this->SetDrawColor(61, 61, 61); //color de linea  rgb
// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
        
/*$this->Setwit(array(32, 108,20,20));
$this->Setale(array('L','L','L','L'));
$this->wor(array(ucwords(strtolower(utf8_decode('Nombre / Razon  social:'))), ucwords(utf8_decode($_SERVER[0]['nom_cli'])), ucwords(strtolower(utf8_decode('Factura N°:'))), ucwords(utf8_decode())), 15);*/

/*            

       $this->SetFont('Times', 'B', 20);
$this->SetDrawColor(61,61, 61);
$this->SetFont('Times','b',10);
$this->Cell(10, 8, 'N', 1, 0, 'C', 0);
$this->Cell(20, 8, 'Codigo', 1, 0, 'C', 0);
$this->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
$this->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$this->Cell(25, 8, 'Costo unitario', 1, 0, 'C', 0);
$this->Cell(25, 8, 'Total', 1, 1, 'C', 0);

*/
         

    }

// Pie de página


 function Footer() {

        //$a=encabezado();
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        $this->SetFont('Arial', 'B', 10);
        // Número de página
                $this->Cell(150, 10, utf8_decode('Emisor:'.$_SERVER[0]['nom_us']." ".$_SERVER[0]['apellido_us']." ".'Cedula:'." ".$_SERVER[0]['cedula_us']), 0, 0, 'L', 0);
        $this->Cell(80, 10, '', 0, 0, 'C', 0);
        $this->Cell(25, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');

        //$this->$a;
    }

// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
    var $widths;
    var $aligns;

    function SetWidths($w) {
        //Set the array of column widths
        $this->widths = $w;
    }

    function SetAligns($a) {
        //Set the array of column alignments
        $this->aligns = $a;
    }

    function Row($data, $setX) //yo modifique el script a  mi conveniencia :D
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        }

        $h = 8 * $nb;
        //Issue a page break first if needed
        $this->CheckPageBreak($h, $setX);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
            $this->Rect($x, $y, $w, $h, 'D');
            //Print the text
            //$pdf->MultiCell(0,  5,$txt,0,'J');
            $this->MultiCell($w, 8, $data[$i], 0, $a);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function CheckPageBreak($h, $setX) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
            $this->SetX($setX);

           
            //volvemos a definir el  encabezado cuando se crea una nueva pagina


        }

        if ($setX == 100) {     
            $this->SetX(100);
        } else {
            $this->SetX($setX);
        }

    }

    function NbLines($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) {
            $w = $this->w - $this->rMargin - $this->x;
        }

        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n") {
            $nb--;
        }

        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') {
                $sep = $i;
            }

            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) {
                        $i++;
                    }

                } else {
                    $i = $sep + 1;
                }

                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }

        }
        return $nl;
    }



// -----------------------------------TERMINA---------------------------------
    var $wit;
    var $ale;

    function Setwit($w) {
        //Set the array of column widths
        $this->wit = $w;
    }

    function Setale($a) {
        //Set the array of column alignments
        $this->ale = $a;
    }

    function wor($data, $setX,$altura) //yo modifique el script a  mi conveniencia :D
    {
        //Calculate the height of the row
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->nb($this->wit[$i], $data[$i]));
        }

        $h = 8 * $nb;
        //Issue a page break first if needed
        $this->cheke($h, $setX);
        //Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->wit[$i];
            $a = isset($this->ale[$i]) ? $this->ale[$i] : 'C';
            //Save the current position
            $x = $this->GetX();
            $y = $this->GetY();
            //Draw the border
          $this->Rect($x, $y, $w, $h, 'D');
            //Print the text
            $this->MultiCell($w, $altura, $data[$i], 0, $a, 0);
            //Put the position to the right of the cell
            $this->SetXY($x + $w, $y);
        }
        //Go to the next line
        $this->Ln($h);
    }

    function cheke($h, $setX) {
        //If the height h would cause an overflow, add a new page immediately
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
            $this->SetX($setX);

            //volvemos a definir el  encabezado cuando se crea una nueva pagina

        }

        if ($setX == 100) {
            $this->SetX(100);
        } else {
            $this->SetX($setX);
        }

    }


    function nb($w, $txt) {
        //Computes the number of lines a MultiCell of width w will take
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) {
            $w = $this->w - $this->rMargin - $this->x;
        }

        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n") {
            $nb--;
        }

        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') {
                $sep = $i;
            }

            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) {
                        $i++;
                    }

                } else {
                    $i = $sep + 1;
                }

                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }

        }
        return $nl;
    }
// -----------------------------------TERMINA---------------------------------

}






















$pdf = new PDF('L'); 
$pdf->AliasNbPages();
$pdf->AddPage(); 
$pdf->SetMargins(10, 10, 10); 
$pdf->SetAutoPageBreak(true, 20); 


$pdf->SetFont('Times','b',8);


$pdf->SetWidths(array(10, 20, 80,20,25, 25)); 


$pdf->SetAligns(array('C','C','C','C'));

    
     $pdf->SetFont('Times', 'B', 20);
$pdf->SetDrawColor(61,61, 61);
$pdf->SetFont('Times','b',10);




/*                        <td>".$filas['nom_us']."</td>
                        <td>".$filas['registro']."</td>
                        <td>".$filas['accion']."</td>
                        <td>".$filas['codigo']."</td>
                        <td>".$filas['campo']."</td>
                        <td>".$fecha."</td>
                        <td>".$filas['hora']."</td>*/

/*$pdf->Cell(10, 8, utf8_decode('N°'), 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Usuario', 1, 0, 'C', 0);
$pdf->Cell(30, 8, 'Tipo de registro', 1, 0, 'C', 0);
$pdf->Cell(50, 8, utf8_decode('Acción realizada'), 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Información adicional', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Fecha', 1, 0, 'C', 0);
$pdf->Cell(25, 8, $_SESSION['auditoria_consulta'], 1, 1, 'C', 0);*/

/*$pdf->SetWidths(array(10, 25, 20,40,60,80,20,20)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','C','C','C','C'));


    $pdf->Row(array($data[0]['id_au'], ucwords(strtolower(utf8_decode('Usuario'))),ucwords(strtolower(utf8_decode('Registro'))), utf8_decode('Acción realizada'),ucwords(strtolower(utf8_decode("Codigo del afectado"))),ucwords(strtolower(utf8_decode('Información adicional'))), 'Fecha','Hora'), 10);*/

$pdf->SetFont('Times','b',7);
/*var_dump($_SESSION['auditoria_consulta']);
exit();
*/
for ($i = 0; $i < count($data); $i++) {

$id_us=$data[$i]['id_us_au'];

$data6 = new Conexion1();

 $conexion6 = $data6->conect();

$usuario="SELECT usuario.nick_us,usuario.cedula_us,usuario.apellido_us FROM usuario WHERE id_us = '{$id_us}'";
/*var_dump($usuario);*/

$resultado = $conexion6->prepare($usuario);

$resultado->execute();

$data6 = $resultado->fetchall(PDO::FETCH_ASSOC);



$fecha= date("d/m/Y", strtotime($data[$i]['fecha'])); 

$pdf->SetWidths(array(10, 25, 20,60,30,90,20,20)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!


$pdf->SetAligns(array('C','C','C','C','C'));

$fecha=date("d/m/Y", strtotime($data[$i]['fecha']));

    $pdf->Row(array($data[$i]['id_au'], $data6[0]['nick_us'], 

        ucwords(strtolower(utf8_decode($data[$i]['registro'])))

        , utf8_decode($data[$i]['accion']),

     ucwords(strtolower(utf8_decode($data[$i]['codigo'])))
     , ucwords(strtolower(utf8_decode($data[$i]['campo']))),$fecha,$data[$i]['hora']), 10);
  



}




// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
//ob_end_flush();

 $_SESSION['id_in']=null;
$_SESSION['id_fac']=null;
$_SESSION[0]['ubicacion']=null;

$_SESSION['auditoria']=null;
?>