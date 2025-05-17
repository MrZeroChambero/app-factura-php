<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

 $referencia="0000000000000";
  $referencia2="0000000000000";
   $referencia3="0000000000000";
nivel_medio();
        $titulo="Verifique los datos";

        $msg="Complete todos los campos";

        $val=msg_error($msg,$titulo);
if(!isset($_POST['crear_compra'])){

        echo $val;

        exit();
}


if (!isset($_POST['forma_pago'])) {
        echo $val;

        exit();
}
if (empty(trim($_POST['forma_pago']))) {
        echo $val;

        exit();   
}
		$titulo="Verifique los datos";

		$msg="Elija una forma de pago válida";

        $val=msg_error($msg,$titulo);

    if (!filter_var($_POST['forma_pago'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>1000000]])){

        echo $val;

		exit();

    }

   $f_pago=$_POST['forma_pago'];

   $verificar_forma_pago=verificar_forma_pago($f_pago);

   if (!($verificar_forma_pago->num_rows>0)) {

        echo $val;

		exit();
   }


if ($_POST['forma_pago']!=2) {

        $titulo="Verifique los datos";

        $msg="Ingrese un referencia válida";

        $val=msg_error($msg,$titulo);


    if (!isset($_POST['referencia_com'])) {

         echo $val;

        exit();       
    }
    if (empty(trim($_POST['referencia_com']))) {
        echo $val;

        exit();       
    }

    $validar_referencia=validar_float($_POST['referencia_com']);

    if ($validar_referencia==false) {

         echo $val;

        exit();       
    }

    if ($_POST['forma_pago']==3) {

         if (strlen($_POST['referencia_com'])!=13) {
            
           echo $val;

        exit();     
        }

        if ($_POST['referencia_com']<100000000000) {
         echo $val;

        exit();       
        }   
    }

        if ($_POST['forma_pago']==1) {

         if (strlen($_POST['referencia_com'])!=13) {

           echo $val;

        exit();     
        }

        if ($_POST['referencia_com']<1000000000) {

           echo $val;

        exit();     
        }   
    }



}
		$titulo="Verifique los datos";

		$msg="Debe Ingresar una fecha válida";

        $val=msg_error($msg,$titulo);

if (!isset($_POST['fecha_compra'])) {

        echo $val;

		exit();
}
if (empty(trim($_POST['fecha_compra']))) {

        echo $val;

		exit();
}
$verificar_fecha=validar_fecha($_POST['fecha_compra']);

if ($verificar_fecha==false) {

        echo $val;

		exit();
}
$fecha_actual_validar=date('Y-m-d');

        $titulo="Verifique los datos";

        $msg="No puede ingresar una fecha anterior a la actual";

        $val=msg_error($msg,$titulo);
if ($fecha_actual_validar>$_POST['fecha_compra']) {
            echo $val;

        exit();
}
   $total=0;

   $q=$_SESSION['proveedor1'];

   $referencia=$_POST['referencia_com'];



            $cantidad_formas_pago=$_POST['cantidad_formas_pago'];

            if (!filter_var($cantidad_formas_pago,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>3]])) {

                        $titulo="Tipo de pago invalido";

                        $msg="Ingrese in tipo de pago valido";

                        $val=msg_error($msg,$titulo);

                        echo $val;

                        exit();
                
                    }



   $forma_pago=$_POST['forma_pago'];


