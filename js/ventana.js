
function ventana(){
	        $("#ventana").removeClass("modal-container");
                $("#ventana").addClass("modal-container show");     
                abrir_ventana();
}

function ventana2(){
	var msg2=$(ventana());
}

function cerrarventana(){
 				$("#ventana").removeClass("modal-container show");
        $("#ventana").addClass("modal-container");
				$("#ventana").html("<section class='modal_small' id='ventana2'>hola</section>");

}
function abrir_ventana(){

        $.ajax({
                url: 'formulario.php',

        })
        .done(function(resultado) {
     
                $("#ventana2").html(resultado);
                
        })
        .fail(function() {
                console.log("error");
        });
}

       
    
       function post(){
        $.ajax({
                url: 'ventana.php',
                type: 'POST',
                data: {xd: 'xd'},
        })
        .done(function() {
                console.log("success");
        })
        .fail(function() {
                console.log("error");
        })
        .always(function() {
                console.log("complete");
        });
        
       }