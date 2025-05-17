
<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');


if (!isset($_POST['editar'])) {
 echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}
if (empty(trim($_POST['editar']))) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
if (!filter_var($_POST['editar'],FILTER_VALIDATE_INT)) {
 echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}

$q=$conexion->real_escape_string($_POST['editar']);

$verificar_consumo=consultar_consumo_id($q);

if (!($verificar_consumo->num_rows>0)) {

 echo "<script>verificar();cerrar_ventana();</script>";

  exit();
}
$res=mysqli_fetch_assoc($verificar_consumo);
$_SESSION['editar_cliente']=$q;
 ?>
  <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
  
<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/JavaScript" src="js/fw/tildes.js"></script>

      <script type="text/javascript" src="editar_co.js"></script>  

<div class='texto-principal margen-interno fondo_ventana letra_small listado_t'>
  <form name="editar_co" id="editar_co"  style="padding-left: 50px;padding-right: 50px;">

adsda
      <h4 class="form-h4n">editar Consumo</h4>
    <label>
     Servicio codigo<br>
      <input class="controls_cortos" type="text" autocomplete="off"  value='<?php echo  $res['cod_an']; ?>'  disabled="disabled">
      <br>
    </label> 
    
    <label>
      <p>Servicio nombre</p>
        <input class="controls_cortos" type="text" autocomplete="off"  value='<?php echo  $res['nom_an']; ?>'  disabled="disabled">
    </label>

    <label>
      <p>codido de insumo</p>
  <input class="controls_cortos" type="text" autocomplete="off"  value='<?php echo  $res['cod_in']; ?>'  disabled="disabled">
      <br>
    </label>
    <label>
      <p>nombre de insumo</p>
       <input style=" width: 100%;" class="controls_cortos" type="text" autocomplete="off"  value='<?php echo  $res['nom_in']; ?>'  disabled="disabled">
    </label>
    <label>
      <p>cantidad asignada</p>
          <input type="text" maxlength="8"  id="cantidad"  name="cantidad"  class="controls_cortos"
                            autocomplete="off" value='<?php echo  $res['ca_co']; ?>' onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
    </label>
 
    <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" id="enviar" name="enviar" value="Editar" onclick="verificar_datos( <?php echo$q; ?> )">
    <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">
  </form>     
</div>