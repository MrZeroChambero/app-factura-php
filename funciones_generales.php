<?php 
session_name();
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/facturacion/menus.php');
ini_set("default_charset", "UTF-8");
mb_internal_encoding("UTF-8");
date_default_timezone_set('America/Caracas');
//funciones de nivel
function validar_seccion()
{
	if (!isset($_SESSION['autenticado'])) {
    	cerra_seccion();
    	exit();		
	}
	if (empty(trim($_SESSION['autenticado']))) {
    	cerra_seccion();
    	exit();		
	}
	if($_SESSION['autenticado'] != true){
    	cerra_seccion();
    	exit();
	}
	if (!isset($_SESSION['id_us'])) {
    	cerra_seccion();
    	exit();		
	}

	if (empty(trim($_SESSION['id_us']))) {
	    	cerra_seccion();
    	exit();	
	}
	if (!filter_var($_SESSION['id_us'],FILTER_VALIDATE_INT)) {
    	cerra_seccion();
    	exit();	
 }
    
    if (!isset($_SESSION['nom_us'])) {
    	cerra_seccion();
    	exit();               	
    }
    if (empty(trim($_SESSION['nom_us']))) {
     	cerra_seccion();
    	exit();              	
    }
    if (!isset($_SESSION['nick_us'])) {
     	cerra_seccion();
    	exit();             	
    }
    if (empty(trim($_SESSION['nick_us']))) {
     	cerra_seccion();
    	exit();        	
    }

    if (!isset($_SESSION['nivel_us'])) {
    	cerra_seccion();
    	exit();         	
    }

    if (empty(trim($_SESSION['nivel_us']))) {
    	cerra_seccion();
    	exit();	
    }     

    if (!filter_var($_SESSION['nivel_us'],FILTER_VALIDATE_INT,["options" =>["min_range"=>1, "max_range"=>3]])) {
    	cerra_seccion();
    	exit();
    }
              
}
function verificar_nivel()
{	
	validar_seccion();

	$nivel=$_SESSION['nivel_us'];

	$varlida="";

	if ($nivel==1) {

		$validar=true;

	}else if ($nivel==2) {

		$validar=true;
		
	}else if ($nivel==3) {

		$validar=true;
		
	}else{

		$validar=false;

	}
	if ($validar==false) {
		
	validar_seccion();

		exit();
	}

	if ($validar=="") {
	
		validar_seccion();

		exit();
		
	}
}

function nivel_medio()
{
	verificar_nivel();

	$validar=false;

	if ($_SESSION['nivel_us']==1) {

	$validar=true;

	}

	if($_SESSION['nivel_us']==2){

		$validar=true;

	}

	if ($validar==false) {

		// patucasa();
		cerra_seccion();

		exit();
	}

}
function nivel_maximo()
{
	verificar_nivel();

	$validar=false;

	if ($_SESSION['nivel_us']==1) {

	$validar=true;

	}

	if ($validar==false) {

		patucasa();

		exit();
	}

}

function patucasa(){
	cerra_seccion();
}
//Registros
function registrar_analisis($cod_an,$nom_an,$des_an,$tipo_an,$pre_an)
{

	$conexion = conectar();

	$estado = true;

	$query=$conexion->query("INSERT into analisis(cod_an,nom_an,des_an,tipo_an,pre_an,estado_an) VALUES('{$cod_an}','{$nom_an}','{$des_an}','{$tipo_an}','{$pre_an}','{$estado}')");

	if ($query == false) {

		$conexion->close();

		return $query;

	}else{


        $campo="";

        $codigo="Codigo:".$cod_an;

		$registro="Análisis";

		$accion="Ha sido registrado";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();

		return $query;
	}

}

function asignar_consumo($id_in,$cantidad)
{

	$id_an=$_SESSION['analisis'];

	$conexion = conectar();

	$query=$conexion->query("INSERT into consumo(id_an_co,id_in_co,ca_co) VALUES('{$id_an}','{$id_in}','{$cantidad}')");

	if ($query == false) {

		$conexion->close();

		return $query;

	}else{

/*		$registro="Consumo";

		$accion="";

		auditoria($registro,$accion);
*/
		$conexion->close();

		return $query;

	}	
}

function registrar_cliente($cedula_cli,$nom_cli,$num_tlf,$di_cli,$tipo_cliente,$cedula_f)
{

	$conexion = conectar();

	$estado=true;

	$query=$conexion->query("INSERT into cliente(cedula_rif,nom_cli,tlf_num_cli,di_cli,estado_cli,tipo_cli,cedula_2) VALUES('{$cedula_cli}','{$nom_cli}','{$num_tlf}','{$di_cli}','{$estado}','{$tipo_cliente}','{$cedula_f}')");

	if ($query == false) {

		$conexion->close();

		return $query;

	}else{

        $campo="";

        $codigo="Cedula/rif:".$cedula_cli;

		$registro="Cliente";

		$accion="Ha sido registrado";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();

		return $query;

	}

}

function registrar_insumo($cod_in,$nom_in,$unidad_medicion,$stock_max,$stock_min,$tipo)
{

	$conexion = conectar();

	$estado=true;

	$can = 0;

	$query=$conexion->query("INSERT into insumos(cod_in,nom_in,unidad_medicion,stockmax,stockmin,cantidad_in,estado_in,tipo_in) VALUES('{$cod_in}','{$nom_in}','{$unidad_medicion}','{$stock_max}','{$stock_min}','{$can}','{$estado}','{$tipo}')");

	if ($query == false) {

		$conexion->close();

		return $query;

	}else{

        $campo="";

        $codigo="Codigo:".$cod_in;

		$registro="Insumos";

		$accion="Ha sido registrado";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();

		return $query;
	}

}

function registrar_proveedor($rif_pro,$nom_pro,$tlf_num_pro,$dir_pro,$correo_pro,$tipo_pro,$rif_2)
{

	$conexion = conectar();

	$estado=true;

	$query=$conexion->query("INSERT into proveedor(rif_pro,nom_pro,tlf_num_pro,dir_pro,correo_pro,estado_pro,tipo_pro,rif_2) VALUES('{$rif_pro}','{$nom_pro}','{$tlf_num_pro}','{$dir_pro}','{$correo_pro}','{$estado}','{$tipo_pro}','{$rif_2}')");


	if ($query == false) {

		$conexion->close();
	
		return $query;
	
	}else{
        $campo="";

        $codigo="RIF:".$rif_pro;

		$registro="Proveedor";

		$accion="Ha sido registrado";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();
	
		return $query;
	
	}


}		


function registrar_usuario($nom_us,$nick_us,$apellido_us,$pass_us,$tlf_us,$cedula_us,$nivel_us)
{

	$conexion = conectar();

	$estado = true;

	$query=$conexion->query("INSERT into usuario(nom_us,nick_us,apellido_us,pass_us,num_tlf_us,cedula_us,nivel_us,estado_us) VALUES('{$nom_us}','{$nick_us}','{$apellido_us}','{$pass_us}','{$tlf_us}','{$cedula_us}','{$nivel_us}','{$estado}')");

		if ($query == false) {

		$conexion->close();
		
		return $query;

	}else{



        $campo="";

        $codigo="Cedula:".$cedula_us;

		$registro="Usuario";

		$accion="Ha sido registrado";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();
	
		return $query;

	}


}

function auditoria($registro,$accion,$campo,$codigo)
{	
	$conexion = conectar();

	$fecha=date('Y-m-d');

  	$hora = date('H:i:s');

  	$usuario=$_SESSION['id_us'];

	$query=$conexion->query("INSERT into auditoria(id_us_au,registro,accion,campo,codigo,fecha,hora) VALUES('{$usuario}','{$registro}','{$accion}','{$campo}','{$codigo}','{$fecha}','{$hora}')");

	

	if ($query == false) {
	
	$titulo="Error";

    $msg="error al crear la auditoria:";

    $val=msg_interrogante($msg,$titulo);

/*    echo $val;
	echo $sql;*/
	}

	$conexion->close();
}
// agregar
function agrear_insumos_temp($id_in,$cantidad)
{
	$conexion = conectar();

	$query=$conexion->query("INSERT INTO insumos_temp(id_ins_id,can_ins_temp) VALUES('{$id_in}','{$cantidad}')");

	return $query;
}

function agregar_carrito($id_cli,$id_an,$can_car){

	$conexion = conectar();

	$query=$conexion->query("INSERT INTO carrito(id_cli_car,id_an_car,can_car) VALUES('{$id_cli}','{$id_an}','{$can_car}')");

	return $query;
}

function agregar_lista_compra($id_in,$cantidad,$costo)
{
	$conexion = conectar();

	$proveedor = $_SESSION['proveedor1'];

	$query=$conexion->query("INSERT INTO lista_compra(id_pro_com_det,id_in_com,can_in_com,costo_in_com) VALUES('{$proveedor}','{$id_in}','{$cantidad}','{$costo}')");

	return $query;
}
function agregar_mercancia($q)
{
	$conexion = conectar();

	$pro=$_SESSION['proveedor_insumo'];
	
	$query=$conexion->query("INSERT INTO lista_mercancia(id_insumo_mercancia,id_proveedor_mercancia) VALUES('{$q}','{$pro}')");

	if ($query == false) {

		$conexion->close();
		
		return $query;

	}else{


		$conexion->close();
	
		return $query;

	}
}
function crear_informe($id_us)
{
	$_SESSION['id_us']=$id_us;
	$conexion = conectar();
	
	$query=$conexion->query("INSERT INTO informe(id_us_info) VALUES('{$id_us}')");

	if ($query == false) {

		$conexion->close();
		
		return $query;

	}else{

        $campo="";

        $codigo="";

        $registro="Usuario";

        $accion="Ha sido Creado un informe";

        auditoria($registro,$accion,$campo,$codigo); 

		$conexion->close();
	
		return $query;

	}
}

function consultar_informe()
{


	$conexion = conectar();

	$query=$conexion->query("SELECT informe.id_info,informe.id_us_info,usuario.id_us,usuario.nick_us,usuario.cedula_us,usuario.estado_us FROM informe,usuario WHERE id_us_info = id_us and estado_us = true");

	return $query;

}
function verificar_pregunta_usuario($id_us,$pregunta,$respuesta)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM preguntas where id_us_pre = '{$id_us}'and id_pregunta = '{$pregunta}' and  respuesta = '{$respuesta}'");

			$conexion->close();
		
		return $query;	
}
function agregar_pregunta($pregunta,$respuesta)
{
	$conexion = conectar();

	$us=$_SESSION['preguntas'];
	
	$query=$conexion->query("INSERT INTO preguntas(id_us_pre,pregunta,respuesta) VALUES('{$us}','{$pregunta}','{$respuesta}')");

	if ($query == false) {

		$conexion->close();
		
		return $query;

	}else{



		$conexion->close();
	
		return $query;

	}	
}
//busquedas
function verificar_pregunta($pregunta,$respuesta){

    $conexion = conectar();

    $us=$_SESSION['preguntas'];

    $verificar=verificar_usuario_activo($us);

    if (!($verificar->num_rows>0)) {

    	return $verificar;
    	
    }
    
    if (!($verificar->num_rows>0)) {

    	return $verificar;

    }

    $res=$conexion->query("SELECT * FROM preguntas WHERE id_us_pre = '{$us}' and pregunta = '{$pregunta}' AND respuesta = '{$respuesta}'");
   
    return $res;

}
function buscar_carrito($q1,$q2){

    $conexion = conectar();

    $res=$conexion->query("SELECT * FROM carrito WHERE id_cli_car = '{$q1}' AND id_an_car = '{$q2}'");
   
    return $res;

}

