
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
/*        $titulo="Sin resultado";

        $msg="Ah ocurrido un error, si el problema presiste recargue la paguina";

        $val=msg_error($msg,$titulo);*/

if(!isset($_SESSION['proveedor_insumo'])) {
	r_consultar_proveedor();
	exit();	
}
if(empty(trim($_SESSION['proveedor_insumo']))) {
	r_consultar_proveedor();
	exit();
}
if(!filter_var($_SESSION['proveedor_insumo'],FILTER_VALIDATE_INT)) {
	r_consultar_proveedor();
	exit();			
}	
parte_arriba();
?>


<div class="margen" style="height: 95vh;">


<div class="fila">
 

    <div class="col"style="width: 100vw;">



	<section class="principal upper maxw">

			<h4 class="form-h4">Proveedor elegido</h4>

		<label >

				<section>
				<?php
				$q=$conexion->real_escape_string($_SESSION['proveedor_insumo']);
				$salida_cli="";
				$query_cliente=verificar_proveedor($q);


				if ($query_cliente->num_rows > 0 ){
					$salida_cli .= "
					
					<link rel='stylesheet' href='/facturacion/estiloT.css'>
					<table class='tablas'>
						<thead>
							<tr>
								<th>RIF proveedor</th>
								<th>Nombre/Razon social</th>";
								
								$salida_cli .="<th></th>";
							
							$salida_cli .="</tr>
						</thead>
						<tbody>";
					while ($filas = mysqli_fetch_assoc($query_cliente)) {


$tipo="j";
if ($filas['tipo_pro']==1) {
	$tipo="V";
}
if ($filas['tipo_pro']==2) {
	$tipo="J";
}
if ($filas['tipo_pro']==3) {
	$tipo="E";
}
if ($filas['tipo_pro']==4) {
	$tipo="G";
}
if ($filas['tipo_pro']==5) {
	$tipo="P";
}

						$salida_cli .= "
									<tr>
										<td>".$tipo."-".$filas['rif_pro']."-".$filas['rif_2']."</td>
										<td style=' width:400px; max-width: 100%;'><p style='min-width: 100%;  width:300px;' >".$filas['nom_pro']."</p></td>";
				$salida_cli .="<td>
				<a class='pushy__btn pushy__btn--md pushy__btn--blue' href='index.php?pagina=consulta_proveedor'>Volver</a>
				</td>
				</tr>";
					$salida_cli .= "</tbody></table>";
					}
				} else {
					$salida_cli .= "<h4 class='form-h4' >no se encuentran datos</h4>";
				}
				echo $salida_cli;
				?>
				</section>

		</label>

	</section>


    </div>

  </div>

  	<div class="fila">

    	<div class="col" style="width: 100vw;">

<div class='texto-principal margen-interno'>

	<section class="principal upper maxw">

	<h4 class="form-h4">Elija los insumos</h4>
	<br>

		<label for="buscar">

			<input class="controls_cortos" type="text" name="buscar" id="buscar">

			<div class="form1_2">

				<div class="dope" id="Insumos_asignar"></div>

			</div>

		</label>

	</section>
	
</div>

		</div>
</div>

	

  <div class="fila">

    <div class="col" style="width: 100vw;">



	<section class="principal upper maxw">

	<h4 class="form-h4">Insumos asignados</h4>
	<br>

		<label for="buscar">

			<input class="controls_cortos" type="text" name="buscar_asignados" id="buscar_asignados">

			<div class="form1_2">

				<div class="dope" id="Insumos_asignados" name="Insumos_asignados"></div>

			</div>

		</label>

	</section>
	

	
    	
    </div>



</div>

</div>



<div id="aler1" name="aler1" ></div>

<div id="aler" name="aler" ></div>

   <div id="js">

<script type="text/javascript" src="js/fw/tildes.js"></script>

<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>

<script type="text/javascript" src="js/mercancia/mercancia.js"></script>

<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script>buscar_insumo();</script>
   </div>
<?php parte_abajo(); ?>