if ($cantidad_formas_pago>1) {

if (!isset($_POST['forma_pago2'])) {

    $titulo="Error en forma de pago";

    $msg="Se establecio una cantidad de pagos incorrecta, recargue la ventana de carrito porfavor";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();
}

                

            $forma_pago2=$_POST['forma_pago2'];
                        if (!filter_var($_POST['forma_pago2'],FILTER_VALIDATE_INT)) {

                                    $titulo="Tipo de pago invalido";

                                    $msg="Ingrese in tipo de pago valido";

                                    $val=msg_error($msg,$titulo);

                                    echo $val;

                                    exit();
                        }

                        $verificar_forma_pago=verificar_forma_pago($forma_pago2);

                        if (!($verificar_forma_pago->num_rows>0)) {

                                    $titulo="Tipo de pago inválido";

                                    $msg="Ingrese in tipo de pago valido";

                                    $val=msg_error($msg,$titulo);

                                    echo $val;

                                    exit();

                        }
                                    $titulo="Error";

                                    $msg="Referencia 2 no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

                                    $val=msg_error($msg,$titulo);
                        if ($forma_pago2!=2) {
                                    $titulo="Error";

                                    $msg="Referencia 2 no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

                                    $val=msg_error($msg,$titulo);

               
$referencia2=$_POST['referencia2'];
                if (!isset($_POST['referencia2'])) {
                

                     echo $val;

                    exit();       
                }
                if (empty(trim($_POST['referencia2']))) {

                    
                    echo $val;

                    exit();       
                }

                $validar_referencia=validar_float($referencia2);

                if ($validar_referencia==false) {

                     echo $val;

                    exit();       
                }

                if ($forma_pago2==3) {

                     if (strlen($referencia2)!=13) {
                        
                       echo $val;

                    exit();     
                    }

                    if ($referencia2<100000000000) {
                     echo $val;

                    exit();       
                    }   
                }

                    if ($forma_pago2==1) {

                     if (strlen($referencia2)!=13) {

                       echo $val;

                    exit();     
                    }

                    if ($referencia2<1000000000) {

                       echo $val;

                    exit();     
                    }   
                }
if ($referencia==$referencia2) {
    $titulo="Referencias iguales";

    $msg="las referencias no deben ser iguales";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}


            }

    $titulo="Cantidad de dinero 1 inválida";

    $msg="Cantidad de dinero 1 inválida, <br> Ingrese una cantidad válida, solo use numeros y punto, <br> no mas de 2 deciamles";

    $val=msg_interrogante($msg,$titulo);

    if(!isset($_POST['cantidad_pagar1'])){
    echo $val;

    exit();
    }
    if (empty(trim($_POST['cantidad_pagar1']))) {
    echo $val;

    exit();     
    }

if ($_POST['cantidad_pagar1']<=0) {

    echo $val;

    exit();  
}
if ($_POST['cantidad_pagar1']<0.01) {

    echo $val;

    exit();  
}
$validar_completo1=validar_numeros_zero($_POST['cantidad_pagar1']);


if ($validar_completo1==false){


    echo $val;

    exit();

}
            $validar_cantidad=validar_float($_POST['cantidad_pagar1']);

            if ( $validar_cantidad==false) {

                 echo $val;

                exit();       
            }

    $titulo="Cantidad de dinero 2 inválida";

    $msg="Cantidad de dinero 2 inválida, <br> Ingrese una cantidad válida, solo use numeros y punto, <br> no mas de 2 deciamles";

    $val=msg_interrogante($msg,$titulo);

        if(!isset($_POST['cantidad_pagar2'])){
    echo $val;

    exit();
    }
    if (empty(trim($_POST['cantidad_pagar2']))) {
    echo $val;

    exit();     
    }

$validar_completo2=validar_numeros_zero($_POST['cantidad_pagar2']);


if ($validar_completo2==false){


    echo $val;

    exit();

}
if ($_POST['cantidad_pagar2']<=0) {

    echo $val;

    exit();  
}
if ($_POST['cantidad_pagar2']<0.01) {

    echo $val;

    exit();  
}

            $validar_cantidad=validar_float($_POST['cantidad_pagar2']);

            if ( $validar_cantidad==false) {

                 echo $val;

                exit();       
            }


}

////////////////////////////////////////////////////////////////////
if ($cantidad_formas_pago>2) {

if (!isset($_POST['forma_pago3'])) {

    $titulo="Error en forma de pago";

    $msg="Se establecio una cantidad de pagos incorrecta, recargue la ventana de carrito porfavor";

    $val=msg_error($msg,$titulo);

    echo $val;

    exit();
}

        $forma_pago3=$_POST['forma_pago3'];
                    if (!filter_var($_POST['forma_pago3'],FILTER_VALIDATE_INT)) {

                                $titulo="Tipo de pago invalido";

                                $msg="Ingrese in tipo de pago valido";

                                $val=msg_error($msg,$titulo);

                                echo $val;

                                exit();
                    }

                    $verificar_forma_pago=verificar_forma_pago($forma_pago3);

                    if (!($verificar_forma_pago->num_rows>0)) {

                                $titulo="Tipo de pago inválido";

                                $msg="Ingrese in tipo de pago valido";

                                $val=msg_error($msg,$titulo);

                                echo $val;

                                exit();

                    }
                                $titulo="Error";

                                $msg="Referencia no válida, solo deben ser numeros, <br> debe tener 13 dijitos 3";

                                $val=msg_error($msg,$titulo);
                    if ($forma_pago3!=2) {

                                $titulo="Error";

                                $msg="Referencia no válida, solo deben ser numeros, <br> debe tener 13 dijitos 3";

                                $val=msg_error($msg,$titulo);

    $referencia3=$_POST['referencia3'];    

            if (!isset($_POST['referencia3'])) {

                 echo $val;

                exit();       
            }
            if (empty(trim($_POST['referencia3']))) {
                echo $val;

                exit();       
            }

            $validar_referencia=validar_float($referencia3);

            if ($validar_referencia==false) {

                 echo $val;

                exit();       
            }

            if ($forma_pago3==3) {

                 if (strlen($referencia3)!=13) {
                    
                   echo $val;

                exit();     
                }

                if ($referencia3<100000000000) {
                 echo $val;

                exit();       
                }   
            }

                if ($forma_pago3==1) {

                 if (strlen($referencia3)!=13) {

                   echo $val;

                exit();     
                }

                if ($referencia3<1000000000) {

                   echo $val;

                exit();     
                }   
            }
if ($referencia3==$referencia2) {
    $titulo="Referencias iguales";

    $msg="las referencias no deben ser iguales";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();

    
}
if ($referencia3==$referencia) {

    $titulo="Referencias iguales";

    $msg="las referencias no deben ser iguales";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
    
}
if ($referencia==$referencia2) {

    $titulo="Referencias iguales";

    $msg="las referencias no deben ser iguales";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
    
}
        }
/*
echo$referencia3;*/
    $titulo="Cantidad de dinero 3 inválida";

    $msg="Cantidad de dinero 3 inválida, <br> Ingrese una cantidad válida, solo use numeros y punto, <br> no mas de 2 deciamles";

    $val=msg_interrogante($msg,$titulo);

    if(!isset($_POST['cantidad_pagar3'])){
    echo $val;

    exit();
    }
    if (empty(trim($_POST['cantidad_pagar3']))) {
    echo $val;

    exit();     
    }

if ($_POST['cantidad_pagar3']<=0) {

    echo $val;

    exit();  
}
if ($_POST['cantidad_pagar3']<0.01) {

    echo $val;

    exit();  
}
$validar_completo3=validar_numeros_zero($_POST['cantidad_pagar3']);


if ($validar_completo3==false){


    echo $val;

    exit();

}



            $validar_cantidad=validar_float($_POST['cantidad_pagar3']);

            if ( $validar_cantidad==false) {

                 echo $val;

                exit();       
            }

}


