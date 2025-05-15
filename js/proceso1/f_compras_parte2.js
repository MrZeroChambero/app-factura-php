
function buscar_insumo(consulta_in){
$.ajax({
	url: 'crud/crud_compra/crud_in_comp.php',
	type: 'POST',
	dataType:'html',
	data: {consulta_in: consulta_in},
})
.done(function(respuesta2) {
	$("#insumos").html(respuesta2);
	buscar_lista();
})
.fail(function() {
	console.log("error");
});
}
$(document).on('keyup', '#b_in', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_insumo(valor);
		} else {
			buscar_insumo(valor);
		}
	});
function eliminar_proveedor(){
$.ajax({
	url: 'proceso1/proceso1_cambiar_proveedor.php',
	type: 'POST',
	data: {eliminar_proveedor: ''},
})
.done(function(respuesta) {
$("#aler").html(respuesta);

})
.fail(function() {
	console.log("error");
});

}
function agregar_insumo(id,val){
	var valor="insumo_elegido="+id+"&lista="+val;
$.ajax({
	url: 'visual/compra/agregar_insumos_lista.php',
	type: 'POST',
	data: valor,
})
.done(function(respuesta) {
$("#ventana2").html(respuesta);
})
.fail(function() {
	console.log("error");

});

}
function ventana_agregar(id,val){
var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = true;
elemento2.disabled = true;
$("#ventana").removeClass("modal-container");
$("#ventana").addClass("modal-container show");
agregar_insumo(id,val);
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
function ventana_lista(){
$("#ventana3").removeClass("modal-container");
$("#ventana3").addClass("modal-container show");

var elemento1 = document.getElementById("boton1");
var elemento2 = document.getElementById("boton2");
elemento1.disabled = true;
elemento2.disabled = true;
ver_lista();
}

function ver_lista(){
$.ajax({
	url: 'visual/compra/lista_compras.php',
})
.done(function(respuesta) {
$("#ventana4").html(respuesta);
})
.fail(function() {
	console.log("error");

});

}





function quitar_lista(id,valor){
var id_in=id;
var recargar=valor;
var quitar_lista="";
var valor="id_in="+id_in+"&quitar_lista="+quitar_lista+"&recargar="+recargar;
$.ajax({
		url:'proceso1/proceso1_quitar_lista.php',
		type:'POST',
		data:valor,
	})
.done(function(respuesta){
$("#aler").html(respuesta);	})		
	.fail(function() {});
}
function agregar_lista(id,valu,can) {
$("#agregar_in").validate({

rules:{
	
	cantidad:{

		required: true,
		number: true,
		minlength:1,
		maxlength:8
	},
		costo_in:{

		required: true,
		number: true,
		minlength:1,
		maxlength:20
	}

	}

});

if($('#agregar_in').valid() == false){

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

if (can==1) {
var can_in=document.getElementById('can_ag_in').value;
}else {
	var can_in=document.getElementById('can_ag_in2').value;
}


var costo_in=document.getElementById('costo_in').value;

var recargar=valu;

var id_in=id;
var agregar_lista='';
var valor="can_in="+can_in+"&id_in="+id_in+"&agregar_lista="+agregar_lista+"&costo_in="+costo_in+"&recargar="+recargar;
	$.ajax({
		url:'proceso1/proceso1_agregar_lista.php',
		type:'POST',
		data:valor,
	})
	.done(function(respuesta){
	$("#aler").html(respuesta);	
	})	
	.fail(function(){});
}


function crud_lista(){
	$.ajax({
		url: 'visual/compra/buscar_lista_compras.php',
	})
	.done(function(respuesta) {
	$("#lista_compras").html(respuesta);
	buscar_lista();	
	})
	.fail(function() {
		console.log("error");
	});
	
}
function buscar_lista(consulta){


	$.ajax({
		url: 'crud/crud_compra/crud_lista_compras.php',
		type:'POST',
		data:{consulta:consulta},
	})
	.done(function(respuesta) {
	$("#crud_lista_compras").html(respuesta);	
	})
	.fail(function() {
		console.log("error");
	});
}
$(document).on('keyup', '#buscar_lista', function(){
		var valor = $(this).val();
		if(valor!=""){
			buscar_lista(valor);
		} else {
			buscar_lista(valor);
		}
	});

function verificar_tipo_pago(){
	var verificar=document.getElementById("forma_pago").value;
	if (verificar==2) {
desactivar_referenciar();
	}else {
activar_referenciar();		
	}
	deactivar_efectivo_b();
}




function deactivar_efectivo_b(){

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



        if (forma_pago1!=2 && forma_pago2 != 2 && forma_pago3!=2) {
         activar_efectivo_b();
        }


 
}
function activar_efectivo_b(){
            $("#forma_pago").find("option[value='2']").prop("disabled",false);
          $("#forma_pago2").find("option[value='2']").prop("disabled",false);

          $("#forma_pago3").find("option[value='2']").prop("disabled",false);
}











function desactivar_referenciar(){
var referencia = document.getElementById("referencia_com");
referencia.disabled = true;
document.getElementById("referencia_com").value = "";
}
function activar_referenciar(){
var referencia = document.getElementById("referencia_com");
referencia.disabled = false;

}

function agregar_automatico() {
	$.ajax({
		url: 'proceso1/proceso1_agregar_automatico.php',
		type: 'POST',
		data: {agregar: 'true'},
	})
	.done(function(respuesta) {
	$("#aler").html(respuesta);	
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
	
}