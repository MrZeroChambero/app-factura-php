<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=pedidos"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_medio();
if (!isset($_POST['id_in'])) {
	echo "<script>cerrar_ventana3();</script>";	
	exit();
}
if (empty(trim($_POST['id_in']))) {
	exit();
}
$q=$conexion->real_escape_string($_POST['id_in']);
$query=buscar_pedido($q);
if (!($query->num_rows>0)) {
	echo "<script>cerrar_ventana3();</script>";	
	exit();
}

$filas=mysqli_fetch_assoc($query);
$estado=$filas['estado_pe'];
if ($estado==0) {
		echo "<script>cerrar_ventana3();</script>";	
	exit();
}


if ($filas['unidad_medicion']==2) {
$cantidad=$filas['cantidad_pe'];
$decimales=explode('.', $cantidad);


			if(count($decimales)>1){

				if (strlen($decimales[1])==1) {
					$cantidad.="0";
				}
			

			}
			if (count($decimales)==1) {
				$cantidad.="00";
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
 } else{
 	$cantidad=$filas['cantidad_pe'];
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
 <section class="texto-principal margen-interno fondo_ventana letra_small listado_t" style=" width: 100%; border-radius: 10px; ">	

			
					<form id="editar_pedido" name="editar_pedido">

			<p>codigo</p>

			<p><input  class="controls_cortos" type="" name="" value="<?php  echo $filas['id_in']; ?>" disabled></p>

			<p>Nombre</p>

			<p><input  class="controls_cortos" type="" name="" value="<?php  echo $filas['nom_in']; ?>" disabled></p>

			<p>cantidad recibida</p>

			<p><input type="text" maxlength="11" id="cantidad"  name="cantidad"  class="controls_cortos" value='<?php  echo $cantidad; ?>' autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" /></p>

			<p>cantidad actual</p>

			<p><input  class="controls_cortos" type="" name="" value="<?php  echo $filas['cantidad_in']?>" disabled></p>

			<p>Fecha de recepción</p>

			<p><input class="controls_cortos"	type="date" name="fecha" id="fecha" value="<?php  echo $filas['fecha_pedido']; ?>"></p>

			<p>estado</p>

			<p>
				 <select class="controls_cortos" id="estado"  name="estado">
                            <option value="">seleccione</option>
                            <option value="5" <?php if ($estado==1 || $estado==5){ echo"selected='selected'";} ?>>Recibido</option>
                            <option value="3"  <?php if ($estado==3){ echo"selected='selected'";} ?>>Esperando</option>
                             <option value="4" <?php if ($estado==4){ echo"selected='selected'";} ?>>Cancelado</option>
                             <option value="6" <?php if ($estado==6){ echo"selected='selected'";} ?>>Recibido/incompleto</option>
                        </select>
			</p>
							<p><input class='pushy__btn pushy__btn--md pushy__btn--green' type="button" value="Editar" onclick="validar_datos(<?php  echo $q; ?>)"><input class='pushy__btn pushy__btn--md pushy__btn--blue' type="button" value="Volver" onclick="cerrar_ventana3()"></p>
			</form>

 
</section>