function buscar_consumo_general($id_an){
///revisar 
	$conexion = conectar();

	$res=$conexion->query("SELECT * FROM analisis,consumo,insumos where id_in = id_in_co and id_an =  '{$id_an}'  and id_an_co = id_an and estado_an = true and estado_in = true");

	$conexion -> close();

	return $res;

}
function buscar_consumo_general_insumos($id_in){
///revisar 
	$conexion = conectar();

	$res=$conexion->query("SELECT * FROM analisis,consumo,insumos where id_in = id_in_co and id_in =  '{$id_in}'  and id_an_co = id_an and estado_an = true and estado_in = true");

	$conexion -> close();

	return $res;

}
function consultar_consumo_id($q){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM consumo,analisis,insumos WHERE id_co = '{$q}' and id_an = id_an_co and id_in = id_in_co");

	return $query;

}
function consultar_consumo_analisis_insumos($q){

	$conexion = conectar();

	$id_an=$_SESSION['analisis'];

	$query=$conexion->query("SELECT * FROM consumo,analisis,insumos WHERE  id_an = id_an_co and id_an = '{$id_an}' and id_in = '{$q}' and id_in = id_in_co");

	return $query;

}
function consulta_para_asignar_consumo($q)
{

	$conexion = conectar();

	$id_an=$_SESSION['analisis'];

	$query=$conexion->query("SELECT * FROM consumo,analisis,insumos,tipo_an_in WHERE  id_an = id_an_co and id_an = '{$id_an}' and id_in = '{$q}' and id_in = id_in_co and tipo_in = id_tipo and tipo_an = id_tipo");

	/*echo "SELECT * FROM consumo,analisis,insumos,tipo_an_in WHERE  id_an = id_an_co and id_an = '{$id_an}' and id_in = '{$q}' and id_in = id_in_co and tipo_in = id_tipo and tipo_an = id_tipo";*/

	return $query;

}
function consultar_consumo_insumos($id_in){

	$conexion = conectar();

/*	$id_an=$_SESSION['analisis'];*/

	$query=$conexion->query("SELECT * FROM consumo,insumos WHERE  id_in = '{$id_in}' and id_in = id_in_co");

	return $query;

}

function buscar_insumos_temp($q){
	$conexion = conectar();

	$res=$conexion->query("SELECT * FROM insumos_temp where id_ins_id = '{$q}'");

	return $res;
}

function verificar_gastos($q){

	$conexion = conectar();

	$res=$conexion->query("SELECT * FROM factura,gastos where id_fac_gas = id_fac and estado_fac = 1 and insumos_id = '{$q}'");


	return $res;
}
function verificar_gastos_factura($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,gastos,factura WHERE id_in = insumos_id and id_fac = id_fac_gas and id_fac = '{$q}' ORDER BY id_in");

	return $query;	
}
function verificar_gastos_factura_activa($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,gastos,factura WHERE id_in = insumos_id and id_fac = id_fac_gas and id_fac = '{$q}' and estado_fac = 1 ORDER BY id_in");

	return $query;	
}
function encontrar_gastos_factura_activa($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,gastos,factura WHERE id_in = insumos_id and id_fac = id_fac_gas and id_gastos = '{$q}' and estado_fac = 1 ORDER BY id_in");

	return $query;	
}
function verificar_gastos_s($q){

	$conexion = conectar();

	$res=$conexion->query("SELECT * FROM gastos where insumos_id = '{$q}'");

	return $res;
}
// consultar todo
function consultar_carrito()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM carrito,cliente,analisis WHERE id_cli_car = id_cli and id_an_car = id_an ORDER by id_an");

	return $query;
}
function consultar_cliente()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM cliente ORDER BY cedula_rif");

	return $query;
}
function consultar_cliente_factura()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM cliente where estado_cli = true ORDER BY cedula_rif");

	return $query;
}
function consultar_proveedor()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM proveedor ORDER BY rif_pro");

	return $query;
}
function consulta_usuario()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT nom_us,cedula_us,apellido_us,nivel_us,num_tlf_us,estado_us,nick_us,id_us FROM usuario ORDER BY cedula_us");

	return $query;
}
function consultar_proveedor_compra()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM proveedor WHERE (estado_pro = true) ORDER BY rif_pro");

	return $query;
}
function verificar_proveedor_compra($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM proveedor,lista_mercancia,insumos WHERE(id_pro = id_proveedor_mercancia and id_pro = '{$q}' and id_in = id_insumo_mercancia and estado_in = true and estado_pro = true) ORDER BY id_in");


	return $query;
}
function consultar_insumo()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos ORDER BY cod_in");

	return $query;
}
function consultar_iva()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM iva WHERE estado_iva = true");

	return $query;	
}
function consultar_insumo_compra()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos where estado_in = true ORDER BY cod_in");

	return $query;
}
function consultar_insumo_asignar($tipo)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos where estado_in = true and tipo_in = '{$tipo}' || tipo_in = 5 ORDER BY cod_in");

	return $query;
}
function consultar_analisis(){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM analisis ORDER BY cod_an");

	return $query;
}
function consultar_analisis_factura(){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM analisis WHERE estado_an = true ORDER BY cod_an");

	return $query;
}


function consultar_usuario_auditoria(){

	$conexion = conectar();

	$query=$conexion->query("SELECT cedula_us,nick_us,id_us,nom_us,apellido_us,estado_us FROM usuario ORDER BY id_us");

	return $query;
}
function consultar_usuario(){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM usuario ORDER BY id_us");

	return $query;
}

function consultar_gastos()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from gastos,insumos where id_in = insumos_id");

	return $query;	
}
function consultar_gastos_listos()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura,gastos,insumos where id_in = insumos_id and id_fac_gas = id_fac and estado_fac = 2");

	return $query;	
}
function consultar_pedidos_compra($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,pedidos,compra WHERE id_in = id_in_pe and id_compra = id_compra_pe and id_compra = '{$q}' and estado_compra = 1 and estado_pe != 0 and estado_pe !=2 ORDER BY id_in");



	return $query;
}
function consultar_pedidos_sin_confirmar()
{
	$conexion = conectar();
	
	$query=$conexion->query($conexion->real_escape_string("SELECT compra.id_compra,compra.fecha_com,compra.id_us_compra,usuario.id_us,usuario.nom_us FROM compra,usuario WHERE estado_compra = 1 and compra.id_us_compra = usuario.id_us ORDER BY id_compra"));
	
	return $query;	
}
function buscar_pedido($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,pedidos,compra WHERE id_in = id_in_pe and id_pedidos = '{$q}' and id_compra = id_compra_pe and estado_compra = 1 and estado_pe !=0 and estado_pe !=2");	

	return $query;
}
function consultar_gastos_fechas($fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from gastos,insumos where id_in = insumos_id and fecha_gas BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'");

	return $query;	
}
function consultar_gastos_fechas_listo($fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura,gastos,insumos where id_in = insumos_id and id_fac = id_fac_gas and estado_fac = 2 and fecha_gas BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'");
	

	return $query;	
}
function consultar_factura()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura,cliente,forma_pago where id_cli = id_cli_fac   and id_forma_pago = forma_pago_fac  ORDER BY id_fac");

	return $query;	
}
function consultar_factura_sin_pago()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura,cliente where id_cli = id_cli_fac ORDER BY id_fac");

	return $query;	
}
function consultar_facturas()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura ORDER BY id_fac");

	return $query;	
}
function consultar_factura_activa()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura where estado_fac = 1  ORDER BY id_fac");

	return $query;	
}
function consultar_factura_fechas($fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura,cliente,forma_pago,iva where id_cli = id_cli_fac and id_iva=iva_factura and fecha_fac BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'  ORDER BY id_fac");

	return $query;	
}
function consultar_factura_fechas_sin_pago($fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from factura,cliente where id_cli = id_cli_fac  and fecha_fac BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'  ORDER BY id_fac");

	return $query;	
}
function consultar_compras()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from compra,proveedor where id_pro = id_pro_com ORDER BY id_compra");

	return $query;
}
function consultar_compras_fechas($fecha_inicio,$fecha_final)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * from compra,proveedor where id_pro = id_pro_com and  fecha_com BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'");

	return $query;
}

function consultar_pedidos()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from pedidos,insumos,compra where id_in = id_in_pe and id_compra_pe = id_compra and estado_compra != 0  ORDER BY cod_in");

	return $query;	
}
function consultar_pedidos_confirmados()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from pedidos,insumos,compra where id_in = id_in_pe and id_compra_pe = id_compra and estado_pe = 2 and estado_compra != 0  ORDER BY cod_in");

	return $query;	
}
function consultar_forma_pago()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM forma_pago");

	return $query;	
}
function lista_compras_proveedor($pro)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,lista_compra,proveedor WHERE id_in = id_in_com and id_pro = id_pro_com_det and id_pro = '{$pro}'");	

	return $query;	
}
function lista_compras_buscar($pro,$q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos,lista_compra,proveedor WHERE (id_in = id_in_com and id_pro = id_pro_com_det and id_pro = '{$pro}') and (cod_in LIKE'%". $q ."%' OR nom_in LIKE'%". $q ."%')");

	return $query;	
}
function consultar_pedidos_fechas($fecha_inicio,$fecha_final)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * from compra,pedidos,insumos where id_in = id_in_pe and id_compra = id_compra_pe and estado_pe = 2 and estado_compra != 0 and fecha_pedido BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'");

		return $query;
}
function consultar_consumo()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM consumo,insumos,analisis WHERE id_an_co = id_an and id_in_co = id_in ORDER BY id_co");

	return $query;
}
function consultar_preguntas()
{
	$conexion = conectar();

	$q=$_SESSION['preguntas'];

	$query=$conexion->query("SELECT * FROM preguntas where id_us_pre = '{$q}' ORDER BY id_pregunta");

	return $query;
}
function consultar_preguntas_buscar($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM preguntas where id_us_pre = '{$q}' ORDER BY id_pregunta");

	return $query;
}
function consultar_auditoria()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au  ORDER BY id_au");

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria ORDER BY id_au";

	return $query;	
}
function consultar_auditoria_usuario($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us_au = id_us  and id_us = '{$q}'  ORDER BY id_au");

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}'  ORDER BY id_au";

	return $query;	
}
function consultar_auditoria_fechas($fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_registro($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and registro ='{$q}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE registro ='{$q}' ORDER BY id_au";


	return $query;
}
function consultar_auditoria_accion($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and accion ='{$q}' ORDER BY id_au");

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE accion ='{$q}' ORDER BY id_au";


	return $query;
}
function consultar_auditoria_usuario_registro($q,$q2)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}' and registro ='{$q2}' ORDER BY id_au");

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}' and registro ='{$q2}' ORDER BY id_au";	

	return $query;
}
function consultar_auditoria_usuario_accion($q,$q2)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}'and accion ='{$q2}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}'and accion ='{$q2}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_usuario_fechas($q,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_registro_fechas($q,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and registro = '{$q}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE registro = '{$q}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_accion_fechas($q,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and accion = '{$q}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE accion = '{$q}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_registro_accion($q,$q2)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and registro ='{$q}' and accion = '{$q2}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE registro ='{$q}' and accion = '{$q2}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_usuario_registro_accion($q,$q2,$q3)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}' and registro ='{$q2}' and accion = '{$q3}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}' and registro ='{$q2}' and accion = '{$q3}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_usuario_registro_fechas($q,$q2,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}' and registro ='{$q2}' and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}' and registro ='{$q2}' and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";	

	return $query;
}
function consultar_auditoria_usuario_accion_fechas($q,$q2,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}' and accion ='{$q2}' and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}' and accion ='{$q2}' and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";	

	return $query;
}
function consultar_auditoria_registro_accion_fechas($q,$q2,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and registro ='{$q}' and accion = '{$q2}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE registro ='{$q}' and accion = '{$q2}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";

	return $query;
}
function consultar_auditoria_usuario_registro_accion_fechas($q,$q2,$q3,$fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM auditoria,usuario WHERE id_us = id_us_au and id_us = '{$q}' and registro ='{$q2}' and accion = '{$q3}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au");	

	$_SESSION['auditoria_consulta']="SELECT * FROM auditoria WHERE id_us_au = '{$q}' and registro ='{$q2}' and accion = '{$q3}'and fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}' ORDER BY id_au";

	return $query;
}
function buscar_consumo_analisis($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM consumo,insumos,analisis WHERE id_an_co = id_an and id_in_co = id_in and  id_an_co='{$q}'");

	return $query;
}
function buscar_insumos_consumo($q,$q2)
{
		$conexion = conectar();

		$query=$conexion->query("SELECT * FROM consumo,insumos,analisis WHERE (id_in LIKE'%". $q2 ."%' OR nom_in LIKE'%". $q2 ."%' OR cod_in LIKE'%".$q2 ."%') and (id_an_co = id_an and id_in_co = id_in and id_an_co = '{$q}')");

		return $query;
}

