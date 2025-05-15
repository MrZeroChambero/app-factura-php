<script>var url=window.location.href; var dir="http://localhost/facturacion/index.php?pagina=auditoria"; if(url!=dir){setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0); /*alert("url"+url+"dir"+dir);*/}</script>
<?php 
if (!isset($_SESSION['autenticado'])){
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/conexion/conexion.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/funciones_generales.php');
}
nivel_maximo();
parte_arriba();
 ?>
<div id="js">
                     <script type="text/JavaScript" src="js/fw/jquery-3.6.0.min.js"></script>

                  <script type="text/javascript" src="js/consulta/b_au.js"></script>
</div>

               <div class='texto-principal margen-interno margen' style="height: 95vh;">

                  <section    class="principal upper maxw">

                     <label >

                           <h4 class="form-h4">Auditorias Realizadas</h4>

                     </label>

                     <label>

                           <section>

                                 <table class="tablas">

                                       <thead>

                                             <tr>


                                                <th style="padding:0px;">

                                                   <label class="form-h4n"> 

                                                      <h4 class="form-h4n" style="font-size:16px;">Usuario</h4>

                                                   </label>


                                                </th>
                                                <th style="padding:0px;">

                                                   <label class="form-h4n"> 

                                                      <h4 class="form-h4n" style="font-size:16px;">Tipo de <br> registro</h4>

                                                   </label>


                                                </th>

                                                 <th style="padding:0px;">

                                                   <label class="form-h4n"> 

                                                      <h4 class="form-h4n" style="font-size:16px;">Acción</h4>

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

                                                   <td>

                                                         <select class="controls"  style="width: 100px;"name="usuario" id="usuario">

                                                         <option value="">Seleccione un usuario</option>
                                                            <?php 
                                                            $query=consultar_usuario_auditoria();

                                                            if ($query->num_rows>0) {
                                                               while($filas=mysqli_fetch_assoc($query)){
                                                               ?>

                                                               <option value="<?php echo $filas['id_us']; ?>"><?php echo $filas['nick_us']; ?></option>
                                                               <?php
                                                               }
                                                            }

                                                             ?>
                                                         </select>
                                                      
                                                   </td>

                                                   <td>
                                                      
                                                   <select class="controls " style="width: 100px;" name="registro" id="registro" onchange="cambiar_select()" >

                                                      <option value="">Seleccione un tipo de registro</option>

                                                      <option value="seccion">Sección</option>

                                                      <option value="cliente">Clientes</option>

                                                      <option value="usuario">usuario</option>

                                                      <option value="proveedor">Proveedor</option>

                                                      <option value="análisis">Análisis</option>

                                                      <option value="insumos">Insumos</option>

                                                      <option value="factura">Factura</option>

                                                      <option value="COMPRA">Compras</option>

                                                      <option value="Pedidos">Pedidos</option>

                                                      <option value="Iva">Iva</option>
                                                        

                                                   </select>
                                                   </td>

                                                   <td>

                                                   <select class="controls" style="width: 100px;" name="accion" id="accion1" >

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="HA INICIADO SECCIÓN">Inicio de sección</option>

                                                      <option value="HA CERRADO SECCIÓN">Cierre de sección</option>

                                                      <option value="HA SIDO REGISTRADO">Registrar</option>

                                                      <option value="HA SIDO ACTUALIZADO">Actualizar</option>

                                                      <option value="HA SIDO ACTIVADO">Activar</option>

                                                      <option value="HA SIDO DESACTIVADO">Desactivar</option>

                                                      <option value="SE HA CREADO UNA">Crear</option>

                                                      <option value="HAN SIDO CONFIRMADA UNA">Confirmar</option>

                                                      <option value="SE HA ANULADO UNA">Anular</option>

                                                   </select>

                                                   <!-- pedidos -->
                                                   <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion0" >

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="Han sido recibido">Recibido</option>
                                                      <option value="HAN SIDO ACTUALIZADO">Actualizado</option>

                                                   </select>
                                                       <!-- seccion -->

                                                   <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion2">

                                                      <option value="">Seleccione un acción</option>

                                                      <option value="HA INICIADO SECCIÓN">Inicio de sección</option>

                                                      <option value="HA CERRADO SECCIÓN" >Cierre de sección</option>

                                                   </select>

                                                   <!-- usuario -->
                                                   <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion3">

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="HA SIDO REGISTRADO">Registrar</option>

                                                      <option value="HA SIDO ACTUALIZADO">Actualizar</option>

                                                      <option value="HA SIDO ACTIVADO">Activar</option>

                                                      <option value="HA SIDO DESACTIVADO">Desactivar</option>

                                                      <option value="HA SIDO ELIMINADA UNA PREGUNTA DE SEGURIDAD">Remover pregunta</option>

                                                      <option value="HA SIDO ASIGNADA UNA PREGUNTA DE SEGURIDAD">Agregar pregunta</option>

                                                   </select>

                                                   <!-- analisis -->
                                                   <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion4">

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="HA SIDO REGISTRADO">Registrar</option>

                                                      <option value="HA SIDO ACTUALIZADO">Actualizar</option>

                                                      <option value="HA SIDO ACTIVADO">Activar</option>

                                                      <option value="HA SIDO DESACTIVADO">Desactivar</option>

                                                      <option value="HA SIDO ASIGNADO UN CONSUMO">Asignar consumo</option>

                                                      <option value="HA SIDO ELIMINADO UN CONSUMO">Remover consumo</option>

                                                      <option value="HA SIDO ACTUALIZADO UN CONSUMO">Actualizar consumo</option>

                                                   </select>

                                                   <!-- cliente -->
                                                     <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion5">
                                                      <option value="">Seleccione una acción</option>

                                                      <option value="HA SIDO REGISTRADO">Registrar</option>

                                                      <option value="HA SIDO ACTUALIZADO">Actualizar</option>

                                                      <option value="HA SIDO ACTIVADO">Activar</option>

                                                      <option value="HA SIDO DESACTIVADO">Desactivar</option>

                                                   </select>

                                                    <!-- proveedor -->
                                                <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion6">

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="HA SIDO REGISTRADO">Registrar</option>

                                                      <option value="HA SIDO ACTUALIZADO">Actualizar</option>

                                                      <option value="HA SIDO ACTIVADO">Activar</option>

                                                      <option value="HA SIDO DESACTIVADO">Desactivar</option>

                                                      <option value="SE HA AGREGAR UN INSUMO A LA LISTA DEL PROVEEDOR">Asignar mercancia</option>

                                                      <option value="SE HA REMOVIDO UN INSUMO A LA LISTA DEL PROVEEDOR">Remover mercancia</option>

                                                   </select>

                                                  <!-- factura -->   

                                                   <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion7">

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="SE HA CREADO UNA FACTURA">Crear</option>

                                                      <option value="HAN SIDO CONFIRMADA UNA factura">Confirmar</option>

                                                      <option value="SE HA ANULADO UNA FACTURA">Anular</option>

                                                   </select>

                                                    <!-- compra -->  
                                                   <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion8">

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="SE HA CREADO UNA ORDEN DE COMPRA">Crear</option>

                                                      <option value="HAN SIDO CONFIRMADA UNA ORDEN DE COMPRA">Confirmar</option>

                                                   </select>

                                                 <!--  consumo -->

                                                   <select class="modal-container" style="width: 100px;" disabled="true" name="accion" id="accion9">

                                                      <option value="">Seleccione una acción</option>

                                                      <option value="Han sido Confirmado">Agregar</option>


                                                   </select>

                                                   <!--  insumos -->


                                                     <select class="modal-container oculto" style="width: 100px;" disabled="true" name="accion" id="accion10">
                                                      <option value="">Seleccione una acción</option>

                                                      <option value="HA SIDO REGISTRADO">Registrar</option>

                                                      <option value="HA SIDO ACTUALIZADO">Actualizar</option>

                                                      <option value="HA SIDO ACTIVADO">Activar</option>

                                                      <option value="HA SIDO DESACTIVADO">Desactivar</option>

                                                      <option value="Han sido aumentado el stock">Aumento</option>

                                                      <option value="Han sido reducido el stock">Reducción</option>

                                                      <option value="Han sido devuelto al inventario">Devolución</option>

                                                   </select>


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

                  <input type="button" class='pushy__btn pushy__btn--md pushy__btn--blue' onclick="buscar_au()" value="Ver todos">

                  <input type="hidden" name="id" id="id" value="1">

                  <button class='pushy__btn pushy__btn--md pushy__btn--blue' onclick="consultar()">Buscar</button>
                  <button class='pushy__btn pushy__btn--md pushy__btn--green' onclick="ventana_pdf()">Pdf</button>

                     </label>
                  <div id="datos" class="dope" style="min-height: 30vh; max-height: 45vh;"></div>

                  </section>

   <section class="modal-container" id="ventana">

   <section class='ventanas' id='ventana2'></section>

   </section>



               </div>

<?php parte_abajo(); ?>