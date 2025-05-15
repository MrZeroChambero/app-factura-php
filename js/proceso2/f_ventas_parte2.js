function ventana_agregar(id,val){
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = true;
elemento2.disabled = true;
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");

agregar_analisis(id,val);
}

function desactivar_referenciar(){
var referencia = document.getElementById("referencia");
referencia.disabled = true;
document.getElementById("referencia").value = "";
}
function activar_referenciar(){
var referencia = document.getElementById("referencia");
referencia.disabled = false;

}
function verificar(){
	var verificar=document.getElementById("tipo_pago").value;
	if (verificar==2) {
desactivar_referenciar();
	}else {
activar_referenciar();		
	}
	deactivar_efectivo_2();
}




function deactivar_efectivo_2(){

   
        var tipo_pago2=document.getElementById('tipo_pago2').value;

        var tipo_pago1=document.getElementById('tipo_pago').value;

        var tipo_pago3=document.getElementById('tipo_pago3').value;


    if (tipo_pago2==2) {

   
if (tipo_pago3==2 || tipo_pago1==2) {
          document.getElementById('tipo_pago').value="";

          document.getElementById('tipo_pago3').value="";
}
          $("#tipo_pago").find("option[value='2']").prop("disabled",true);

          $("#tipo_pago3").find("option[value='2']").prop("disabled",true);


      
  }
    if (tipo_pago1==2) {

   
if (tipo_pago2==2 || tipo_pago3==2) {
          document.getElementById('tipo_pago2').value="";

          document.getElementById('tipo_pago3').value="";

}
          $("#tipo_pago2").find("option[value='2']").prop("disabled",true);

          $("#tipo_pago3").find("option[value='2']").prop("disabled",true);


      
  }
      if (tipo_pago3==2) {

   
if (tipo_pago2==2 || tipo_pago1==2) {
          document.getElementById('tipo_pago').value="";

          document.getElementById('tipo_pago2').value="";
}
          $("#tipo_pago").find("option[value='2']").prop("disabled",true);

          $("#tipo_pago2").find("option[value='2']").prop("disabled",true);


      
  }





        if (tipo_pago1!=2 && tipo_pago2 != 2 && tipo_pago3!=2) {
              $("#tipo_pago").find("option[value='2']").prop("disabled",false);
          $("#tipo_pago2").find("option[value='2']").prop("disabled",false);

          $("#tipo_pago3").find("option[value='2']").prop("disabled",false);
        }


 
}






















function cerrarventana_agregar(id){
$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal' id='ventana2'></section>");
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = false;
elemento2.disabled = false;
}
function agregar_analisis(id,val){
	if (val) {
		var val ="";

	}
	var valor="id_an_car="+id+"&val="+val;
$.ajax({url: 'visual/factura/agregar_carrito.php',
type: 'POST',
data: valor,})
.done(function(resultado) {
$("#ventana2").html(resultado);
}).fail(function() {});
}
function ventana_carrito(){
$("#ventana3").removeClass("modal-container");
$("#ventana3").addClass("modal-container show");ver_carrito();
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = true;
elemento2.disabled = true;
}
function cerrar_ventana(){
$("#ventana3").removeClass("modal-container show");
$("#ventana3").addClass("modal-container");
$("#ventana3").html("<section class='modal' id='ventana4'></section>");
$("#boton1").removeAttr("disabled");
$("#boton2").removeAttr("disabled");
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = false;
elemento2.disabled = false;
}
function cerrar_ventana2(){


$("#ventana").removeClass("modal-container show");
$("#ventana").addClass("modal-container");
$("#ventana").html("<section class='modal' id='ventana2'></section>");
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = false;
elemento2.disabled = false;

}
function ver_carrito(){
$.ajax({url: 'visual/factura/carrito.php',
type: 'POST',
data: {param1: 'value1'},
}).done(function(resultado) {
$("#ventana4").html(resultado);
}).fail(function(){});
}
function carrito(){
ventana_a();
}
function eliminar_cliente(id) {
	$.ajax({
		url: 'proceso2/proceso2_cambiar_cliente.php',
		type: 'POST',
		data: {eliminar_cliente: id},

	})
	.done(function(respuesta) {
$("#aler").html(respuesta);
	})
	.fail(function() {
		alert("error");

	});
	
}



$(document).on('keyup', '#buscar_analisis', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_analisis(valor);
		} else {
			buscar_analisis();
		}
});

function buscar_analisis(consulta){
	$.ajax({
	url: 'crud/crud_factura/crud_an_ven.php',
	type: 'POST',
	data: {consulta_an: consulta},
})
.done(function(respuesta) {
	$("#analisis").html(respuesta);
	 crud_carrito();
})
.fail(function() {
	console.log("error");

});
}


function agregar_carrito(id,val){

$("#agregar_an").validate({

rules:{
	cantidad:{
		required: true,
		number: true,
		minlength:1,
		maxlength:8
	}
	}

});



if($('#agregar_an').valid() == false){

 Swal.fire({
        title: 'Completa los campos',
        text: 'Debe completar todos los campos',
        icon:'warning',
        confirmButtonText: 'Ok',
        backdrop: true,
        timer: 5000,
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
return;	
}
var can_an=document.getElementById('can_ag_an').value;
var id_an=id;

var agregar_carrito='';

var valor="can_an="+can_an+"&id_an="+id_an+"&agregar_carrito="+agregar_carrito+"&val="+val;

	$.ajax({
		url:'proceso2/proceso2_agregar_carrito.php',
		type:'POST',
		data:valor,
	})

.done(function(respuesta){
		$("#aler").html(respuesta);
		buscar_analisis();
	})		
	.fail(function() {
		console.log("error");
	});

}
function quitar_carrito(id,val){
	var valor="quitar_carrito="+id+"&val="+val;
 $.ajax({
 	url: 'proceso2/proceso2_quitar_carrito.php',
 	type: 'POST',
 	data: valor,
 })
 .done(function(respuesta) {
 	$("#aler").html(respuesta);
	buscar_analisis();
 	 })
 .fail(function() {
 	console.log("error");
 });
 
}

function crud_carrito(){
$.ajax({
	url: 'crud/crud_factura/crud_carrito.php',
})
.done(function(respuesta) {
	$("#crud_carrito").html(respuesta);
})
.fail(function() {
	console.log("error");

});

}
