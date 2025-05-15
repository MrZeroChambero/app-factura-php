<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_medio();
if (!isset($_POST['id_in'])) {

	echo "<script>cerrar_ventana3();</script>";
	exit();
}
if (empty(trim($_POST['id_in']))) {

	echo "<script>cerrar_ventana3();</script>";
	exit();
}
if (!filter_var($_POST['id_in'],FILTER_VALIDATE_INT)) {


	echo "<script>cerrar_ventana3();</script>";
exit();
}
$q=$conexion->real_escape_string($_POST['id_in']);

$query=encontrar_gastos_factura_activa($q);

if (!($query->num_rows>0)) {
	
	echo "<script>cerrar_ventana3();</script>";
	exit();
}

$filas=mysqli_fetch_assoc($query);
?>
<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
<?php
if ($filas['unidad_medicion']==2) {
$cantidad_gasto=$filas['can_ins_gasto'];
$decimales=explode('.', $cantidad_gasto);

$uni="ML";


			if(count($decimales)>1){

				if (strlen($decimales[1])==1) {
					$cantidad_gasto.="0";
				}
			

			}
			if (count($decimales)==1) {
				$cantidad_gasto.="00";
			}

	?>
  <script type="text/javascript">
	$(document).ready(function($){
	$('#cantidad').mask('##0.00', {reverse: true});
	});

		document.getElementById("cantidad").addEventListener("input", (e) => {

		let value =e.target.value;

		e.target.value = value.replace(/[^0-9., '']/g, "");});

</script>
	<?php
}else{
	$uni="UN";
	$cantidad_gasto=$filas['can_ins_gasto'];

 ?>


   <script type="text/javascript">
	$(document).ready(function($){
	$('#cantidad').mask('##000', {reverse: true});
	});

		document.getElementById("cantidad").addEventListener("input", (e) => {

		let value =e.target.value;

		e.target.value = value.replace(/[^0-9., '']/g, "");});

</script>
<?php 
}
?>
 <section class="fondo_ventana" style=" width: 100%; color: black; border-radius: 10px; ">	
 <table class="listado2 tablas">
 	<thead>
		<tr>
			<th><p style="width: ;">codigo</p></th>
			<th><p style="width: ;">Nombre</p> </th>
			<th><p style="width: ;">cantidad <br> gastado</p></th>
			<th><p style="width: ;">cantidad <br> actual</p></th>
			<th><p style="width: ;">Unidad <br> medicion</p></th>
			<th></th>
		</tr>
 	</thead>
 	<tbody>
 		<tr>
				<td ><p ><?php  echo $filas['id_in']; ?></p></td>
				<td ><p ><?php  echo $filas['nom_in']; ?></p></td>
				<td ><p > 
					<form id="editar_gasto" name="editar_gasto">
					<input type="text" maxlength="11" id="cantidad"  name="cantidad"  class="controls_cortos" style="width: 100px;" value='<?php  echo $cantidad_gasto; ?>' autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
					</form>
				</p></td>
				<td style="width:;"><p style="width: ;"><?php  echo $filas['cantidad_in']?></p></td>
				<td ><p ><?php  echo $uni; ?></p></td>
				<td style="width:;"><p style="width: ;"><input class='pushy__btn pushy__btn--md pushy__btn--green' type="button" value="Editar" onclick="validar_datos(<?php  echo $q; ?>)"></p></td>
 		</tr>
 	</tbody>
 </table>
 <input class='pushy__btn pushy__btn--md pushy__btn--blue' type="button" value="Volver" onclick="cerrar_ventana3()">
</section>

