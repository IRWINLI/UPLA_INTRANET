<?php
header('content-type:text/css');
//$colorPrincipal = $_SESSION["sistemaupla_colorinterfaz"];
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];

$tipoLetra = "Helvetica,Arial,sans-serif";
 
echo <<<FINCSS
/* #################### GENERALES #################### */

body{
  width:100%;
  text-align:center;
  margin: 0px auto;
  background: no-repeat fixed center top #e8e8e8;    
  /*background:url(../Recursos/fondo_login.jpg);*/
  color: #333; font: 16px $tipoLetra;
}

.contenedor_cuerpo{
  /*width: 820px;  */
  display: inline-block;
  min-width: 100px;
  text-align: left;
  padding-top:75px;
  padding-left:280px;
  /*padding-top:40px;*/
  /*background-color:red;*/
}

textarea,input  {
                font-family: $tipoLetra;
                /*font-size:16px*/
            }
/* #################### CAJAS DE TEXTO #################### */

/*.signin-box input[type=usuario],
.signin-box input[type=password],
.signin-box input[type=text],
textarea{
  width: 80%;
  height: 32px;
  font-size: 15px;
  direction: ltr;
}
    
input[type=usuario]:focus,
input[type=text]:focus,
input[type=password]:focus{
  outline: none;
  border: 1px solid $colorPrincipal;
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.3);
}
    
input[type=usuario],
input[type=password],
input[type=text]
{
  -webkit-appearance: none;
  appearance: none;
  display: inline-block;
  height: 29px;
  margin: 0;
  padding: 0 8px;
  background: #fff;
  /*border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;*/
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-border-radius: 1px;
  -moz-border-radius: 1px;
  border-radius: 1px;
  width:300px;
}*/



/* #################### BOTONES #################### */
    
.button:focus {
  outline: none;
}
    
.button-border-primary.disabled {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -webkit-appearance: none; }
    
.button-flat-primary {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -webkit-transition-property: background;
  -moz-transition-property: background;
  -o-transition-property: background;
  transition-property: background;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;font-family:$tipoLetra;
  background: #00a1cb;
  color: white;
  text-shadow: none;
  border: none;
}
  
