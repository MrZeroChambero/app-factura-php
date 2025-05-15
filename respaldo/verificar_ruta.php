<?php
function is_readable_r($dir) {

    if (is_dir($dir)) {


        if(is_readable($dir)){

                        $objects = scandir($dir);
                        foreach ($objects as $object) {
                            if ($object != "." && $object != "..") {

                                if (!is_readable_r($dir."/".$object)) return false;
                                else continue;
                            }
                        }   
                        return true;   

        }else{

            return false;

        }


       
    }else if(file_exists($dir)){

        return (is_readable($dir));
       
    }
}

array(5) { ["name"]=> string(35) "02-10-15_11-10-2022_facturacion.sql" ["type"]=> string(24) "application/octet-stream" ["tmp_name"]=> string(24) "C:\xampp\tmp\php6590.tmp" ["error"]=> int(0) ["size"]=> int(0) }
?>