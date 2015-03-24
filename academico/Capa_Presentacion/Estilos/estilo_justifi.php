<?php
header('content-type:text/css');
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];
$tipoLetra = "Helvetica,Arial,sans-serif";
echo <<<FINCSS

/*====================================================== TABLA PEQUEÑA DE DATOS DE ESTUDIANTES ======================================================*/

	.CSSTableGenerator {
    margin:0px;padding:0px;
    width:100%;
    box-shadow: 10px 10px 5px #888888;
    border:1px solid #000000;
    
    -moz-border-radius-bottomleft:14px;
    -webkit-border-bottom-left-radius:14px;
    border-bottom-left-radius:14px;
    
    -moz-border-radius-bottomright:14px;
    -webkit-border-bottom-right-radius:14px;
    border-bottom-right-radius:14px;
    
    -moz-border-radius-topright:14px;
    -webkit-border-top-right-radius:14px;
    border-top-right-radius:14px;
    
    -moz-border-radius-topleft:14px;
    -webkit-border-top-left-radius:14px;
    border-top-left-radius:14px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
    width:100%;
    
    margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
    -moz-border-radius-bottomright:14px;
    -webkit-border-bottom-right-radius:14px;
    border-bottom-right-radius:14px;
}
.CSSTableGenerator table tr:first-child td:first-child {
    -moz-border-radius-topleft:14px;
    -webkit-border-top-left-radius:14px;
    border-top-left-radius:14px;
}
.CSSTableGenerator table tr:first-child td:last-child {
    -moz-border-radius-topright:14px;
    -webkit-border-top-right-radius:14px;
    border-top-right-radius:14px;
}.CSSTableGenerator tr:last-child td:first-child{
    -moz-border-radius-bottomleft:14px;
    -webkit-border-bottom-left-radius:14px;
    border-bottom-left-radius:14px;
}.CSSTableGenerator tr:hover td{
    
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#cee6ff; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#e5e5e5; }.CSSTableGenerator td{
    vertical-align:middle;
    
    
    border:1px solid #000000;
    border-width:0px 1px 1px 0px;
    text-align:left;
    padding:5px;
    font-size:10px;
    font-family:Verdana;
    font-weight:normal;
    color:#000000;
}.CSSTableGenerator tr:last-child td{
    border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
    border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
    border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
        background:-o-linear-gradient(bottom, #273b6d 5%, #273b6d 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #273b6d), color-stop(1, #273b6d) );
    background:-moz-linear-gradient( center top, #273b6d 5%, #273b6d 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#273b6d", endColorstr="#273b6d");  background: -o-linear-gradient(top,#273b6d,273b6d);

    background-color:#273b6d;
    border:0px solid #000000;
    text-align:center;
    border-width:0px 0px 1px 1px;
    font-size:17px;
    font-family:Arial;
    font-weight:bold;
    color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
    background:-o-linear-gradient(bottom, #273b6d 5%, #273b6d 100%);    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #273b6d), color-stop(1, #273b6d) );
    background:-moz-linear-gradient( center top, #273b6d 5%, #273b6d 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#273b6d", endColorstr="#273b6d");  background: -o-linear-gradient(top,#273b6d,273b6d);

    background-color:#273b6d;
}
.CSSTableGenerator tr:first-child td:first-child{
    border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
    border-width:0px 0px 1px 1px;
}

    
        
/*==========================================================================================================================================*/


        .capa_DatosEstudiante
        {
            float:left;
            position: relative;
            margin-right:10px;
        }
        
        .capa_CursosEstudiante
        {
            float:left;
            position: relative;
        }
        
        #popupbox_asignaturas{
            position:absolute;
            top:30%;
            left: 10%;
            margin-top: -100px;
            margin-left: -100px;
            
            display: none;
            background-color: white;
            border: 5px solid black;
            border-radius: 5px 5px 5px 5px;    
            /*width: 530px;*/
            box-shadow:1px 1px 5px black;
            z-index: 1000;
            padding-left: 15px;
            padding-right: 15px;
            padding-top:0px;
            width:379px;
            height:400px;
            font-size:14px;

        }
        #popupbox_asignaturas_contenido{
            overflow:auto;
            width:380px;
            height:309px;
        }
        #popupbox_asignaturas_titulo{
            background-color: black;
            width: 370px;
            height: 30px;
            margin-left: -21px;
            margin-top: -3px;
            position: absolute;
            float: left;
            padding-left:50px;
            padding-top: 8px;
            border-radius: 5px 5px 5px 5px;
            
            color: white;
            font-family: Verdana,Arial,sans-serif;
            font-size: 1.4em;
            font-weight: bolder;

        }
        
        #popupbox_asignaturas_cerrar{
            background-color: black;
            height: 21px;
            margin-left: 362px;
            margin-top: 1px;
            position: relative;
            float: left;
            padding-left: 9px;
            padding-right: 9px;
            padding-top: 4px;
            border-radius: 5px 5px 5px 5px;
            color: white;
            font-family: Verdana,Arial,sans-serif;
            font-size: 1.1em;
            font-weight: bolder;
        }
        
        #popupbox_asignaturas_cerrar:hover{
            background-color: white;
            color: black;
        }
        
FINCSS;
?>
