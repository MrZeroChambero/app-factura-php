$(document).ready(function() {
//$('#enviar').click(function(){
  pago_1();
$('#vender').click(function(){


  $("#factura").validate({

rules:{
  tipo_pago:{
    required:true,
    number:true

  },
  referencia:{
    required:true,
    number:true,
    minlength:13,
    maxlength:13

  },
  tipo_pago2:{
    required:true,
 number:true
  },
  referencia2:{
    required:true,
    number:true,
    minlength:13,
    maxlength:13

  },
  tipo_pago3:{
    required:true,
 number:true
  },
  referencia3:{
    required:true,
    number:true,
    minlength:13,
    maxlength:13

  },

  cantidad_formas_pago:{
     required:true,
    number:true,
    range: [1, 3]   
  },
  cantidad_pagar1:{
    required:true,
    number:true,
    minlength:1,
    maxlength:20
  },
    cantidad_pagar2:{
    required:true,
    number:true,
    minlength:1,
    maxlength:20
  },
    cantidad_pagar3:{
    required:true,
    number:true,
    minlength:1,
    maxlength:20
  }
  }

}); 

if($('#factura').valid() == false){
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
}else {
  alerta_opcion();
}


});

function alerta_opcion(){

 const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger',
      },
     buttonsStyling: true
    })
  
   swalWithBootstrapButtons.fire({
      title: 'esta seguro?',
     text: "elija si para realizar la Vender",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, Vender',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar();

      } else if (
       
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelado',
          'tome el tiempo necesario',
          'error'
        )
      }
    })
}

function enviar(){

var crear_factura=true;
var tipo_pago=document.getElementById('tipo_pago').value;
var referencia=document.getElementById('referencia').value;
var cantidad_formas_pago=document.getElementById('cantidad_formas_pago').value;

if (cantidad_formas_pago==1) {
var valor_fac='crear_factura='+crear_factura+'&tipo_pago='+tipo_pago+'&referencia='+referencia+'&cantidad_formas_pago='+cantidad_formas_pago;
}else if (cantidad_formas_pago==2){
  var cantidad_pagar1=document.getElementById('cantidad_pagar1').value;
  var cantidad_pagar2=document.getElementById('cantidad_pagar2').value;
  var tipo_pago2=document.getElementById('tipo_pago2').value;
  var referencia2=document.getElementById('referencia2').value;

var valor_fac='crear_factura='+crear_factura+'&tipo_pago='+tipo_pago+'&referencia='+referencia+'&cantidad_formas_pago='+cantidad_formas_pago+'&cantidad_pagar1='+cantidad_pagar1+'&tipo_pago2='+tipo_pago2+'&referencia2='+referencia2+'&cantidad_pagar2='+cantidad_pagar2;

}else if (cantidad_formas_pago==3){
  var cantidad_pagar1=document.getElementById('cantidad_pagar1').value;
  var cantidad_pagar2=document.getElementById('cantidad_pagar2').value;
  var tipo_pago2=document.getElementById('tipo_pago2').value;
  var referencia2=document.getElementById('referencia2').value;
  var cantidad_pagar3=document.getElementById('cantidad_pagar3').value;
  var tipo_pago3=document.getElementById('tipo_pago3').value;
  var referencia3=document.getElementById('referencia3').value;

var valor_fac='crear_factura='+crear_factura+'&tipo_pago='+tipo_pago+'&referencia='+referencia+'&cantidad_formas_pago='+cantidad_formas_pago+'&cantidad_pagar1='+cantidad_pagar1+'&tipo_pago2='+tipo_pago2+'&referencia2='+referencia2+'&cantidad_pagar2='+cantidad_pagar2+'&tipo_pago3='+tipo_pago3+'&referencia3='+referencia3+'&cantidad_pagar3='+cantidad_pagar3;

}




	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'proceso2/proceso2_crear_factura.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor_fac,
	})
	.done(function(respuesta){
		//aqui se accede a la caja osea el div con el id correspondiente para agregar codigo
		$("#aler").html(respuesta);


		
	})
			
	.fail(function() {
		console.log("error");
	});
	}
	});
