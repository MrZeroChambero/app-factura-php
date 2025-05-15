
<?php
require_once('./conexion/conexion.php');
require_once('sql.php');
$conexion = conectar();
session_name();
session_start();

/*for($i=0;$i<count($archivos_incluidos);$i++) {
    echo $archivos_incluidos[0];
}*/
if (isset($_SESSION['nivel_us'])) {
  if ($_SESSION['nivel_us']=="1") {
    $_SESSION['nivel']="Administrador";
}else if ($_SESSION['nivel_us']=="2") {
    $_SESSION['nivel']="Gerente";
}else{
    $_SESSION['nivel']="Asistente";
}  
}


function v_edit()
{
   
if ($_SESSION['editar'] == false){
    echo "<script>window.location='error404.php';</script>";
    
} 

}

function conexion()
{
	return conectar();
}



function valida()
{
	if (isset($_SESSION['autenticado'])) {
		$usuario = $_SESSION['nick_us'];
		$nivel = $_SESSION['nivel_us'];
		$autenticado = $_SESSION['autenticado'];
	}

	if (empty($_SESSION["autenticado"])) {
		echo "no ha iniciado sesión";
		echo "<script>window.location='index.php';</script>";
	} else if (!$_SESSION["autenticado"]) {
		echo "error al iniciar sesión";
		echo "<script>window.location='index.php';</script>";
	}
}

function menu0()
{
    valida();

	if ($_SESSION['nivel_us'] == "1") {
		menu1();
	} else if ($_SESSION['nivel_us'] == "2") {
		menu2();
	} else if ($_SESSION['nivel_us'] == "3") {
		menu3();
	}
}

		    function maxlvl(){
		    	
	$nivel =$_SESSION['nivel_us'];
	vlvl();
    switch($nivel):
        case 1:
        $mssg = "";
        break;

        default:
        echo "<script>window.location='error404.php';</script>";
    endswitch;
}
function mediumlvl(){
	
	$nivel =$_SESSION['nivel_us'];
	vlvl();
    switch($nivel):
        case 1:
        $mssg = "";
        break;

        case 2:
        $mssg = "";
        break;

        default:
        echo "<script>window.location='error404.php';</script>";
    endswitch;
}
		

function vlvl(){
	$nivel =$_SESSION['nivel_us'];
;
    switch($nivel):
        case 1:
        $mssg = "";
        break;

        case 2:
        $mssg = "";
        break;

        case 3:
        $mssg = "";
        break;

        default:
        echo "<script>window.location='salir.php';</script>";
    endswitch;
		
		}



