<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_clientes"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');


nivel_maximo();
if (!isset($_POST['editar_cliente'])) {
   echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}
if (empty(trim($_POST['editar_cliente']))) {
    echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
if (!filter_var($_POST['editar_cliente'],FILTER_VALIDATE_INT)) {
  echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}
if (!isset($_POST['editar_cliente'])) {
  echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}
if (empty(trim($_POST['editar_cliente']))) {
  echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}

$q=$conexion->real_escape_string($_POST['editar_cliente']);

$verificar_cliente=verificar_cliente($q);

if ($verificar_cliente!=true) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
if (!($verificar_cliente->num_rows>0)) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
$res=mysqli_fetch_assoc($verificar_cliente);
$_SESSION['editar_cliente']=$q;
 ?>
<div class='texto-principal margen-interno fondo_ventana letra_small listado_t'>
  <form name="f_cli" id="f_cli"  style="padding-left: 50px;padding-right: 50px;">

    <div id="js">
            <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>
      <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>
      <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>
      <script type="text/javascript" src="js/fw/traduccion.js"></script>
      <script type="text/javascript" src="js/actualizar/editar_cli.js"></script>
    </div>


      <h4 class="form-h4n">editar cliente</h4>

    <input  type="hidden" name="hiden" id="hiden" value="cliente">

    <label for="nom_cli">
      nombre o razonsocial<br>
      <input class="controls_cortos" type="text" autocomplete="off" id="nom_cli"  value='<?php echo  $res['nom_cli']; ?>' name="nom_cli">
      <br>
    </label> 
    
    <label for="cedula_cli">
      cedula o rif<br>

                           <select class="controls_cortos" id="tipo_cliente" name="tipo_cliente" onchange="verificar_tipo()">
                            <option value="">Identificador</option>
                            <option <?php if($res['tipo_cli']=='6'){ echo"selected='selected'";} ?> value="6">Cedula</option>
                            <option <?php if($res['tipo_cli']=='1'){ echo"selected='selected'";} ?> value="1">V</option>
                            <option <?php if($res['tipo_cli']=='2'){ echo"selected='selected'";} ?> value="2">J</option>
                            <option <?php if($res['tipo_cli']=='3'){ echo"selected='selected'";} ?> value="3">E</option>
                            <option <?php if($res['tipo_cli']=='4'){ echo"selected='selected'";} ?> value="4">G</option>
                            <option <?php if($res['tipo_cli']=='5'){ echo"selected='selected'";} ?> value="5">P</option>
                           </select> 

                           <?php if ($res['tipo_cli']=='6') {echo"<script>verificar_tipo();</script>";} ?>  
    <input type="text" maxlength="8"  id="cedula_cli"  name="cedula_cli"  class="controls_cortos"
                            autocomplete="off" value='<?php echo  $res['cedula_rif']; ?>' onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
      <br>
                            <select class="<?php if($res['tipo_cli']==0){ echo "oculto";}else{ echo "controls_cortos"; } ?>" id="cedula_2" name="cedula_2" <?php if($res['tipo_cli']==0){ echo "disabled";} ?> >
                            <option  value="">Numero final</option>
                            <option <?php if($res['cedula_2']=='0'){ echo"selected='selected'";} ?> value="10">0</option>
                            <option <?php if($res['cedula_2']=='1'){ echo"selected='selected'";} ?> value="1">1</option>
                            <option <?php if($res['cedula_2']=='2'){ echo"selected='selected'";} ?> value="2">2</option>
                            <option <?php if($res['cedula_2']=='3'){ echo"selected='selected'";} ?> value="3">3</option>
                            <option <?php if($res['cedula_2']=='4'){ echo"selected='selected'";} ?> value="4">4</option>
                            <option <?php if($res['cedula_2']=='5'){ echo"selected='selected'";} ?> value="5">5</option>
                            <option <?php if($res['cedula_2']=='6'){ echo"selected='selected'";} ?> value="6">6</option>
                            <option <?php if($res['cedula_2']=='7'){ echo"selected='selected'";} ?> value="7">7</option>
                            <option <?php if($res['cedula_2']=='8'){ echo"selected='selected'";} ?> value="8">8</option>
                            <option <?php if($res['cedula_2']=='9'){ echo"selected='selected'";} ?> value="9">9</option>
                           </select>
    </label>

    <label for="num_tlf">
      numero telefonico<br>
    <input type="text" maxlength="11" minlength="11"  id="num_tlf"  name="num_tlf"  class="controls_cortos"
                            autocomplete="off" value='<?php echo  $res['tlf_num_cli']; ?>' onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
      <br>
    </label>
    <label for="di_cli">
      direccion del cliente<br>
      <input class="controls_cortos" maxlength="40" type="text" autocomplete="off" id="di_cli" value='<?php echo  $res['di_cli']; ?>' name="di_cli">
      <br>
    </label>
    <div id="aler" name="aler"></div>
    <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" id="enviar" name="enviar" value="Editar" onclick="validar_cliente()">
    <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">

  </form>     
</div>