// consulta crud
function buscar_consumo_asignado($q)
{


	$conexion = conectar();

	$id_an=$_SESSION['analisis'];

	$query=$conexion->query("SELECT * FROM consumo,analisis,insumos WHERE  id_an = id_an_co and id_an = '{$id_an}' and id_in = id_in_co and (cod_in LIKE'%". $q ."%' OR nom_in LIKE'%". $q ."%'OR unidad_medicion LIKE'%". $q ."%') ORDER BY cod_in");


	return $query;

	
}
function buscar_cliente_consulta($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM cliente WHERE (cedula_rif LIKE'%". $q ."%' OR nom_cli LIKE'%". $q ."%'OR di_cli LIKE'%". $q ."%'  OR tlf_num_cli LIKE'%". $q ."%') ORDER BY cedula_rif");

	return $query;

}

function buscar_proveedor_consulta($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM proveedor WHERE (rif_pro LIKE'%". $q ."%' OR nom_pro LIKE'%". $q ."%'OR dir_pro LIKE'%". $q ."%'  OR tlf_num_pro LIKE'%". $q ."%' OR correo_pro LIKE'%". $q ."%') ORDER BY rif_pro");

	return $query;

}

function buscar_insumos_consulta($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM insumos WHERE (cod_in LIKE'%". $q ."%' OR nom_in LIKE'%". $q ."%'OR unidad_medicion LIKE'%". $q ."%'  OR cantidad_in LIKE'%". $q ."%' OR stockmax LIKE'%". $q ."%' OR stockmin LIKE'%". $q ."%') ORDER BY cod_in");

	return $query;

}

function buscar_analisis_consulta($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM analisis WHERE (cod_an LIKE'%". $q ."%' OR nom_an LIKE'%". $q ."%'OR des_an LIKE'%". $q ."%'  OR tipo_an LIKE'%". $q ."%' OR pre_an LIKE'%". $q ."%') ORDER BY cod_an");

	return $query;

}

//consulta para procesos


function buscar_cliente_factura($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM cliente WHERE (cedula_rif LIKE'%". $q ."%' OR nom_cli LIKE'%". $q ."%'OR di_cli LIKE'%". $q ."%'  OR tlf_num_cli LIKE'%". $q ."%') and (estado_cli = true) ORDER BY cedula_rif");

	return $query;

}

function buscar_proveedor_compra($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM proveedor WHERE( estado_pro = true) and(rif_pro LIKE'%". $q ."%' OR nom_pro LIKE'%". $q ."%'OR dir_pro LIKE'%". $q ."%'  OR tlf_num_pro LIKE'%". $q ."%' OR correo_pro LIKE'%". $q ."%' ) ORDER BY rif_pro");

 return $query;

}

function buscar_insumos_compra($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM insumos WHERE (cod_in LIKE'%". $q ."%' OR nom_in LIKE'%". $q ."%'OR unidad_medicion LIKE'%". $q ."%'  OR cantidad_in LIKE'%". $q ."%' OR stockmax LIKE'%". $q ."%' OR stockmin LIKE'%". $q ."%') and (estado_in = true) ORDER BY cod_in");

 return $query;

}
function buscar_insumos_asignar($q,$tipo){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM insumos WHERE (cod_in LIKE'%". $q ."%' OR nom_in LIKE'%". $q ."%'OR unidad_medicion LIKE'%". $q ."%'  OR cantidad_in LIKE'%". $q ."%' OR stockmax LIKE'%". $q ."%' OR stockmin LIKE'%". $q ."%') and (estado_in = true and tipo_in = '{$tipo}' || tipo_in = 5) ORDER BY cod_in");


 return $query;

}
function buscar_analisis_factura($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM analisis WHERE (cod_an LIKE'%". $q ."%' OR nom_an LIKE'%". $q ."%'OR des_an LIKE'%". $q ."%'  OR tipo_an LIKE'%". $q ."%' OR pre_an LIKE'%". $q ."%') and (estado_an = true) ORDER BY cod_an");

 return $query;

}
function buscar_usuario_consulta($q){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM usuario WHERE (nom_us LIKE'%". $q ."%' OR cedula_us LIKE'%". $q ."%'OR apellido_us LIKE'%". $q ."%'  OR num_tlf_us LIKE'%". $q ."%') ORDER BY id_us");

 return $query;

}

function buscar_consumo($id_an){

	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM analisis,consumo,insumos where id_in = id_in_co and id_an =  '{$id_an}'  and id_an_co=id_an");
	
	return $query;

}

function total_carrito($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM carrito,analisis WHERE id_cli_car = '{$q}' and id_an = id_an_car");

	return $query;
}




function ver_pagos_compra($id)
{
		$conexion = conectar();

	$query=$conexion->query("SELECT * FROM forma_pago,pago_compra,compra WHERE id_compra = id_compra_pago and forma_pago.id_forma_pago = pago_compra.id_forma_pago and id_compra = '{$id}' ORDER BY id_pago_compra");

	return $query;
}
function ver_pagos_factura($id)
{
		$conexion = conectar();

	$query=$conexion->query("SELECT * FROM forma_pago,pago_factura,factura WHERE id_fac = id_fac_pago and forma_pago.id_forma_pago = pago_factura.id_forma_pago and id_fac = '{$id}' ORDER BY id_pago_fac");

	return $query;
}
// actualizar
function actualizar_analisis($id_an,$cod_an,$nom_an,$des_an,$tipo_an,$pre_an)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE analisis SET cod_an = '{$cod_an}', nom_an = '{$nom_an}', des_an = '{$des_an}', tipo_an = '{$tipo_an}', pre_an = '{$pre_an}' WHERE analisis.id_an = '{$id_an}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;
}
function actualizar_insumos($id_in,$cod_in,$nom_in,$unidad,$stock_max,$stock_min,$tipo)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE insumos SET cod_in = '{$cod_in}', nom_in = '{$nom_in}', unidad_medicion = '{$unidad}', stockmax = '{$stock_max}', stockmin = '{$stock_min}' , tipo_in = '{$tipo}' WHERE insumos.id_in = '{$id_in}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;
}
function actualizar_cliente($id_cli,$cedula_cli,$nom_cli,$num_tlf,$di_cli,$cedula_2,$tipo_cliente)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE cliente SET cedula_rif = '{$cedula_cli}', nom_cli = '{$nom_cli}', tlf_num_cli = '{$num_tlf}', di_cli = '{$di_cli}', cedula_2 = '{$cedula_2}', tipo_cli = '{$tipo_cliente}' WHERE cliente.id_cli = '{$id_cli}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;
}
function actualizar_proveedor($id_pro,$rif_pro,$nom_pro,$tlf_num_pro,$dir_pro,$correo_pro,$tipo_pro,$rif_2)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE proveedor SET rif_pro = '{$rif_pro}', nom_pro = '{$nom_pro}', tlf_num_pro = '{$tlf_num_pro}', dir_pro = '{$dir_pro}', correo_pro = '{$correo_pro}', tipo_pro = '{$tipo_pro}', rif_2= '{$rif_2}' WHERE proveedor.id_pro = '{$id_pro}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;
}
function actualizar_usuario($id_us,$nom_us,$nick_us,$apellido_us,$tlf_us,$cedula_us,$nivel_us)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE usuario SET nom_us = '{$nom_us}', nick_us = '{$nick_us}', apellido_us = '{$apellido_us}', num_tlf_us = '{$tlf_us}', cedula_us = '{$cedula_us}', nivel_us = '{$nivel_us}' WHERE usuario.id_us = '{$id_us}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;
}
function actualizar_pass($id_us,$pass)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE usuario SET pass_us = '{$pass}' WHERE usuario.id_us = '{$id_us}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


 




		$conexion->close();
	
		return $query;
	
}
function actualizar_stock($id,$cantidad)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE insumos SET cantidad_in = '{$cantidad}'  WHERE insumos.id_in = '{$id}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;	
}
function actualizar_carrito($id_carrito,$cantidad)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE carrito SET can_car = '{$cantidad}' WHERE carrito.id_car = '{$id_carrito}'");

		return $query;
	
}
function actualizar_gastos($id,$cantidad)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE gastos SET  can_ins_gasto = '{$cantidad}' WHERE gastos.id_gastos = '{$id}'");

	return $query;
}
function actualizar_insumos_temp($id_temp,$cantidad)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE insumos_temp SET can_ins_temp = '{$cantidad}' where insumos_temp.id_ins_temp = '{$id_temp}'");

	return $query;
}

function actualizar_lista_compra($cantidad,$costo,$id_lista)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE lista_compra SET can_in_com = '{$cantidad}', costo_in_com = '{$costo}' WHERE lista_compra.id_lista_compra = '{$id_lista}'");


	return $query;

}
function actualizar_pedido($id,$fecha,$estado,$cantidad)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE pedidos SET  cantidad_pe = '{$cantidad}', estado_pe = '{$estado}',fecha_pedido = '{$fecha}' WHERE pedidos.id_pedidos = '{$id}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}

/*		$registro="Compras";

		$accion="Actualizar";

		auditoria($registro,$accion);*/

		$conexion->close();
	
		return $query;
}
function actualizar_consumo($id,$cantidad)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE consumo SET  ca_co = '{$cantidad}' WHERE consumo.id_co = '{$id}'");

	if ($query == false) {

		$conexion->close();

		return $query;
	}


		$conexion->close();
	
		return $query;
}
function actualizar_pedidos_estado($id_in,$estado_actual)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE pedidos SET estado_pe = '{$estado_actual}'  WHERE pedidos.id_pedidos = '{$id_in}'");

	$conexion->close();

		if ($query == false) {

		return $query;
	}



	return $query;
}
function sumar_inventario($id_in,$cantidad_actual)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE insumos SET cantidad_in = '{$cantidad_actual}'  WHERE insumos.id_in = '{$id_in}'");	

	$conexion->close();

		if ($query == false) {

		return $query;
	}

	
		return $query;
}
//
function confirmar_factura($id)
{
	$conexion = conectar();

	$estado=2;

	$query=$conexion->query("UPDATE factura SET  estado_fac = '{$estado}' WHERE factura.id_fac = '{$id}'");	

	if ($query == false) {

		$conexion->close();

		return $query;
	}

		

		$campo="";

        $codigo="Codigo:".$id;

       	$registro="Factura";

        $accion="Han sido confirmada una factura";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();
	
		return $query;
}
function obetener_pedidos_informacion($q)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM compra,pedidos,insumos WHERE id_compra = id_compra_pe and id_in = id_in_pe and id_compra_pe = '{$q}' and estado_compra = 1 and estado_in = true and estado_pe != 0 and estado_pe != 2");

	if ($query == false) {
			$conexion->close();
	
	return $query;
	}

	$conexion->close();
	
	return $query;

}

