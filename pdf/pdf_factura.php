<?php
//ob_start ();
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/fpdf.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/fpdf/rotacion.php');
require_once ($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion/Conexion.php'); 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();


if (empty($_SESSION['fac'])) {
    $_SESSION['fac']='';
}
if (isset($_GET['id'])) {
    $a=$_GET['id'];
}else{
    $a=$_SESSION['fac'];
}


$data = new Conexion1();
$conexion = $data->conect();
$strquery = "SELECT * FROM factura,detalles_factura,analisis,cliente WHERE id_fac = '{$a}' and factura.id_fac = detalles_factura.id_co_det_fac and analisis.id_an = detalles_factura.id_an_det_fac and factura.id_cli_fac = cliente.id_cli";

$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

if (count($data)==0) {
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'!Error, Factura no encontrada!');
$pdf->Output();

    exit();
}

$usuario = "SELECT usuario.id_us,usuario.nom_us,usuario.apellido_us,usuario.cedula_us,usuario.nivel_us,factura.id_fac,factura.id_usd_fac FROM usuario,factura WHERE factura.id_fac = '{$a}' and factura.id_usd_fac = usuario.id_us";
/*var_dump($usuario);*/

$resultado = $conexion->prepare($usuario);
$resultado->execute();
$data4 = $resultado->fetchall(PDO::FETCH_ASSOC);

 $_SERVER[0]['nom_us']=$data4[0]['nom_us'];
 $_SERVER[0]['cedula_us']=$data4[0]['cedula_us'];
 $_SERVER[0]['apellido_us']=$data4[0]['apellido_us'];

/*    if ($data4[0]['nivel_us']==1) {
         $_SESSION[0]['cargo']="Administrador";

  
    }
    if ($data4[0]['nivel_us']==2) {
         $_SESSION[0]['cargo']=="Gerente";

  
    }
    if ($data4[0]['nivel_us']==3) {
         $_SESSION[0]['cargo']="Trabajador";
      
     
    }*/




$tipo="v";
if ($data[0]['tipo_cli']==1) {
    $tipo="V";

}
if ($data[0]['tipo_cli']==2) {
    $tipo="J";

}
if ($data[0]['tipo_cli']==3) {
    $tipo="E";
}
if ($data[0]['tipo_cli']==4) {
    $tipo="G";
}
if ($data[0]['tipo_cli']==5) {
    $tipo="P";
}
$cedula=$tipo."-".$data[0]['cedula_rif']."-".$data[0]['cedula_2'];
if ($data[0]['tipo_cli']==6) {
$cedula=$data[0]['cedula_rif'];
}


$_SERVER[0]['cedula']=$cedula;
$_SERVER[0]['nom_cli']=$data[0]['nom_cli'];
$_SERVER[0]['di_cli']=$data[0]['di_cli'];
$_SESSION[0]['estado']=$data[0]['estado_fac'];
$_SESSION[0]['tlf']=$data[0]['tlf_num_cli'];
$_SERVER[0]['fecha']=$data[0]['fecha_fac'];
$_SERVER[0]['hora']=$data[0]['hora_fac'];
$_SERVER[0]['id_fac']=$data[0]['id_fac'];
$_SESSION[0]['iva']=$data[0]['iva_factura'];
$_SESSION[0]['ubicacion']='Calle Ricaurte cruce con calle Andrés Bello, sector la atascosa,  local N° 1. Palo Negro, municipio Libertador Estado Aragua.';
$id=$data[0]['id_fac'];
$pagos = new Conexion1();
$conexion = $pagos->conect();
$strquery_pago = "SELECT * FROM forma_pago,pago_factura,factura WHERE id_fac = id_fac_pago and forma_pago.id_forma_pago = pago_factura.id_forma_pago and id_fac = '{$id}' ORDER BY id_pago_fac";

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
$_SESSION[0]['cantidad']=$pagos[0]['cantidad_pago'];
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


class PDF extends PDF_Rotate {



// Cabecera de página