function articulo(){
	valida();
vlvl();
	echo" </header>
        <section class='section margen-interno'>
            <div class='articulos'>
                <article class='articulo'>
                    <!-- width='500' height='320' esto podria ir en img` -->
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art.jpg'>
                    <h3>27 de marzo 2022</h3>
                    <h2>Titulo de la noticia</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci cupiditate illum assumenda qui ea, porro itaque laudantium maxime aspernatur libero architecto aut laborum. Soluta a voluptas praesentium impedit ad explicabo?</p>
                    <a href='#'>Leer más...</a>
                </article>
                <article class='articulo'>
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art1.jpg'>
                    <h3>27 de marzo 2022</h3>
                    <h2>Titulo de la noticia</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci cupiditate illum assumenda qui ea, porro itaque laudantium maxime aspernatur libero architecto aut laborum. Soluta a voluptas praesentium impedit ad explicabo?</p>
                    <a href='#'>Leer más...</a>
                </article>
                <article class='articulo'>
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art2.jpg'>
                    <h3>27 de marzo 2022</h3>
                    <h2>Titulo de la noticia</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci cupiditate illum assumenda qui ea, porro itaque laudantium maxime aspernatur libero architecto aut laborum. Soluta a voluptas praesentium impedit ad explicabo?</p>
                    <a href='#'>Leer más...</a>
                </article>
                <article class='articulo'>
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art3.jpg'>
                    <h3>27 de marzo 2022</h3>
                    <h2>Titulo de la noticia</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci cupiditate illum assumenda qui ea, porro itaque laudantium maxime aspernatur libero architecto aut laborum. Soluta a voluptas praesentium impedit ad explicabo?</p>
                    <a href='#'>Leer más...</a>
                </article>
                <nav class='navegacion'>
                    <a href='#'>Inicio</a>
                    <a href='#'>1</a>
                    <a href='#'>2</a>
                    <a href='#'>3</a>
                    <a href='#'>4</a>
                    <a href='#'>Final</a>
                </nav>
            </div>
            
            <aside class='aside'>
                <div class='publicidad'>
                    <h4>Aside</h4>
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art3.jpg'>
                </div>
                <div class='publicidad'>
                    <h4>Aside</h4>
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art3.jpg'>
                </div>
                <div class='publicidad'>
                    <h4>Aside</h4>
                    <img src='/facturacion/PROYECTO-WEB/Recursos/art3.jpg'>
                </div>
            </aside>
        </section>

        <footer class='footer margen-interno'>
            <nav class='pie'>
                <a href='#'>Powered By...</a>
            </nav>
        </footer>
    </div></body>
</html>";
}
function menu1()
{
maxlvl();


	echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
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


    <div class='padre'> 
	
    

            <div class='menu margen-interno'>

                <div class='logo'>
                    <a href='menu_pri.php'><img src='/facturacion/PROYECTO-WEB/Recursos/loginho.png' width='100' height='100'></a>
                </div>

                <nav class='nav'>
                 <li style='color: white;'>Usuario:".$_SESSION['nom_us']."<br>Nivel:".$_SESSION['nivel']."</li>
                
                    <li><a href='index.php?pagina=menu'><i class='fa-solid fa-house-medical'></i><span class='off'>Inicio</span></a></li>

                    <li><a href=''><i class='fa-solid fa-user-nurse'></i><span class='off'>Registros</span></a>
                        <ul>
							<li><a href='index.php?pagina=registro_usuario'>Usuario</a></li>
							<li><a href='index.php?pagina=registro_insumo'>Insumos</a></li>
							<li><a href='index.php?pagina=registro_analisis'>Analisis</a></li>
							<li><a href='index.php?pagina=registro_cliente'>Cliente</a></li>
							<li><a href='index.php?pagina=registro_proveedor'>Proveedor</a></li>
                            <li><a href='index.php?pagina=agregar_consumo'>Asignar <br/> consumo</a></li>
                        </ul>
                    </li>

                    <li><a href=''><i class='fa-solid fa-truck-medical'></i><span class='off'>Servicios</span></a>
						<ul>
							<li><a href='index.php?pagina=factura'>Factura</a></li>
							<li><a href='index.php?pagina=compras'>Compras</a></li>
							<li><a href='index.php?pagina=consumo'>Consumo</a></li>
                            <li><a href='index.php?pagina=pedidos'>Pedidos</a></li>
						</ul>
					</li>

                    <li><a href=''><i class='fa-solid fa-book-medical'></i><span class='off'>Consultas</span></a>
						<ul>
							<li><a href='index.php?pagina=consulta_usuario'>Usuario</a></li>
							<li><a href='index.php?pagina=consulta_insumos'>Insumos</a></li>
							<li><a href='index.php?pagina=consulta_analisis'>Analisis</a></li>
							<li><a href='index.php?pagina=consulta_clientes'>Cliente</a></li>
							<li><a href='index.php?pagina=consulta_proveedor'>Proveedor</a></li>
							<li><a href='index.php?pagina=consulta_consumo'>Consumo</a></li>
                            <li><a href='index.php?pagina=consulta_factura'>factura</a></li>
                            <li><a href='index.php?pagina=consulta_compras'>compras</a></li>
						</ul>
					</li>

                    <li><a href='index.php?pagina=auditoria'><i class='fa-solid fa-hand-holding-medical'></i><span class='off'>Auditoria</span></a></li>

					<li><a href='salir.php'>LogOut</a></li>

					
					<li class='derecha'><a href='#'><i class='fa-brands fa-facebook'></i></a></li>
					<li class='derecha'><a href='#'><i class='fa-solid fa-envelope'></i></a></li>

                </nav>
                </div>
                </div>";
}

function menu2()
{


	mediumlvl();
	echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>LabIndex</title>
    
    <!-- Place your kit's code here -->
    <script src='medical_health.js' crossorigin='anonymous'></script>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:wght@500&family=Noto+Serif:ital@1&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/estilo.css'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/fontawesome.min.css'>
    <link rel='icon' type='image/ico' href='/facturacion/PROYECTO-WEB/Recursos/favio.ico'>
    <!-- <link rel='stylesheet' href='bootstrap-5.1.3-dist/css/bootstrap.min.css'> -->

</head>
<body >

    <div class='padre'> 
	
        <header header_t>

            <div class='menu margen-interno'>

                <div class='logo'>
                    <a href='menu_pri.php'><img src='/facturacion/PROYECTO-WEB/Recursos/loginho.png' width='100' height='100'></a>
                </div>

                <nav class='nav'>
                    <li><a href='menu_pri.php'><i class='fa-solid fa-house-medical'></i><span class='off'>Inicio</span></a></li>

                    <li><a href='#'><i class='fa-solid fa-user-nurse'></i><span class='off'>Registros</span></a>
                        <ul>
                            <li><a href='registro_us.php'>Usuario</a></li>
                            <li><a href='registro_in.php'>Insumos</a></li>
                            <li><a href='registro_an.php'>Analisis</a></li>
                            <li><a href='registro_cli.php'>Cliente</a></li>
                            <li><a href='registro_pro.php'>Proveedor</a></li>
                            <li><a href='agregar_co.php'>Asignar <br/> consumo</a></li>
                        </ul>
                    </li>

                    <li><a href='#'><i class='fa-solid fa-truck-medical'></i><span class='off'>Servicios</span></a>
						<ul>
                            <li><a href='factura.php'>Factura</a></li>
                            <li><a href='compras.php'>Compras</a></li>
                            <li><a href='gastos.php'>Consumo</a></li>
						</ul>
					</li>

                    <li><a href='#'><i class='fa-solid fa-book-medical'></i><span class='off'>Consultas</span></a>
						<ul>
                            <li><a href='b_us.php'>Usuario</a></li>
                            <li><a href='b_in.php'>Insumos</a></li>
                            <li><a href='b_an.php'>Analisis</a></li>
                            <li><a href='b_cli.php'>Cliente</a></li>
                            <li><a href='b_pro.php'>Proveedor</a></li>
                            <li><a href='consumo.php'>Consumo</a></li>
                            <li><a href='consulta_factura.php'>factura</a></li>
                            <li><a href='consulta_compras.php'>compras</a></li>
						</ul>
					</li>

                    <li><a href='auditoria.php'><i class='fa-solid fa-hand-holding-medical'></i><span class='off'>Auditoria</span></a></li>

					<li><a href='salir.php'>LogOut</a></li>

					
					<li class='derecha'><a href='#'><i class='fa-brands fa-facebook'></i></a></li>
					<li class='derecha'><a href='#'><i class='fa-solid fa-envelope'></i></a></li>

                </nav>
                </div>";
}
function menu3()
{
vlvl();
	echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>LabIndex</title>
    
    <!-- Place your kit's code here -->
    <script src='medical_health.js' crossorigin='anonymous'></script>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Lora&family=Montserrat:wght@500&family=Noto+Serif:ital@1&display=swap' rel='stylesheet'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/estilo.css'>
    <link rel='stylesheet' href='/facturacion/PROYECTO-WEB/css/fontawesome.min.css'>
    <link rel='icon' type='image/ico' href='/facturacion/PROYECTO-WEB/Recursos/favio.ico'>
    <!-- <link rel='stylesheet' href='bootstrap-5.1.3-dist/css/bootstrap.min.css'> -->
</head>
<body>

    <div class='padre'> 
	
        <header class='header'>

            <div class='menu margen-interno'>

                <div class='logo'>
                    <a href='menu_pri.php'><img src='/facturacion/PROYECTO-WEB/Recursos/loginho.png' width='100' height='100'></a>
                </div>

                <nav class='nav'>
                    <li><a href='menu_pri.php'><i class='fa-solid fa-house-medical'></i><span class='off'>Inicio</span></a></li>
                    <li><a href='#'><i class='fa-solid fa-user-nurse'></i><span class='off'>Registros</span></a>
                        <ul>
							<li><a href='registro_cli.php'>Cliente</a></li>
                        </ul>
                    </li>

                    <li><a href='#'><i class='fa-solid fa-truck-medical'></i><span class='off'>Servicios</span></a>
						<ul>
							<li><a href='factura.php'>Factura</a></li>
						</ul>
					</li>

                    <li><a href='#'><i class='fa-solid fa-book-medical'></i><span class='off'>Consultas</span></a>
						<ul>
							<li><a href='b_in.php'>Insumos</a></li>
							<li><a href='b_an.php'>Analisis</a></li>
							<li><a href='b_cli.php'>Cliente</a></li>
							<li><a href='consumo.php'>Consumo</a></li>
                            <li><a href='consulta_factura.php'>factura</a></li>
						</ul>
					</li>

					<li><a href='salir.php'>LogOut</a></li>

					
					<li class='derecha'><a href='#'><i class='fa-brands fa-facebook'></i></a></li>
					<li class='derecha'><a href='#'><i class='fa-solid fa-envelope'></i></a></li>

                </nav>
                </div>";
}

?>
