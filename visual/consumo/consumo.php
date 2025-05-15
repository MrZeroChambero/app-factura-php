<?php require_once("f_menu.php");   
	valida();
	maxlvl();
		$_SESSION['location'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	ubicaciones();
	menu0();  
?>
            <div class='texto-principal margen-interno'>
	<section 	class="principal upper">
<h4 class="form-h4">Consumos asginados</h4>
<label for="caja"> <p>buscar</p>
<input class="controls" type="text" name="caja" id="caja">
<div class="dope" id='aler'>
</label>	
</div>
</section>
<script type="text/JavaScript" src="jquery.min.js"></script>
<script type="text/JavaScript" src="crud_co.js"></script>
</div>
</label>
</header>
</div>
</body>
</html>