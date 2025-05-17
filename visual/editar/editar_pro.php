<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');
nivel_maximo();
if (!isset($_POST['editar_proveedor'])) {
 echo "<script>cerrar_ventana();</script>";
 exit(); 
}

if (empty(trim($_POST['editar_proveedor']))) {
 echo "<script>cerrar_ventana();</script>";
  exit();
}
if (!filter_var($_POST['editar_proveedor'],FILTER_VALIDATE_INT)) {
 echo "<script>cerrar_ventana();</script>";
 exit(); 
}
$q=$conexion->real_escape_string($_POST['editar_proveedor']);

$verificar_proveedor=verificar_proveedor($q);

if ($verificar_proveedor!=true) {
 echo "<script>cerrar_ventana();</script>";
 exit(); 
}
if (!($verificar_proveedor->num_rows>0)) {
 echo "<script>cerrar_ventana();</script>";
 exit(); 
}
$res=mysqli_fetch_assoc($verificar_proveedor);
$_SESSION['editar_proveedor']=$q;
 ?>
   <div class='texto-principal margen-interno fondo_ventana letra_small listado_t'>
  <form  name="f_pro" id="f_pro"   method="POST">

    <h4 class="form-h4n">Editar de Proveedor</h4>

      <label for="nom_pro">
        nombre o razon social <br>
        <input class="controls_cortos" type="text" autocomplete="off" id="nom_pro" value='<?php echo  $res['nom_pro'] ?>' name="nom_pro">
        <br>
      </label>

      <label for="rif_pro">
                        <p>rif del proveedor</p>
                           <select class="controls_cortos" id="tipo_pro" name="tipo_pro" > 
                            <option value="">Tipo de rif</option>
                            <option <?php if($res['tipo_pro']=='1'){ echo"selected='selected'";} ?> value="1">V</option>
                            <option <?php if($res['tipo_pro']=='2'){ echo"selected='selected'";} ?> value="2">J</option>
                            <option <?php if($res['tipo_pro']=='3'){ echo"selected='selected'";} ?> value="3">E</option>
                            <option <?php if($res['tipo_pro']=='4'){ echo"selected='selected'";} ?> value="4">G</option>
                            <option <?php if($res['tipo_pro']=='5'){ echo"selected='selected'";} ?> value="5">P</option>
                           </select>    
                            <br>
<input type="text" maxlength="8"id="rif_pro" name="rif_pro" value='<?php echo  $res['rif_pro']; ?>' class="controls_cortos"autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                        <br>
                            <select class="controls_cortos" id="rif_2" name="rif_2">
                            <option value="">Numero final</option>
                            <option <?php if($res['rif_2']=='0'){ echo"selected='selected'";} ?> value="10">0</option>
                            <option <?php if($res['rif_2']=='1'){ echo"selected='selected'";} ?> value="1">1</option>
                            <option <?php if($res['rif_2']=='2'){ echo"selected='selected'";} ?> value="2">2</option>
                            <option <?php if($res['rif_2']=='3'){ echo"selected='selected'";} ?> value="3">3</option>
                            <option <?php if($res['rif_2']=='4'){ echo"selected='selected'";} ?> value="4">4</option>
                            <option <?php if($res['rif_2']=='5'){ echo"selected='selected'";} ?> value="5">5</option>
                            <option <?php if($res['rif_2']=='6'){ echo"selected='selected'";} ?> value="6">6</option>
                            <option <?php if($res['rif_2']=='7'){ echo"selected='selected'";} ?> value="7">7</option>
                            <option <?php if($res['rif_2']=='8'){ echo"selected='selected'";} ?> value="8">8</option>
                            <option <?php if($res['rif_2']=='9'){ echo"selected='selected'";} ?> value="9">9</option>
                           </select>
                    </label>

                    <label for="num_tlf_pro">
                       <p>numero telefonico</p>

  <input type="text"  minlength="11" maxlength="11" id="num_tlf_pro" name="num_tlf_pro" value='<?php echo  $res['tlf_num_pro']; ?>' class="controls_cortos" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                        <br>
                    </label>


      <label for="dir_pro">
        direccion del proveedor<br>
        <input class="controls_cortos" type="text" autocomplete="off"  name="dir_pro" id="dir_pro" value='<?php echo  $res['dir_pro'] ?>'>
        <br>
      </label>

      <label for="correo_pro">
        correo electronico <br>
        <input class="controls_cortos" type="text" autocomplete="off"  name="correo_pro"  value='<?php echo  $res['correo_pro'] ?>'id="correo_pro" >
        <br>
      </label>

     

      <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" id="enviar" name="enviar" value="Enviar" onclick="verificar_datos()">
      <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">

      <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>
      <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>
      <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>
      <script type="text/javascript" src="js/fw/traduccion.js"></script>
      <script type="text/javascript" src="js/actualizar/editar_pro.js"></script>

  </form>
 </div>
 