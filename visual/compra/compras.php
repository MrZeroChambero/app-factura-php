
<?php 
require_once('conexion/conexion.php');
require_once('funciones_generales.php');
nivel_medio();
parte_arriba();
?>

<div class="margen" style="height: 95vh;  overflow-y: scroll;">


<div class="fila">
 

    <div class="col" style="width: 100vw;">

    	<div id="info_proveedor" name="info_proveedor">
    		
    	</div>

    </div>

  </div>

  	<div class="fila">

    	<div class="col" style="width: 100vw;">

    		<div id="consultar_insumos">
    			
    		</div>

		</div>

	</div>

	

  <div class="fila">

    	<div class="col" style="width: 100vw;">


		<div id="lista_compras" name="lista_compras">
			
		</div>

    	
    	</div>

	</div>

</div>


<div id="ventans">

	<section class="modal-container" id="ventana3">

		<section class='modal' id='ventana4'></section>	

	</section>

	<section class="modal-container" id="ventana">

		<section class='modal' id='ventana2'></section>	

	</section>

</div>

<div id="aler1" name="aler1" ></div>

<div id="aler" name="aler" ></div>

   <div id="js">

<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

<script type="text/JavaScript" src="js/fw/traduccion.js"></script>

<script type="text/JavaScript" src="js/fw/tildes.js"></script>

<script type="text/javascript" src="js/proceso1/f_compras_parte1.js"></script>

<script type="text/javascript" src="js/proceso1/f_compras_parte2.js"></script>

<script type="text/JavaScript" src="js/proceso1/ajustar_menu.js"></script>

<!-- <script type="text/JavaScript" src="js/proceso1/insumos_compras.js"></script> -->

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

   </div>
<?php parte_abajo(); ?>