<?php
header('content-type:text/css');
//$colorPrincipal = $_SESSION["sistemaupla_colorinterfaz"];
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];

$tipoLetra = "Helvetica,Arial,sans-serif";
 
echo <<<FINCSS

.ventanaEmerg
{
    position: fixed;
    
    width: 170px; /* Definimos el ancho del objeto a centrar */
    height: 160px; /* Definimos el alto del objeto a centrar */    
    z-index:101;    
    background: rgb(255, 255, 255);
    border-radius: 10px;
    padding: 10px;
    display:none;
    /*border:1px solid rgb(255, 255, 255);*/   
    box-shadow: 0 0 5px #0C0C0C;
    -moz-box-shadow: 0 0 5px #0C0C0C;
    -webkit-box-shadow: 0 0 5px #0C0C0C; 
    -o-box-shadow: 0 0 5px #0C0C0C;
    -ms-box-shadow: 0 0 5px #0C0C0C; 
}

.subtitulo
{
  text-align:center;color: $colorPrincipal;font-weight: bold;font-size: 14px;
}

  .CSSTableSimple_2 table
  {
    border-collapse: collapse;
    /*margin:0px;
    padding:0px;
    width:800px;*/
    border: 1px solid #A3A3A3;
    color:#555;
                
  }
      
  .CSSTableSimple_2 td
  {
    vertical-align:middle;  
    border:0px solid #A3A3A3;
    border-width:1px 1px 1px 1px;
    text-align:center;
    /*padding:0px;*/
    font-size:12px;

    font-weight:normal;

    padding-left: 5px;
    padding-right: 5px;
    padding-top: 5px;
    padding-bottom: 5px;

    max-width: 10px;
    width: 11em; 
    /*border: 1px solid #000000;*/
    word-wrap: break-word;

    font-style: normal;
    font-size: 10pxz;
  }

  /*.CSSTableSimple_2  tr:nth-child(even) td:nth-child(1){ background-color:#D0D0D0; }*/
  .CSSTableSimple_2  td:nth-child(1){ background-color:#D0D0D0; }/*COLOR DE UN REGISTRO SI OTRO NO*/
  .CSSTableSimple_2 tr:first-child th
  {   
    background-color: #D0D0D0;
    border: 0px solid #A3A3A3;
    text-align: center;
    border-width: 0px 0px 1px 1px;
    font-size: 13px;
    /*font-weight: bold;*/
    color:#555;
    height: 45px;
    /*padding: 14px;
    background-image:url(../Recursos/recursos_tabla/tabla_fondo_cabecera.jpg);*/

  }


  /*.CSSTableSimple_2 tr:hover td:nth-child(1)
  {
      /*background: $colorPrincipal;*/
      background: rgb(48, 48, 48);
      color: rgb(180, 92, 92);
  }     */

  #tb_horario_z td
  {
      /*border: 1px solid rgb(114, 114, 114);
      max-width: 10px;*/
  }

  .raya
    {
        /* background: rgba(255,255,255,0.25); */
        background-color: rgba(199, 199, 199,0.25);
        height: 1px;
        width: 137px;
        border: none;
    }

  .menu_horario ul{
        list-style: none;
        list-style-type: none;
        list-style-position: outside;
  }
   
  .menu_horario li{
        line-height: 30px;
        font-size: 16px;
        cursor:pointer;
  }
   
  .menu_horario{
      width: 118px;
      position: absolute;
      border: 1px solid rgb(163, 163, 163);
      -moz-box-shadow: 0 0 5px #888;
      -webkit-box-shadow: 0 0 5px#888;
      background-color: rgb(235, 235, 235);
      border-radius: 5px;
      }
  .menu_horario li:hover{
      color: rgb(255, 255, 255);
      }

FINCSS;
?>









