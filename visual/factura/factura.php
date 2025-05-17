<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
parte_arriba();
?>
<div class="margen" style="height: 95vh;  overflow-y: scroll;">
  <div class="fila">

    <div class="col hk"  style="width: 100vw;">

			<div id="info_cliente" class="margen">
					
			</div>

	</div>

  </div>
  <div class="fila">

    <div class="col" style="width: 100vw;" >
    		<div id="lista_analisis">
				
			</div>
				
    </div>

  </div>

  <div class="fila">

    <div class="col" style="width: 100vw;" >
    		<div id="crud_carrito">
				
			</div>
				
    </div>

  </div>
</div>
<div id="ventanas_modales">

	<section class="modal-container" id="ventana3">

		<section class='modal' id='ventana4'></section>	

	</section>

	<section class="modal-container" id="ventana">

		<section class='modal_small' id='ventana2'></section>

	</section>

	<div  id="aler"></div>

</div> 


<div id="js">

	<script type="text/javascript" src="js/fw/tildes.js"></script>

	<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

	<script type="text/javascript" src="js/fw/validate1.9.js"></script>

	<script type="text/javascript" src="js/fw/traduccion.js"></script>

	<script type="text/javascript" src="js/proceso2/f_ventas_parte2.js"></script>

	<script type="text/javascript" src="js/proceso2/f_ventas_parte1.js"></script>

	<script type="text/javascript" src="js/proceso2/ajustar_menu.js"></script>

	<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

</div>
<?php parte_abajo(); ?>

