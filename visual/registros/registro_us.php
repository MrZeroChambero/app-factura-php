<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
parte_arriba();
?>


            <div class='texto-principal margen-interno' style="height: 95vh; ">
                
        <form class="form-registro" method="POST" action="" name="reg_us" id="reg_us">

            <h4 class="form-h4n">Registro de Usuario</h4>

                <label for="nom_us">

                    <p>Nombre de usuario</p>
                    
                    <input class="controls" type="text" autocomplete="off"  id="nom_us" name="nom_us" >

                </label>

                <label for="apellido_us">

                    <p>apellido de usuario</p>

                    <input class="controls" type="text" autocomplete="off" id="apellido_us" name="apellido_us" >

                </label>

                <label for="nick_us">

                    <p>usuario</p>

                    <input class="controls" type="text" autocomplete="off"  id="nick_us" name="nick_us">

                </label>

                <label for="pass_us">

                    <p>clave</p>

                    <input class="controls" type="password" autocomplete="off"  id="pass_us"  name="pass_us" >
         
                </label>

                <label for="cedula_us">
                
                        <p>cedula</p>
                
                        <input type="text" maxlength="8" name="cedula_us" id="cedula_us"   class="controls" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1000000"/>
                                
                </label>

                <label for="tlf_us">
                                
                    <p>numero telefonico</p>

                    <input type="text" maxlength="11" name="tlf_us" id="tlf_us"  class="controls" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1"/>
         
                </label>

                <label for="nick_us">

                    <p>nivel</p> 

                    <select class="controls" id="nivel_us"  name="nivel_us">

                        <option value="">seleccione</option>

                        <option value="2">Gerente</option>

                        <option value="3">trabajad@r</option>

                    </select>

                </label>

                <div id="aler" name="aler"></div>
                                               
                    <input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button"  id="enviar" name="enviar" value="enviar">

        </form>
                                
                <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

                <script type="text/JavaScript" src="js/fw/validate1.9.js"></script>

                <script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>

                <script type="text/javascript" src="js/fw/traduccion.js"></script>

                <script type="text/javascript" src="js/registrar/guar_us.js"></script>    
         
</div>

            

<?php parte_abajo(); ?>