////////////////////////////////////////////////////////////////////////////////////


$proveedor=$_SESSION['proveedor1'];

$iva=obtener_iva();

$lista_compras2=lista_compras_proveedor($proveedor);

$totalneto=0;

    while ($filas = mysqli_fetch_assoc($lista_compras2)) {

        $totalu=0;

        $totalu =$filas['costo_in_com'] * $filas['can_in_com']; 

        $totalneto+= $totalu;

$total_deciamles=round($totalu, 2);

$totalu=$total_deciamles;
}
$iva_total=$totalneto*$iva/100;

$total=$iva_total+$totalneto;

if ($cantidad_formas_pago==1) {

    $cantidad_pagar1=$total;

    $cantidad_suma=round($cantidad_pagar1,2);


}else if ($cantidad_formas_pago==2) {

    $cantidad_pagar1=round($_POST['cantidad_pagar1'], 2);

    $cantidad_pagar2=round($_POST['cantidad_pagar2'], 2);

    $cantidad_suma=round($cantidad_pagar1+$cantidad_pagar2,2);

       $titulo="Error";

    $msg="No puede usar la forma de pago \"Efectivo\"  mas de una vez";

    $val=msg_interrogante($msg,$titulo);

    if (isset($_POST['forma_pago'])and isset($_POST['forma_pago2']) ) {
        if ($_POST['forma_pago']==2 and $_POST['forma_pago2']==2) {
        
        echo $val;

        
        exit();   


        }
    }
        if (isset($_POST['forma_pago3'])and isset($_POST['forma_pago2']) ) {
        if ($_POST['forma_pago3']==2 and $_POST['forma_pago2']==2) {
            
                 echo $val;

                exit();   
        }
    }
        if (isset($_POST['forma_pago'])and isset($_POST['forma_pago3']) ) {
        if ($_POST['forma_pago']==2 and $_POST['forma_pago3']==2) {
                 echo $val;

                exit();      
        }
    }

}else if ($cantidad_formas_pago==3) {

    $cantidad_pagar1=round($_POST['cantidad_pagar1'], 2);

    $cantidad_pagar2=round($_POST['cantidad_pagar2'], 2);

    $cantidad_pagar3=round($_POST['cantidad_pagar3'], 2);

$cantidad_suma=round($cantidad_pagar1+$cantidad_pagar2+$cantidad_pagar3,2);  
   $titulo="Error";

    $msg="No puede usar la forma de pago \"Efectivo\"  mas de una vez";

    $val=msg_interrogante($msg,$titulo);


        if ($_POST['forma_pago']==2 and $_POST['forma_pago2']==2) {
        
        echo $val;

        
        exit();   


        }
    
  
        if ($_POST['forma_pago3']==2 and $_POST['forma_pago2']==2) {
            
                 echo $val;

                exit();   
        }
    

        if ($_POST['forma_pago']==2 and $_POST['forma_pago3']==2) {
                 echo $val;

                exit();      
        }
    


}



