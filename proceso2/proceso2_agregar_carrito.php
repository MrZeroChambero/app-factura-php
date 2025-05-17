<?php 
require_once('../conexion/conexion.php');

require_once('../funciones_generales.php');

verificar_nivel();

if (isset($_POST['agregar_carrito']) ){

        $id_cli=$_SESSION['cliente'];

        $id_an=$conexion->real_escape_string($_POST['id_an']);

        $can_car=$conexion->real_escape_string($_POST['can_an']);


      if (!filter_var($_POST['can_an'],FILTER_VALIDATE_INT)) {

              $msg="Ingrese una cantidad valida";

              $titulo="Cantidad invalida";

              $val=msg_error($msg,$titulo);

              echo $val;

              exit();

      }
      if (!filter_var($_POST['id_an'],FILTER_VALIDATE_INT)) {

              $msg="Ingrese una cantidad válida";

              $titulo="Análisis invalido";

              $val=msg_error($msg,$titulo);

              echo $val;

              exit(); 
      }

      $verificar=verificar_analisis($id_an);

      if (!($verificar->num_rows>0)) {

              $msg="Ingrese una cantidad válida";

              $titulo="Análisis invalido";

              $val=msg_error($msg,$titulo);

              echo $val;

              exit(); 

      }


        $query_carrito=buscar_carrito($id_cli,$id_an);

        $query_carrito2=buscar_carrito($id_cli,$id_an);

        $carrito=mysqli_fetch_assoc($query_carrito);

        $disponible=servicios_disponibles_mostrar($id_an);

      if ($disponible<$can_car) {
        
              $msg="No hay insumos suficientes";

              $titulo="Error";

              $val=msg_error($msg,$titulo);

              echo $val;

              exit(); 

      }else{



        if ($query_carrito2->num_rows>0) {

                $id_carrito=$carrito['id_car']; 

                $can_car;

                $actualizar=actualizar_carrito($id_carrito,$can_car);

                if ($actualizar == true) {

                        gestionar_insumos_temporal();

                        $msg="Se ha actualizado el carrito";

                        $titulo="correcto";

                        $val=msg_positivo($msg,$titulo);

                        echo $val;

                        echo "<script>cerrar_ventana2();";
                         if (isset($_POST['val']) and $_POST['val'] == true) {
                          echo "ver_carrito();";
                        }
                          echo"</script>"; 

                         exit();



                }else{

                        $msg="Error al actualizar";

                        $titulo="Error";

                        $val=msg_error($msg,$titulo);

                        echo $val;

                        echo "<script>";
                          if (isset($_POST['val']) and $_POST['val'] == true) {
                          echo "ver_carrito();";
                        }
                          echo"</script>"; 
                          exit();
                }
        }else{

                $insertar_carrito=agregar_carrito($id_cli,$id_an,$can_car);

            if ($insertar_carrito == true) {
           
                    gestionar_insumos_temporal();

                    $msg="Se ha agregado al carrito";

                    $titulo="correcto";

                    $val=msg_positivo($msg,$titulo);

                    echo $val;

                    echo "<script>cerrar_ventana2();";

                          if (isset($_POST['val']) and $_POST['val'] == true) {

                             echo "ver_carrito();";

                          }
                       echo"</script>"; 

                     exit();

            }else{
                            $msg="Error al actualizar";

                            $titulo="Error";

                            $val=msg_error($msg,$titulo);

                            echo $val;

                            echo "<script>";
                              if (isset($_POST['val']) and $_POST['val'] == true) {
                              echo "ver_carrito();";
                            }
                              echo"</script>"; 
                              exit();

        }
      }
}
}

?>