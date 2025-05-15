function validar_can () {
  $("#insumo_en").validate({

rules:{

  can_in:{

    required: true,
    number: true,
    minlength:1
  }

  }


});
if($('#insumo_en').valid() == false){

alert("ingrese la cantidad");
return 0; 
}

}