function desactivar_referenciar2(){
var referencia2 = document.getElementById("referencia2");
referencia2.disabled = true;
document.getElementById("referencia2").value = "";
}
function activar_referenciar2(){
var referencia2 = document.getElementById("referencia2");
referencia2.disabled = false;
document.getElementById("referencia2").value = "";
var tipo_pago = document.getElementById("tipo_pago2");
if (tipo_pago==2) {
desactivar_referenciar2();
}

}
function desactivar_referenciar3(){
var referencia3 = document.getElementById("referencia3");
referencia3.disabled = true;
document.getElementById("referencia3").value = "";
}
function activar_referenciar3(){
var referencia3 = document.getElementById("referencia3");
referencia3.disabled = false;
document.getElementById("referencia3").value = "";
}



function desactivar_tipo_pago2(){
var tipo_pago2 = document.getElementById("tipo_pago2");
tipo_pago2.disabled = true;
document.getElementById("tipo_pago2").value = "";
}
function activar_tipo_pago2(){
var tipo_pago2 = document.getElementById("tipo_pago2");
tipo_pago2.disabled = false;
document.getElementById("tipo_pago2").value = "";
}


function desactivar_tipo_pago3(){
var tipo_pago3 = document.getElementById("tipo_pago3");
tipo_pago3.disabled = true;
document.getElementById("tipo_pago3").value = "";
}
function activar_tipo_pago3(){
var tipo_pago3 = document.getElementById("tipo_pago3");
tipo_pago3.disabled = false;
document.getElementById("tipo_pago3").value = "";

}


function desactivar_cantidad_pagar1(){
var cantidad_pagar1 = document.getElementById("cantidad_pagar1");
cantidad_pagar1.disabled = true;
document.getElementById("cantidad_pagar1").value = "";
}
function activar_cantidad_pagar1(){
var cantidad_pagar1 = document.getElementById("cantidad_pagar1");
cantidad_pagar1.disabled = false;
document.getElementById("cantidad_pagar1").value = "";
}

function desactivar_cantidad_pagar2(){
var cantidad_pagar2 = document.getElementById("cantidad_pagar2");
cantidad_pagar2.disabled = true;
document.getElementById("cantidad_pagar2").value = "";
}

function activar_cantidad_pagar2(){
var cantidad_pagar2 = document.getElementById("cantidad_pagar2");
cantidad_pagar2.disabled = false;
document.getElementById("cantidad_pagar2").value = "";

}

function desactivar_cantidad_pagar3(){
var cantidad_pagar3 = document.getElementById("cantidad_pagar3");
cantidad_pagar3.disabled = true;
document.getElementById("cantidad_pagar3").value = "";
}

function activar_cantidad_pagar3(){
var cantidad_pagar3 = document.getElementById("cantidad_pagar3");
cantidad_pagar3.disabled = false;
document.getElementById("cantidad_pagar3").value = "";
}

function pago_1(){

  document.getElementById('tipo_pago').value="";
desactivar_cantidad_pagar1();
desactivar_cantidad_pagar2();
desactivar_cantidad_pagar3();


desactivar_tipo_pago2();
desactivar_tipo_pago3();

desactivar_referenciar2();
desactivar_referenciar3();

ocultar_referencia2();
ocultar_referencia3();
ocultar_cantidad_pagar1();
ocultar_cantidad_pagar2();
ocultar_cantidad_pagar3();
ocultar_tipo_pago2();
ocultar_tipo_pago3();
ocultar_referencia2();
ocultar_referencia3();
ocultar_pago2();
ocultar_pago3();
activar_efectivo();
}

function pago_2(){

  document.getElementById('tipo_pago').value="";
activar_cantidad_pagar1();
activar_cantidad_pagar2();

activar_tipo_pago2();
activar_referenciar2();

desactivar_tipo_pago3();
desactivar_referenciar3();
desactivar_cantidad_pagar3();

mostrar_tipo_pago2();
ocultar_cantidad_pagar3();
mostrar_cantidad_pagar1();
mostrar_cantidad_pagar2();
mostrar_referencia2();

ocultar_tipo_pago3();

ocultar_referencia3();
mostrar_pago2();
ocultar_pago3();
activar_efectivo();
}

