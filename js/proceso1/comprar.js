$(document).ready(function() {

  pago_1();
//$('#enviar').click(function(){
$('#comprar').click(function(){
$("#f_compras").validate({

rules:{
  forma_pago:{
    required:true

  },
  referencia_com:{
    required:true,
    number:true,
    minlength:13,
    maxlength:13

  },
    forma_pago2:{
    required:true

  },
  referencia2:{
    required:true,
    number:true,
    minlength:13,
    maxlength:13

  },
      forma_pago3:{
    required:true

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
  },
  fecha:{
    required:true,
    date:true
  }
  }

});

if($('#f_compras').valid() == false){
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

}else{
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
     text: "elija si para realizar la compra",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'si, comprar',
     cancelButtonText: 'No, cancela!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
      	enviar();
        swalWithBootstrapButtons.fire(

          'compra en proceso',
          'la compra se esta realizando.',
          'success',

        )
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
var forma_pago=document.getElementById('forma_pago').value;
var referencia_com=document.getElementById('referencia_com').value;
var fecha_compra=document.getElementById('fecha').value;
var cantidad_formas_pago=document.getElementById('cantidad_formas_pago').value;
var crear_compra=true;
if (cantidad_formas_pago==1) {
var valor="forma_pago="+forma_pago+"&referencia_com="+referencia_com+"&crear_compra="+crear_compra+"&fecha_compra="+fecha_compra+'&cantidad_formas_pago='+cantidad_formas_pago;

}else if (cantidad_formas_pago==2){
 var forma_pago2=document.getElementById('forma_pago2').value; 
 var referencia2=document.getElementById('referencia2').value;
 var cantidad_pagar1=document.getElementById('cantidad_pagar1').value;
var cantidad_pagar2=document.getElementById('cantidad_pagar2').value;

var valor="forma_pago="+forma_pago+"&referencia_com="+referencia_com+"&crear_compra="+crear_compra+"&fecha_compra="+fecha_compra+'&cantidad_formas_pago='+cantidad_formas_pago+'&forma_pago2='+forma_pago2+'&referencia2='+referencia2+'&cantidad_pagar1='+cantidad_pagar1+'&cantidad_pagar2='+cantidad_pagar2;

}else if (cantidad_formas_pago==3){
  var referencia2=document.getElementById('referencia2').value;
  var referencia3=document.getElementById('referencia3').value;
  var forma_pago2=document.getElementById('forma_pago2').value;
  var forma_pago3=document.getElementById('forma_pago3').value;
  var cantidad_pagar1=document.getElementById('cantidad_pagar1').value;
  var cantidad_pagar2=document.getElementById('cantidad_pagar2').value;
  var cantidad_pagar3=document.getElementById('cantidad_pagar3').value; 

  var valor="forma_pago="+forma_pago+"&referencia_com="+referencia_com+"&crear_compra="+crear_compra+"&fecha_compra="+fecha_compra+'&cantidad_formas_pago='+cantidad_formas_pago+'&forma_pago2='+forma_pago2+'&referencia2='+referencia2+'&cantidad_pagar1='+cantidad_pagar1+'&cantidad_pagar2='+cantidad_pagar2+'&forma_pago3='+forma_pago3+'&referencia3='+referencia3+'&cantidad_pagar3='+cantidad_pagar3;
}


	$.ajax({
		/*el url es el nombre del archivo php que va a realisar una accion*/
		url:'proceso1/proceso1_crear_compra.php',
		/*type es el metodo de envio get o post*/
		type:'POST',
		/*es para ubicar donde resivira los datos creo que se refiere al archivo donde se mostraran*/
	
		/*el parametro que se enviara al archivo php osea el valor que van en la funcion*/
		data:valor,
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




function ocultar_forma_pago3(){
$("#forma_pago3").removeClass("controls");
$("#forma_pago3").addClass("oculto modal-container");
}
function mostrar_forma_pago3(){
$("#forma_pago3").removeClass("oculto modal-container");
$("#forma_pago3").addClass("controls");
}



function ocultar_forma_pago2(){
$("#forma_pago2").removeClass("controls");
$("#forma_pago2").addClass("oculto modal-container");
}
function mostrar_forma_pago2(){
$("#forma_pago2").removeClass("oculto modal-container");
$("#forma_pago2").addClass("controls");
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
  var forma_pago2=document.getElementById('forma_pago2').value;
  if (forma_pago2==2) {
desactivar_referenciar2();
  }else {
    activar_referenciar2();
  }
  deactivar_efectivo_c();
}
function limpiar_referencia3(){
  var forma_pago3=document.getElementById('forma_pago3').value;
  if (forma_pago3==2) {
desactivar_referenciar3();
  }else {
    activar_referenciar3();
  }
  deactivar_efectivo_c();
}

function ajustar_pagos_f(){

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



function desactivar_forma_pago2(){
var forma_pago2 = document.getElementById("forma_pago2");
forma_pago2.disabled = true;
document.getElementById("forma_pago2").value = "";
}
function activar_forma_pago2(){
var forma_pago2 = document.getElementById("forma_pago2");
forma_pago2.disabled = false;
document.getElementById("forma_pago2").value = "";

}


function desactivar_forma_pago3(){
var forma_pago3 = document.getElementById("forma_pago3");
forma_pago3.disabled = true;
document.getElementById("forma_pago3").value = "";
}
function activar_forma_pago3(){
var forma_pago3 = document.getElementById("forma_pago3");
forma_pago3.disabled = false;
document.getElementById("forma_pago3").value = "";

}






function pago_1(){
  document.getElementById('forma_pago').value="";
desactivar_cantidad_pagar1();
desactivar_cantidad_pagar2();
desactivar_cantidad_pagar3();


desactivar_forma_pago2();
desactivar_forma_pago3();

desactivar_referenciar2();
desactivar_referenciar3();

ocultar_referencia2();
ocultar_referencia3();
ocultar_cantidad_pagar1();
ocultar_cantidad_pagar2();
ocultar_cantidad_pagar3();
ocultar_forma_pago2();
ocultar_forma_pago3();
ocultar_referencia2();
ocultar_referencia3();
ocultar_pago2();
ocultar_pago3();
deactivar_efectivo_c();
}

function pago_2(){
  document.getElementById('forma_pago').value="";
activar_cantidad_pagar1();
activar_cantidad_pagar2();
activar_forma_pago2();
activar_referenciar2();
desactivar_forma_pago3();
desactivar_referenciar3();
desactivar_cantidad_pagar3();

mostrar_forma_pago2();
ocultar_cantidad_pagar3();
mostrar_cantidad_pagar1();
mostrar_cantidad_pagar2();
mostrar_referencia2();

ocultar_forma_pago3();

ocultar_referencia3();
mostrar_pago2();
ocultar_pago3();
deactivar_efectivo_c();
}

function pago_3(){
  document.getElementById('forma_pago').value="";
activar_cantidad_pagar1();
activar_cantidad_pagar2();
activar_cantidad_pagar3();


activar_forma_pago2();
activar_forma_pago3();

activar_referenciar2();
activar_referenciar3();

mostrar_forma_pago2();
mostrar_forma_pago3();
mostrar_cantidad_pagar1();
mostrar_cantidad_pagar2();
mostrar_cantidad_pagar3();
mostrar_referencia2();
mostrar_referencia3();
mostrar_pago2();
mostrar_pago3();
deactivar_efectivo_c();
}



function deactivar_efectivo_c(){


        var forma_pago2=document.getElementById('forma_pago2').value;

        var forma_pago1=document.getElementById('forma_pago').value;

        var forma_pago3=document.getElementById('forma_pago3').value;


    if (forma_pago2==2) {

   if (forma_pago1==2 || forma_pago3==2) {

          document.getElementById('forma_pago').value="";

          document.getElementById('forma_pago3').value="";

      }

          $("#forma_pago").find("option[value='2']").prop("disabled",true);

          $("#forma_pago3").find("option[value='2']").prop("disabled",true);


      
  }
    if (forma_pago1==2) {

   if (forma_pago2==2 || forma_pago3==2) {

          document.getElementById('forma_pago2').value="";

          document.getElementById('forma_pago3').value="";
}

          $("#forma_pago2").find("option[value='2']").prop("disabled",true);

          $("#forma_pago3").find("option[value='2']").prop("disabled",true);


      
  }
      if (forma_pago3==2) {

   if (forma_pago1==2 || forma_pago2==2) {

          document.getElementById('forma_pago').value="";

          document.getElementById('forma_pago2').value="";


}
          $("#forma_pago").find("option[value='2']").prop("disabled",true);

          $("#forma_pago2").find("option[value='2']").prop("disabled",true);


      
  }

//////

        if (forma_pago1!=2 && forma_pago2 != 2 && forma_pago3!=2) {
         activar_efectivo_c();
        }


 
}
function activar_efectivo_c(){
            $("#forma_pago").find("option[value='2']").prop("disabled",false);
          $("#forma_pago2").find("option[value='2']").prop("disabled",false);

          $("#forma_pago3").find("option[value='2']").prop("disabled",false);
}