
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
parte_arriba();
?>

           <div class='texto-principal margen-interno' style="height: 95vh;">

                <form class="form-registro" name="reg_an" id="reg_an" method="POST">

                    <h4 class="form-h4n">Registro de Analisis</h4>

                    <label for="cod_an">

                        <p>codigo</p>

                        <input type="text" minlength="6" maxlength="6" name="cod_an" id="cod_an"  class="controls"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                            
                        
                    </label>

                    <label for="nom_an">

                        <p>nombre</p>

                        <input class="controls" type="text" autocomplete="off" required name="nom_an" id="nom_an" >
                        
                    </label>

                    <label for="des_an">

                        <p>descripcion</p>

                        <input class="controls" type="text" autocomplete="off" required name="des_an" id="des_an">
                        
                    </label>


                    <label for="tipo_an">

                       <p>tipo</p>   

                        <select class="controls" id="tipo_an" name="tipo_an">
                            <option value="">Seleccione un tipo</option>
                            <option value="1">Química sanguínea</option>
                            <option value="2">Hematología</option>
                            <option value="3">Serología</option>
                            <option value="4">orina y heces</option>
                        </select>
                        
                    </label>

                    <label for="pre_an">

                       <p>Precio</p>

                             <input type="text" maxlength="11" name="pre_an" id="pre_an"  class="controls"
                            autocomplete="off" />.
                        
                    </label>
                    
                    <div id="aler" name="aler"></div>
    
                    <input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" id="enviar" name="enviar" value="enviar">
                    
                    </form>

                    <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

                    <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

                    <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

                    <script type="text/javascript" src="js/fw/traduccion.js"></script>

                    <script type="text/javascript" src="js/registrar/guar_an.js"></script>

                    <script type="text/javascript" src="js/fw/jquery.mask.js"></script>

                    <script type="text/javascript"> 
  $('#pre_an').mask('##0.00', {reverse: true});
  document.getElementById("pre_an").addEventListener("input", (e) => {
  let value = e.target.value;
 e.target.value = value.replace(/[^0-9., '']/g, "");
});

</script>
<?php parte_abajo(); ?>

