<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=factura"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

verificar_nivel();
			  $referencia="0000000000000";
			  $referencia2="0000000000000";
			  $referencia3="0000000000000";
if (!isset($_POST['crear_factura'])) {
	$titulo="Verifique los datos";

	$msg="si ve este error recargue el carrito porfavor";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
}

			$parametros = "/^[0-9]+$/";

			$q=$_SESSION['cliente'];

			$cliente=$q;

			$total=0;

			$totalt=0;

			$cantidad_formas_pago=$_POST['cantidad_formas_pago'];

			if (!filter_var($cantidad_formas_pago,FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>3]])) {

				        $titulo="Tipo de pago invalido";

				        $msg="Ingrese in tipo de pago valido";

        				$val=msg_error($msg,$titulo);

        				echo $val;

			     		exit();
				
			     	}

			$tipo_pago=$conexion->real_escape_string($_POST['tipo_pago']);

			$referencia=$conexion->real_escape_string($_POST['referencia']);

			$verificar_cliente= verificar_cliente($cliente);

			if (!($verificar_cliente->num_rows>0)) {

				        $titulo="Error";

				        $msg="Ha ocurrito un error, <br> reinicie la sección si ve este mensaje";

        				$val=msg_error($msg,$titulo);

        				echo $val;

						exit();
			}

////////////////////////////////////////////////////////////////////


			if (!filter_var($_POST['tipo_pago'],FILTER_VALIDATE_INT)) {

				        $titulo="Tipo de pago invalido";

				        $msg="Ingrese in tipo de pago valido";

        				$val=msg_error($msg,$titulo);

        				echo $val;

			     		exit();
			}

			$verificar_forma_pago=verificar_forma_pago($tipo_pago);

			if (!($verificar_forma_pago->num_rows>0)) {

				        $titulo="Tipo de pago inválido";

				        $msg="Ingrese in tipo de pago valido";

        				$val=msg_error($msg,$titulo);

        				echo $val;

			     		exit();

			}
				        $titulo="Error";

				        $msg="Referencia no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

        				$val=msg_error($msg,$titulo);
			if ($tipo_pago!=2) {
				        $titulo="Error";

				        $msg="Referencia no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

        				$val=msg_error($msg,$titulo);

   

    if (!isset($referencia)) {

         echo $val;

        exit();       
    }
    if (empty(trim($referencia))) {
        echo $val;

        exit();       
    }

    $validar_referencia=validar_float($referencia);

    if ($validar_referencia==false) {

         echo $val;

        exit();       
    }

    if ($tipo_pago==3) {

         if (strlen($referencia)!=13) {
            
           echo $val;

        exit();     
        }

        if ($referencia<100000000000) {
         echo $val;

        exit();       
        }   
    }

        if ($tipo_pago==1) {

         if (strlen($referencia)!=13) {

           echo $val;

        exit();     
        }

        if ($referencia<1000000000) {

           echo $val;

        exit();     
        }   
    }



}
////////////////////////////////////////////////////////////////////

