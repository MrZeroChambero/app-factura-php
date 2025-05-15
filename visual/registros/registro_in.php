<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=registro_insumo"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
parte_arriba();
?>
<script type="text/JavaScript" src="js/fw/jquery.min.js"></script>

<script type="text/javascript" src="js/fw/jquery.mask.js"></script>

<script type="text/javascript" src="js/fw/validate1.9.js"></script>

<script type="text/javascript" src="js/fw/traduccion.js"></script>

<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>


<script type="text/javascript" src="js/Registrar/guar_in.js"></script>  
 
            <div class='texto-principal margen-interno' style="height: 95vh;">


                <form class="form-registro" name="reg_in"  id="reg_in" method="POST">

                    <h4 class="form-h4n">Registro de insumos</h4>

                    <label for="cod_in">

                       <p>código</p>

                           <input type="text" minlength="6" maxlength="6"  name="cod_in" id="cod_in"  class="controls"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />

                    </label>

                    <label for="nom_in">

                       <p>nombre</p>   

                        <input class="controls" type="text" autocomplete="off" id="nom_in" name="nom_in">
                        
                    </label>

                    <label for="tipo_in">

                       <p>tipo</p>   

                        <select class="controls" id="tipo_in" name="tipo_in">
                            <option value="">Seleccione un tipo</option>
                            <option value="1">Química sanguínea</option>
                            <option value="2">Hematología</option>
                            <option value="3">Serología</option>
                            <option value="4">orina y heces</option>
                            <option value="5">mixtos</option>
                        </select>
                        
                    </label>

                    <label for="unidad">

                       <p> Unidad de medición</p>

                       <select class="controls" name="unidad" id="unidad" onchange="decimales()">

                            <option value="">Seleccione la unidad</option>

                            <option value="1">unidad</option>

                            <option value="2">mililitros</option>
                           
                       </select>   
                       
                   </label>

                    <label for="stock_max">

                       <p>stock máximo</p> 
               
                           <input type="text" minlength="1" maxlength="15" name="stock_max" id="stock_max"  class="controls"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                       
                    </label>

                    <label for="stock_min">

                       <p>stock minimo</p>
 
                            <input type="text" minlength="1" maxlength="15" name="stock_min" id="stock_min"  class="controls"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                        
                    </label>
                        
                    <div id="aler"></div>    
                           
                    <input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" id="enviar"  name="enviar" value="enviar">

                  </form>

          

            </div>
<?php parte_abajo(); ?>