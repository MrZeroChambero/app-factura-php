<?php 
function servicios_disponibles($id_an){

	$query_consumo=buscar_consumo_general($id_an);

	

	if (!($query_consumo->num_rows>0)) {

		$disponible=0;
		
		return $disponible;
	}
$fff=0;
$e=0;
		while($filas_consumo = mysqli_fetch_assoc($query_consumo)) {
			$e++;
			var_dump($e);

				
				
				$ins=$filas_consumo['id_in'];

				$query_ins_temp=buscar_insumos_temp($ins);

				$verificar_gastos=verificar_gastos($ins);

				$sin_confirmar=0;



				/////////////////////////////////////////////////////////////////////////////


					if ($verificar_gastos->num_rows>0) {
						
								while($cantidad_gasto_1=mysqli_fetch_assoc($verificar_gastos)){

									$sin_confirmar+=$cantidad_gasto_1['can_ins_gasto'];

								}
					    
					}


/////////////////////////////////////////////////////////////////////////////


					if ($query_ins_temp->num_rows>0) {

						$disponiblet=0;

							$filas_ins_temp=mysqli_fetch_assoc($query_ins_temp);

							$can_in=$filas_ins_temp['can_ins_temp']-$sin_confirmar;

							$consumo=$filas_consumo['ca_co'];

							$d=$can_in / $consumo;

							$disponiblet=(int)$d;

							echo $disponiblet."_";
								/////////////////////////////////////////////////////////////////////////////	

										if ($fff==0) {	
											echo "entre";

										  $disponible=$disponiblet;

										}
								/////////////////////////////////////////////////////////////////////////////	

							if($disponible > $disponiblet){
									
									$disponible=$disponiblet;
	
							}

					
	/////////////////////////////////////////////////////////////////////////////				      
					}else{

							$can_in=$filas_consumo['cantidad_in']-$sin_confirmar;

							$consumo=$filas_consumo['ca_co'];

							$d=$can_in / $consumo;

							$disponiblet=(int)$d;

							/*echo $can_in."_".$consumo."/";*/

							/////////////////////////////////////////////////////////////////////////////

											if ($fff==0) {

											/*	echo "dicponible".$disponiblet."i:".$i;*/

												$disponible=$disponiblet;

											}

										/////////////////////////////////////////////////////////////////////////////

							if($disponible > $disponiblet){

								$disponible=$disponiblet;

							}


					}
	/////////////////////////////////////////////////////////////////////////////				
					$fff=10;
						
		}

		return $disponible;
}
 ?>