
document.URL;
	var location1=document.URL; 
	//alert(location1);
ubicaciones	(location1);


function ubicaciones (location1) {
			var login='http://localhost/facturacion/index.php';
	var menu='http://localhost/facturacion/menu_pri.php';
	 var salida='http://localhost/facturacion/salir.php';
	var auditoria='http://localhost/facturacion/auditoria.php';
	var crud_usuario='http://localhost/facturacion/b_us.php';
	var crud_analisis='http://localhost/facturacion/b_an.php';
	var crud_cliente='http://localhost/facturacion/b_cli.php';
	var crud_insumos='http://localhost/facturacion/b_in.php';
	var crud_proveedor='http://localhost/facturacion/b_pro.php';
	var crud_consumo='http://localhost/facturacion/b_con.php';
	var factura='http://localhost/facturacion/fac.php';
	var entrada='http://localhost/facturacion/entrada.php';
	var error = 'http://localhost/facturacion/error404.php';
	var editar ='http://localhost/facturacion/editar.php';
	var registro_in ='http://localhost/facturacion/registro_in.php';
	var registro_an ='http://localhost/facturacion/registro_an.php';
	var registro_us ='http://localhost/facturacion/registro_us.php';
	var registro_pro ='http://localhost/facturacion/registro_pro.php';
	var registro_cli ='http://localhost/facturacion/registro_cli.php';
	var  consumo ='http://localhost/facturacion/agregar_co.php';
	var proce ='http://localhost/facturacion/proce.php';
		var lista_en='http://localhost/facturacion/lista_temp.php';
		var pdf='http://localhost/facturacion/pdf_en.php';
		var pdf2='http://localhost/facturacion/pdf2.php';
	var vali = undefined;
	if (location1 == login) {
		var vali = true;
	} else if (location1 == menu) {
		var vali = true;
	}
	else if (location1 == pdf2) {
		var vali = true;
	}
else if (location1 == pdf) {
		var vali = true;
	}
	else if (location1 == consumo) {
		var vali = true;
	} else if (location1 == lista_en) {
		var vali = true;
	} else if (location1 == salida) {
		var vali = true;
	}else if (location1 == auditoria) {
		var vali = true;
	} else if (location1 == crud_cliente) {
		var vali = true;
	} else if (location1 == crud_analisis) {
		var vali = true;
	} else if (location1 == crud_insumos) {
		var vali = true;
	} else if (location1 == proce) {
		var vali = true;
	}else if (location1 == crud_proveedor) {
		var vali = true;
	}else if (location1 == crud_consumo) {
		var vali = true;
	}else if (location1 == crud_usuario) {
		var vali = true;
	}else if (location1 == factura) {
		var vali = true;
	}else if (location1 == entrada) {
		var vali = true;
	}else if (location1 == error) {
		var vali = true;
	} else if (location1 == editar) {
		var vali = true;
	} else if (location1 == registro_in) {
		var vali = true;
	} else if (location1 == registro_an) {
		var vali = true;
	} else if (location1 == registro_us) {
		var vali = true;
	} else if (location1 == registro_pro) {
		var vali = true;
	} else if (location1 == registro_cli) {
		var vali = true;
	}else{
		var vali = false;
	}
	if(vali == false){
		window.location='error404.php';
	}
	return vali;
};


	
	
	
/*
	login:'http://localhost/facturacion/index.php',
	menu:'http://localhost/facturacion/menu_pri.php',
	salida:'http://localhost/facturacion/salir.php',
	auditoria:'http://localhost/facturacion/auditoria.php',
	crud_usuario:'http://localhost/facturacion/b_us.php',
	crud_analisis:'http://localhost/facturacion/b_an.php',
	crud_cliente:'http://localhost/facturacion/b_cli.php',
	crud_insumos:'http://localhost/facturacion/b_in.php',
	crud_proveedor:'http://localhost/facturacion/b_pro.php',
	crud_consumo:'http://localhost/facturacion/b_con.php',
	factura:'http://localhost/facturacion/fac.php',
	entrada:'http://localhost/facturacion/entrada.php'
	
	
	*/
