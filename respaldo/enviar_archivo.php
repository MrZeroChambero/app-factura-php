<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
nivel_maximo();
parte_arriba();
 ?>
              <div class='texto-principal margen-interno margen' style="height: 95vh;">

                  <section    class="principal upper maxw">

                  	<div id="js">
                  		<script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>
						<script type="text/JavaScript" src="js/fw/sweetalerta.js"></script>
						<script type="text/JavaScript" src="js/fw/validate1.9.js"></script>
						<script type="text/javascript" src="js/fw/traduccion.js"></script>
						<script type="text/javascript" src="js/consulta/respaldo.js"></script>
                  	</div>

                     <label >

                          <p class="form-h4">Menu de respaldos</p>

                     </label>

                     <label>

                           <section>

                                 <table class="tablas margen" >

                                       <thead>

                                             <tr>


                                                <th style="padding:0px;">

      

 													<p class="form-h4n">Crear respaldo</p>

                                            


                                                </th>
                                                <th style="padding:0px;">

                                                   <label class="form-h4n"> 

                                                      <h4 class="form-h4n" style="font-size:16px;">Restauracción</h4>

                                                   </label>


                                                </th>


                                                <th style="padding:0px;">
                                                   <label class="form-h4n" for="fecha_i"> 

                                                      <h4 class="form-h4n" style="font-size:16px;">fecha <br> inicial</h4>

                                                   </label>

                                                   </th>

                                                   <th style="padding:0px;">

                                                      <label class="form-h4n" for="fecha_f"> 

                                                      <h4 class="form-h4n" style="font-size:16px;">fecha <br> Final</h4>

                                                      </label>

                                                   </th>
                                             </tr>

                                       </thead>

                                          <tbody>

                                                <tr>

                                                   <td >
<button type="button" class="oculto"> </button>
<button type="button" class="pushy__btn pushy__btn2--md2 pushy__btn2--green2" onclick="crear_respaldo()"> Crear respaldo</button>



                                                   </td>

                                                   <td style="min-width: 400px;">
                                                   	<form  id="formulario" name="formulario" method="post" enctype="multipart/form-data">





    <input type="file" name="archivo" id="archivo"  accept=".sql" class="controls_cortos" style="font-family: bold; color: black;" placeholder="Sube un archivo">

<br>
    <input type="button" value="Guardar respaldo"  class="pushy__btn pushy__btn--md pushy__btn2--blue" style="background-color: purple; font-family: bold;" onclick="validar()">



</form>

                                                         

                                                   </td>



                                                   <td>


<input class="controls" style="width: 100px;" type="date" name="fecha_i" id="fecha_i">
                                                   </td>

                                                   <td>

                                                         <input class="controls" style="width: 100px;" type="date" name="fecha_f" id="fecha_f">

                                                   </td>

                                                </tr>

                                       </tbody>

                                 </table> 

                           </section>

                     </label>

                     <label>

                  <input type="button" class='pushy__btn pushy__btn--md pushy__btn--blue' onclick="consulta_vacio()" value="Ver todos">

            

                  <button class='pushy__btn pushy__btn--md pushy__btn--blue' onclick="consulta()">Buscar</button>

<button class='pushy__btn pushy__btn--md pushy__btn--green' style="background-color: purple; font-family: bold; font-size: 14px;" onclick="restaurar_zero()">Restaurar por<br>defecto</button>

                     </label>
                  <div id="datos" class="dope" style="min-height: 30vh; max-height: 45vh;"></div>

                  </section>

<div id="aler"></div>
</div>


	<?php parte_abajo(); ?>