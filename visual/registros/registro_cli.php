<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=registro_cliente"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
verificar_nivel();
parte_arriba();
?>

            
              
            <section class='texto-principal margen-interno' style="height: 95vh;">



                <form class="form-registro" name="reg_cli" id="reg_cli"  method="POST">

                    <h4 class="form-h4n">Registro de Clientes</h4>

                        <label for="nom_cli">

                           <p>nombre o razonsocial</p>

                            <input class="controls_cortos" type="text" autocomplete="off" id="nom_cli"  name="nom_cli">

                        </label>

                        <label for="cedula_cli">

                           <p>cedula o rif</p>
                           <select class="controls_cortos" id="tipo_cliente" name="tipo_cliente" onchange="verificar_numero()">
                            <option value="">Identificador</option>
                            <option value="6">Cedula</option>
                            <option value="1">V</option>
                            <option value="2">J</option>
                            <option value="3">E</option>
                            <option value="4">G</option>
                            <option value="5">P</option>
                           </select>     
                               <input type="text" maxlength="8"id="cedula_cli" name="cedula_cli"  class="controls_cortos"  
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" /> 

                            <select class="oculto" id="cedula_2" name="cedula_2" disabled>
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

                        <label for="num_tlf">

                            <p>numero telefonico</p>

                            <input type="text" maxlength="11" id="num_tlf"  name="num_tlf"  class="controls_cortos"
                            autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" />
                            
                        </label>

                        <label for="di_cli">

                           <p>direccion del cliente</p>

                            <input class="controls_cortos" type="text" autocomplete="off" id="di_cli" name="di_cli">
                            
                        </label>

                        <div id="aler"></div>

                        <input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" id="enviar" name="enviar" value="enviar">

                    </form>

                        <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

                        <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

                        <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

                        <script type="text/javascript" src="js/fw/traduccion.js"></script>

                        <script type="text/javascript" src="js/registrar/guar_cli.js"></script>
               </section>
<?php parte_abajo(); ?>