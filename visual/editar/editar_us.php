<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_usuario"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');

nivel_maximo();
if (!isset($_POST['editar_usuario'])) {
echo "<script>cerrar_ventana();</script>";
 exit(); 
}

if (empty(trim($_POST['editar_usuario']))) {
echo "<script>cerrar_ventana();</script>";
  exit();
}
if (!filter_var($_POST['editar_usuario'],FILTER_VALIDATE_INT)) {
echo "<script>cerrar_ventana();</script>";
 exit(); 
}
$q=$conexion->real_escape_string($_POST['editar_usuario']);
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

 $_SESSION['editar_usuario']= $_POST['editar_usuario'];  


 ?>
 <div class='texto-principal margen-interno fondo_ventana letra_small listado_t' style="height: 100%;">
 <form method="POST"  name="f_us" id="f_us">

      <h4 class="form-h4n">Editar usuario</h4>


      <label for="nom_us">
        Nombre de usuario<br>
        <input class="controls_cortos" type="text" autocomplete="off"  id="nom_us"value='<?php echo  $res['nom_us']; ?>' name="nom_us">
        <br>
      </label>

      <label for="apellido_us">
        apellido de usuario<br>
        <input class="controls_cortos" type="text" autocomplete="off" id="apellido_us" value='<?php echo  $res['apellido_us']; ?>' name="apellido_us" >
        <br>
      </label>
      
      <label for="nick_us">
        usuario<br>
        <input class="controls_cortos" type="text" autocomplete="off"  id="nick_us" value='<?php echo  $res['nick_us']; ?>'  name="nick_us" <?php if($res['nivel_us']==1){ echo"disabled";} ?>>
        <br>
      </label>

      <label for="cedula_us">
       <p>cedula</p>
        <input type="text" maxlength="11" name="cedula_us" id="cedula_us" value='<?php echo  $res['cedula_us']; ?>'  class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="100000"/>
                        </label><label for="tlf_us">
                        <br>
                        <label for="tlf_us">
  <p>numero telefonico</p>
<input type="text" maxlength="11" name="tlf_us" id="tlf_us" value='<?php echo  $res['num_tlf_us']; ?>'  class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1"/>

</label>

      <label for="nivel_us">
         <p>nivel </p>  
          <select class="controls_cortos" id="nivel_us"   name="nivel_us" <?php if ($res['nivel_us'] ==1){ echo"disabled";}?>>
          <option value="" >seleccione</option>
          <?php
        if ($res['nivel_us'] ==1) {

           ?>
           <option value="1" selected="selected" >  Administrdor</option>
         <?php
         }
          ?>
           <option value="2" <?php if($res['nivel_us']=='2'){ echo"selected='selected'";} ?>>Gerente</option>
           <option value="3"  <?php if($res['nivel_us']=='3'){ echo"selected='selected'";} ?>>trabajad@r</option>
           
        </select>
        <br>
      </label>
      <div id="aler" name="aler"></div>

      <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button"  id="enviar" name="enviar" value="Enviar" onclick="verificar_datos()">
      <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">
      <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>
      <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>
      <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>
      <script type="text/javascript" src="js/fw/traduccion.js"></script>
      <script type="text/javascript" src="js/actualizar/editar_us.js"></script>
 </form>
 </div>