function contar_pedidos_insumos_compra($q,$id_in)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM compra,pedidos,insumos WHERE id_compra = id_compra_pe and id_in = id_in_pe and id_in = '{$id_in}' and id_compra_pe = '{$q}' and estado_compra = 1 and estado_in = true  and estado_pe = 2");

	if ($query == false) {
			$conexion->close();
	
	return $query;
	}

	$conexion->close();
	
	return $query;

}


function confirmar_compra($id)
{
	$conexion = conectar();

		$estado=2;

	$query=$conexion->query("UPDATE compra SET  estado_compra = '{$estado}' WHERE compra.id_compra = '{$id}'");

		if ($query == false) {

		$conexion->close();

		return $query;
	}
		$campo="";

        $codigo="Codigo:".$id;

       	$registro="Compra";

        $accion="Han sido confirmada una Orden de compra";

        auditoria($registro,$accion,$campo,$codigo);

		$conexion->close();
	
		return $query;
}
//activar
function activar_analisis($id_an)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE analisis SET estado_an = true WHERE analisis.id_an = '{$id_an}'");

	return $query;
}
function activar_insumos($id_in)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE insumos SET estado_in = true WHERE insumos.id_in = '{$id_in}'");

	return $query;
}
function activar_cliente($id_cli)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE cliente SET estado_cli = true WHERE cliente.id_cli = '{$id_cli}'");

	return $query;
}
function activar_proveedor($id_pro)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE proveedor SET estado_pro = true WHERE proveedor.id_pro = '{$id_pro}'");

	return $query;
}
function activar_usuario($id_us)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE usuario SET estado_us = true WHERE usuario.id_us = '{$id_us}'");

	return $query;
}
//desactivar
function desactivar_analisis($id_an)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE analisis SET estado_an = false WHERE analisis.id_an = '{$id_an}'");

	return $query;
}
function desactivar_insumos($id_in)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE insumos SET estado_in = false WHERE insumos.id_in = '{$id_in}'");

	return $query;
}
function desactivar_cliente($id_cli)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE cliente SET estado_cli = false WHERE cliente.id_cli = '{$id_cli}'");

	return $query;
}
function desactivar_proveedor($id_pro)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE proveedor SET estado_pro = false WHERE proveedor.id_pro = '{$id_pro}'");

	return $query;
}
function desactivar_usuario($id_us)
{
	$conexion = conectar();

	$query=$conexion->query("UPDATE usuario SET estado_us = false WHERE usuario.id_us = '{$id_us}'");

	return $query;
}
//verificaciones
function verificar_cliente($id_cli){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM cliente WHERE id_cli = '{$id_cli}'");

 return $query;
}
function verificar_cliente_activo($id_cli){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM cliente WHERE id_cli = '{$id_cli}' and estado_cli = true");

 return $query;
}
function verificar_consumo($q)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM consumo where id_co = '{$q}'");	
	
	return $query;
}
function verificar_insumo($id_in){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos WHERE id_in = '{$id_in}'");

	return $query;
}
function verificar_insumo_activo($id_in){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos WHERE id_in = '{$id_in}' and estado_in = 1");

	return $query;
}


function verificar_analisis($id_an){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM analisis WHERE  id_an = '{$id_an}'");

	return $query;
}
function verificar_analisis_activo($id_an){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM analisis WHERE  id_an = '{$id_an}' and estado_an = true");

	return $query;
}
function verificar_proveedor($id){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM proveedor WHERE id_pro = '{$id}'");

	return $query;
}
function verificar_proveedor_activo($id){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM proveedor WHERE id_pro = '{$id}' and estado_pro = true");

	return $query;
}
function verificar_usuario($id){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM usuario WHERE id_us = '{$id}'");


	return $query;
}
function verificar_usuario_activo($id){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM usuario WHERE id_us = '{$id}' and estado_us = true");

	return $query;
}
function buscar_usuario_nick($nick){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM usuario WHERE nick_us = '{$nick}' and estado_us = true");

	return $query;
}
function buscar_informe_usuario($id_us){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM informe WHERE id_us_info = '{$id_us}'");

	return $query;
}


function verificar_forma_pago($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM forma_pago where id_forma_pago = '{$q}'");

	return $query;	
}
function verificar_pedido($id)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM pedidos WHERE id_pedidos = '{$id}' and estado_pe != 0 and estado_pe != 2");

	return $query;		
}
function verificar_pedido_insumos_sin_confirmar($id)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM pedidos,insumos WHERE id_in = '{$id}'and id_in = id_in_pe and estado_pe = 1");

	

	return $query;		
}
function verificar_factura($id)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM factura WHERE id_fac = '{$id}'");

	return $query;	
}
function verificar_factura_activa($id)
{
	$conexion = conectar();
	
	$query=$conexion->query("SELECT * FROM factura WHERE id_fac = '{$id}' and estado_fac = 1");

	return $query;	
}
function verificar_compra_activa($id)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM compra,detalles_compra WHERE id_compra = '{$id}' and id_com_det = id_compra and estado_compra = 1");

	return $query;
}
function buscar_detalles_compra($id_compra,$id_insumo)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM compra,detalles_compra WHERE id_compra = '{$id_compra}' and id_com_det = id_compra and id_in_com = '{$id_insumo}' and estado_compra = 1");

	return $query;
}

function verificar_mercancia($id)
{
	$conexion = conectar();

	$pro=$_SESSION['proveedor_insumo'];

	$query=$conexion->query("SELECT * FROM lista_mercancia WHERE id_insumo_mercancia = '{$id}' and id_proveedor_mercancia = '{$pro}'");
	
	return $query;	
}

function verificar_mercancia_proveedor_activo($id)
{
	$conexion = conectar();

/*	$pro=$_SESSION['proveedor_insumo'];*/

	$query=$conexion->query("SELECT * FROM insumos,proveedor,lista_mercancia WHERE id_insumo_mercancia = '{$id}' and id_in = id_insumo_mercancia and id_proveedor_mercancia = id_pro and estado_pro = true and estado_in = true");
	
	return $query;	
}
function verificar_mercancia_proveedor_activo_insumo($id,$pro)
{
	$conexion = conectar();

/*	$pro=$_SESSION['proveedor_insumo'];*/

	$query=$conexion->query("SELECT * FROM insumos,proveedor,lista_mercancia WHERE id_insumo_mercancia = '{$id}' and id_in = id_insumo_mercancia and id_proveedor_mercancia = id_pro and id_pro = '{$pro}' and estado_pro = true and estado_in = true");
	
	return $query;	
}
function verificar_mercancia_id($id)
{
	$conexion = conectar();

	$pro=$_SESSION['proveedor_insumo'];

	$query=$conexion->query("SELECT * FROM lista_mercancia WHERE id_lista_mercancia = '{$id}'");
	
	return $query;	
}
//validar codigo
function validar_cliente($cli){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM cliente WHERE cedula_rif = '{$cli}'");

	return $query;
}
function validar_proveedor($rif){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM proveedor WHERE rif_pro = '{$rif}'");

	return $query;
}
function validar_usuario($nick){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM usuario WHERE nick_us = '{$nick}'");

	return $query;
}

function validar_insumo($cod){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM insumos WHERE cod_in = '{$cod}'");

	return $query;
}

function validar_analisis($cod){

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM analisis WHERE  cod_an = '{$cod}'");

	return $query;
}
function validar_numeros($valor)
{
	        $valores = explode('.', $valor);

          if(count($valores) > 2){

            return false;
        }

        if (!filter_var($valores[0],FILTER_VALIDATE_INT,["options" =>["min_range"=>0, "max_range"=>999999999999999]])){

            return false;
        }
        return true;


}
function validar_numeros_zero($valor)
{
	        $valores = explode('.', $valor);

          if(count($valores) > 2){

            return false;
        }
        if ($valores[0]===0) {
        	 return true;	
        }
        if ($valores[0]==="0") {
        	 return true;	
        }
        if ($valores[0]===00) {
        	 return true;	
        }
        if ($valores[0]==="00") {
        	 return true;	
        }
        if (strlen($valores[0])>2 and $valores[0]==0) {

        	 return false;
        }
        if (!filter_var($valores[0],FILTER_VALIDATE_INT,["options" =>["min_range"=>0, "max_range"=>999999999999999]])){
            return false;
        }

        return true;	




}
function validar_float($valor)
{

        $patron_numeros = "/^[0-9.]+$/";


        if (!preg_match($patron_numeros,$valor)){

            return false;
        }

        
          $valores = explode(',', $valor);
          if(count($valores) > 1){

            return false;

          }

        $valores = explode('e', $valor);

          if(count($valores) > 1){

            return false;

          }

        $valores = explode('E', $valor);
          if(count($valores) > 1){

            return false;

          }

/*
        $numero=(float)$valor;

        $numero2=(string)$numero;

        if ($numero2!==$valor) {

            echo "valores distintos".$numero2;

          return false;  

        }*/

        $valores = explode('.', $valor);

          if(count($valores) > 2){

            return false;
        }
          
/*
        if (count($valores) == 1) {

        

                    if (!filter_var($valores[0],FILTER_VALIDATE_INT)){

                        return false;

                    }

            return true;
        }*/

        if(count($valores) > 1){


                        if ($valores[1] === "00") {
                        
                            
                            $valores[1]=0;
                            
                         }
                         if ($valores[1] === "01") {
                            
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "02") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "03") {
                             $a=$valores[1];
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "04") {
                            
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if($valores[1] === "05") {
                            
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "06") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "07") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "08") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "09") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }          
if ($valores[0]>0) {

        if (!filter_var($valores[0],FILTER_VALIDATE_FLOAT,["options" =>["min_range"=>0, "max_range"=>999999999999999]])){

            return false;
        }

}


                   if ($valores[1]===0) {
                       return true;
                   }

                    if (!filter_var($valores[1],FILTER_VALIDATE_INT,["options" =>["min_range"=>0, "max_range"=>99]])){

                    return false;

                    }



                    return true;


          }
    
                   if ($valor===0) {
                       return true;
                   }
                   if ($valor==="0") {
                       return true;
                   }

        if (!filter_var($valor,FILTER_VALIDATE_FLOAT,["options" =>["min_range"=>0, "max_range"=>999999999999999]])){

            return false;
        }

          return true;


}
//

