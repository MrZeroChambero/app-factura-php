<?php 
require_once("f_menu.php");
$conexion = conectar() ;        
	valida();

	$_SESSION['location'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	ubicaciones();

if(isset($_SESSION['analisis_b']) && (!empty(trim($_SESSION['analisis_b']))) ){
$_SESSION['ubicacion']='consulta_consumo2';
$q=$conexion->real_escape_string($_SESSION['analisis_b']);
$tabla='analisis';
$campo1='id_an';
	$query=buscar_igual($tabla,$q,$campo1);
	$com_an =$conexion->query($query);
	if($com_an->num_rows> 0){
 menu0();
		?>
<div class='texto-principal margen-interno'>
<section class="principal upper">
	<h4 class="form-h4">Agregar consumo</h4>
	<br>
	<br>
	<h4 class="form-h4">Analisis elejido</h4>
<label for="eli_an">

	<div id="datos"></div>


</label>
</section>
</div>
<br>
<br>
<div class='texto-principal margen-interno'>
<section class="principal upper">
<input class="controls" type="text" name="b_in" id="b_in">
<div  class="dope" id="insumos"></div>
<input type="hidden" name="valor" id="valor" value="true">
<section class="modal-container" id="ventana">
<section class='modal_small' id='ventana2'></section>	
</section>
<div id="aler"></div>
<script type="text/JavaScript" src="jquery.min.js"></script>
<script type="text/JavaScript" src="validate.js"></script>
<script type="text/JavaScript" src="traduccion.js"></script>
<script type="text/javascript" src="editar_consumo.js"></script>
<script type="text/JavaScript" src="sweetalerta.js"></script>


</div>
</header><!-- /header -->

    </div></body>
</html>
<?php }else{
	$_SESSION['analisis_b']="";
	echo "<script>window.location.replace('consulta_consumo.php');</script>";
}
			if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
			echo "$msg";
			$_SESSION['msg']=null;
			
		}
	}else{
	$_SESSION['ubicacion']='consulta_consumo';
	menu0();
?>
<div class='texto-principal margen-interno'>
	<section class="principal upper">
	<h4 class="form-h4">Elija un analisis</h1>
	<br>
	<br>

		<label for="analisis"> <h4  class="form-h4">Buscar analisis </h4> 
			<input class="controls" type="text" name="analisis" id="analisis">
		<input type="hidden" name="valor" id="valor" value="false">
		
		<div id="datos"  class="dope"name="datos"></div>
		
		</label>
<script type="text/JavaScript" src="jquery.min.js"></script>
<script type="text/javascript" src="consulta_consumo.js"></script>
<script type="text/JavaScript" src="sweetalerta.js"></script>
</section>
</div>
</header><!-- /header -->

    </div></body>
</html>
<?php
	if(isset($_SESSION['msg'])){
			$msg=$_SESSION['msg'];
			echo "$msg";
			$_SESSION['msg']=null;
		}	

}

 ?>
