<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=consulta_insumos"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php

require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');

nivel_maximo();
if (!isset($_POST['editar_insumos'])) {
 echo "<script>verificar();cerrar_ventana();</script>";
   exit(); 
}
if (empty(trim($_POST['editar_insumos']))) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit(); 
}
if (!filter_var($_POST['editar_insumos'],FILTER_VALIDATE_INT)) {
 echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}
if (!isset($_POST['editar_insumos'])) {
 echo "<script>verificar();cerrar_ventana();</script>";
 exit(); 
}
if (empty(trim($_POST['editar_insumos']))) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
$q=$conexion->real_escape_string($_POST['editar_insumos']);
$verificar_insumo=verificar_insumo($q);
if ($verificar_insumo!=true) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
if (!($verificar_insumo->num_rows>0)) {
 echo "<script>verificar();cerrar_ventana();</script>";
  exit();
}
$res=mysqli_fetch_assoc($verificar_insumo);
$_SESSION['editar_insumo']=$q;

$stockmax1=explode('.', $res['stockmax']);
$stockmax=$res['stockmax'];
$stockmin1=explode('.', $res['stockmin']);
$stockmin=$res['stockmin'];
if ($res['unidad_medicion']==2) {
  


      if(count($stockmax1)>1){

        if (strlen($stockmax1[1])==1) {
         $stockmax.="0";
        }
      }
      if (count($stockmax1)==1) {
        $stockmax.="00";
      }


      if(count($stockmin1)>1){

        if (strlen($stockmin1[1])==1) {
          $stockmin.="0";
        }
      }
      if (count($stockmin1)==1) {
        $stockmin.="00";
      }

}
 ?>

<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>

<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/javascript" src="js/actualizar/editar_insumos.js"></script>

<div class='texto-principal margen-interno fondo_ventana letra_small listado_t'>
 <form style="padding-left: 50px;padding-right: 50px;" name="f_in" id="f_in">

      <h4 class="form-h4n">Editar insumo</h4>

      <label for="cod_in">
 	      código <br>
       <input type="text"  maxlength="6" minlength="6"  name="cod_in" id="cod_in"  class="controls_cortos"
                            autocomplete="off"  value='<?php echo $res['cod_in']; ?>' onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
        <br>
      </label>

      <label for="nom_in">
        nombre <br>
        <input class="controls_cortos" type="text" required name="nom_in" value='<?php echo $res['nom_in']; ?>' id="nom_in">
        <br>
      </label>
                    <label for="tipo_in">

                       <p>tipo</p>   

                        <select class="controls_cortos" id="tipo_in" name="tipo_in">
                            <option value="">Seleccione un tipo</option>
                            <option value="1" <?php if($res['tipo_in']=='1'){ echo"selected='selected'";} ?> >Química sanguínea</option>
                            <option value="2" <?php if($res['tipo_in']=='2'){ echo"selected='selected'";} ?> >Hematología</option>
                            <option value="3" <?php if($res['tipo_in']=='3'){ echo"selected='selected'";} ?> >Serología</option>
                            <option value="4" <?php if($res['tipo_in']=='4'){ echo"selected='selected'";} ?> >orina y heces</option>
                            <option value="5" <?php if($res['tipo_in']=='5'){ echo"selected='selected'";} ?> >mixtos</option>
                        </select>
                        
                    </label>

      <label for="unidad">

          <p> Unidad de medición</p>

          <select class="controls_cortos" name="unidad" id="unidad" onchange="decimales_editar()">

              <option value="">Seleccione la unidad</option>

              <option value="1" <?php if ($res['unidad_medicion'] == 1) {echo"selected='selected'";} ?>  >unidad</option>

              <option value="2" <?php if ($res['unidad_medicion'] == 2) {echo"selected='selected'";} ?> >mililitros</option>
                           
          </select>   
                       
      </label>

      <label for="stockmax">
        stock max <br>
    
              <input type="text" minlength="1" maxlength="15" name="stockmax" id="stockmax"  value='<?php echo $stockmax; ?>' class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
        <br>
      </label>

      <label for="stockmin">
        stock min <br>
                    <input type="text"minlength="1" maxlength="15" name="stockmin" id="stockmin"  value='<?php echo  $stockmin; ?>' class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
        <br>
      </label>
      <br>
      <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" name="enviar" id="Enviar" value="enviar" onclick="actualizar_insumos()">
      <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">
      <div id="aler"></div>
      <p id="demo"></p>

 </form>
 </div>

<script type="text/javascript" src="js/actualizar/editar_in_deciamles.js"></script>