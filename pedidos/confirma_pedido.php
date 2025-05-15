<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=pedidos"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
/*require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');*/
require_once('../conexion/conexion.php');
require_once('../funciones_generales.php');
nivel_medio();
if (isset($_SESSION['pedidos'])) {
	$_SESSION['pedidos']=null;
}
if (empty($_SESSION['pedidos'])) {
	$_SESSION['pedidos']=null;
}
$q=$_POST['id_in'];
$_SESSION['pedidos']=$q;
$query=consultar_pedidos_compra($q);
if (!($query->num_rows>0)) {
echo "<script>cerrar_ventana2();</script>";
	exit();
}
/*if ($filas1['estado_compra'] == 0) {
echo "<script>cerrar_ventana2();</script>";
	exit();
}*/
?>
<section class="fondo_ventana letra_small listado_t" >	
		<section  class="lista small listado" style="max-height: 200px;">
	
		<table  class="letra_small" style="scroll-behavior: auto;">
	<thead>
		<tr>
			<th style="min-width: 30px;"><p>codigo</p></th>
			<th style="min-width: 250px;"><p>Nombre</p> </th>
			<th style="min-width: 30px;"><p>cantidad <br> en esperada</p></th>
			<th style="min-width: 30px;">Editar</th>

		</tr>
	</thead>
			<tbody>		
<?php
while($filas=mysqli_fetch_assoc($query)){
if ($filas['estado_compra'] == 0) {
echo "<script>cerrar_ventana2();</script>";
	exit();
}
?>
			<tr class="letra_small_negras lista small listado">
				<td style="min-width: 30px;"><p ><?php  echo $filas['id_in']; ?></p></td>
				<td style="min-width: 250px;"><p ><?php  echo $filas['nom_in']; ?></p></td>
				<td style="min-width: 30px;"><p ><?php  echo $filas['cantidad_pe']; ?></p></td>
				<td style="min-width: 30px;"><p ><input class='pushy__btn pushy__btn--md pushy__btn--green' type="button" value="Editar" onclick="verificar_datos(<?php  echo $filas['id_pedidos']; ?>)"></p></td>
			</tr>
<?php 
}
?>
		</tbody>

</table>	

</section>
<input class='pushy__btn pushy__btn--md pushy__btn--blue' type="button" value="volver" onclick="cerrar_ventana2()">
<input class='pushy__btn pushy__btn--md pushy__btn--blue' type="button" value="Confirmar datos" onclick="confirmar_datos(<?php  echo $q; ?>)">

</section>