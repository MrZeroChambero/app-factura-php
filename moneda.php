<?php
function validar_float($valor)
{

        $patron_numeros = "/^[0-9.]+$/";


        if (!preg_match($patron_numeros,$valor)){

            return false;
        }

        
          $valores = explode(',', $valor);
          if(count($valores) > 1){

            return false;

          }

        $valores = explode('e', $valor);

          if(count($valores) > 1){

            return false;

          }

        $valores = explode('E', $valor);
          if(count($valores) > 1){

            return false;

          }

/*
        $numero=(float)$valor;

        $numero2=(string)$numero;

        if ($numero2!==$valor) {

            echo "valores distintos".$numero2;

          return false;  

        }*/

        $valores = explode('.', $valor);

          if(count($valores) > 2){

            return false;
        }
          

        if (count($valores) == 1) {

        

                    if (!filter_var($valores[0],FILTER_VALIDATE_INT)){

                        return false;

                    }

            return true;
        }

        if(count($valores) > 1){


                        if ($valores[1] === "00") {
                        
                            
                            $valores[1]=0;
                            
                         }
                         if ($valores[1] === "01") {
                            
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "02") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "03") {
                             $a=$valores[1];
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "04") {
                            
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if($valores[1] === "05") {
                            
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "06") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "07") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "08") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }
                         if ($valores[1] === "09") {
                             
                            $v=(int)$valores[1];
                            $valores[1]=$v;
                         }          

                    if (!filter_var($valores[0],FILTER_VALIDATE_INT)){


                        return false;

                    }

                   if ($valores[1]===0) {
                       return true;
                   }

                    if (!filter_var($valores[1],FILTER_VALIDATE_INT,["options" =>["min_range"=>0, "max_range"=>99]])){

                    return false;

                    }



                    return true;


          }
    

        if (!filter_var($valor,FILTER_VALIDATE_FLOAT,["options" =>["min_range"=>1, "max_range"=>9999999999999]])){

            return false;
        }
          return true;


}



/*echo"___";

$numero="123.10e1";


$numero2=(float)$numero;

$numero3=(string)$numero2;

if ($numero3!==$numero) {
    echo "no es igual";

    var_dump($numero);

    echo "<br>";
    var_dump($numero3);
    echo "<br>";
}else{
    echo "es igual";
}


    var_dump($numero);
    echo "<br>";
    var_dump($numero2);
    echo "<br>";

    echo "vart";

    $vart=(float)"123.123";

    var_dump($vart);

    echo "<br> numero3";

    $numero4="123,10e1";

    $g=".";
*/

    if (isset($_POST['numero'])) {

        $validar=validar_float($_POST['numero']);
        var_dump($validar);
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="moneda.php" method="POST">
        <input type="text" name="numero" id="numero">

        <input type="submit" value="enviar">
    </form>
</body>
</html>