if ($cantidad_formas_pago>1) {

if (!isset($_POST['tipo_pago2'])) {

	$titulo="Error en forma de pago";

	$msg="Se establecio una cantidad de pagos incorrecta, recargue la ventana de carrito porfavor";

	$val=msg_error($msg,$titulo);

	echo $val;

	exit();
}

				

			$tipo_pago2=$_POST['tipo_pago2'];
						if (!filter_var($_POST['tipo_pago2'],FILTER_VALIDATE_INT)) {

							        $titulo="Tipo de pago invalido";

							        $msg="Ingrese in tipo de pago valido";

			        				$val=msg_error($msg,$titulo);

			        				echo $val;

						     		exit();
						}

						$verificar_forma_pago=verificar_forma_pago($tipo_pago2);

						if (!($verificar_forma_pago->num_rows>0)) {

							        $titulo="Tipo de pago inválido";

							        $msg="Ingrese in tipo de pago valido";

			        				$val=msg_error($msg,$titulo);

			        				echo $val;

						     		exit();

						}
							        $titulo="Error";

							        $msg="Referencia N°2 no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

			        				$val=msg_error($msg,$titulo);
						if ($tipo_pago2!=2) {
							        $titulo="Error";

							        $msg="Referencia N°2 no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

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
			    	var_dump($referencia2);
			    	echo "float";
			         echo $val;

			        exit();       
			    }

			    if ($tipo_pago2==3) {

			         if (strlen($referencia2)!=13) {
			            
			           echo $val;

			        exit();     
			        }

			        if ($referencia2<100000000000) {
			         echo $val;

			        exit();       
			        }   
			    }

			        if ($tipo_pago2==1) {

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

if (!isset($_POST['tipo_pago3'])) {

	$titulo="Error en forma de pago";

	$msg="Se establecio una cantidad de pagos incorrecta, recargue la ventana de carrito porfavor";

	$val=msg_error($msg,$titulo);

	echo $val;

	exit();
}

		$tipo_pago3=$_POST['tipo_pago3'];
					if (!filter_var($_POST['tipo_pago3'],FILTER_VALIDATE_INT)) {

						        $titulo="Tipo de pago invalido";

						        $msg="Ingrese in tipo de pago valido";

		        				$val=msg_error($msg,$titulo);

		        				echo $val;

					     		exit();
					}

					$verificar_forma_pago=verificar_forma_pago($tipo_pago3);

					if (!($verificar_forma_pago->num_rows>0)) {

						        $titulo="Tipo de pago inválido";

						        $msg="Ingrese in tipo de pago valido";

		        				$val=msg_error($msg,$titulo);

		        				echo $val;

					     		exit();

					}
						        $titulo="Error";

						        $msg="Referencia N°3 no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

		        				$val=msg_error($msg,$titulo);
					if ($tipo_pago3!=2) {

						        $titulo="Error";

						        $msg="Referencia N°3 no válida, solo deben ser numeros, <br> debe tener 13 dijitos";

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

		    if ($tipo_pago3==3) {

		         if (strlen($referencia3)!=13) {
		            
		           echo $val;

		        exit();     
		        }

		        if ($referencia3<100000000000) {
		         echo $val;

		        exit();       
		        }   
		    }

		        if ($tipo_pago3==1) {

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

echo$referencia3;
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

			$query_carrito=total_carrito($cliente);

			$query_carrito1=total_carrito($cliente);

			while($res_carrito=mysqli_fetch_assoc($query_carrito)){

			$totalt+=$res_carrito['pre_an']* $res_carrito['can_car'];

			}
$iva=obtener_iva();
$iva_total=$totalt*$iva/100;
			$total=round($totalt+$iva_total, 2);
			$total_neto=round($totalt,2);

// round(cantidad, 2 deciamles);

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


	if (isset($_POST['tipo_pago']) and isset($_POST['tipo_pago2'])) {
	

		if ($tipo_pago==2 and $tipo_pago2==2) {

			    echo $val;

    			exit();
			
		}
	}
	if (isset($_POST['tipo_pago2']) and isset($_POST['tipo_pago3'])) {
	

		if ($tipo_pag2==2 and $tipo_pago3==2) {

			    echo $val;

    			exit();
			
		}
	}
		if (isset($_POST['tipo_pago']) and isset($_POST['tipo_pago3'])) {
	

		if ($tipo_pag==2 and $tipo_pago3==2) {

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

    $msg="No puede usar la forma de pago \"Efectivo\"  mas de una";

    $val=msg_interrogante($msg,$titulo);	

		if ($tipo_pago==2 and $tipo_pago2==2) {

			    echo $val;

    			exit();		
		}
		if ($tipo_pago==2 and $tipo_pago3==2) {

			    echo $val;

    			exit();			
		}
		if ($tipo_pago2== 2 and $tipo_pago3==2) {

			    echo $val;

    			exit();			
		}

}

$cantidad_total=round($total , 2);

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
////////////////////////////////////////////////////////////////////





			if (!($query_carrito->num_rows>0)) {
	$titulo="carrito vacio";

	$msg="El carrito se encuentra vacio";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

    exit();
			}

				
				$crear_factura=crear_factura($cliente,$total_neto);

							if ($crear_factura == false) {
							$titulo="Error";

							$msg="Error al realizar la venta";

						    $val=msg_error($msg,$titulo);

						    echo $val;

						    exit();
							}

								 $registrar_pago=pago_fac($referencia,$cantidad_pagar1,$tipo_pago);

								 if ($registrar_pago==false) {
										$titulo="Error";

				       	 				$msg="Problemas al registrar pago2";

        								$val=msg_error($msg,$titulo);

        								echo $val;

        								exit();
								 }

							if ($cantidad_formas_pago>1) {

								 $registrar_pago=pago_fac($referencia2,$cantidad_pagar2,$tipo_pago2);

								 if ($registrar_pago==false) {
										$titulo="Error";

				       	 				$msg="Problemas al registrar pago2";

        								$val=msg_error($msg,$titulo);

        								echo $val;

        								exit();
								 }
								
							}
							if ($cantidad_formas_pago>2) {

								 $registrar_pago=pago_fac($referencia3,$cantidad_pagar3,$tipo_pago3);

								 if ($registrar_pago==false) {
										$titulo="Error";

				       	 				$msg="Problemas al registrar pago3";

        								$val=msg_error($msg,$titulo);

        								echo $val;

        								exit();
								 }
								
							}



										$titulo="correcto";

				       	 				$msg="La factura se ha creado con exito, El codigo de la factura es:".$_SESSION['id_fac'].". <br> Sera enviado a consulta de factura en 14sg";

        								$val=msg_positivo($msg,$titulo);

        								echo $val;

										$i=0;

										$detalles_completos = true;

										while($res_car=mysqli_fetch_assoc($query_carrito1)){

										$i++;

										$can_an=$res_car['can_car'];

										$id_fac=$_SESSION['id_fac'];

										$id_an=$res_car['id_an'];

										$precio=$res_car['pre_an'];

										$crear_detalles_fac=crear_det_fac($id_an,$can_an,$precio);

										if ($crear_detalles_fac == false) {

											$detalles_completos = false;

										}



								}
									if ($detalles_completos == false) {

										$titulo="Error";

				       	 				$msg="Error al crear los detalles de la factura";

        								$val=msg_error($msg,$titulo);

        								echo $val;

        								exit();
									}


												$query_ins_temp=$conexion->query("SELECT * FROM insumos_temp");

												$gatos_creados=true;

												if (!($query_ins_temp->num_rows>0)) {

																$titulo="Error";

										       	 				$msg="Error al los gatos de la factura, no hay insumos temporales";

						        								$val=msg_error($msg,$titulo);

						        								echo $val;

						        								exit();	
												}

												while ($filas_temp=mysqli_fetch_assoc($query_ins_temp)) {

														  $id_temp=$filas_temp['id_ins_temp'];

														  $id_in=$filas_temp['id_ins_id'];

														  $query_insumos=verificar_insumo($id_in);

														  $q_ins=mysqli_fetch_assoc($query_insumos);

														  $cantidad_gas_temp=$filas_temp['can_ins_temp'];

														  $cantidad_actual=$q_ins['cantidad_in'];

														  $can_in_gas1=$cantidad_actual-$cantidad_gas_temp;

														  $can_in_gas=$can_in_gas1;

														  if ($can_in_gas<0) {

														  	$can_in_gas=0;
														  	
														  }


														$query_gastos=crear_gastos($id_in,$can_in_gas);

														if ($query_gastos == false) {

															$gatos_creados=false;
														}

												}

													if ($gatos_creados == false) {

																$titulo="Error";

										       	 				$msg="Error al crear los detalles de la factura";

						        								$val=msg_error($msg,$titulo);

						        								echo $val;

						        								exit();
														}
												 
												limpiar_todo();

												$_SESSION['cliente']=null;

												echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_factura')},15000);</script>";

												  exit();
										 


cerra_seccion();
exit();

 ?>