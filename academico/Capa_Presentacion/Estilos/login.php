<?php
header('content-type:text/css');
$colorPrincipal = "rgb(76, 97, 134)";
//$tipoLetra = "Helvetica,Arial,sans-serif";
 
echo <<<FINCSS
/* #################### SUB TITULO #################### */

 html
  {
    height:100%; /* Le permite al navegador calcular el alto total */
    overflow:hidden; /* Evita que aparezcan barras de scroll al hacer
    la ventana muy pequeña */
  }
  body
  {
    margin:0px; padding:0px;
  }
  #capa_1log
  {
    width:271px;
    height:86px;
    border-radius:10px 10px 0px 0px;
    /*fondo*/
    /*background: rgba(43,43,43,1);*/
    background: #173E61; /* Old browsers */
    /*background: -moz-linear-gradient(top,  #2a84d3 0%, #2d3c54 100%); /* FF3.6+ */
    /*background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#2a84d3), color-stop(100%,#2d3c54)); /* Chrome,Safari4+ */
    /*background: -webkit-linear-gradient(top,  #2a84d3 0%,#2d3c54 100%); /* Chrome10+,Safari5.1+ */
    /*background: -o-linear-gradient(top,  #2a84d3 0%,#2d3c54 100%); /* Opera 11.10+ */
    /*background: -ms-linear-gradient(top,  #2a84d3 0%,#2d3c54 100%); /* IE10+ */
    /*background: linear-gradient(to bottom,  #2a84d3 0%,#2d3c54 100%); /* W3C */
    /*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2a84d3', endColorstr='#2d3c54',GradientType=0 ); /* IE6-9 */


    color:white;
    vertical-align:middle;
    text-align:center; 
    padding:5px 0px 0px 0px;

    /*box-shadow:10px 0px 10px 5px black;*/
    
    /*border:solid white 1px;*/
  }
  #capa_2log
  {
    width:250px;
    height: 164px;
    border-radius:0px 0px 10px 10px;
    background:rgba(139,139,139,0.25);    
    padding: 10px 10px 10px 10px;
    vertical-align:middle;
    text-align:center; 
    /*border:solid white 1px;*/
    /*box-shadow:10px 10px 10px 5px black;*/
 
  }
  #gen
  {
    /*border-radius:10px 10px 10px 10px;
    box-shadow:7px 4px 5px rgba(22,19,19,0.80);*/
    position:absolute;    
    top:50%;
    left: 50%;
    margin-top:-150;
    margin-left:-135;
  }
  .ingresos
  {
    border-radius: 10px 10px 10px 10px;
    padding: 5px 5px;
    width:212px;
    background:rgba(0,0,0,0.25);
    border:none;
    color:white;
    text-align: center;
    font-style: italic;

  }
  .boton
  {
    border-radius: 10px 10px 10px 10px;
    padding: 5px 5px;
    width:142px;
    background:rgb(255,255,255);
    border:none;
    color:black;
    text-align: center;

  }
  .alrededor
  {
    padding: 10px 10px 10px 10px;
  }
  .mensajez
  {
    padding: 10px 10px 10px 10px;
    color:white; 
    text-align:center;
    font-style:italic;
  }

  hr
  {
    /*background: rgba(255,255,255,0.25);*/
    background-color: rgba(255,255,255,0.25);
    height: 1px;
    width: 239px;
    border:none;
  }
  #todo
  {
    position: absolute;
    background-color:#067;
    width:100%;
    height:100%;
    z-index: -1;
  }

FINCSS;
?>