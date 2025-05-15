<?php 
function menu0()
{

    if ($_SESSION['nivel_us']==1) {
        $nivel="Administrador";
        menu1($nivel);
  
    }
    if ($_SESSION['nivel_us']==2) {
        $nivel="Gerente";
        menu2($nivel);
  
    }
    if ($_SESSION['nivel_us']==3) {
        $nivel="Trabajador";
        menu3($nivel);
     
    }

}
function menu1($nivel)
{
    echo "
   
<div id='menu' style='max-width:20vw; max-height: 100vh;  overflow-y: scroll;'>
    


               
              <ul class='acorh'>
                 <li style='color: white;'><div>Usuario:".$_SESSION['nom_us']."<br>Nivel:".$nivel."</div></li>
                
                    <li><a href='index.php?pagina=menu'><i class='fa-solid fa-house-medical'></i><span class='off'>Inicio</span></a>
                    </li>

                    <li id='registros'><a href=''><i class='fa-solid fa-user-nurse'></i><span class='off'>Servicios</span></a>
                        <ul>
                            
                            <li><a href='index.php?pagina=registro_insumo'>Insumos</a></li>
                            <li><a href='index.php?pagina=registro_analisis'>Analisis</a></li>
                            <li><a href='index.php?pagina=registro_cliente'>Cliente</a></li>
                            <li><a href='index.php?pagina=registro_proveedor'>Proveedor</a></li>
                        </ul>
                    </li>

                    <li id ='Servicios'><a href=''><i class='fa-solid fa-truck-medical'></i><span class='off'>Procesos</span></a>
                        <ul>
                          <li><a href='index.php?pagina=factura'>Factura</a></li>
                          <li><a href='index.php?pagina=compras'>Compras</a></li>
                          <li><a href='index.php?pagina=consumo'>Consumo</a></li>
                          <li><a href='index.php?pagina=pedidos'>Pedidos</a></li>
                        </ul>
                    </li>

                    <li id='Consulta'><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Consultas</span></a>
                        <ul>
                          <li><a href='index.php?pagina=consulta_usuario'>Usuario</a></li>
                          <li><a href='index.php?pagina=consulta_insumos'>Insumos</a></li>
                          <li><a href='index.php?pagina=consulta_analisis'>Analisis</a></li>
                          <li><a href='index.php?pagina=consulta_clientes'>Cliente</a></li>
                          <li><a href='index.php?pagina=consulta_proveedor'>Proveedor</a></li>
                           <li><a href='index.php?pagina=consulta_mercancia'>Mercancia</a></li>
                           <li><a href='index.php?pagina=consulta_consumo'>Consumo <br> asginado</a></li>
                          <li><a href='index.php?pagina=consulta_factura'>Factura</a></li>
                          <li><a href='index.php?pagina=consulta_compras'>Compras</a></li>
                        </ul>
                    </li>

                   

                    <li id='configuracion'><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Mantenimineto</span></a>
                        <ul>
                            <li><a href='index.php?pagina=registro_usuario'>Crear Usuario</a></li>
                             <li><a href='index.php?pagina=auditoria'><i class='fa-solid fa-hand-holding-medical'></i><span class='off'>Auditoria</span></a></li>
                          <li><a href='index.php?pagina=cambiar_clave_us'>Cambiar clave</a></li>
                          <li><a href='index.php?pagina=registro_iva'>Cambiar iva</a></li>
                          <li><a href='index.php?pagina=respaldo'>Restauración <br> y  <br> Respaldo</a></li>

                        </ul>
                    </li>

          <li><a href='salir.php'>LogOut</a></li>

          
          <li class='derecha'><a href='#'><i class='fa-brands fa-facebook'></i></a></li>
          <li class='derecha'><a href='#'><i class='fa-solid fa-envelope'></i></a></li>
            </ul>
     </div>          

";    
}
function menu2($nivel)
{
    echo "
   
<div id='menu' style=' max-width:20vw; max-height: 100vh;  overflow-y: scroll;'>
    


               
              <ul class='acorh'>
                 <li style='color: white;'><div>Usuario:".$_SESSION['nom_us']."<br>Nivel:".$nivel."</div></li>
                
                    <li><a href='index.php?pagina=menu'><i class='fa-solid fa-house-medical'></i><span class='off'>Inicio</span></a>
                    </li>

                    <li id='registros'><a href=''><i class='fa-solid fa-user-nurse'></i><span class='off'>Servicios</span></a>
                        <ul>
                            <li><a href='index.php?pagina=registro_cliente'>Cliente</a></li>
                        </ul>
                    </li>

                    <li id ='Servicios'><a href=''><i class='fa-solid fa-truck-medical'></i><span class='off'>Procesos</span></a>
                        <ul>
                          <li><a href='index.php?pagina=factura'>Factura</a></li>
                          <li><a href='index.php?pagina=compras'>Compras</a></li>
                          <li><a href='index.php?pagina=consumo'>Consumo</a></li>
                          <li><a href='index.php?pagina=pedidos'>Pedidos</a></li>
                        </ul>
                    </li>

                    <li id='Consulta'><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Consultas</span></a>
                        <ul>
                          <li><a href='index.php?pagina=consulta_insumos'>Insumos</a></li>
                          <li><a href='index.php?pagina=consulta_analisis'>Analisis</a></li>
                          <li><a href='index.php?pagina=consulta_clientes'>Cliente</a></li>
                          <li><a href='index.php?pagina=consulta_proveedor'>Proveedor</a></li>
                           <li><a href='index.php?pagina=consulta_mercancia'>Mercancia</a></li>
                           <li><a href='index.php?pagina=consulta_consumo'>Consumo <br> asginado</a></li>
                          <li><a href='index.php?pagina=consulta_factura'>Factura</a></li>
                          <li><a href='index.php?pagina=consulta_compras'>Compras</a></li>
                        </ul>
                    </li>

                    

                    <li id='configuracion'><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Mantenimiento</span></a>
                        <ul>
                          <li><a href='index.php?pagina=cambiar_clave_us'>Cambiar clave</a></li>
                        </ul>
                    </li>

          <li><a href='salir.php'>LogOut</a></li>

          
          <li class='derecha'><a href='#'><i class='fa-brands fa-facebook'></i></a></li>
          <li class='derecha'><a href='#'><i class='fa-solid fa-envelope'></i></a></li>
            </ul>
     </div>          

";    
}
function menu3($nivel)
{
    echo "
   
<div id='menu' style='max-width:20vw;max-height: 100vh;  overflow-y: scroll;'>
    


               
              <ul class='acorh'>
                 <li style='color: white;'><div>Usuario:".$_SESSION['nom_us']."<br>Nivel:".$nivel."</div></li>
                
                    <li><a href='index.php?pagina=menu'><i class='fa-solid fa-house-medical'></i><span class='off'>Inicio</span></a>
                    </li>

                    <li id='registros'><a href=''><i class='fa-solid fa-user-nurse'></i><span class='off'>Servicios</span></a>
                        <ul>
                            <li><a href='index.php?pagina=registro_cliente'>Cliente</a></li>
                        </ul>
                    </li>

                    <li id ='Servicios'><a href=''><i class='fa-solid fa-truck-medical'></i><span class='off'>Procesos</span></a>
                        <ul>
                          <li><a href='index.php?pagina=factura'>Factura</a></li>
                        </ul>
                    </li>

                    <li id='Consulta'><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Consultas</span></a>
                        <ul>
                          <li><a href='index.php?pagina=consulta_insumos'>Insumos</a></li>
                          <li><a href='index.php?pagina=consulta_analisis'>Analisis</a></li>
                          <li><a href='index.php?pagina=consulta_clientes'>Cliente</a></li>
                          <li><a href='index.php?pagina=consulta_proveedor'>Proveedor</a></li>
                         
                           <li><a href='index.php?pagina=consulta_consumo'>Consumo <br> asginado</a></li>
                          <li><a href='index.php?pagina=consulta_factura'>Factura</a></li>
                         
                        </ul>
                    </li>

                    <li id='configuracion'><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Mantenimiento</span></a>
                        <ul>
                          <li><a href='index.php?pagina=consulta_usuario'>Cambiar clave</a></li>
                        </ul>
                    </li>

          <li><a href='salir.php'>LogOut</a></li>

          
          <li class='derecha'><a href='#'><i class='fa-brands fa-facebook'></i></a></li>
          <li class='derecha'><a href='#'><i class='fa-solid fa-envelope'></i></a></li>
            </ul>
     </div>          

";    
}
function encabesado()
{
 echo "    <meta charset='UTF-8'>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <title>LabIndex</title>
    
    <!-- Place your kit's code here -->
    <script src='medical_health.js' crossorigin='anonymous'></script>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:wght@500&family=Noto+Serif:ital@1&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/estilo.css'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/fontawesome.min.css'>
    <link rel='stylesheet' href='/facturacion/estiloT.css'>
    <link rel='icon' type='image/ico' href='/facturacion/PROYECTO-WEB/Recursos/favio.ico'>
    <!-- <link rel='stylesheet' href='bootstrap-5.1.3-dist/css/bootstrap.min.css'> -->
    

</head>
";   
}

function parte_arriba()
{
echo "<!DOCTYPE html>
 <html class='fondo_paisaje ajuste w'>
 <head>";
 echo encabesado();
 echo"</head>
 <body style='width: 100vw; height:100vh;'>
 
 
 <div class='tablagen' style='width: 100vw; height:100vh; id='estructura'>
 
   <div class='fila' style='width: 100vw; height:100vh;'>
 
     <div class='col' style='max-width:20vw; position: absolute; padding: 0px;'>";
    menu0(); 

    echo "</div> 
    <div class='col' style='width:80vw; height: 100vh;  overflow-y: scroll;'>"; 
}
function parte_abajo()
{
echo "
<p id='salio'></p>
</div>
</div>     
</div>
</body>
</html>";
}
?>