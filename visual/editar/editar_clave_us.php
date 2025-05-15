<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');

nivel_maximo();
if (!isset($_POST['editar_clave'])) {
echo "<script>cerrar_ventana();</script>";
 exit(); 
}

if (empty(trim($_POST['editar_clave']))) {
echo "<script>cerrar_ventana();</script>";
  exit();
}
if (!filter_var($_POST['editar_clave'],FILTER_VALIDATE_INT)) {
echo "<script>cerrar_ventana();</script>";
 exit(); 
}

$q=$conexion->real_escape_string($_POST['editar_clave']);

$verificar_usuario=verificar_usuario($q);

if ($verificar_usuario!=true) {
echo "<script>cerrar_ventana();</script>";
  exit();
}
if (!($verificar_usuario->num_rows>0)) {
echo "<script>cerrar_ventana();</script>";
  exit();
}
$res=mysqli_fetch_assoc($verificar_usuario);

 $_SESSION['editar_clave']= $_POST['editar_clave'];  


 ?>
 <div class='texto-principal margen-interno fondo_ventana letra_small listado_t' style="height: 100%;">

 <form method="POST"  name="clave" id="clave">

      <h4 class="form-h4n">Editar clave de usuario</h4>

<label for="pass_us">

       <p>Clave</p>

       <br>
        <p>Solo utilize letras y numeros </p>
       <br>

        <input type="password" maxlength="20" name="pass_us" id="pass"  class="controls_cortos" autocomplete="off"  />
        
</label>

<label for="confirmar">

       <p>Confirmar</p>

        <input type="password" maxlength="20" name="pass_us" id="pass2"  class="controls_cortos" autocomplete="off"  />

</label>


        <br>

      </label>

      <div id="aler" name="aler"></div>

      <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button"  id="enviar" name="enviar" value="Enviar">
      
      <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">
      <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

      <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

      <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

      <script type="text/javascript" src="js/fw/traduccion.js"></script>

      <script type="text/javascript" src="js/actualizar/editar_clave_us.js"></script>

 </form>

 </div>
