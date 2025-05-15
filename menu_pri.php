<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
parte_arriba();
if ($_SESSION['nivel_us']==1) {
echo "<script type='text/JavaScript' src='js/fw/sweetalerta.js'></script>
      <script type='text/JavaScript' src='js/fw/tildes.js'></script>";

ver_informes();
limpiar_intentos();
}

?>


      
               <div style=" width: 100%;  height: 100%; justify-content: center;">

                  <h4 class="form-h4" style="font-size: 30px; color: white; margin: 60px; ">Bienvenido al sistema</h4>

               </div>

<?php 
parte_abajo();
 ?>