.button {
  -webkit-box-shadow: inset 0px 1px 0px rgba(255, 255, 255, 0.5), 0px 1px 2px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: inset 0px 1px 0px rgba(255, 255, 255, 0.5), 0px 1px 2px rgba(0, 0, 0, 0.15);
  box-shadow: inset 0px 1px 0px rgba(255, 255, 255, 0.5), 0px 1px 2px rgba(0, 0, 0, 0.15);
  background-color: #eeeeee;
  background: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, #fbfbfb), color-stop(100%, #e1e1e1));
  background: -webkit-linear-gradient(top, #fbfbfb, #e1e1e1);
  background: -moz-linear-gradient(top, #fbfbfb, #e1e1e1);
  background: -o-linear-gradient(top, #fbfbfb, #e1e1e1);
  background: linear-gradient(top, #fbfbfb, #e1e1e1);
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  *vertical-align: auto;
  zoom: 1;
  *display: inline;
  border: 1px solid #d4d4d4;
  height: 32px;
  line-height: 32px;
  /*padding: 0px 25.6px;*/
  font-weight: 300;
  font-size: 14px;
  font-family: "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", "Lucida Grande", sans-serif;
  color: #666666;
  text-shadow: 0 1px 1px white;
  margin: 0;
  text-decoration: none;
  text-align: center;
  width:80px;
}

.button-flat-primary {
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  -webkit-transition-property: background;
  -moz-transition-property: background;
  -o-transition-property: background;
  transition-property: background;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  background: $colorSecundario;
  color: white;
  text-shadow: none;
  border: none;
  cursor: pointer;
}
  
.button-flat-primary:hover {
    background: $colorPrincipal;
}



/*========================= BOTON ========================================*/

.classname {
    -moz-box-shadow:inset 0px 1px 0px 0px #ffffff;
    -webkit-box-shadow:inset 0px 1px 0px 0px #ffffff;
    box-shadow:inset 0px 1px 0px 0px #ffffff;
    /*background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ededed), color-stop(1, #dfdfdf) );*/
    background:-moz-linear-gradient( center top, #ededed 5%, #dfdfdf 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#dfdfdf');
    background-color:#ededed;
    /*-webkit-border-top-left-radius:6px;
    -moz-border-radius-topleft:6px;
    border-top-left-radius:6px;
    -webkit-border-top-right-radius:6px;
    -moz-border-radius-topright:6px;
    border-top-right-radius:6px;
    -webkit-border-bottom-right-radius:6px;
    -moz-border-radius-bottomright:6px;
    border-bottom-right-radius:6px;
    -webkit-border-bottom-left-radius:6px;
    -moz-border-radius-bottomleft:6px;
    border-bottom-left-radius:6px;*/
    text-indent:0;
    border:1px solid #dcdcdc;
    display:inline-block;
    color:#777777;
    font-family:arial;
    font-size:14px;
    font-weight:bold;
    font-style:normal;
    height:50px;
    line-height:50px;
    width:125px;
    text-decoration:none;
    text-align:center;
    text-shadow:1px 1px 0px #ffffff;
}
.classname:hover {
    background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #dfdfdf), color-stop(1, #ededed) );
    background:-moz-linear-gradient( center top, #dfdfdf 5%, #ededed 100% );
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#dfdfdf', endColorstr='#ededed');
    background-color:#dfdfdf;
}.classname:active {
    position:relative;
    top:1px;
}

.cmb_
{
    width:300px;
    height: 29px;
    border:1px solid #04467E;
    background-color:#FFFFFF;
    color:#2D4167;
    font-size:15px;
}


/* ================== ESTILOS DE POP UP BOX MINIMIZADO ================== */

        #popupbox_minimizado{
            background-color: black;
            position: fixed;
            border-radius: 5px 5px 5px 5px;
            width: 350px;
            height: 25px;
            bottom: 0px;
            right: 0%;
            z-index: 100;
            color: white;
            font-family: Verdana,Arial,sans-serif;
            font-size: 1.1em;
            font-weight: bold;
            padding-top: 7px;
            display: none;
        }
        
        #cargando{
            width:100%;
            height:500%;
            display: none;
            position: fixed;
            z-index: 2000;
            background-color: white;
            background-image:url(../Recursos/cargando.gif);
            background-position: center 7%;
            background-repeat: no-repeat;
            /*background-size:20px;*/
            opacity:0.9;
            filter:alpha(opacity=40); 
            top:0;
            left:0;
        }

.squaredTwo {
  width: 18px;
  height: 27px;
  position: relative;
  margin: 0px auto;
  background: #fcfff4;
  @include background( linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%) );
  @include box-shadow( inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5) );  
    &:hover::after {
      @include opacity( 0.3 );
    }
  
}

/*efecto para mensajes en los div's*/

.infobox {
    position:relative;
    border:1px solid #000; 
    background-color:#CCC;
    width:73px;
    padding:5px;
    }
.infobox img {
 position:relative;
 z-index:2;
    }
.infobox .more {
 display:none;
    }
.infobox:hover .more {
 display:block;
    position:absolute;
    z-index:1;
    left:-1px;
    top:-1px;
    width:73px;
    padding:78px 5px 5px;
    border:1px solid #900;
    background-color:#FFEFEF;
    }
/*################# Titulo con Estilo ################### */
#underline {
  background: #FFF;
}
h1.underline {
  /*background: url(URL_h1-underline.png) bottom left no-repeat;*/
  font-family: georgia, "times new roman", times, serif;
  font-weight: lighter;
}
#underline p {
  font-family: "trebuchet ms", verdana, sans-serif;
  font-size: 0.9em;
}

fieldset 
{
  padding:0 1.4em 1.4em 1.4em;margin:0 0 1.5em 0;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  border-radius: 8px;
  border-color:$colorPrincipal;  
}
legend 
{
  font-weight:bold;font-size:18px;margin-top:-0.2em;margin-bottom:1em;
}
fieldset, #IE8#HACK 
{
  padding-top:1.4em; color: # 00f;
  background-color: #ddd
}
legend, #IE8#HACK 
{ 
  padding: 0.2em 0.5em;  
  color: $colorPrincipal;  
  text-align: right;
}
/* grid.css */
.container 
{
    width:700px; padding: 35px;margin:0 auto;       
    background: #fff; overflow: hidden;
    display: inline-block;
    min-width: 500px;
    float: left;
}