    function Header() {
//color de fondo rgb
        

    $this->Image('../logo.png', 0, 0, 28);
    
     if ($_SESSION[0]['estado']==false) {
               $this->SetFont('Times','b',190);
      $this->SetTextColor(255,192,203);
        $this->RotatedText(40,250,'Anulada',60);
         $this->SetTextColor(61,61,61);

     }
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
        $this->Ln(10);
               //$this->SetFillColor(255, 255, 255); //color de fondo rgb
       //$this->SetDrawColor(61, 61, 61); //color de linea  rgb
// esto no lo mencione en el video pero también pueden poner la alineación de cada COLUMNA!!!
        
$this->Setwit(array(32, 108,20,20));
$this->Setale(array('L','L','L','L'));
$this->wor(array(ucwords(strtolower(utf8_decode('Nombre / Razon  social:'))), ucwords(utf8_decode($_SERVER[0]['nom_cli'])), ucwords(strtolower(utf8_decode('Factura N°:'))), ucwords(utf8_decode($_SERVER[0]['id_fac']))), 15);

            

$fecha= date("d/m/Y", strtotime($_SERVER[0]['fecha'])); 
$this->Setwit(array(32, 108,30,20));
$this->Setale(array('L','L','L','L'));
$this->wor(array(utf8_decode('Cedula / RIF:'),utf8_decode($_SERVER[0]['cedula']),ucwords(strtolower(utf8_decode('Fecha'))),ucwords(utf8_decode($fecha))), 15);


           $this->Setwit(array(32, 108,30,20));
$this->Setale(array('L','L','L','L'));
$this->wor(array(ucwords(strtolower(utf8_decode('Direccion:'))),ucwords(strtolower(utf8_decode($_SERVER[0]['di_cli']))),ucwords(strtolower(utf8_decode('Hora:'))), ucwords(utf8_decode($_SERVER[0]['hora']))), 15);

$this->Setwit(array(32, 108,30,20));
$this->Setale(array('L','L','L','L'));
$this->wor(array(ucwords(strtolower(utf8_decode('Emisor:'))),ucwords(strtolower(utf8_decode($_SERVER[0]['nom_us']))),ucwords(strtolower(utf8_decode('Cedula del Emisor:'))), ucwords(utf8_decode($_SERVER[0]['cedula_us']))), 15);

       $this->SetFont('Times', 'B', 20);
       $this->Ln(2);
        $this->SetX(50);
   $this->Cell(100, 8, 'Nota de entrega', 0, 1, 'C', 0);
$this->Ln(10);
$this->SetX(15);
$this->SetDrawColor(61,61, 61);
$this->SetFont('Times','b',10);
$this->Cell(10, 8, 'N', 1, 0, 'C', 0);
$this->Cell(20, 8, 'Codigo', 1, 0, 'C', 0);
$this->Cell(80, 8, 'Nombre', 1, 0, 'C', 0);
$this->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$this->Cell(25, 8, 'Costo unitario', 1, 0, 'C', 0);
$this->Cell(25, 8, 'Total', 1, 1, 'C', 0);

           $this->SetFont('Times','b',8);
         

    }

// Pie de página


