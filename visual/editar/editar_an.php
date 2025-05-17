<?php 
require_once('../../conexion/conexion.php');
require_once('../../funciones_generales.php');

nivel_maximo();
    $titulo="Error, Verifique los datos";

    $msg="Si ve este mensaje, vez recargue la paguina";

    $val=msg_error($msg,$titulo);

if (!isset($_POST['editar_analisis'])) {

    echo $val;

      echo "<script>verificar();cerrar_ventana();</script>";

    exit();

}
if (empty(trim($_POST['editar_analisis']))) {

    echo $val;

      echo "<script>verificar();cerrar_ventana();</script>";

    exit();

}
if (!filter_var($_POST['editar_analisis'],FILTER_VALIDATE_INT)) {

    echo $val;

  echo "<script>verificar();cerrar_ventana();</script>";

    exit();

}

$q=$conexion->real_escape_string($_POST['editar_analisis']);

$verificar_analisis=verificar_analisis($q);

if ($verificar_analisis!=true) {


    echo $val;

      echo "<script>verificar();cerrar_ventana();</script>";

    exit();

}
if (!($verificar_analisis->num_rows>0)) {
echo " <script>verificar();cerrar_ventana();</script>";
    echo $val;

    exit();

}
$res=mysqli_fetch_assoc($verificar_analisis);

$_SESSION['editar_analisis']=$q;

$pre_an1=explode('.', $res['pre_an']);
$pre_an=$res['pre_an'];
      if(count($pre_an1)>1){

        if (strlen($pre_an1[1])==1) {
          $pre_an.="0";
        }
      }
      if (count($pre_an1)==1) {
        $pre_an.="00";
      }


 ?>
 <script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>
  
<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

<script type="text/JavaScript" src="js/fw/tildes.js"></script>  


      <script type="text/javascript" src="js/actualizar/editar_an.js"></script>

  <div class='texto-principal margen-interno fondo_ventana letra_small listado_t'>

  <form name="f_an" id="f_an" method="POST">

    <h4 class="form-h4n">Editar de Analsis</h4>

      <label for="cod_an">
        Codigo<br>
        <input type="text" maxlength="6" minlength="6" value='<?php echo  $res['cod_an']; ?>' name="cod_an" id="cod_an"  class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
        <br>
      </label>

      <label for="nom_an">
        Nombre <br> 
        <input class="controls_cortos" type="text" autocomplete="off" required name="nom_an" value='<?php echo  $res['nom_an'] ?>' id="nom_an" placeholder="analisis de sida">
        <br>
      </label>

      <label for="des_an">
        Descripcion <br>
        <input class="controls_cortos" type="text" autocomplete="off" required name="des_an" value='<?php echo  $res['des_an'] ?>' id="des_an" placeholder="para pecadores">
        <br>
      </label>

                    <label for="tipo_an">

                       <p>tipo</p>   

                        <select class="controls_cortos" id="tipo_an" name="tipo_an">
                            <option value="">Seleccione un tipo</option>
                            <option value="1" <?php if($res['tipo_an']=='1'){ echo"selected='selected'";} ?> >Química sanguínea</option>
                            <option value="2" <?php if($res['tipo_an']=='2'){ echo"selected='selected'";} ?> >Hematología</option>
                            <option value="3" <?php if($res['tipo_an']=='3'){ echo"selected='selected'";} ?> >Serología</option>
                            <option value="4" <?php if($res['tipo_an']=='4'){ echo"selected='selected'";} ?> >orina y heces</option>
                        </select>
                        
                    </label>

      <label for="pre_an">
        Precio <br>
  

      <input type="text" maxlength="10" name="pre_an" id="pre_an" value='<?php echo  $pre_an; ?>' class="controls_cortos" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />.


      </label>


      
      <input type="hidden" name="id_an" id="id_an" value='<?php echo  $res['id_an'] ?>' >     
      <input type="hidden" name="hiden" id="hiden" value="analisis">
      
      <div id="aler" name="aler"></div>

      <input class="pushy__btn pushy__btn--md pushy__btn--blue" type="button" id="enviar" name="enviar" value="Enviar" onclick="verificar_datos()">
      <input class="pushy__btn2 pushy__btn2--md2 pushy__btn2--blue2" type="button" id="volver" name="volver" value="Volver" onclick="cerrar_ventana()">



                          <script type="text/javascript" src="js/fw/jquery.mask.js"></script>

                    <script type="text/javascript"> 
  $('#pre_an').mask('##0.00', {reverse: true});
  document.getElementById("pre_an").addEventListener("input", (e) => {
  let value = e.target.value;
 e.target.value = value.replace(/[^0-9., '']/g, "");
});

</script>
 </form>

 <!--  -->
 </div>