/*################################## ESTILOS DE MÓDULOS #################################### */


.titulo_modulo
{
    height: 40px;
    margin-top: -15px;
    margin-bottom: 10px;
    border-bottom: 2px solid #AAA;
    background-image: url('../Recursos/recursos_modulos/logo_modulo.png');
    background-repeat: no-repeat;
    padding-top: 11px;
    padding-left: 43px;
    font-size: 20px;
    background-position: 2px 9px;
    background-size: 30px auto;
    font-weight: bold;
    color: #333;  
}

.separador_modulo
{
    border-bottom: 2px solid #AAA;
    background-repeat: no-repeat;
    padding-left: 43px;
    margin-top: -20px;
}

.css_btn
{
    background-color:#E8E8E8;
    color: $colorPrincipal;
    font-weight:bolder;
    min-height:32px;
    border-style: solid;
    border-width: 2px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 5px;
    border-color:$colorPrincipal;
    position: relative;
    top: 1px;
}

.css_btn:hover
{
    background-color:$colorPrincipal;
    color: #E8E8E8;
}

fieldset 
{
  padding:0 1.4em 1.4em 1.4em;margin:0 0 1.5em 0;
  /*-webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  border-radius: 8px;*/
  border-color:#9A9A9A;
  /*box-shadow: 15px 15px 9px #555;*/
  min-width: 600px;
  margin-right: 72px;
}

fieldset, #IE8#HACK 
{
  padding-top:1.4em; color: # 00f;
  background-color: #fff
}
legend, #IE8#HACK 
{ 
  /*padding: 0.2em 0.5em; */
  color: $colorPrincipal;  
  text-align: right;
}


.form_busqueda
{
    background-color:white;
    border-style: solid;
    border-width: 1px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    border-color:$colorPrincipal;
    width:350px;
    height: 34px;
}


input[type=busqueda]
{
    -webkit-appearance: none;
    appearance: none;
    display: inline-block;
    margin: 0;
    padding: 0 8px;
    background: #fff;
    width: 305px;
    border-style: none;
    font-size: 14px;
    /* margin-top: 0px; */
    margin-left: 6px;
    text-align: center;
    height: 34px;
}

input[type=password],input[type=texto]
{

    -webkit-appearance: none;
    appearance: none;
    display: inline-block;
    margin: 0;
    padding: 0 8px;
    background: #fff;
    width:310px;
    border-style:none;
    font-size: 14px;
    margin-top: 2px;
    margin-bottom: 2px;
        background-color:white;
    border-style: solid;
    border-width: 1px;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 5px;
    border-color:$colorPrincipal;
    width:350px;
    height: 28px;
    text-align: center;
}

label
{
    /*color:$colorPrincipal;
    font-weight:bold;*/
    font-size: 14px;
}
.css_btn_buscar
{
    background-color:$colorPrincipal;
    height:27px;
    width: 27px;
    border-style: solid;
    border-width: 4px;
    -webkit-border-radius: 6px;
    -webkit-border-top-left-radius:0px;
    -webkit-border-bottom-left-radius:0px;
    -moz-border-radius: 6px;
    -moz-border-top-left-radius:0px;
    -moz-border-bottom-left-radius:0px;
    border-radius: 6px;
    border-top-left-radius:0px;
    border-bottom-left-radius:0px;
    border-color:$colorPrincipal;
    background-image: url('../Recursos/recursos_modulos/btn_buscar.png');
    background-size: 20px auto;
    background-repeat: no-repeat;
    background-position: 5px 5px;
    float:right;
}

.css_btn_buscar:hover
{
    background-color:#333;
    border-color:#333;
}

.css_mod_subtitulo
{
    color: #333;
    font: bold 16px "Open Sans Condensed",sans-serif;
}

.css_mod_parrafo
{
    font: italic 14px "Open Sans Condensed",sans-serif;
    text-align : justify;
    
}
/*----------------------------------------------------------------------------------------*/

