$(document).ready(function() {
var contador=document.getElementById('contador').value;
//var xd = document.getElementById('xd').value;
var e=0
var i = 0; 
while (i < contador) {
	e=i;
	var enviar='#enviar_in'+i;
	var id_in ='id_in'+e;
	var can_in='can_in'+e;
	$(enviar).click(function() {
		alert(contador);
		alert('formulario'+i);
		var i=contador;
		i++
});
//alert(i);
}
});