function validar_fecha($date)
{
   $format = 'Y-m-d';
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
function validar_carrito($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM carrito where id_an_car = '{$q}'");

	return $query;
}

function verificar_insumo_lista_compra($id_in)
{

	$proveedor = $_SESSION['proveedor1'];

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM lista_compra where id_pro_com_det = '{$proveedor}' and id_in_com ='{$id_in}'");

	return $query;	

}
function verificar_lista_compra($id_in)
{

	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM lista_compra where id_lista_compra = '{$id_in}'");

	return $query;	

}

// mensajes
function msg_error($msg,$titulo){

	$error="";

	$error="<script>

	var msg='".$msg."';
	var titulo='".$titulo."';

	Swal.fire({
     title: titulo,
     html: msg,
     icon:'error',
     confirmButtonText: 'Ok',
     backdrop: true,
     timer: 10000,
     timerProgressBar: true,
    position: 'center',
    allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
  });</script>";

  return $error;
}
function msg_error_sin($msg,$titulo){

	$error="";

	$error="<script>

	var msg='".$msg."';
	var titulo='".$titulo."';

	Swal.fire({
     title: titulo,
     html: msg,
     icon:'error',
     confirmButtonText: 'Ok',
     backdrop: true,
     timerProgressBar: true,
    position: 'center',
    allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
  });</script>";

  return $error;
}

function msg_interrogante($msg,$titulo){
		$error="";

		$error="<script>

		var msg='".$msg."';
		var titulo='".$titulo."';

	      Swal.fire({
	 		title: titulo,
	     	html: msg,
	        icon:'warning',
	        confirmButtonText: 'Ok',
	        backdrop: true,
	        timer: 10000,
	        timerProgressBar: true,
	       position: 'center',
	       allowOutsideClick: false,
	        allowEscapeKey: false,
	        allowEnterKey: false,
	        stopKeydownPropagation: true,
	        buttonsStyling: true,
	        showCloseButton: true,
	        closeButtonAriaLabel: 'cerrar alerta',
	     });
	</script>";

	  return $error;

}
function msg_interrogante_sin($msg,$titulo){
		$error="";

		$error="<script>

		var msg='".$msg."';
		var titulo='".$titulo."';

	      Swal.fire({
	 		title: titulo,
	     	html: msg,
	        icon:'warning',
	        confirmButtonText: 'Ok',
	        backdrop: true,
	        timerProgressBar: true,
	       position: 'center',
	       allowOutsideClick: false,
	        allowEscapeKey: false,
	        allowEnterKey: false,
	        stopKeydownPropagation: true,
	        buttonsStyling: true,
	        showCloseButton: true,
	        closeButtonAriaLabel: 'cerrar alerta',
	     });
	</script>";

	  return $error;

}

function msg_positivo($msg,$titulo)
{
	$positivo="<script> 

	var msg='".$msg."';
	var titulo='".$titulo."';

	Swal.fire({
   	title: titulo,
     html: msg,
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timer: 10000,
     timerProgressBar: true,
     position: 'center',
     allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     showConfirmButton: true,
   confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
 });</script>";
return $positivo;

}

function msg_positivo_sin($msg,$titulo)
{
	$positivo="<script> 

	var msg='".$msg."';
	var titulo='".$titulo."';

	Swal.fire({
   	title: titulo,
     html: msg,
     icon:'success',
     confirmButtonText: 'Bien',
     backdrop: true,
     timerProgressBar: true,
     position: 'center',
     allowOutsideClick: false,
   allowEscapeKey: false,
   allowEnterKey: false,
   stopKeydownPropagation: true,
     showConfirmButton: true,
   confirmButtonAriaLabel: 'Confirmar',
     buttonsStyling: true,
   showCloseButton: true,
   closeButtonAriaLabel: 'cerrar alerta',
 });</script>";
return $positivo;

}
//redirecciones

function r_factura(){
	$redirecion="<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=factura')},0);</script>";

	return $redirecion;
}
function cerra_seccion()
{
echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/salir.php')},0);</script>";		
}
function r_asignar_consumo()
{
echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=agregar_consumo')},0);</script>";		
}
function r_consultar_proveedor()
{
echo "<script>setTimeout(function(){window.location.replace('index.php?pagina=consultar_proveedor')},0);</script>";		
}

function r_consulta_factura()
{
	echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_factura')},0);</script>";	
}
function r_consulta_compra()
{
	echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_compras')},1500);</script>";
}
function r_compra()
{
	echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=compras')},0);</script>";
}
function r_asinar_mercancia()
{
	echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=asignar_mercancia')},0);</script>";
}
function r_consultar_consumo()
{
		echo "<script>setTimeout(function(){window.location.replace('http://localhost/facturacion/index.php?pagina=consulta_consumo')},0);</script>";
}
// procesos

function servicios_disponibles($id_an){

	$query_consumo=buscar_consumo_general($id_an);

	

	if (!($query_consumo->num_rows>0)) {

		$disponible=0;
		
		return $disponible;
	}
$fff=0;
$e=0;
		while($filas_consumo = mysqli_fetch_assoc($query_consumo)) {
			$e++;

				
				$disponiblet=0;

				$ins=$filas_consumo['id_in'];

				$query_ins_temp=buscar_insumos_temp($ins);

				$verificar_gastos=verificar_gastos($ins);

				$sin_confirmar=0;



				/////////////////////////////////////////////////////////////////////////////


					if ($verificar_gastos->num_rows>0) {
						
								while($cantidad_gasto_1=mysqli_fetch_assoc($verificar_gastos)){

									$sin_confirmar+=$cantidad_gasto_1['can_ins_gasto'];

								}
					    
					}


/////////////////////////////////////////////////////////////////////////////


					if ($query_ins_temp->num_rows>0) {

							$filas_ins_temp=mysqli_fetch_assoc($query_ins_temp);

							$can_in=$filas_ins_temp['can_ins_temp']-$sin_confirmar;

							$consumo=$filas_consumo['ca_co'];

							if ($filas_consumo['unidad_medicion']==1) {
								$consumo_entero=(int)$consumo;
								$consumo=$consumo_entero;
							}

							$d=$can_in / $consumo;

							$disponiblet=(int)$d;


							if ($fff==0) {	

							  $disponible=$disponiblet;


						}

							if($disponible > $disponiblet){
									
									$disponible=$disponiblet;
	

							}

						
	/////////////////////////////////////////////////////////////////////////////				      
					}else{

							$can_in=$filas_consumo['cantidad_in']-$sin_confirmar;

							$consumo=$filas_consumo['ca_co'];
							if ($filas_consumo['unidad_medicion']==1) {
								$consumo_entero=(int)$consumo;
								$consumo=$consumo_entero;
							}

							$d=$can_in / $consumo;

							$disponiblet=(int)$d;

							/*echo $can_in."_".$consumo."/";*/

							/////////////////////////////////////////////////////////////////////////////

											if ($fff==0) {
											

											/*	echo "dicponible".$disponiblet."i:".$i;*/

												$disponible=$disponiblet;

											}

										/////////////////////////////////////////////////////////////////////////////

							if($disponible > $disponiblet){
							

								$disponible=$disponiblet;

							}


					}
	/////////////////////////////////////////////////////////////////////////////				
					$fff=10;
						
		}

		return $disponible;
}

function gestionar_insumos_temporal()
{
	$conexion = conectar();
		$query_carrito=$conexion->query("SELECT * FROM carrito,cliente,analisis WHERE id_cli_car = id_cli and id_an_car = id_an ORDER by id_an");

		$ver_car=$conexion->query("SELECT * FROM carrito,cliente WHERE id_cli_car = id_cli");
		limpiar_insumos_temp();

		if (!($ver_car->num_rows>0)) {
			return;
		}


		
			 while($filas_carrito = mysqli_fetch_assoc($query_carrito)) {


			 	$id_an=$filas_carrito['id_an_car'];

			 	$can=$filas_carrito['can_car'];

/*			 	echo$id_an;
			 	echo"_".$can;*/
			/* 	echo $id_an."_";*/


                        $query_consumo=buscar_consumo($id_an);


                        while($filas_consumo = mysqli_fetch_assoc($query_consumo)) {


                                      $can_in=$filas_consumo['cantidad_in'];

                                      $consumo=$filas_consumo['ca_co'];

 							if ($filas_consumo['unidad_medicion']==1) {
								$consumo_entero=(int)$consumo;
								$consumo=$consumo_entero;
							}

                                      $disponible=$consumo*$can;

                                      $disponiblet=$can_in - $disponible;

                                      $id_in=$filas_consumo['id_in'];

                                      $can_in=$disponiblet; //esto es para numeros enteros pero no es necesario

                                      $ins_temp=buscar_insumos_temp($id_in);


                                          if ($ins_temp->num_rows>0) {

                                          	echo "actualizo";
         

                                                  $filas_ins_temp=mysqli_fetch_assoc($ins_temp);

                                                  $id_temp=$filas_ins_temp['id_ins_temp'];

                                                  $can_in_ac=$filas_ins_temp['can_ins_temp'];

                                                  $can_ins_temp=$can_in_ac-$disponible;

                                                  if($can_ins_temp<0){

                                                  $can_ins_temp=0;

                                                  }

                                          $actualizar_ins_temp= actualizar_insumos_temp($id_temp,$can_ins_temp);

                                          if ($actualizar_ins_temp == false) {


                                              $msg="Ocurrio un problema a actualizar la lista temporal";

                                              $titulo="Error al actualizar";

                                              $val=msg_error($msg,$titulo);

                                              echo $val;

                                          }

                                        } else {


                                          $temporal=agrear_insumos_temp($id_in,$can_in);

                                              if ($temporal == false) {
                            
                                                    $msg="Ocurrio un problema a agregar a la lista temporal";

                                                    $titulo="Error al agregar";

                                                    $val=msg_error($msg,$titulo);

                                                    echo $val;
                                              }
                                        }


                        }
                    }
}

//////////////////////////

function servicios_disponibles_mostrar($id_an){

	$query_consumo=buscar_consumo_general($id_an);

	

	if (!($query_consumo->num_rows>0)) {

		$disponible=0;
		
		return $disponible;
	}
$fff=0;
$e=0;
		while($filas_consumo = mysqli_fetch_assoc($query_consumo)) {
			$e++;

				
				$disponiblet=0;

				$ins=$filas_consumo['id_in'];

				$verificar_gastos=verificar_gastos($ins);

				$sin_confirmar=0;



				/////////////////////////////////////////////////////////////////////////////


					if ($verificar_gastos->num_rows>0) {
						
								while($cantidad_gasto_1=mysqli_fetch_assoc($verificar_gastos)){

									$sin_confirmar+=$cantidad_gasto_1['can_ins_gasto'];

								}
					    
					}


/////////////////////////////////////////////////////////////////////////////



							$can_in=$filas_consumo['cantidad_in']-$sin_confirmar;

							$consumo=$filas_consumo['ca_co'];
							if ($filas_consumo['unidad_medicion']==1) {
								$consumo_entero=(int)$consumo;
								$consumo=$consumo_entero;
							}

							$d=$can_in / $consumo;

							$disponiblet=(int)$d;

							/*echo $can_in."_".$consumo."/";*/

							/////////////////////////////////////////////////////////////////////////////

											if ($fff==0) {
											

											/*	echo "dicponible".$disponiblet."i:".$i;*/

												$disponible=$disponiblet;

											}

										/////////////////////////////////////////////////////////////////////////////

							if($disponible > $disponiblet){
							

								$disponible=$disponiblet;

							}


					
	/////////////////////////////////////////////////////////////////////////////				
					$fff=10;
						
		}

		return $disponible;
}


// limpiar tablas
function limpiar_carrito()
{
	$conexion=conectar();

	$query=$conexion->query("DELETE FROM carrito");

	if ($query == false) {

		$msg="No se pudo borrar el carrito";

        $titulo="Error al Borrar";

       	$val=msg_error($msg,$titulo);

        echo $val;
	}

	$conexion->close();

	return $query;
	
}

function limpiar_insumos_temp()
{
	$conexion=conectar();

	$query=$conexion->query("DELETE FROM insumos_temp");

/*	if ($query == false) {

		$msg="No se pudo borrar el insumos temp";

        $titulo="Error al Borrar";

       	$val=msg_error($msg,$titulo);

        echo $val;
	}*/

	$conexion->close();

	return $query;
	
}

function limpiar_lista_temp()
{
	$conexion=conectar();

	$query=$conexion->query("DELETE FROM lista_temp");

	if ($query == false) {

/*		$msg="No se pudo borrar el lista_temp";

        $titulo="Error al Borrar";

       	$val=msg_error($msg,$titulo);

        echo $val;*/
	}

	$conexion->close();

	return $query;
	
}
function limpiar_lista_compra()
{
	$conexion=conectar();

	$query=$conexion->query("DELETE FROM lista_compra");

	if ($query == false) {

/*		$msg="No se pudo borrar el lista_temp";

        $titulo="Error al Borrar";

       	$val=msg_error($msg,$titulo);

        echo $val;*/
	}

	$conexion->close();

	return $query;	
}
function limpiar_todo()
{
	limpiar_lista_temp();

	limpiar_insumos_temp();

	limpiar_carrito();

	limpiar_lista_compra();

	$_SESSION['precios']=null;
}

function quitar_analisis($analisis){

	$conexion = conectar();

	$query = $conexion->query("DELETE FROM carrito where id_an_car = '{$analisis}'");


			if ($query == false) {

		        $msg="No se ha limpiado el carrito de compras";

		        $titulo="Error";

		        $val=msg_error($msg,$titulo);

		        echo $val;

			}	
		

	$conexion->close();

	return $query;
}

function quitar_lista($id_in){

	$conexion = conectar();

	$query=$conexion->query("DELETE FROM lista_compra where lista_compra.id_lista_compra = '{$id_in}'");

	$conexion->close();

	return $query;

}
function quitar_pregunta($id){

	$conexion = conectar();

	$query=$conexion->query("DELETE FROM preguntas where preguntas.id_pregunta = '{$id}'");

	$conexion->close();

	if ($query==false) {

		return $query;

	}


	return $query;

}
function quitar_consumo($q)
{
	$conexion = conectar();
	
	$query=$conexion->query("DELETE FROM consumo where id_co = '{$q}'");

	if ($query == false) {

		$conexion->close();

		return $query;

	}else{


		$conexion->close();

		return $query;
	}	
	
	return $query;
}
function quitar_mercancia($q)
{
	$conexion = conectar();
	
	$query=$conexion->query("DELETE FROM lista_mercancia WHERE lista_mercancia.id_lista_mercancia ='{$q}'");

	if ($query == false) {

		$conexion->close();

		return $query;

	}else{

		$conexion->close();

		return $query;
	}	
	
	return $query;
}
//proceso 1

// proceso 2

function crear_det_fac($id_an,$cantidad,$precio){

		$id_fac=$_SESSION['id_fac'];

		$conexion=conectar();

		$query=$conexion->query("INSERT into detalles_factura(id_co_det_fac,id_an_det_fac,can_det_fac,precio_unidad) VALUES('{$id_fac}','{$id_an}','{$cantidad}','{$precio}')");


		if ($query==false) {

			$conexion->close();

			return $query;
		}
		$conexion->close();

		return $query;
}

function crear_factura($cliente,$precio_total)
{
	$conexion = conectar();

	$iva_actual=$conexion->query("SELECT * FROM iva");

if (!$iva_actual->num_rows>0) {
	
    $iva=0;

}else{

    $filas=mysqli_fetch_assoc($iva_actual);

    $iva=$filas['cantidad_iva'];
}

	$usuario=$_SESSION['id_us'];

	$fecha=date('Y-m-d');

  	$hora = date('H:i:s');

  	$estado=true;


  	$query=$conexion->query("INSERT into factura(id_cli_fac,id_usd_fac,precio_total,iva_factura,fecha_fac,hora_fac,estado_fac) VALUES('{$cliente}','{$usuario}','{$precio_total}','{$iva}','{$fecha}','{$hora}','{$estado}')");

	if ($query == false) {


		$conexion->close();

		return $query;

	}else{

		$buscar_id=$conexion->query("SELECT * FROM factura WHERE id_cli_fac = '{$cliente}' and id_usd_fac = '{$usuario}' and precio_total = '{$precio_total}' and iva_factura = '{$iva}' and fecha_fac = '{$fecha}' and hora_fac = '{$hora}' and estado_fac = '{$estado}'");

		if ($buscar_id == true) {
			
				$id_factura = mysqli_fetch_assoc($buscar_id);

				$_SESSION['id_fac'] = $id_factura['id_fac'];
		} else{

						        $titulo="Error id factura";

						        $msg="error al buscar la factura creada";

		        				$val=msg_error($msg,$titulo);

		        				echo $val;

					     		exit();				
		}

		


        $campo="";

        $codigo="Codigo:".$id_factura['id_fac'];

		$registro="Factura";

		$accion="Se ha creado una factura";

        auditoria($registro,$accion,$campo,$codigo);  

		$conexion->close();

		return $query;
	}	

}
function pago_fac($referencia,$cantidad,$forma_pago)
{
	$conexion = conectar();

	$id_fac=$_SESSION['id_fac'];

	$query=$conexion->query("INSERT INTO pago_factura(id_forma_pago,id_fac_pago,cantidad_pago,referencia) VALUES('{$forma_pago}','{$id_fac}','{$cantidad}','{$referencia}')");

	$conexion->close();

	return $query;


}
function pago_com($referencia,$cantidad,$forma_pago)
{
	$conexion = conectar();

	$id_com=$_SESSION['id_compra'];

	$query=$conexion->query("INSERT INTO pago_compra(id_forma_pago,id_compra_pago,cantidad_pago,referencia) VALUES('{$forma_pago}','{$id_com}','{$cantidad}','{$referencia}')");

	$conexion->close();

	return $query;


}
function crear_gastos($id_in,$cantidad)
{
	$conexion = conectar();

	$fecha=date('Y-m-d');

	$id_fac=$_SESSION['id_fac'];

	$query=$conexion->query("INSERT INTO gastos(insumos_id,can_ins_gasto,id_fac_gas,fecha_gas) VALUES('{$id_in}','{$cantidad}','{$id_fac}','{$fecha}')");

	$conexion->close();

	return $query;

}
function verificar_factura_gastos($id)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM gastos WHERE id_fac_gas = '{$id}'");	

	$conexion->close();

	return $query;
}

