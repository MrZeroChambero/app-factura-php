<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/fpdf.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/rotacion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion/Conexion.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
if (empty($_SESSION['compras'])) {
    $_SESSION['compras']='';
}
if (isset($_GET['id'])) {
    $a=$_GET['id'];
}else{
    $a=$_SESSION['compras'];
}
if (!isset($_SESSION['compras']) and !isset($_POST['id'])) {
 // echo "<script>window.location.replace('consulta_compra.php');</script>";  
}

$data4 = new Conexion1();

$conexion = $data4->conect();

$strquery = "SELECT * FROM compra,detalles_compra,insumos,proveedor WHERE id_compra = '{$a}' and compra.id_compra = detalles_compra.id_com_det and insumos.id_in = detalles_compra.id_in_com and compra.id_pro_com = proveedor.id_pro";

$result = $conexion->prepare($strquery);

$result->execute();

$usuario="SELECT usuario.nom_us,usuario.cedula_us,usuario.apellido_us,compra.id_compra,compra.id_us_compra FROM compra,usuario WHERE id_compra = '{$a}' and id_us=id_us_compra";

$filas1 = $conexion->prepare($usuario);

$filas1->execute();

$filas= $filas1->fetchall(PDO::FETCH_ASSOC);

$data4 = $result->fetchall(PDO::FETCH_ASSOC);
if (count($data4)==0) {
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'!Error, Orden de compra no encontrada!');
$pdf->Output();

    exit();
}
$tipo="j";
if ($data4[0]['tipo_pro']==1) {
    $tipo="V";
}
if ($data4[0]['tipo_pro']==2) {
    $tipo="J";
}
if ($data4[0]['tipo_pro']==3) {
    $tipo="E";
}
if ($data4[0]['tipo_pro']==4) {
    $tipo="G";
}
if ($data4[0]['tipo_pro']==5) {
    $tipo="P";
}

$_SESSION[0]['rif_pro_pdf']=$tipo."-".$data4[0]['rif_pro']."-".$data4[0]['rif_2'];



$_SESSION[0]['nom_pro_pdf']=$data4[0]['nom_pro'];
$_SESSION[0]['direccion_pro']=$data4[0]['dir_pro'];
$_SESSION[0]['corre_pro']=$data4[0]['correo_pro'];
$_SESSION[0]['tlf']=$data4[0]['tlf_num_pro'];

$_SESSION[0]['fecha']=date("d/m/Y", strtotime($data4[0]['fecha_com']));
$_SESSION[0]['hora']=$data4[0]['hora_com'];
$_SESSION[0]['id']=$data4[0]['id_compra'];
$_SESSION[0]['iva']=$data4[0]['iva_compra'];
$_SESSION['nom_us']=$filas[0]['nom_us'];
$_SESSION['cedula_us']=$filas[0]['cedula_us'];
$_SESSION['apellido_us']=$filas[0]['apellido_us'];




$id=$data4[0]['id_compra'];
$pagos = new Conexion1();
$conexion = $pagos->conect();
$strquery_pago = "SELECT * FROM forma_pago,pago_compra,compra WHERE id_compra = id_compra_pago and forma_pago.id_forma_pago = pago_compra.id_forma_pago and id_compra = '{$id}' ORDER BY id_pago_compra";

$result_pago = $conexion->prepare($strquery_pago);
$result_pago->execute();
$pagos = $result_pago->fetchall(PDO::FETCH_ASSOC);


$cantidad_filas=count($pagos);

