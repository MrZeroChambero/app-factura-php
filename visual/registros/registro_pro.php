<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=registro_proveedor"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
parte_arriba();
?>

            <div class='texto-principal margen-interno' style="height: 95vh;">

                <!-- `form de registro insumos -->

                <form class="form-registro" name="reg_pro" id="reg_pro" name="reg_pro"  method="POST">

                    <h4 class="form-h4n">Registro de Proveedor</h4>

                    <label for="nom_pro">

                        <p>nombre o razonsocial</p>

                        <input class="controls_cortos" type="text" autocomplete="off" id="nom_pro" name="nom_pro">
                 
                    </label>

                    <label for="rif_pro">

                        <p>rif del proveedor</p>
                           <select class="controls_cortos" id="tipo_pro" name="tipo_pro" > 
                            <option value="">Tipo de rif</option>
                            <option value="1">V</option>
                            <option value="2">J</option>
                            <option value="3">E</option>
                            <option value="4">G</option>
                            <option value="5">P</option>
                           </select>    
                            <br>

                        <input type="text" maxlength="8"minlength="8" id="rif_pro" name="rif_pro"  class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                        <br>
                            <select class="controls_cortos" id="rif_2" name="rif_2">
                            <option value="">Numero final</option>
                            <option value="10">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                           </select>
                    </label>

                    <label for="num_tlf_pro">

                       <p>numero telefonico</p>

                        <input type="text"  minlength="11" maxlength="11" id="num_tlf_pro" name="num_tlf_pro"  class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
              
                    </label>
                    

                    <label for="dir_pro">

                        <p>dirección del proveedor</p>

                        <input class="controls_cortos" type="text" autocomplete="off"  name="dir_pro" id="dir_pro">
                 
                    </label>

                    <label for="correo_pro">
                        
                        <p>correo electronico</p>

                        <input class="controls_cortos" type="text" autocomplete="off"  name="correo_pro" id="correo_pro">
                      
                    </label>

                    
                    <div id="aler"></div>
                                            
                    <input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" id="enviar" name="enviar" value="enviar">
                    
                </form>
                    <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

                    <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

                    <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

                    <script type="text/javascript" src="js/fw/traduccion.js"></script>

                    <script type="text/javascript" src="js/registrar/guar_pro.js"></script>
                </div>
<?php parte_abajo(); ?>