function crear_orden_compra()
{
	$conexion = conectar();

	$fecha=date('Y-m-d');

	$proveedor=$_SESSION['proveedor1'];

	$usuario=$_SESSION['id_us'];

  	$hora = date('H:i:s');

  	$estado=true;

  	$total=0;

    $calcuclar_total=lista_compras_pro($proveedor);


$iva_actual=$conexion->query("SELECT * FROM iva");

if (!$iva_actual->num_rows>0) {

    $iva_en_uso=0;

}else{

    $filas=mysqli_fetch_assoc($iva_actual);

    $iva_en_uso=$filas['cantidad_iva'];
}


    	$iva_com=$iva_en_uso;
    

    

   while ($c_total=mysqli_fetch_assoc($calcuclar_total)) {

    $total+=$c_total['costo_in_com']*$c_total['can_in_com'];

   }

   $gasto=round($total,2);

	$query=$conexion->query("INSERT into compra(id_pro_com,gasto_t,fecha_com,hora_com,iva_compra,id_us_compra,estado_compra) VALUES('{$proveedor}','{$gasto}','{$fecha}','{$hora}','{$iva_com}','{$usuario}','{$estado}')");

	if ($query == true) {


		$query2=$conexion->query("SELECT * FROM compra WHERE id_pro_com = '{$proveedor}' and  gasto_t = '{$gasto}' and fecha_com = '{$fecha}' and hora_com = '{$hora}' and iva_compra = '{$iva_com}' and id_us_compra = '{$usuario}' and estado_compra = '{$estado}'");




		
		if ($query2->num_rows>0) {
			
			$id=mysqli_fetch_assoc($query2);

			$_SESSION['id_compra']=$id['id_compra'];

		}
        $campo="";

        $codigo="Codigo:".$id['id_compra'];

		$registro="Compra";

		$accion="Se ha creado una Orden de compra";

        auditoria($registro,$accion,$campo,$codigo);  

        $conexion->close();


	}

	

	return $query;

}
function obtener_iva()
{
			$conexion = conectar();

			$iva_actual=$conexion->query("SELECT * FROM iva");

		if (!$iva_actual->num_rows>0) {
			
		    $iva_en_uso=0;

		}else{

		    $filas=mysqli_fetch_assoc($iva_actual);

		    $iva_en_uso=$filas['cantidad_iva'];
		}
		$conexion->close();
		return $iva_en_uso;
}
function detalles_compra($id_insumo,$cantidad,$costo)
{
	$conexion = conectar();

	$id_compra = $_SESSION['id_compra'];

	$query=$conexion->query("INSERT into detalles_compra(id_com_det,id_in_com,can_in_det,costo_unidad) VALUES ('{$id_compra}','{$id_insumo}','{$cantidad}','{$costo}')");

	return $query;
}
function pedidos($id_in,$cantidad,$fecha)
{
	$conexion = conectar();

	$id_compra = $_SESSION['id_compra'];

	$usuario=$_SESSION['id_us'];

	$estado=true;

	$query=$conexion->query("INSERT INTO pedidos(id_in_pe,cantidad_pe,id_compra_pe,estado_pe,fecha_pedido,id_us_pe) VALUES ('{$id_in}','{$cantidad}','{$id_compra}','{$estado}','{$fecha}','{$usuario}')");

	return $query;
}
function crear_pedidos($id_in,$cantidad,$fecha,$usuario,$id_compra)
{
	$conexion = conectar();

	$estado=true;

	$query=$conexion->query("INSERT INTO pedidos(id_in_pe,cantidad_pe,id_compra_pe,estado_pe,fecha_pedido,id_us_pe) VALUES ('{$id_in}','{$cantidad}','{$id_compra}','{$estado}','{$fecha}','{$usuario}')");

	return $query;
}
function lista_compras_pro($q)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * FROM lista_compra,insumos,proveedor where id_pro = id_pro_com_det and id_pro_com_det = '{$q}' and id_in = id_in_com");

	return $query;
}
// proceso 3


