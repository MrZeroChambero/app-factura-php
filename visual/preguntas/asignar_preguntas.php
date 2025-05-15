<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=preguntas"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();

$usuario=$_SESSION['preguntas'];

$verificar=verificar_usuario_activo($usuario);
if (!($verificar->num_rows>0)) {
	
echo "<script> setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_usuario')},0);</script>";

	exit();
}
$filas=mysqli_fetch_assoc($verificar);
parte_arriba();
?>



<div class="margen" style="height: 95vh;">
  <div class="fila">

    <div class="col hk"   style="width: 100vw;">

			<div id="info_usuario">
<table class="tablas">
	<thead>
		<tr>
			<th>
				<p>Usuario</p>
			</th>
			<th>
				<p>Nombre</p>
			</th>
			<th>
				<p>Apellido</p>
			</th>
			<th>
				<p>Cedula</p>
			</th>
			<th>
				
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>

			<td>
				<p> <?php echo $filas['nick_us']; ?> </p>
				
			</td>

			<td>
			<p> <?php echo $filas['nom_us']; ?> </p>	
			</td>

			<td>
				<p> <?php echo $filas['apellido_us']; ?> </p>
			</td>

			<td>
				<p> <?php echo $filas['cedula_us']; ?> </p>
			</td>
			<td>
			<button class='pushy__btn pushy__btn--md pushy__btn--blue' id="consultas" name="consultas" onclick="volver()">Volver a consulta</button>
			</td>

		</tr>
	</tbody>
</table>
<h4 class="form-h4">Este apartado sirve para agregar preguntas de seguridad a un usuario</h4>
<h4 class="form-h4"> podra agregar un maximo de 60 preguntas</h4>

<br>
<button class='pushy__btn pushy__btn--md pushy__btn--green' id="agregar" name="agregar" onclick="ventana_agregar()">Agregar</button>
<br>
					
			</div>

	</div>

  </div>
  <div class="fila">

    <div class="col"  style="width: 100vw;">

    		<div id="preguntas" class="dope" style="height: 50vh;">
				
			</div>
				
    </div>

  </div>


</div>

<div id="ventanas_modales">

	<section class="modal-container" id="ventana">

		<section class='modal_editar' id='ventana2'></section>

	</section>

	<div  id="aler"></div>

</div> 



<div id="js">

	<script type="text/javascript" src="js/fw/tildes.js"></script>

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/javascript" src="js/fw/validate1.9.js"></script>

	<script type="text/javascript" src="js/fw/traduccion.js"></script>

	<script type="text/javascript" src="js/preguntas/preguntas.js"></script>

	<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

</div>

<?php parte_abajo(); ?>