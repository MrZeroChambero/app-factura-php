<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

nivel_maximo();



  $titulo="Error";

  $msg="Algo salio mal, si este mensaje sigue apareciendo recarge la pagina porfavor";

  $val=msg_error($msg,$titulo);


if (!(isset($_POST['id']))) {

	 echo $val;

	echo "<script>cerrar_ventana();</script>";

	exit();
}
if (empty(trim($_POST['id']))) {

	 echo $val;

	echo "<script>cerrar_ventana();</script>";

	exit();
}

$q=$conexion->real_escape_string($_POST['id']);

$asignado=consultar_consumo_analisis_insumos($q);

$query=verificar_insumo_activo($q);

if (!($query->num_rows>0)){

	echo $val;

	echo "<script>cerrar_ventana();</script>";
	
	exit();
}
$cantidad_asignada=0;
	$cantidad_mostrar=0;

$existe=false;

$filas=mysqli_fetch_assoc($query);
$id="";

$filas1="";
if ($asignado->num_rows>0) {

	

	$filas1=mysqli_fetch_assoc($asignado);

	$existe=true;

	$id=$filas1['id_co'];

	$cantidad_asignada=$filas1['ca_co'];

	$cantidad_mostrar=$filas1['ca_co'];

}

			if ($filas['unidad_medicion']==1) {
				$unidad="Unidad/s";
			}else{
				$unidad="Mililitro/s";



$decimales=explode('.', $cantidad_asignada);


			if(count($decimales)>1){

				if (strlen($decimales[1])==1) {
					$cantidad_asignada.="0";
				}
			

			}
			if (count($decimales)==1) {
				$cantidad_asignada.="00";
			}


			}

	    
	

?>

  <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
  
<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/JavaScript" src="js/fw/tildes.js"></script>

  <script type="text/JavaScript" src="js/proceso3/insumos_consumo.js"></script>

<section class="fondo_ventana" style=" width: 100%; color: black; border-radius: 10px; ">
<div class='texto-principal margen-interno'>
 	
	
	
		
			

		<section class="margen">

			<h4 class="form-h4n">Agregar consumo</h4> 

			<label for="carrito">
	
					<table id="carrito" class="tablas">

					<thead>

						<tr>

							<th>codigo</th>

							<th>Nombre</th>

							<th>U N</th>

							<th>Cantidad <br> asignada</th>

						</tr>

					</thead>

						<tbody>

							<tr>
								<td><?php echo $filas['cod_in'];?></td>

								<td><?php echo $filas['nom_in']?></td>

								<td><?php echo $unidad;?></td>

								<td><?php echo $cantidad_mostrar;?></td>

							</tr>

						</tbody>

					</table>



					<form method="POST" action="" name="agrega_in_co" id="agregar_in_co">

						<p style="color: white;">Cantidad a agregar</p>


						<?php if ($filas['unidad_medicion']==1){ ?>
							
																				<script type="text/javascript"> 

  $('#can_ag_in_co').mask('##000', {reverse: true});

  document.getElementById("can_ag_in_co").addEventListener("input", (e) => {let value = e.target.value;e.target.value = value.replace(/[^0-9, '']/g, "");});</script>

						<input class="controls_cortos" type="number" name="can_ag_in_co" required id="can_ag_in_co" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo $cantidad_asignada;?>">



						<?php } else {?>

							<script type="text/javascript"> 

  $('#can_ag_in_co').mask('##0.00', {reverse: true});

  document.getElementById("can_ag_in_co").addEventListener("input", (e) => {let value = e.target.value;e.target.value = value.replace(/[^0-9., '']/g, "");});</script>

						<input class="controls_cortos" type="text" name="can_ag_in_co" required id="can_ag_in_co"  value="<?php echo $cantidad_asignada;?>">

						<?php } ?>
							<br>
						
						<input class="pushy__btn pushy__btn--md pushy__btn--green" type="button" id="agregar" name="agregar"  value="Agregar" onclick="agregar_consumos(<?php echo $filas['id_in']; ?>)" />

<input class="pushy__btn pushy__btn--md pushy__btn--red" type="button" id="Quitar" name="Quitar"   <?php if ($existe==false){ echo "disabled=''";} ?> value="Quitar" onclick="quitar_consumo(<?php echo $id; ?>)" />

						<button class="pushy__btn pushy__btn--md pushy__btn--blue" onclick="cerrar_ventana()"> Volver</button>

					</form>
			</label>

		</section>

<!-- 		onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"

		onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 110)" -->


		</section>



</div>	