function pago_3(){

  document.getElementById('tipo_pago').value="";
activar_cantidad_pagar1();
activar_cantidad_pagar2();
activar_cantidad_pagar3();


activar_tipo_pago2();
activar_tipo_pago3();

activar_referenciar2();
activar_referenciar3();

mostrar_tipo_pago2();
mostrar_tipo_pago3();
mostrar_cantidad_pagar1();
mostrar_cantidad_pagar2();
mostrar_cantidad_pagar3();
mostrar_referencia2();
mostrar_referencia3();
mostrar_pago2();
mostrar_pago3();
activar_efectivo();
}

function ocultar_referencia2(){
$("#referencia2").removeClass("controls");
$("#referencia2").addClass("oculto modal-container");
}
function mostrar_referencia2(){
$("#referencia2").removeClass("oculto modal-container");
$("#referencia2").addClass("controls");
}
function ocultar_referencia3(){
$("#referencia3").removeClass("controls");
$("#referencia3").addClass("oculto modal-container");
}
function mostrar_referencia3(){
$("#referencia3").removeClass("oculto modal-container");
$("#referencia3").addClass("controls");
}





function ocultar_tipo_pago3(){
$("#tipo_pago3").removeClass("controls");
$("#tipo_pago3").addClass("oculto modal-container");
}
function mostrar_tipo_pago3(){
$("#tipo_pago3").removeClass("oculto modal-container");
$("#tipo_pago3").addClass("controls");
}



function ocultar_tipo_pago2(){
$("#tipo_pago2").removeClass("controls");
$("#tipo_pago2").addClass("oculto modal-container");
}
function mostrar_tipo_pago2(){
$("#tipo_pago2").removeClass("oculto modal-container");
$("#tipo_pago2").addClass("controls");
}



function ocultar_cantidad_pagar3(){
$("#cantidad_pagar3").removeClass("controls");
$("#cantidad_pagar3").addClass("oculto modal-container");
}
function mostrar_cantidad_pagar3(){
$("#cantidad_pagar3").removeClass("oculto modal-container");
$("#cantidad_pagar3").addClass("controls");
}

function ocultar_cantidad_pagar2(){
$("#cantidad_pagar2").removeClass("controls");
$("#cantidad_pagar2").addClass("oculto modal-container");
}
function mostrar_cantidad_pagar2(){
$("#cantidad_pagar2").removeClass("oculto modal-container");
$("#cantidad_pagar2").addClass("controls");
}


function ocultar_cantidad_pagar1(){
$("#cantidad_pagar1").removeClass("controls");
$("#cantidad_pagar1").addClass("oculto modal-container");
}
function mostrar_cantidad_pagar1(){
$("#cantidad_pagar1").removeClass("oculto modal-container");
$("#cantidad_pagar1").addClass("controls");
}

function ocultar_pago2(){
$("#pago2").addClass("oculto modal-container");
}
function mostrar_pago2(){
$("#pago2").removeClass("oculto modal-container");
}
function ocultar_pago3(){
$("#pago3").addClass("oculto modal-container");
}
function mostrar_pago3(){
$("#pago3").removeClass("oculto modal-container");
}
function limpiar_referencia2(){
  var tipo_pago2=document.getElementById('tipo_pago2').value;
  if (tipo_pago2==2) {
desactivar_referenciar2();

  }else {
    activar_referenciar2();
  }
  deactivar_efectivo();
}
function limpiar_referencia3(){
  var tipo_pago3=document.getElementById('tipo_pago3').value;
  if (tipo_pago3==2) {
desactivar_referenciar3();
  }else {
    activar_referenciar3();
  }
  deactivar_efectivo();
}

function ajustar_pagos_j(){

var cantidad_formas_pago=document.getElementById('cantidad_formas_pago').value;
if (cantidad_formas_pago=="") {
$(pago_1());
}else if (cantidad_formas_pago==1) {
  $(pago_1());
}
else if (cantidad_formas_pago==2) {
  $(pago_2());

}
else if(cantidad_formas_pago==3) {
  $(pago_3());
}
}




function deactivar_efectivo(){

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
         activar_efectivo();
        }


 
}
function activar_efectivo(){
            $("#tipo_pago").find("option[value='2']").prop("disabled",false);
          $("#tipo_pago2").find("option[value='2']").prop("disabled",false);

          $("#tipo_pago3").find("option[value='2']").prop("disabled",false);
}