if ($cantidad_filas==0) {
    $_SESSION[0]['referencia']="0000000000000";

$_SESSION[0]['forma_pago']="Efectivo";
}else if ($cantidad_filas==1) {

$_SESSION[0]['referencia']=$pagos[0]['referencia'];
$_SESSION[0]['cantidad']=round($pagos[0]['cantidad_pago'],2);
$_SESSION[0]['forma_pago']=$pagos[0]['nom_forma_pago'];
} else if ($cantidad_filas==2) {
$_SESSION[0]['referencia']=$pagos[0]['referencia'];
$_SESSION[0]['cantidad']=round($pagos[0]['cantidad_pago'],2);
$_SESSION[0]['forma_pago']=$pagos[0]['nom_forma_pago'];

$_SESSION[1]['referencia']=$pagos[1]['referencia'];
$_SESSION[1]['cantidad']=round($pagos[1]['cantidad_pago'],2);
$_SESSION[1]['forma_pago']=$pagos[1]['nom_forma_pago'];
    
} else if ($cantidad_filas==3) {
   $_SESSION[0]['referencia']=$pagos[0]['referencia'];
$_SESSION[0]['cantidad']=round($pagos[0]['cantidad_pago'],2);
$_SESSION[0]['forma_pago']=$pagos[0]['nom_forma_pago'];

$_SESSION[1]['referencia']=$pagos[1]['referencia'];
$_SESSION[1]['cantidad']=round($pagos[1]['cantidad_pago'],2);
$_SESSION[1]['forma_pago']=$pagos[1]['nom_forma_pago']; 
   $_SESSION[2]['referencia']=$pagos[2]['referencia'];
$_SESSION[2]['cantidad']=round($pagos[2]['cantidad_pago'],2);
$_SESSION[2]['forma_pago']=$pagos[2]['nom_forma_pago'];
}



class PDF extends FPDF {

// Cabecera de página

    function Header() {
        
        $this->Image('../logo.png', 0, 0, 28); //imagen(archivo, png/jpg || x,y,tamaño)

        //$this->Image('img/shinheky.png', 150, 10, 35); //imagen(archivo, png/jpg || x,y,tamaño)
        $this->SetFillColor(255, 255, 255); //color de fondo rgb
        $this->SetDrawColor(61, 61, 61); //color de linea  rgb

        $this->SetFont('Times','b',8);

//El ancho de las celdas
$this->Ln(15);

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!

         $this->SetFillColor(255, 255, 255); //color de fondo rgb
        $this->SetDrawColor(255, 255, 255); //color de linea  rgb
        $this->Ln(3);
        $this->Cell(30, 8, 'Datos del proveedor', 0,0, 'L', 0);
        $this->Setx(100);
        $this->Cell(30, 8, 'Datos del Cliente', 0,1, 'L', 0);
        $this->Cell(30, 8, 'RIF :', 1, 0, 'L', 0); 
        $this->Setx(100);
        $this->Cell(30, 8, 'RIF :', 1, 0, 'L', 0);  $this->Cell(30, 8, 'RIF:V-13770546-6', 1, 0, 'L', 0); 
        $this->Setx(0);
        $this->Setale(array('L'));
        $this->Setwit(array(20));
        $this->wor(array( $_SESSION[0]['rif_pro_pdf']), 38);
        $this->Cell(30, 8, 'Nombre completo:', 0, 0, 'L', 0);
        $this->Setx(100);
        $this->Cell(30, 8, 'Nombre completo:', 0, 0, 'L', 0);$this->Cell(30, 8, utf8_decode('Laboratorio clínico HEYLIN CABRERA F.P.'), 0, 0, 'L', 0);
        $this->Setx(0);
        $this->Setale(array('L'));
        $this->Setwit(array(60));
        $this->wor(array(utf8_decode($_SESSION[0]['nom_pro_pdf'])), 38);
        $this->Cell(30, 8, 'Direccion:', 0, 0, 'L', 0);
        $this->Setx(100);
        $this->Cell(30, 8, 'Direccion:', 0, 0, 'L', 0);$this->Cell(30, 8, utf8_decode('Palo Negro Estado Aragua'), 0, 0, 'L', 0);
        $this->Setx(0);
        $this->Setale(array('L'));
        $this->Setwit(array(60));
        $this->wor(array(utf8_decode($_SESSION[0]['direccion_pro'])), 38); 
        $this->Cell(30, 8, 'Correo Electronico:', 0, 0, 'L', 0);
        $this->Setx(100);
        $this->Cell(30, 8, 'Correo Electronico:', 0, 0, 'L', 0);$this->Cell(30, 8, utf8_decode('LaboratorioclinicoHEYLINCABRERAF.P@gmail.com'), 0, 0, 'L', 0);
        $this->Setx(0);
        $this->Setale(array('L'));
        $this->Setwit(array(60));
        $this->wor(array(utf8_decode($_SESSION[0]['corre_pro'])), 38);
        $this->Cell(30, 8, 'Numero telefinico:', 0, 0, 'L', 0);
        $this->Setx(100);
        $this->Cell(30, 8, 'Numero telefinico:', 0, 0, 'L', 0);$this->Cell(30, 8, '0'.'4124055017', 0, 0, 'L', 0);
        $this->Setx(0);
        $this->wor(array(utf8_decode($_SESSION[0]['tlf'])), 38);

        $this->Cell(30, 8, 'Reporte de Compras', 1, 0, 'C', 0);
        $this->Cell(10, 8, utf8_decode('Nª:'), 1, 0, 'C', 0);
        $this->Cell(10, 8, utf8_decode($_SESSION[0]['id']), 1, 0, 'L', 0);
        $this->Cell(10, 8, 'Fecha:', 1,0, 'L', 0);
        $this->Cell(20, 8, $_SESSION[0]['fecha'], 1,0, 'L', 0);
        $this->Cell(10, 8, 'Hora:', 1,0, 'L', 0);
        $this->Cell(20, 8, $_SESSION[0]['hora'], 1,0, 'L', 0);
        $this->Cell(17, 8, 'Emitido por:', 1,0, 'L', 0);
        $this->Cell(40, 8, utf8_decode($_SESSION['nom_us']), 1,0, 'L', 0);
                $this->Cell(10, 8, 'Cedula:', 1,0, 'L', 0);
        $this->Cell(20, 8, utf8_decode($_SESSION['cedula_us']), 1,0, 'L', 0);
        $this->Ln(10);
        
    }

// Pie de página

