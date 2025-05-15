$(buscar_au());

function buscar_au(){


	$.ajax({

		url:'crud/crud_basicos/crud_au.php',
		
	})
	.done(function(respuesta){

		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
} 

function isNum(val){
  return !isNaN(val)
}

function consultar(){

var id =document.getElementById('id').value;

var bolean=(isNum(id));

if (bolean != true) {

	var id = 1;

}else {

	if (id < 0) {

		var id = 1;

	} 
	if (id > 10) {

		var id = 1;

	}	
}

var name='accion'+id;

var usuario=document.getElementById('usuario').value;

var registro=document.getElementById('registro').value;

var accion=document.getElementById(name).value;

var fecha_f=document.getElementById('fecha_f').value;

var fecha_i=document.getElementById('fecha_i').value;

var consulta="";

var valor="usuario="+usuario+"&registro="+registro+"&accion="+accion+"&fecha_f="+fecha_f+"&fecha_i="+fecha_i+"&consulta="+consulta;

	$.ajax({

		url:'crud/crud_basicos/crud_au.php',
		
		type:'POST',

		dataType:'html',

		data: valor,
	})
	.done(function(respuesta){

		$("#datos").html(respuesta);
			})
	.fail(function() {
		console.log("error");
	})
	
	
} 


function accion1_activar(){
var select1 = document.getElementById('accion1');
select1.disabled = false;
$("#accion1").removeClass("modal-container oculto");
$("#accion1").addClass("controls");
}
function accion0_activar(){
var select1 = document.getElementById('accion0');
select1.disabled = false;
$("#accion0").removeClass("modal-container oculto");
$("#accion0").addClass("controls");
}

function accion2_activar(){
var select2 = document.getElementById('accion2');
select2.disabled = false;
$("#accion2").removeClass("modal-container oculto");
$("#accion2").addClass("controls");
}
function accion3_activar(){
var select3 = document.getElementById('accion3');
select3.disabled = false;
$("#accion3").removeClass("modal-container oculto");
$("#accion3").addClass("controls");
}

function accion4_activar(){
var select4 = document.getElementById('accion4');
select4.disabled = false;
$("#accion4").removeClass("modal-container oculto");
$("#accion4").addClass("controls");
}
function accion5_activar(){
var select5 = document.getElementById('accion5');
select5.disabled = false;
$("#accion5").removeClass("modal-container oculto");
$("#accion5").addClass("controls");
}
function accion6_activar(){
var select6 = document.getElementById('accion6');
select6.disabled = false;
$("#accion6").removeClass("modal-container oculto");
$("#accion6").addClass("controls");
}
function accion7_activar(){
var select7 = document.getElementById('accion7');
select7.disabled = false;
$("#accion7").removeClass("modal-container oculto");
$("#accion7").addClass("controls");
}

function accion8_activar(){
var select7 = document.getElementById('accion8');
select7.disabled = false;
$("#accion8").removeClass("modal-container oculto");
$("#accion8").addClass("controls");
}
function accion9_activar(){
var select7 = document.getElementById('accion9');
select7.disabled = false;
$("#accion9").removeClass("modal-container oculto");
$("#accion9").addClass("controls");
}
function accion10_activar(){
var select7 = document.getElementById('accion10');
select7.disabled = false;
$("#accion10").removeClass("modal-container oculto");
$("#accion10").addClass("controls");
}



function accion1_desactivar(){
var select1 = document.getElementById('accion1');
select1.disabled = true;
$("#accion1").removeClass("controls");
$("#accion1").addClass("modal-container oculto");
}

function accion2_desactivar(){
var select2 = document.getElementById('accion2');
select2.disabled = true;
$("#accion2").removeClass("controls");
$("#accion2").addClass("modal-container oculto");
}
function accion3_desactivar(){
var select3 = document.getElementById('accion3');
select3.disabled = true;
$("#accion3").removeClass("controls");
$("#accion3").addClass("modal-container oculto");
}

function accion4_desactivar(){
var select4 = document.getElementById('accion4');
select4.disabled = true;
$("#accion4").removeClass("controls");
$("#accion4").addClass("modal-container oculto");
}
function accion5_desactivar(){
var select5 = document.getElementById('accion5');
select5.disabled = true;
$("#accion5").removeClass("controls");
$("#accion5").addClass("modal-container oculto");
}
function accion6_desactivar(){
var select6 = document.getElementById('accion6');
select6.disabled = true;
$("#accion6").removeClass("controls");
$("#accion6").addClass("modal-container oculto");
}
function accion7_desactivar(){
var select7 = document.getElementById('accion7');
select7.disabled = true;
$("#accion7").removeClass("controls");
$("#accion7").addClass("modal-container oculto");
}

function accion8_desactivar(){
var select8 = document.getElementById('accion8');
select8.disabled = true;
$("#accion8").removeClass("controls");
$("#accion8").addClass("modal-container oculto");
}
function accion9_desactivar(){
var select9 = document.getElementById('accion9');
select9.disabled = true;
$("#accion9").removeClass("controls");
$("#accion9").addClass("modal-container oculto");
}
function accion10_desactivar(){
var select10 = document.getElementById('accion10');
select10.disabled = true;
$("#accion10").removeClass("controls");
$("#accion10").addClass("modal-container oculto");
}
function accion0_desactivar(){
var select10 = document.getElementById('accion0');
select10.disabled = true;
$("#accion0").removeClass("controls");
$("#accion0").addClass("modal-container oculto");
}


function cambiar_select() {
var registro =document.getElementById('registro').value;
var menu = 1;
if (registro== "cliente") {
var menu =5;
}
if (registro == "análisis" ) {
var menu =4;
}
if (registro == "proveedor") {
var menu =6;
}
if (registro == "usuario") {
var menu =3;
}
if (registro == "insumos") {
var menu =10;
}
if (registro == "factura") {
var menu =7;
}
if (registro == "COMPRA") {
var menu =8;
}
if (registro == "seccion") {
var menu =2;
}
if (registro == "consumo") {
var menu =9;
}
if (registro == "Pedidos") {
var menu =0;
}

if (menu==1) {

menu1();
}else if (menu==2){
menu2();
}else if (menu==3) {
menu3();	
}else if (menu == 4) {
menu4();
}else if (menu == 5)  {
menu5();
}else if (menu == 6) {
menu6();
} else if (menu == 7) {
menu7();
} else if (menu == 8) {
menu8();
} else if (menu == 9) {
menu9();
} else if (menu == 10) {
menu10();
} else if (menu == 0) {
menu0();
} else {
menu1();
}
}
function menu1(){
vaciar();
id_menu(1);
accion1_activar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion7_desactivar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu2(){
vaciar();	
id_menu(2);
accion1_desactivar();
accion2_activar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion7_desactivar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu3(){
vaciar();
id_menu(3);
accion1_desactivar();
accion2_desactivar();
accion3_activar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion7_desactivar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu4(){
vaciar();
id_menu(4);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_activar();
accion5_desactivar();
accion6_desactivar();
accion7_desactivar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu5(){
vaciar();
id_menu(5);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_activar();
accion6_desactivar();
accion7_desactivar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu6(){
vaciar();
id_menu(6);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_activar();
accion7_desactivar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu7(){
vaciar();
id_menu(7);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion7_activar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu8(){
vaciar();
id_menu(8);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion8_activar();
accion7_desactivar();
accion9_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu9(){
vaciar();
id_menu(9);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion9_activar();
accion8_desactivar();
accion7_desactivar();
accion10_desactivar();
accion0_desactivar();
}
function menu10(){
vaciar();
id_menu(10);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion10_activar();
accion8_desactivar();
accion9_desactivar();
accion7_desactivar();
accion0_desactivar();
}

function menu0(){
vaciar();
id_menu(0);
accion1_desactivar();
accion2_desactivar();
accion3_desactivar();
accion4_desactivar();
accion5_desactivar();
accion6_desactivar();
accion0_activar();
accion8_desactivar();
accion9_desactivar();
accion10_desactivar();
accion7_desactivar();
}

function vaciar(){
document.getElementById('accion1').value ="";
document.getElementById('accion2').value ="";
document.getElementById('accion3').value ="";
document.getElementById('accion4').value ="";
document.getElementById('accion5').value ="";
document.getElementById('accion6').value ="";
document.getElementById('accion7').value ="";


document.getElementById('accion8').value ="";
document.getElementById('accion9').value ="";
document.getElementById('accion10').value ="";
document.getElementById('accion0').value ="";
}
function id_menu(val){
document.getElementById('id').value = val;
}







function ventana_pdf(){
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
pdf_auditoria();
}
function pdf_auditoria(){
consultar();
	        var pdf="<iframe class='ventanas' src='pdf/pdf_auditoria.php'></iframe>";
        var boton="<button class='pushy__btn pushy__btn--df pushy__btn--blue'  onclick='cerrar_ventana_au()'>Cerrar</button>";
        var pdf_boton=pdf+boton;
        $("#ventana2").html(pdf_boton);

}



function cerrar_ventana_au(){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='ventanas' id='ventana2'></section>");
}