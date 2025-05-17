<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');

verificar_nivel();
parte_arriba();
 ?>

           <div class='texto-principal margen-interno margen' style="height: 95vh;">

                <form class="form-registro" name="cambio_clave" id="cambio_clave" method="POST">

    <h4 class="form-h4n">Cambiar clave</h4>

      <label for="pass">

        <p>Ingrese la clave nueva</p>

        <br>
<p>Solo utilize letras y numeros</p>
<br>
        <input type="password" maxlength="11"  name="pass" id="pass"  class="controls_cortos" autocomplete="off">

        <br>

      </label>

      <label for="pass2">

        <p>Confirmar</p>

         <br> 

        <input type="password" maxlength="11"  name="pass2" id="pass2"  class="controls_cortos" autocomplete="off">

        <br>

      </label>



      <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" id="enviar" name="enviar" value="Enviar" onclick="enviar_info()">



</form>
<div id="aler"></div>

<div id="js">

	  <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

      <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

      <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

      <script type="text/javascript" src="js/fw/traduccion.js"></script>

      <script type="text/javascript" src="js/actualizar/editar_clave_login.js"></script>

</div>

<?php parte_abajo(); ?>
