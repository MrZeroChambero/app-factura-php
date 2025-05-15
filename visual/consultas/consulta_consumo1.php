<?php require_once("f_menu.php");

	$analisis=consultar_analisis();

menu0();
 ?>
<body>
<div id="selec_analisis">
<section class="form-registro"  id="elejjir_an">
<label class="form-h4n" for="analisis">Seleccione un analisis</label>
<select  class="controls"id="analisis" name="analisis">
	<option value="">Seleccione un analisis</option>
	<?php while ($resultado=mysqli_fetch_assoc($analisis)) {
	    ?>
	    <option value="<?php echo $resultado['id_an']; ?>"><?php echo "codigo:"." ".$resultado['cod_an']." "."Nombre:"." ".$resultado['nom_an']; ?></option>
	    <?php
	} ?>
	
</select>
<label class="form-h4n" for="buscar">Buscar</label>
<input  class="controls" type="text" name="buscar" id="buscar"  value="" autocomplete="off">
<input class="pushy__btn pushy__btn--df pushy__btn--blue" type="button" name="enviar" id="enviar" value="enviar" >
</section>
<div id="mostrar_in" class="dope">
	
</div>
</div>

<script type="text/JavaScript" src="jquery.min.js"></script>
<script type="text/javascript" src="f_consulta_con.js"></script>
<script type="text/JavaScript" src="sweetalerta.js"></script>
</body>
</html>