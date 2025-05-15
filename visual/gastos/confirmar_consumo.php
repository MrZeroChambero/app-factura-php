<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once("../../conexion/conexion.php");
require_once("../../funciones_generales.php");
nivel_medio();
if (isset($_SESSION['gasto'])) {
	$_SESSION['gasto']=null;
}
if (empty($_SESSION['gasto'])) {
	$_SESSION['gasto']=null;
}

$q=$_POST['id_in'];

$_SESSION['gasto']=$q;

$query=verificar_gastos_factura_activa($q);

if (!($query->num_rows>0)) {

    $titulo="Error";

    $msg="Verifique los datos";

    $val=msg_interrogante($msg,$titulo);

    echo $val;

	echo "<script>cerrar_ventana2();</script>";

	exit();

}

?>
<section class="fondo_ventana letra_small listado_t" >	
	<section class="lista small listado">
<table>

	<thead>
		<tr>
			<th style="min-width: 35px;"><p >codigo</p></th>
			<th style="min-width: 300px;"><p >Nombre</p> </th>
			<th style="min-width: 35px;"><p >cantidad <br> gastado</p></th>
			<th style="min-width: 35px;"><p >cantidad <br> actual</p></th>
			<th style="min-width: 35px;"></th>
		</tr>
	</thead>

			<tbody class="letra_small_negras">		
<?php
while($filas=mysqli_fetch_assoc($query)){

?>
			<tr>
				<td ><p ><?php  echo $filas['id_in']; ?></p></td>
				<td ><p ><?php  echo $filas['nom_in']; ?></p></td>
				<td ><p ><?php  echo $filas['can_ins_gasto']; ?></p></td>
				<td ><p ><?php  echo $filas['cantidad_in']?></p></td>
				<td ><p ><input class='pushy__btn pushy__btn--md pushy__btn--green' type="button" value="Editar" onclick="verificar_datos(<?php  echo $filas['id_gastos']; ?>)"></p></td>
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