//anularcion
function anular_factura($id)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE factura SET estado_fac = false WHERE factura.id_fac ='{$id}'");

	if ($query == false) {

				$conexion->close();
		
			return $query;
	}

        $campo="";

        $codigo="Codigo:".$id;

		$registro="Factura";

		$accion="Se ha anulado una factura";

        auditoria($registro,$accion,$campo,$codigo);  

			$conexion->close();
		
			return $query;
}
//
function devolver_insumos($id,$cantidad)
{
		$conexion = conectar();

		$query=$conexion->query("UPDATE insumos SET cantidad_in ='{$cantidad}' WHERE insumos.id_in = '{$id}'");

		if ($query == false) {

				$conexion->close();
		
			return $query;
	}
			


			$conexion->close();
		
			return $query;
}
function devolver_inventario($id_fac)
{
			$buscar_gastado=verificar_factura_gastos($id_fac);

			$respuesta=true;

		if ($buscar_gastado == false) {	

		  $titulo="Error";

		  $msg="No se encuentrar gastos asociados a esta factura";

		  $val=msg_error($msg,$titulo);

		  echo $val;

		  $respuesta=false;

		  return $respuesta;
		}

		while($resultado_gastos=mysqli_fetch_assoc($buscar_gastado)){


					$cantidad=0;

					$id_in=$resultado_gastos['insumos_id'];

					$insumo=verificar_insumo($id_in);

					$resultado_insumos=mysqli_fetch_assoc($insumo);

					$cantidad_actual=$resultado_insumos['cantidad_in'];

					$cantidad=$cantidad_actual+$resultado_gastos['can_ins_gasto'];

					$devolver_insumos=devolver_insumos($id_in,$cantidad);

					if ($devolver_insumos==false) {

								$respuesta=false;

		            $titulo="Error";

		            $msg="Error al devolcer insumos";

		            $val=msg_error($msg,$titulo);

		            echo $val;

				}

if ($resultado_insumos['unidad_medicion']==2) {
	$unidad=".mililitro/s";
}else{
	$unidad=".unidad/s";
}




		$campo="Cantidad:".$resultado_gastos['can_ins_gasto'].$unidad;

        $codigo="Codigo:".$resultado_insumos['cod_in'];

       	$registro="Insumos";

        $accion="Han sido devuelto al inventario";

        auditoria($registro,$accion,$campo,$codigo);

		}

		  return $respuesta;
}
function verificar_resta_insumos($q){

	$respuesta=true;

	$resta_inventario=verificar_gastos_factura($q);

	if (!($resta_inventario->num_rows>0)) {
		
					$respuesta == false;

		      $titulo="Error";

          $msg="Error al registrar la información <br> Verifique  lo datos";

          $val=msg_error($msg,$titulo);

          echo $val;

          return $respuesta;
	}

	while ($filas=mysqli_fetch_assoc($resta_inventario)) {

    $id_in=$filas['insumos_id'];

    $insumo=verificar_insumo($id_in);

    $filas_insumos=mysqli_fetch_assoc($insumo);

    $cantidad=$filas_insumos['cantidad_in'];

    $gasto=$filas['can_ins_gasto'];

    $cantidad_actual=$cantidad-$gasto;

    if ($cantidad_actual<0) {

        $respuesta=false;

    }

	}
	return $respuesta;
}
function restar_insumos($q)
{
	$respuesta=true;

	$resta_inventario=verificar_gastos_factura($q);

	if (!($resta_inventario->num_rows>0)) {
		
					$respuesta == false;

		      $titulo="Error";

          $msg="Error al registrar la información <br> Verifique  lo datos";

          $val=msg_error($msg,$titulo);

          echo $val;

          return $respuesta;
	}

	$verificar=verificar_resta_insumos($q);

	if ($verificar == false) {

		$respuesta == false;

		return $respuesta;
		
	}
	while ($filas=mysqli_fetch_assoc($resta_inventario)) {

    $id_in=$filas['insumos_id'];

    $insumo=verificar_insumo($id_in);

    $filas_insumos=mysqli_fetch_assoc($insumo);

    $cantidad=round($filas_insumos['cantidad_in'],2);

    $gasto=round($filas['can_ins_gasto'],2);

    $cantidad_actual=round($cantidad-$gasto,2);

    if ($cantidad_actual<0) {

        $cantidad_actual=0;

    }

    $actualizar_inventario=actualizar_stock($id_in,$cantidad_actual);

      if ($actualizar_inventario == false) {

          $titulo="Error";

          $msg="Error al registrar la información <br> Verifique  lo datos";

          $val=msg_error($msg,$titulo);

          echo $val;

          $respuesta == false;

      }else{

      	if ($filas['cod_in']==1) {
      		$unidad=".unidad/s";
      	}else{
      		$unidad=".mililitro/s";
      	}
		$campo="Cantidad:".$gasto.$unidad;

        $codigo="Codigo insumo:".$filas['cod_in'];

       	$registro="Consumo";

        $accion="Han sido Confirmado";

        auditoria($registro,$accion,$campo,$codigo);


        $campo="Cantidad:".$gasto.$unidad;

        $codigo="Codigo:".$filas['cod_in'];

       	$registro="Insumos";

        $accion="Han sido reducido el stock";

        auditoria($registro,$accion,$campo,$codigo);

      }
	}

	return $respuesta;
}
function mercancia_proveedor($pro)
{

	$conexion=conectar();

	$query=$conexion->query("SELECT * FROM insumos,proveedor,lista_mercancia WHERE id_in = id_insumo_mercancia and id_pro = id_proveedor_mercancia and id_pro = '{$pro}' and estado_in = true and estado_pro = true ORDER BY id_in");

	$conexion->close();

	return $query;	
}
function mercancia_proveedor_insumos($in)
{

	$conexion=conectar();

	$query=$conexion->query("SELECT * FROM insumos,proveedor,lista_mercancia WHERE id_in = id_insumo_mercancia and id_pro = id_proveedor_mercancia and id_in = '{$in}' and estado_in = true and estado_pro = true ORDER BY id_in");

	$conexion->close();

	return $query;	
}
function buscar_mercancia($pro,$q)
{

	$conexion=conectar();

	$query=$conexion->query("SELECT * FROM insumos,proveedor,lista_mercancia WHERE (id_in = id_insumo_mercancia and id_pro = id_proveedor_mercancia and id_pro = '{$pro}' and estado_in = true and estado_pro = true) and (cod_in like '%".$q."%' or nom_in like '%".$q."%') ORDER BY id_in");

	$conexion->close();

	return $query;	
}

function consumo_sin_confirmar()
{
	$conexion=conectar();
	
	$query=$conexion->query($conexion->real_escape_string("SELECT factura.id_fac,factura.fecha_fac,factura.id_usd_fac,usuario.id_us,usuario.nom_us FROM factura,usuario WHERE estado_fac = 1 and factura.id_usd_fac = usuario.id_us ORDER BY id_fac"));

	$conexion->close();

	return $query;		
}

function calcular_insumos_faltantes_msg()
{
$insumos=consultar_insumo_compra();

$i=0;

$mssg="<script type='text/javascript'>
var msg='Recomiendo comprar los siguentes insumos:<br><div style=\"max-height: 200px;overflow-y: scroll;\">';
		";
$b="";
$a="";
$mssg2="var msg2='Estos insumos estan por debajo del stock minimo, pero ya fueron solicitados:<br><div style=\"max-height: 200px;overflow-y: scroll;\">';";

while ($filas_insumos=mysqli_fetch_assoc($insumos)) {
	$id_in=$filas_insumos['id_in'];

$verificar_insumos_activo_asignado=verificar_mercancia_proveedor_activo($id_in);
//stock
$insumos_mercancia=false;
if ($verificar_insumos_activo_asignado->num_rows>0){
	$insumos_mercancia=true;
}
	

$stockmin1=$filas_insumos['stockmin'];

$stockmin=($stockmin1*20)/100;

$stockmin+=$stockmin1;

/////////



$cantidad_in=0;

$cantidad_in=$filas_insumos['cantidad_in'];

$pedidos=verificar_pedido_insumos_sin_confirmar($id_in);

////

if ($pedidos->num_rows>0) {

	$cantidad_pe=0;

	while($filas_pedidos=mysqli_fetch_assoc($pedidos)){

	$cantidad_pe+=$filas_insumos['cantidad_in'];

	}
$cantidad_normal=$cantidad_in;
	$cantidad_in+=$cantidad_pe;



if (($cantidad_in>=$stockmin) and ($insumos_mercancia == true)) {

	if ($cantidad_normal<=$stockmin) {

		$mssg2.= " msg2+='<p style=\"border-width: 1px;border-style: solid;border-color: black;\">".$filas_insumos['nom_in']."</p>';";
		$b=true;
	}
}


}
////

if (($cantidad_in<=$stockmin) and ($insumos_mercancia == true)) {

        
        	$mssg.= " msg+='<p style=\"border-width: 1px;border-style: solid;border-color: black;\">".$filas_insumos['nom_in']."</p>';";

        	$a=true;
        
        $i++;
}




////////////whil
}
$m="
		var msg3=(tildes_unicode(msg));
		Swal.fire({
        title: 'Pocos insumos',
        html:msg3,
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     }); 
 </script>";
$mssg.="msg+='</div><br>';";

if ($b==true) {
$mssg2.="msg2+='</div><br>';";
$mssg.=$mssg2;
$mssg.="msg+=msg2;";	
}

	if ($a!='') {

		$mssg.=$m;
	} 
	if ($a=="") {
		$mssg="";

		if ($b==true) {
			$mssg2.=$m;
			$mssg=$mssg2;
		}
	}

	return $mssg;
}


function calcular_insumos_faltantes_agregar()
{
$a="";
$proveedor=$_SESSION['proveedor1'];

$insumos=verificar_proveedor_compra($proveedor);

$i=0;

$mssg="<script type='text/javascript'> var msg='¿Desea que se agregen los siguente insumos a la lista de compras?:<br><div style=\"max-height: 250px;overflow-y: scroll;\" >';";

while ($filas_insumos=mysqli_fetch_assoc($insumos)) {


//stock

$stockmin1=$filas_insumos['stockmin'];

$stockmin=($stockmin1*20)/100;

$stockmin+=$stockmin1;

/////////

$id_in=$filas_insumos['id_in'];

$cantidad_in=0;

$cantidad_in=$filas_insumos['cantidad_in'];

$pedidos=verificar_pedido_insumos_sin_confirmar($id_in);


$verificar_insumos_activo_asignado=verificar_mercancia_proveedor_activo_insumo($id_in,$proveedor);
//stock
$insumos_mercancia=false;
if ($verificar_insumos_activo_asignado->num_rows>0){
	$insumos_mercancia=true;
}

$lista_compras_agregar=verificar_insumo_lista_compra($id_in);
if ($lista_compras_agregar->num_rows>0) {


	while($filas_lista_agregar=mysqli_fetch_assoc($lista_compras_agregar)){
		

		$cantidad_in+=$filas_lista_agregar['can_in_com'];


	}



	
}

////

if ($pedidos->num_rows>0) {

	$cantidad_pe=0;

	while($filas_pedidos=mysqli_fetch_assoc($pedidos)){

	$cantidad_pe+=$filas_insumos['cantidad_in'];

	}
	$cantidad_in+=$cantidad_pe;

}
////
		if (($cantidad_in<=$stockmin) and ($insumos_mercancia==true)) {

		        
		        	$mssg.= " msg+='<p style=\"border-width: 1px;border-style: solid;border-color: black;\">".$filas_insumos['nom_in']."</p>';";

		        	$a=true;
		        
		        $i++;
		}

}


$m="
var msg3=(tildes_unicode(msg));
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Pocos insumos',
     html:msg3,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, Agregar a la lista de compra',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	agregar_automatico();
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })

 </script>";
$mssg.="msg+='</div><br>';";



	if ($a!='') {

		$mssg.=$m;
	} 
	if ($a=="") {
		$mssg="";

	}
if ($i==0) {
	$mssg="";
}
	return $mssg;
}
function agregar_auto_compra()
{

$proveedor=$_SESSION['proveedor1'];

$insumos=verificar_proveedor_compra($proveedor);

$verificar_todo=true;


while ($filas_insumos=mysqli_fetch_assoc($insumos)) {


//stock

					$stockmin_solo=$filas_insumos['stockmin'];

					$stockmin=($stockmin_solo*20)/100;

					$stockmin+=$stockmin_solo;

					$stockmaximo=$filas_insumos['stockmax'];


					/////////

					$id_in=$filas_insumos['id_in'];

					$cantidad_in=0;

					$cantidad_in=$filas_insumos['cantidad_in'];



					$pedidos=verificar_pedido_insumos_sin_confirmar($id_in);

					////

					if ($pedidos->num_rows>0) {

						$cantidad_pe=0;

						while($filas_pedidos=mysqli_fetch_assoc($pedidos)){

						$cantidad_pe+=$filas_pedidos['cantidad_pe'];

						}
						$cantidad_in+=$cantidad_pe;

					}

/*echo $filas_insumos['nom_in'];echo $cantidad_in ;echo"/";echo$stockmaximo; echo"/";echo$stockmin;echo"/<br>";*/
					$buscar_lista=verificar_insumo_lista_compra($id_in);

					$cantidad_filas=$buscar_lista->num_rows;



					if ($cantidad_filas<=0) {



								$cantidad_agregar=$stockmaximo-$cantidad_in;

							     /* echo "sm:".$stockmin." _ can:".$cantidad_in." agre:".$cantidad_agregar;*/


							      $costo=1;
							      if (($cantidad_agregar>0) and ($cantidad_in<=$stockmin)) {
							      	
							    
							      $agregar=agregar_lista_compra($id_in,$cantidad_agregar,$costo);

							      if ($agregar==false) {

						$titulo="Error";

						$msg="Error al agregar";

						$valor=msg_error_sin($msg,$titulo);

						echo $valor;

						$verificar_todo=false;

							      }
							      
							}


					}else{

						$filas_lista=mysqli_fetch_assoc($buscar_lista);

						$costo=$filas_lista['costo_in_com'];

						$cantidad_agregar=$cantidad_in+$filas_lista['can_in_com'];

						$cantidad_total=$stockmaximo-$cantidad_agregar;

						if ($cantidad_total<0) {

							$cantidad_total=0;

						}

						$cantidad_actualizar=$filas_lista['can_in_com']+$cantidad_total;

						$id_lista=$filas_lista['id_lista_compra'];

						if ($cantidad_in<=$stockmin) {
						$actualizar_lista=actualizar_lista_compra($cantidad_actualizar,$costo,$id_lista);	
						

						

						if ($actualizar_lista==false) {

						$titulo="Error";

						$msg="Error al agregar adentro";

						$valor=msg_error_sin($msg,$titulo);

						echo $valor;
						$verificar_todo=false;
							 
						}

					}

					}
////


}




	return $verificar_todo;
}

