<?php
//ob_start ();
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/fpdf.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/rotacion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion/Conexion.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();

$data = new Conexion1();
$conexion = $data->conect();
$strquery = "SELECT * FROM factura,gastos,insumos where id_in = insumos_id and id_fac_gas = id_fac and estado_fac = 2 ORDER BY ID_FAC";

$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

if (!isset($_GET['fecha_incial']) and !isset($_GET['fecha_final'])) {
    

        $data6 = new Conexion1();
        $conexion6 = $data6->conect();
        $strquery6 = "SELECT * FROM factura,gastos,insumos where id_in = insumos_id and id_fac_gas = id_fac and estado_fac = 2  ORDER BY id_in";

        $result6 = $conexion6->prepare($strquery6);
        $result6->execute();
        $data6 = $result6->fetchall(PDO::FETCH_ASSOC);


}else{
     $fecha_inicio=$_GET['fecha_incial'];


 $fecha_final=$_GET['fecha_final'];




 $data = new Conexion1();
$conexion = $data->conect();
$strquery = "SELECT * FROM FACTURA,GASTOS,INSUMOS WHERE ID_IN = INSUMOS_ID AND ID_FAC = ID_FAC_GAS AND ESTADO_FAC = 2 AND FECHA_GAS BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY ID_FAC;";

$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);


        $data6 = new Conexion1();
        $conexion6 = $data6->conect();
        $strquery6 = "SELECT * FROM factura,gastos,insumos WHERE id_in = insumos_id and id_fac_gas = id_fac and estado_fac = 2 AND fecha_gas BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'  ORDER BY id_in";

        $result6 = $conexion6->prepare($strquery6);
        $result6->execute();
        $data6 = $result6->fetchall(PDO::FETCH_ASSOC);

/*echo (count($data6));*/
}



if (count($data)==0) {
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'!Error, No se encontraron resultados!');
$pdf->Output();

    exit();
}
$id_fac=$data[0]['id_fac'];
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
       $this->wor(array(ucwords(strtolower(utf8_decode($_SESSION[0]['ubicacion'])))), 15);
       $this->SetFont('Times', 'B', 20);
       $this->Ln(2);
        $this->SetX(50);
if (!isset($_GET['fecha_incial']) and !isset($_GET['fecha_final'])){   
    $this->Cell(100, 8, ucwords(strtolower(utf8_decode('Reporte General de Consumo '))), 0, 1, 'C', 0);
$this->Ln(5);
}else{
       $this->Cell(100, 8, ucwords(strtolower(utf8_decode("Reporte de Consumo"))), 0, 1, 'C', 0);
             $this->SetX(50);
             $fecha_i= date("d/m/Y", strtotime($_GET['fecha_incial'])); 
             $fecha_f= date("d/m/Y", strtotime($_GET['fecha_final'])); 
       $this->Cell(100, 8, ucwords(strtolower(utf8_decode("desde ".$fecha_i.' hasta '.$fecha_f))), 0, 1, 'C', 0);
$this->Ln(5);
}
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
        $this->Cell(20, 10, '', 0, 0, 'C', 0);
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

    function wor($data, $setX) //yo modifique el script a  mi conveniencia :D
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
          // $this->Rect($x, $y, $w, $h, 'D');
            //Print the text
            $this->MultiCell($w, 8, $data[$i], 0, $a, 0);
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





















//------------------OBTENES LOS DATOS DE LA BASE DE DATOS-------------------------


/* IMPORTANTE: si estan usando MVC o algún CORE de php les recomiendo hacer uso del metodo
que se llama *select_all* ya que es el que haria uso del *fetchall* tal y como ven en la linea 161
ya que es el que devuelve un array de todos los registros de la base de datos
si hacen uso de el metodo *select* hara uso de fetch y este solo selecciona una linea*/

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico
/*$data = new Conexion();
$conexion = $data->conect();
$strquery = "SELECT * FROM entradas,detalles_entrada,insumos,proveedor WHERE id_entradas = 93 and entradas.id_entradas = detalles_entrada.id_co_en and insumos.id_in = detalles_entrada.id_in_en and entradas.id_pro_ent = proveedor.id_pro";
$result = $conexion->prepare($strquery);
$result->execute();
$data1 = $result->fetchall(PDO::FETCH_ASSOC);*/

// -----------ENCABEZADO------------------
        
// -------TERMINA----ENCABEZADO------------------

/*$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb*/

$pdf->SetFont('Times','b',8);

//El ancho de las celdas
$pdf->SetWidths(array(10, 20, 80,20,25, 25)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','C','C'));
$total_neto=0;
 $f=0;
for ($i = 0; $i < count($data); $i++) {
if ($data[$i]['unidad_medicion']==1) {
    $unidad="Unidad/s";
}else{
    $unidad="Mililitro/s";
}
if ($i==0) {

       $_SESSION['id_fac']=$data[$i]['id_fac'];  
     $pdf->SetFont('Times', 'B', 20);
$pdf->SetDrawColor(61,61, 61);
$pdf->SetFont('Times','b',10);
$pdf->Cell(180, 8, ucwords(strtolower(utf8_decode('Factura N°:'.$_SESSION['id_fac']))), 1, 1, 'C', 0);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);


$pdf->Cell(20, 8, 'Codigo', 1, 0, 'C', 0);
$pdf->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Unidad', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Fecha', 1, 1, 'C', 0);

}
if ($_SESSION['id_fac']!=$data[$i]['id_fac']) {
     $f=0;
       $_SESSION['id_fac']=$data[$i]['id_fac'];  
     $pdf->SetFont('Times', 'B', 20);
$pdf->SetDrawColor(61,61, 61);
$pdf->SetFont('Times','b',10);
$pdf->Cell(180, 8, ucwords(strtolower(utf8_decode('Factura N°:'.$_SESSION['id_fac']))), 1, 1, 'C', 0);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);

