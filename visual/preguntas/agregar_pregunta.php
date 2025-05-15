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
$verificar_cantidad=consultar_preguntas();

    $titulo="Muchas preguntas";

    $msg="Solo puede tener 60 preguntas";

    $val=msg_interrogante($msg,$titulo);
    $cantidad_preguntas=$verificar_cantidad->num_rows;

if ($cantidad_preguntas>=60) {
    echo $val;
    echo "<script> cerrar_ventana();</script>";

    exit();  
}
?>
<section class="fondo_ventana" style=" width: 100%; color: black; border-radius: 10px; ">			


			<h4 class="form-h4n">Agregar a pregunta</h4> 



<form name="agrega_pregunta" id="agrega_pregunta" method="post">
	
<section style='color: white;'> 

		<h4 class="form-h4n">Pregunta</h4>


	<input type="text" maxlength="30" id="pregunta" name="pregunta"  class="controls_cortos"  required autocomplete="off">

			<p>Solo utilize letras, numeros, espacios y los simbolos ¿?</p>


	<h4 class="form-h4n">Respuesta</h4>

	
	              	
	<input type="password" maxlength="30" id="respuesta" name="respuesta"  class="controls_cortos"  required autocomplete="off">

	<p>Solo utilize letras, numeros y espacios</p>

	<h4 class="form-h4n">Confirmar</h4>

	<input type="password" maxlength="30" id="respuesta2" name="respuesta2"  class="controls_cortos"  required autocomplete="off">
</section>
	
<br>
		<input class="pushy__btn2 pushy__btn2--df2 pushy__btn2--green2" type="button" id="agregar" name="agregar"  value="Agregar" onclick="enviar_pregunta()"/>

		<input class="pushy__btn2 pushy__btn2--df2 pushy__btn2--blue2" type="button"  id="volver" name="volver" value="volver" onclick="cerrar_ventana()">
</form>



</section>
	<script type="text/javascript" src="js/fw/tildes.js"></script>

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/javascript" src="js/fw/validate1.9.js"></script>

	<script type="text/javascript" src="js/fw/traduccion.js"></script>

	<script type="text/javascript" src="js/preguntas/preguntas.js"></script>

	<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>
	
<script type="text/javascript" src="js/preguntas/agregar_pregunta.js"></script>

