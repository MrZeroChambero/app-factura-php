<?php 
$conexion = new mysqli("localhost","root","","facturacion");

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>

<form id="fac" name="fac" method="post">

		<div>
			<input type="text" name="buscar_cli" id="buscar_cli">
		</div>
		<div id="cliente" name="cliente"></div>
		<input type="text" id="buscar_an" name="buscar_an">
		<div id="lista_an"></div>
		<div id="aler"></div>
	</form>	
			<script type="text/JavaScript" src="jquery-3.6.0.min.js"></script>

			<script type="text/javascript" src="fac_f.js"></script>

 </body>
 </html>