    function Footer() {

        //$a=encabezado();
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        $this->SetFont('Arial', 'B', 10);
        // Número de página
        $this->Cell(120, 8, utf8_decode('Emitido por:'.$_SESSION['nom_us']."  ".$_SESSION['apellido_us']." Cedula:".$_SESSION['cedula_us']), 0,0, 'L', 0);

        $this->Cell(50, 10, '', 0, 0, 'C', 0);
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
            $this->Rect($x, $y, $w, $h, 'DF');
            //Print the text
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
            $this->SetFont('Times','b',10);

            $this->Cell(10, 8, 'N', 1, 0, 'C', 0);
            $this->Cell(20, 8, 'Codigo', 1, 0, 'C', 0);
            $this->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
            $this->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
            $this->Cell(25, 8, 'Costo unitario', 1, 0, 'C', 0);
            $this->Cell(25, 8, 'Total', 1, 1, 'C', 0);

            $this->SetFont('Times','b',8);

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
            $this->Rect($x, $y, $w, $h, 'DF');
            //Print the text
            $this->MultiCell($w, 8, $data[$i], 0, $a);
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
$pdf->SetX(15);
$pdf->SetFont('Times','b',10);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Codigo', 1, 0, 'C', 0);
$pdf->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Costo unitario', 1, 0, 'C', 0);
$pdf->Cell(25, 8, 'Total', 1, 1, 'C', 0);
// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Times','b',8);

//El ancho de las celdas
$pdf->SetWidths(array(10, 20, 80,20,25, 25)); //???

// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
$pdf->SetAligns(array('C','C','C','c'));
$e=50;
for ($i = 0; $i < count($data4); $i++) {
$costo_t=0;
$unidad="";
if ($data4[$i]['unidad_medicion']==2) {
    $unidad=".ml";
}else if ($data4[$i]['unidad_medicion']==1) {
     $unidad=".un";
}


$costo_t=$data4[$i]['can_in_det']*$data4[$i]['costo_unidad'];
    $pdf->Row(array($i + 1, $data4[$i]['cod_in'], ucwords(strtolower(utf8_decode($data4[$i]['nom_in']))), $data4[$i]['can_in_det'].$unidad, round($data4[$i]['costo_unidad'],2).'Bs' , round($costo_t,2).'Bs' ), 15);
    $total=$data4[$i]['gasto_t'];
}

$pdf->SetX(15);
$iva=$_SESSION[0]['iva']*$total/100;
if ($cantidad_filas==0) {
    $_SESSION[0]['cantidad']=$total+$iva;
}

if ($cantidad_filas<2) {

   $pdf->SetFont('Times','b',10);
/*$pdf->SetX(145);*/
$pdf->Cell(110, 8, 'Metodo de pago', 1, 0, 'C', 0);
$pdf->Cell(70, 8, 'Totales', 1, 1, 'C', 0);
$pdf->SetFont('Times','b',8);

$pdf->SetX(15);
$pdf->Cell(20, 8,utf8_decode($_SESSION[0]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[0]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, $_SESSION[0]['cantidad'].".Bs", 1, 0, 'C', 0);

$pdf->Cell(35, 8, 'Costo Neto', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($total,2).'Bs', 1, 1, 'C', 0);
$pdf->SetX(125);
$pdf->Cell(35, 8, 'Iva ', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($iva,2).'Bs', 1, 1, 'C', 0);
$pdf->SetX(125);
$pdf->Cell(35, 8, 'Total', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($iva+$total,2).'Bs', 1, 1, 'C', 0);

}else if($cantidad_filas==2){

       $pdf->SetFont('Times','b',10);
/*$pdf->SetX(145);*/
$pdf->Cell(110, 8, 'Metodo de pago', 1, 0, 'C', 0);
$pdf->Cell(70, 8, 'Totales', 1, 1, 'C', 0);
$pdf->SetFont('Times','b',8);

$pdf->SetX(15);

$pdf->Cell(20, 8,utf8_decode($_SESSION[0]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[0]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, $_SESSION[0]['cantidad'].".Bs", 1, 0, 'C', 0);
$pdf->Cell(35, 8, 'Costo Neto', 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);

$pdf->Cell(35, 8, round($total,2).'Bs', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->Cell(20, 8,utf8_decode($_SESSION[1]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[1]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, $_SESSION[1]['cantidad'].".Bs", 1, 0, 'C', 0);
$pdf->Cell(35, 8, 'Iva ', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($iva,2).'Bs', 1, 1, 'C', 0);
$pdf->SetX(125);
$pdf->Cell(35, 8, 'Total', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($iva+$total,2).'Bs', 1, 1, 'C', 0);


}else if ($cantidad_filas==3) {

           $pdf->SetFont('Times','b',10);
/*$pdf->SetX(145);*/
$pdf->Cell(110, 8, 'Metodo de pago', 1, 0, 'C', 0);
$pdf->Cell(70, 8, 'Totales', 1, 1, 'C', 0);
$pdf->SetFont('Times','b',8);

$pdf->SetX(15);
$pdf->Cell(20, 8,utf8_decode($_SESSION[0]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[0]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, $_SESSION[0]['cantidad'].".Bs", 1, 0, 'C', 0);

$pdf->SetFont('Times','b',8);
$pdf->Cell(35, 8, 'Costo Neto', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($total,2).'Bs', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->Cell(20, 8,utf8_decode($_SESSION[1]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[1]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, $_SESSION[1]['cantidad'].".Bs", 1, 0, 'C', 0);

$pdf->Cell(35, 8, 'Iva ', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($iva,2).'Bs', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->Cell(20, 8,utf8_decode($_SESSION[1]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[1]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, $_SESSION[1]['cantidad'].".Bs", 1, 0, 'C', 0);
$pdf->Cell(35, 8, 'Total', 1, 0, 'C', 0);
$pdf->Cell(35, 8, round($iva+$total,2).'Bs', 1, 1, 'C', 0);

    
}

// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
$_SESSION[0]['rif_pro_pdf']=null;
$_SESSION[0]['nom_pro_pdf']=null;
$_SESSION[0]['direccion_pro']=null;
$_SESSION[0]['corre_pro']=null;
$_SESSION[0]['tlf']=null;
$_SESSION[0]['fecha']=null;
$_SESSION[0]['hora']=null;
$_SESSION[0]['id']=null;
?>