function agregar_intentos(){

    $conexion=conectar();

	$mifecha= date('Y-m-d H:i:s'); 
	
	$NuevaFecha = strtotime ( '+5 minute' , strtotime ($mifecha) ) ; 

	$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 

	$cantidad=1;

    $query=$conexion->query("INSERT INTO intentos(cantidad,fecha_hora) VALUES('{$cantidad}','{$NuevaFecha}')");


    if ($query==false) {

        $conexion->close();

        return false;
    }

    $conexion->close();

    return true;


}
function agregar_intentos_login(){

    $conexion=conectar();

	$mifecha= date('Y-m-d H:i:s'); 
	
	$NuevaFecha = strtotime ( '+5 minute' , strtotime ($mifecha) ) ; 

	$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 

	$cantidad=1;
	$tipo=1;
    $query=$conexion->query("INSERT INTO intentos(cantidad,fecha_hora,tipo) VALUES('{$cantidad}','{$NuevaFecha}','{$tipo}')");


    if ($query==false) {

        $conexion->close();

        return false;
    }

    $conexion->close();

    return true;


}
function agregar_intentos_preguntas(){

    $conexion=conectar();

	$mifecha= date('Y-m-d H:i:s'); 
	
	$NuevaFecha = strtotime ( '+5 minute' , strtotime ($mifecha) ) ; 

	$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 

	$cantidad=1;
	$tipo=2;
    $query=$conexion->query("INSERT INTO intentos(cantidad,fecha_hora,tipo) VALUES('{$cantidad}','{$NuevaFecha}','{$tipo}')");


    if ($query==false) {

        $conexion->close();

        return false;
    }

    $conexion->close();

    return true;


}



function verificar_fechas() {

$fecha_actual=date('Y-m-d H:i:s');

$verificar=consultar_intentos_login();

if (!($verificar->num_rows>0)) {

  return true;  

}

$filas_intentos=mysqli_fetch_assoc($verificar);

$fecha_inicio=$filas_intentos['fecha_hora'];

   if ($fecha_actual >= $fecha_inicio){

       return true;
   }else{

    return false;
   }
   
}
function verificar_fechas_preguntas() {

$fecha_actual=date('Y-m-d H:i:s');

$verificar=consultar_intentos_preguntas();

if (!($verificar->num_rows>0)) {

  return true;  

}

$filas_intentos=mysqli_fetch_assoc($verificar);

$fecha_inicio=$filas_intentos['fecha_hora'];

   if ($fecha_actual >= $fecha_inicio){

       return true;
   }else{

    return false;
   }
   
}
function limpiar_intentos()
{
	$conexion=conectar();

	$query=$conexion->query("DELETE FROM intentos");

	if ($query==false) {

		$conexion->close();
		return false;
	}
	$conexion->close();
	return true;
}
function limpiar_intentos_preguntas()
{
	$conexion=conectar();

	$query=$conexion->query("DELETE FROM intentos");

	if ($query==false) {

		$conexion->close();
		return false;
	}
	$conexion->close();
	return true;	
}

function consultar_intentos()
{
	$conexion=conectar();

	$query=$conexion->query("SELECT * from intentos");

	if ($query==false) {
		$conexion->close();
		return$query;
	}
			$conexion->close();
		return$query;
}
function consultar_intentos_login()
{
	$conexion=conectar();

	$query=$conexion->query("SELECT * from intentos where tipo = 1");

	if ($query==false) {
		$conexion->close();
		return$query;
	}
			$conexion->close();
		return$query;
}
function consultar_intentos_preguntas()
{
	$conexion=conectar();

	$query=$conexion->query("SELECT * from intentos where tipo = 2");

	if ($query==false) {
		$conexion->close();
		return$query;
	}
			$conexion->close();
		return$query;
}
function actualizar_intentos($cantidad,$id)
{
		$conexion=conectar();

	$query=$conexion->query("UPDATE intentos SET cantidad = '{$cantidad}' WHERE intentos.id_intentos = '{$id}';");

	if ($query==false) {
		$conexion->close();
		return$query;
	}
			$conexion->close();
		return$query;
}

function limpieza()
{
$_SESSION['usuario_clave']=null;
 $_SESSION['verificar_respuesta']=null;
 $_SESSION['id_pregunta']=null;
 $_SESSION['preguntas']=null;
}

function ver_informes()
{
   $verificar_informe=consultar_informe();

   if (!($verificar_informe->num_rows>0)) {
      return;
}

$mssg="<script type='text/javascript'>
var msg='Los siguentes usuarios estan solucitando un cambio de clave:<br><div style=\"height: 200px;overflow-y: scroll;\">';";


while($filas=mysqli_fetch_assoc($verificar_informe)){

$mssg.= " msg+='<p style=\"border-width: 1px;border-style: solid;border-color: black;\">".$filas['nick_us']."</p>';";
}



$mssg.="msg+='</div><br>';";
$mssg.="msg+='<p>Puede cambiar la clave desde consulta de usuario</p>';";



		$mssg.="
		var msg3=(tildes_unicode(msg));
		Swal.fire({
        title: 'Informe',
        html:msg3,
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timerProgressBar: true,
       position: 'center',
       allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: true,
        buttonsStyling: true,
        showCloseButton: true,
        closeButtonAriaLabel: 'cerrar alerta',
     }); 
 </script>";
	echo $mssg;
}

function ver_informes_completo()
{
   $verificar_informe=consultar_informe();

   if (!($verificar_informe->num_rows>0)) {
      return;
}

$mssg="<script type='text/javascript'>
var msg='Los siguentes usuarios <br> estan solucitando un cambio de clave:<br><div style=\"max-height: 200px;\">';";


while($filas=mysqli_fetch_assoc($verificar_informe)){
$id=$filas['id_info'];
$mssg.= " msg+='<p style=\"border-width: 1px;border-style: solid;border-color: black;\">".$filas['nick_us']."<input class=\"pushy__btn pushy__btn--md pushy__btn--red\" style=\"width:110px; height:30px; padding:0px;\" type=\"button\" value=\"Eliminar\" onclick=\"eliminar_info(".$id.")\"></p>';";
}



$mssg.="msg+='</div><br>';";


$mssg.="
var msg3=(tildes_unicode(msg));
 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'Informe',
     html:msg3,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Eliminar todos los informes',
     cancelButtonText: 'Cerrar',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	eliminar_todos();
      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {

      }
    })

 </script>";

	echo $mssg;
}

function borrar_todos_informes()
{
		$conexion=conectar();

	$query=$conexion->query("DELETE FROM informe");

	if ($query == false) {

	$conexion->close();

	return $query;
	}

	$conexion->close();

	return $query;
}
function borrar_informe($q)
{
		$conexion=conectar();

	$query=$conexion->query("DELETE FROM informe WHERE id_info = '{$q}'");

	if ($query == false) {

	$conexion->close();

	return $query;
	}

	$conexion->close();

	return $query;
}

function bloquear_preguntas()
{

    $intentos=consultar_intentos_preguntas();

    if (!($intentos->num_rows>0)) {

        $agregar=agregar_intentos_preguntas();

        if ($agregar==false) {

            echo "error al agregar";
            
        }

    }else{

        $filas_intentos=mysqli_fetch_assoc($intentos);

        $fecha_hora=$filas_intentos['fecha_hora'];

        $cantidad=$filas_intentos['cantidad'];

        $id=$filas_intentos['id_intentos'];

        $cantidad++;

        if ($cantidad>=5) {

            $_SESSION['bloqueo_preguntas']=true;

        }else{

            $actualizar=actualizar_intentos($cantidad,$id);

            if ($actualizar==false) {
                
                echo "error al actaulizar";
            }
        }
    }	
}



function crear_respaldo($ruta,$fecha,$hora)
{

    $conexion = conectar();

$query_buscar=$conexion->query("SELECT * FROM respaldo WHERE ruta ='{$ruta}' and fecha = '{$fecha}' and hora ='{$hora}'");

if ($query_buscar->num_rows>0) {
          $conexion->close();
        
        $respaldo=2;

        return $respaldo;  
}

    $query=$conexion->query("INSERT into respaldo(ruta,fecha,hora) VALUES('{$ruta}','{$fecha}','{$hora}')");

    if ($query == false) {

        $conexion->close();

        return $query;

    }else{

        $query_buscar_2=$conexion->query("SELECT * FROM respaldo WHERE ruta ='{$ruta}' and fecha = '{$fecha}' and hora ='{$hora}'");

        if (!($query_buscar_2->num_rows>0)) {
              $conexion->close();

        return $query;
        }

        $filas_respaldo=mysqli_fetch_assoc($query_buscar_2);

        $campo="Nombre del respaldo:".$ruta;

        $codigo="Codigo:".$filas_respaldo['id_respaldo'];

        $registro="Respaldo";

        $accion="Un respaldo ha sido Creado";

        auditoria($registro,$accion,$campo,$codigo);

        $conexion->close();

        return $query;
    }


}


function agregar_respaldo($ruta,$fecha,$hora)
{

    $conexion = conectar();



    $query=$conexion->query("INSERT into respaldo(ruta,fecha,hora) VALUES('{$ruta}','{$fecha}','{$hora}')");

    if ($query == false) {

        $conexion->close();

        return $query;

    }else{

        $query_buscar_2=$conexion->query("SELECT * FROM respaldo WHERE ruta ='{$ruta}' and fecha = '{$fecha}' and hora ='{$hora}'");

        if (!($query_buscar_2->num_rows>0)) {
              $conexion->close();

        return $query;
        }

        $filas_respaldo=mysqli_fetch_assoc($query_buscar_2);

        $campo="Nombre del respaldo:".$ruta;

        $codigo="Codigo:".$filas_respaldo['id_respaldo'];

        $registro="Respaldo";

        $accion="Un respaldo ha sido agregado";

        auditoria($registro,$accion,$campo,$codigo);

        $conexion->close();

        return $query;
    }


}



function consulta_respaldo_fechas($fecha_inicio,$fecha_final)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from respaldo where fecha BETWEEN '{$fecha_inicio}' AND '{$fecha_final}'");

	return $query;	
}
function consulta_respaldo()
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from respaldo");

	return $query;	
}
function verificar_respaldo($id)
{
	$conexion = conectar();

	$query=$conexion->query("SELECT * from respaldo where id_respaldo='{$id}'");

	return $query;	
}
?>