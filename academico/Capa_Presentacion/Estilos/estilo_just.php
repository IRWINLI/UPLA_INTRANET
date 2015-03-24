<?php
header('content-type:text/css');
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];
$tipoLetra = "Helvetica,Arial,sans-serif";
echo <<<FINCSS

/*====================================================== TABLA PEQUEÑA DE DATOS DE ESTUDIANTES ======================================================*/
.caja {
    width:98%;
    display: none;
    padding:5px;
    border:2px solid #FADDA9;
    background-color:#FFFFFF;
}
.mostrar{
    display:block;
    width:98%;
    padding:5px;
    border:1px solid #CCCCCC;
    background-color:#E4E4E4;
}

.mostrar:link{
    color:#333;
    font: bold 12px "Open Sans Condensed",sans-serif;
}
FINCSS;
?>