$cantidad_total=round($total , 2);

/*echo "____".$cantidad_total."cantidadtotal";*/

if ($cantidad_suma>$cantidad_total) {

$sobra=$cantidad_suma-$cantidad_total;

$sobre_total=round($sobra, 2);
    $titulo="Pago superado";

    $msg="está sobrando:".$sobre_total.".Bs, ajuste los pagos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
    
}
if ($cantidad_suma<$cantidad_total) {

$sobra=$cantidad_suma-$cantidad_total;

$sobre_total=round($sobra, 2);

if ($sobre_total<0) {

$sobre_total*=(-1); 

}
    $titulo="Pago insuficiente";

    $msg="está faltando:".$sobre_total.".Bs, ajuste los pagos porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
    
}





/*echo "cantidad_formas_pago=".$cantidad_formas_pago."referencia=".$referencia."referencia2=".$referencia2."referencia3=".$referencia3."cantidad1=".$cantidad_pagar1."cantidad_pagar2=".$cantidad_pagar2."cantidad_pagar3=".$cantidad_pagar3."forma_pago2=".$forma_pago2."forma_pago3=".$forma_pago3;*/
/*$fecha=date('Y-m-d H:i:s');
echo $fecha."fecha";*/
/*echo "cantidad_formas_pago=".$cantidad_formas_pago."referencia=".$referencia."referencia2=".$referencia2."cantidad1=".$cantidad_pagar1."cantidad_pagar2=".$cantidad_pagar2."forma_pago2=".$forma_pago2;*/


   $i=0;

   $lista_compras=lista_compras_pro($q);

///////////////////////////////

   if ($lista_compras->num_rows >0) {

        $crear_compra=crear_orden_compra($referencia,$forma_pago);

        if ($crear_compra == true) {

            $verificar_todo=true;

            $lista_compras2=lista_compras_pro($q);

            $detalles_resultado=true;


//////////////


                    $registrar_pago=pago_com($referencia,$cantidad_pagar1,$forma_pago);

                                 if ($registrar_pago==false) {
                                        $titulo="Error";

                                        $msg="Problemas al registrar pago";

                                        $val=msg_error($msg,$titulo);

                                        echo $val;

                                        exit();
                                 }

                            if ($cantidad_formas_pago>1) {

                                 $registrar_pago=pago_com($referencia2,$cantidad_pagar2,$forma_pago2);

                                 if ($registrar_pago==false) {
                                        $titulo="Error";

                                        $msg="Problemas al registrar pago2";

                                        $val=msg_error($msg,$titulo);

                                        echo $val;

                                        exit();
                                 }
                                
                            }
                            if ($cantidad_formas_pago>2) {

                                 $registrar_pago=pago_com($referencia3,$cantidad_pagar3,$forma_pago3);

                                 if ($registrar_pago==false) {
                                        $titulo="Error";

                                        $msg="Problemas al registrar pago3";

                                        $val=msg_error($msg,$titulo);

                                        echo $val;

                                        exit();
                                 }
                                
                            }


////////////

                    while($filas_lc=mysqli_fetch_assoc($lista_compras2)){

                    $i++;

                    $id_in=$filas_lc['id_in_com'];

                    $costo=$filas_lc['costo_in_com'];

                    $can_in=$filas_lc['can_in_com'];

                    $detalles=detalles_compra($id_in,$can_in,$costo);

                    if ($detalles==false) {

                        $detalles_resultado=false;
                    }

                        if ($detalles == true) {

                        $fecha_pedido=$conexion->real_escape_string($_POST['fecha_compra']);

                        $crear_pedidos = pedidos($id_in,$can_in,$fecha_pedido);


                            if ( $crear_pedidos==false) {

                                $verificar_todo=false;

                                $titulo="Error";

                                $msg="Error al crear los pedidos";

                                $val=msg_error($msg,$titulo);

                                echo $val;

                            }
                    }else{

                            $titulo="Error";

                            $msg="Error al realizar los detalles";

                            $val=msg_error($msg,$titulo);

                            echo $val;
                    }



                 } 

                            $titulo="Correcto";

                            $msg="Compra exitosa, el codigo es:".$_SESSION['id_compra'].", <br> Sera reenviado a consulta de compras en 10sg";

                            $val=msg_positivo($msg,$titulo);

                            echo $val;

                            limpiar_todo();
                            
                            $_SESSION['proveedor1']= null;

                            echo "<script>setTimeout(function(){window.location.replace('http://localhost:8080/facturacion/index.php?pagina=consulta_compras')},10000);</script>";
                                   
                            exit();
        }else{

                            $titulo="Error";

                            $msg="Error al realizar la compra";

                            $val=msg_error($msg,$titulo);

                            echo $val;

                            exit();
      }
      
   }



 ?>