$pdf->Cell(20, 8, 'Codigo', 1, 0, 'C', 0);
$pdf->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Unidad', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Fecha', 1, 1, 'C', 0);
    
}
$pdf->SetWidths(array(10, 20, 80,20,25,25)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','C','c'));
$fecha=date("d/m/Y", strtotime($data[$i]['fecha_gas']));
    $pdf->Row(array($f + 1, $data[$i]['cod_in'], ucwords(strtolower(utf8_decode($data[$i]['nom_in']))), round($data[$i]['can_ins_gasto'],2), ucwords(strtolower(utf8_decode($unidad))), $fecha), 10);
  
 $f++;


}

$pdf->AddPage(); //añade l apagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetFont('Times', 'B', 20);
$pdf->SetDrawColor(61,61, 61);
$pdf->SetFont('Times','b',10);
$pdf->Cell(180, 8, ucwords(strtolower(utf8_decode('Totales'))), 1, 1, 'C', 0);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);

$pdf->Cell(25, 8, 'Codigo', 1, 0, 'C', 0);
$pdf->Cell(90, 8, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(30, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Unidad', 1, 1, 'C', 0);
 $f=0;
for ($i = 0; $i < count($data6); $i++) {
if ($data6[$i]['unidad_medicion']==1) {
    $unidad="Unidad/s";
}else{
    $unidad="Mililitro/s";
}






        if ($i==0) {
         $_SESSION['id_in']=$data6[$i]['id_in'];   
         $id_in=$data6[$i]['id_in'];
        $data3 = new Conexion1();
        $conexion3 = $data3->conect();
        $strquery3 = "SELECT * FROM factura,gastos,insumos where id_in = insumos_id and id_fac_gas = id_fac and estado_fac = 2 and id_in = '{$id_in}' ORDER BY id_in";
        if (isset($_GET['fecha_incial']) and isset($_GET['fecha_final'])) {

    $strquery3 ="SELECT * FROM factura,gastos,insumos WHERE id_in = insumos_id and id_fac = id_fac_gas and estado_fac = 2 and insumos_id = '{$id_in}' AND fecha_gas BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'  ORDER BY insumos_id";
        }

        $result3 = $conexion3->prepare($strquery3);
        $result3->execute();
        $data3 = $result3->fetchall(PDO::FETCH_ASSOC);


           $cantidad=0;

        for($e = 0; $e < count($data3); $e++){

        $cantidad+=$data3[$e]['can_ins_gasto'];

        }


        $pdf->SetWidths(array(10, 25, 90,30,25)); //???

        // esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
        $pdf->SetAligns(array('C','C','C','c'));

$pdf->Row(array($f + 1, $data6[$i]['cod_in'], ucwords(strtolower(utf8_decode($data6[$i]['nom_in']))), round($cantidad,2), ucwords(strtolower(utf8_decode($unidad)))), 10);
           $f++;



        }
        if ($_SESSION['id_in']!=$data6[$i]['id_in']) {
            

                     $_SESSION['id_in']=$data6[$i]['id_in'];   

         $id_in=$data6[$i]['id_in'];

        $data3 = new Conexion1();

        $conexion3 = $data3->conect();

          $strquery3 = "SELECT * FROM factura,gastos,insumos where id_in = insumos_id and id_fac_gas = id_fac and estado_fac = 2 and id_in = '{$id_in}' ORDER BY id_in";

        if (isset($_GET['fecha_incial']) and isset($_GET['fecha_final'])) {

    $strquery3 ="SELECT * FROM factura,gastos,insumos WHERE id_in = insumos_id and id_fac = id_fac_gas and estado_fac = 2 and insumos_id = '{$id_in}' AND fecha_gas BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'  ORDER BY insumos_id";
        }

      

        $result3 = $conexion3->prepare($strquery3);

        $result3->execute();

        $data3 = $result3->fetchall(PDO::FETCH_ASSOC);


           $cantidad=0;

        for($e = 0; $e < count($data3); $e++){

        $cantidad+=$data3[$e]['can_ins_gasto'];

        }
/*        echo $strquery3;
exit();*/
        $pdf->SetWidths(array(10, 25, 90,30,25)); //???

        // esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
        $pdf->SetAligns(array('C','C','C','c'));

            $pdf->Row(array($f + 1, $data6[$i]['cod_in'], ucwords(strtolower(utf8_decode($data6[$i]['nom_in']))) , round($cantidad,2), ucwords(strtolower(utf8_decode($unidad)))), 10);
          
 $f++;


        }


        }





// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
//ob_end_flush();

 $_SESSION['id_in']=null;
$_SESSION['id_fac']=null;
$_SESSION[0]['ubicacion']=null;
?>