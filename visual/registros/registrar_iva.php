<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=registro_iva"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>

<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();

$conexion = conectar();

$iva_actual=$conexion->query("SELECT * FROM iva");

if (!$iva_actual->num_rows>0) {
    $iva=0;
}else{

    $filas=mysqli_fetch_assoc($iva_actual);

    $iva=$filas['cantidad_iva'];
}
parte_arriba();
?>


                   <div class='texto-principal margen-interno margen'style="height: 95vh;">

                        <form  class="form-registro" name="reg_iva" id="reg_iva">

                    <h4 class="form-h4n">Registro de Iva</h4>

                        <label for="num_tlf">

                            <p>Porcentaje de iva</p>

                                          <input type="text" maxlength="5" minlength="1" id="cantidad"  name="cantidad" required class="controls"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" value="<?php echo $iva; ?>"/>

                            
                        </label>
                               <br>

                        <input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" id="enviar" name="enviar" value="Enviar" onclick="enviar_datos()">

                    </form>

                </div>
      

    </div>

  </div>
      
</div>

<div id="aler">
    
</div>

<div id="js">

    <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

    <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

    <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

    <script type="text/javascript" src="js/fw/traduccion.js"></script>

    <script type="text/javascript" src="js/fw/jquery.mask.js"></script>

    <script type="text/javascript" src="js/registrar/guardar_iva.js"></script>


      <script type="text/javascript">
    $(document).ready(function($){
    $('#cantidad').mask('##0.00', {reverse: true});
    });

        document.getElementById("cantidad").addEventListener("input", (e) => {

        let value =e.target.value;

        e.target.value = value.replace(/[^0-9., '']/g, "");});

</script>

</div>
<?php parte_abajo(); ?>