 function Footer() {

        //$a=encabezado();
        // Posición: a 1,5 cm del final
        $this->SetY(-15);

        $this->SetFont('Arial', 'B', 10);
        // Número de página

/*        $this->Cell(20, 10, utf8_decode('Emisor:'), 0, 0, 'C', 0);*/
         $this->Cell(150, 10, utf8_decode('Emisor:'.$_SERVER[0]['nom_us']." ".$_SERVER[0]['apellido_us']." ".'Cedula:'." ".$_SERVER[0]['cedula_us']), 0, 0, 'L', 0);
/*         $this->Cell(20, 10, utf8_decode('Cedula:'), 0, 0, 'C', 0);

         $this->Cell(20, 10, utf8_decode($_SERVER[0]['cedula_us']), 0, 0, 'C', 0);
         $this->Cell(20, 10, utf8_decode('Rango:'), 0, 0, 'C', 0);
         $this->Cell(20, 10, utf8_decode($_SESSION[0]['cargo']), 0, 0, 'C', 0);*/
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

for ($i = 0; $i < count($data); $i++) {
$costo_t=0;

$precio_t=$data[$i]['can_det_fac']*$data[$i]['precio_unidad'];
    $pdf->Row(array($i + 1, $data[$i]['cod_an'], 
        ucwords(strtolower(utf8_decode($data[$i]['nom_an']))),
         round($data[$i]['can_det_fac'],2), round($data[$i]['precio_unidad'],2).'.BS' ,
          round($precio_t,2).'.BS' ), 15);

$total_neto+=$precio_t;

    $total=$data[$i]['precio_total'];

/*$pdf->SetFont('Times','b',190);
$pdf->RotatedText(35,190,'Anulada',45);
$pdf->SetFont('Times','b',8);*/
}

$iva=($_SESSION[0]['iva']*$total_neto)/100;
$pdf->SetX(15);
if ($cantidad_filas==0) {
    $_SESSION[0]['cantidad']=$total+$iva;
}
$pdf->SetFont('Times','b',10);
if ($cantidad_filas<2) {
$pdf->Cell(110, 8, 'Metodo de pago', 1, 0, 'C', 0);

$pdf->Cell(70, 8, 'Totales', 1, 1, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->SetX(15);
/*$pdf->Cell(20, 8, utf8_decode('Forma de pago N°:1'), 0, 0, 'C', 0);*/
$pdf->Cell(20, 8,utf8_decode($_SESSION[0]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[0]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, round($_SESSION[0]['cantidad'],2).".Bs", 1, 0, 'C', 0);
$pdf->SetFont('Times','b',10);
$pdf->Cell(45, 8, 'Total a Neto', 1, 0, 'C', 0);

$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($total_neto,2).'.BS', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->Cell(110, 8, '', 0, 0, 'C', 0);

$pdf->Cell(45, 8, 'IVA '.$_SESSION[0]['iva']."%", 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($iva,2).'.BS', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->Cell(110, 8, '', 0, 0, 'C', 0);
$pdf->Cell(45, 8, 'Total a pagar', 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($total+$iva,2).'.BS', 1, 1, 'C', 0);

}else if ($cantidad_filas==2) {
    $pdf->SetFont('Times','b',10);
$pdf->Cell(110, 8, 'Metodo de pago', 1, 0, 'C', 0);
$pdf->Cell(70, 8, 'Totales', 1, 1, 'C', 0);
$pdf->SetX(15);
/*$pdf->Cell(110, 8, utf8_decode('Forma de pago N°:1'), 0, 0, 'C', 0);*/
$pdf->SetFont('Times','b',8);
$pdf->Cell(20, 8,utf8_decode($_SESSION[0]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[0]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, round($_SESSION[0]['cantidad'],2).".Bs", 1, 0, 'C', 0);

$pdf->Cell(45, 8, 'Total a Neto', 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, $total_neto.'.BS', 1, 1, 'C', 0);
$pdf->SetX(15);

$pdf->Cell(20, 8,utf8_decode($_SESSION[1]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[1]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, round($_SESSION[1]['cantidad'],2).".Bs", 1, 0, 'C', 0);
$pdf->Cell(45, 8, 'IVA '.$_SESSION[0]['iva']."%", 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($iva,2).'.BS', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->Cell(110, 8, '', 0, 0, 'C', 0);
$pdf->Cell(45, 8, 'Total a pagar', 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($total+$iva,2).'.BS', 1, 1, 'C', 0);
    
}else if($cantidad_filas==3){

$pdf->SetFont('Times','b',10);

$pdf->Cell(110, 8, 'Metodo de pago', 1, 0, 'C', 0);
$pdf->Cell(70, 8, 'Totales', 1, 1, 'C', 0);
$pdf->SetX(15);
$pdf->SetFont('Times','b',8);
$pdf->Cell(20, 8,utf8_decode($_SESSION[0]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[0]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, round($_SESSION[0]['cantidad'],2).".Bs", 1, 0, 'C', 0);

$pdf->Cell(45, 8, 'Total a Neto', 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($total_neto,2).'.BS', 1, 1, 'C', 0);
$pdf->SetX(15);

$pdf->Cell(20, 8,utf8_decode($_SESSION[1]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[1]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, round($_SESSION[1]['cantidad'],2).".Bs", 1, 0, 'C', 0);
$pdf->Cell(45, 8, 'IVA '.$_SESSION[0]['iva']."%", 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($iva,2).'.BS', 1, 1, 'C', 0);
$pdf->SetX(15);

$pdf->Cell(20, 8,utf8_decode($_SESSION[2]['forma_pago']), 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Referencia', 1, 0, 'C', 0);
$pdf->Cell(20, 8, $_SESSION[2]['referencia'], 1, 0, 'C', 0);
$pdf->Cell(20, 8, 'Cantidad', 1, 0, 'C', 0);
$pdf->Cell(30, 8, round($_SESSION[2]['cantidad'],2).".Bs", 1, 0, 'C', 0);
$pdf->Cell(45, 8, 'Total a pagar', 1, 0, 'C', 0);
$pdf->SetFont('Times','b',8);
$pdf->Cell(25, 8, round($total+$iva,2).'.BS', 1, 1, 'C', 0);
}
// cell(ancho, largo, contenido,borde?, salto de linea?)

$pdf->Output();
//ob_end_flush();

 $_SERVER[0]['nom_us']=null;
 $_SERVER[0]['cedula_us']=null;
$_SERVER[0]['cedula']=null;
$_SERVER[0]['nom_cli']=null;
$_SERVER[0]['di_cli']=null;

$_SESSION[0]['tlf']=null;
$_SERVER[0]['fecha']=null;
$_SERVER[0]['hora']=null;
$_SERVER[0]['id_fac']=null;
$_SESSION[0]['iva']=null;
$_SESSION[0]['ubicacion']=null;
?>