.inicio_mod
{
    background-color:white;
    /*min-width: 900px;*/
    width:740px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px;
    border-color:#CFCFCF;
    align-content:center;
    /*box-shadow: 4px 4px 9px #555;*/
}
.inicio_mod_titulo
{
    height: 40px;
    margin-top: 0px;
    margin-bottom: 10px;
    border-bottom: 1px solid #CFCFCF;
    background-image: url('../Recursos/recursos_modulos/logo_sistema.png');
    background-repeat: no-repeat;
    padding-top: 11px;
    padding-left: 52px;
    font-size: 27px;
    background-position: 12px 14px;
    background-size: 30px auto;
    font-weight: bold;
    color: $colorPrincipal;
}

.inicio_mod_contenido
{
    background-color:white;
    /*min-width: 944px;*/
    width:720px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    border-style: solid;
    border-width: 1px;
    border-color:#CFCFCF;
    margin: 17px auto 17px;
    align-content:center;
    padding-top: 10px;
    text-align:center;
}

.inicio_mod_parrafo
{
    width: 698px;
    text-align : justify;
    padding-left: 13px;
    padding-right: 17px;
    color: #333;
    font: italic 12px "Open Sans Condensed",sans-serif;
}


/*----------------------------------------------------------------------------------*/

#notificacion
{
    background-color: #FFF;
    width: 425px;
    height: 125px;
    position: fixed;
    bottom: -130px;
    right: 5px;
    border: 1px solid #999;
    border-radius: 8px;
    z-index:1010;
}

.notif_icon
{
    width: 100px;
    height:inherit;
    padding-top: 35px;
    float: left;
}

.notif_titulo
{
    height: 30px;
    padding-top: 15px;
    text-align: left;
    font-weight: 600;
    font-size: 15px;
}

.notif_mensaje
{
    color:#777;
    font-size: 12px;
    text-align: justify;
    text-justify: inter-word;
    padding-right: 30px;
}
.notif_btnCerrar
{
    background-image: url('../Recursos/modulos_intranet/btn_cerrar_notificacion.png');
    float: right;
    width: 25px;
    height: 32px;
    background-size: 48px 18px;
    background-position: 3px 4px;
    background-repeat: no-repeat;
}
.notif_btnCerrar:hover
{
    background-position: -27px 4px;
}


/*==================== ESTILOS DE CUADRO DE DÍALOGO ====================*/

.cuadroDialogo
{
    position: fixed;
    top: 50%;
    left: 50%;
    width: 472px;
    margin-left: -250px;
    margin-top: -120px;
    background-color:white;
    /*background-color:#444;*/
    border-radius:10px;
    z-index:1000;
    padding-left: 17px;
    padding-right:33px;
    color: #444;
    font-weight: bold;
}

.cuadroDialogo_titulo
{
    height: 30px;
    margin-top: 0px;
    margin-bottom: -5px;
    border-bottom: 1px solid #CFCFCF;
    font-size: 16px;
    color: $colorPrincipal;
    padding-top:7px;
    width:486px;
}

.cuadroDialogo_icono_0,.cuadroDialogo_icono_1,.cuadroDialogo_icono_2
{
    width: 52px;
    height: 60px;
    
    background-size: 47px auto;
    background-repeat: no-repeat;
    background-position: 0px 13px;
    float: left;
}

.cuadroDialogo_icono_0{background-image: url('../Recursos/modulos_intranet/icono_error.png');}
.cuadroDialogo_icono_1{background-image: url('../Recursos/modulos_intranet/icono_advertencia.png');}
.cuadroDialogo_icono_2{background-image: url('../Recursos/modulos_intranet/icono_correcto.png');}

.cuadroDialogo_contenido
{
    width:415px;
    height:100px;
    text-align :justify;
    margin-top:8px;
    padding-left:54px;
}

.cuadroDialogo_descripcion
{
    color:black;
    font-weight:normal;
}

.cuadroDialogo_btnCerrar
{
    background-image: url('../Recursos/modulos_intranet/btn_cerrar_notificacion.png');
    float: right;
    width: 25px;
    height: 32px;
    background-size: 48px 18px;
    background-position: 3px 4px;
    background-repeat: no-repeat;
    margin-right: -30px;
    margin-top: 2px;
}
.cuadroDialogo_btnCerrar:hover
{
    background-position: -27px 4px;
}


.pantallaBloqueada
{
   display: block;
   position: fixed;
   top: 0;
   left: 0;
   z-index: 999;
   width: 100%;
   height: 100%;
   background-color:black;
   opacity:0.6;
}




FINCSS;
?>









