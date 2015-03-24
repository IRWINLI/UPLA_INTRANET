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
        background: no-repeat fixed center top #99BBE4;    
        color: #333; font: 16px $tipoLetra;
}

.contenedor_cuerpo{
  /*width: 820px;  */
  display: inline-block;
  min-width: 100px;
  text-align: left;
  padding-top:40px;
  padding-left:280px;
  /*padding-top:40px;*/
  /*background-color:red;*/
}

textarea,input  {
                font-family: $tipoLetra;
                /*font-size:16px*/
            }
/* #################### CAJAS DE TEXTO #################### */

.signin-box input[type=usuario],
.signin-box input[type=password],
.signin-box input[type=text]{
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
}



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

.titulo_módulo{
    color:$colorPrincipal;
    font-size: 18px;
    font-weight: bold;
    font-family:$tipoLetra;    
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
            position: absolute;
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
  /*-webkit-border-radius: 8px;
  -moz-border-radius: 8px;*/
  border-radius: 8px;
  border-color:#9A9A9A;
  box-shadow: 6px 6px 9px #333;
}
legend 
{
  font-weight:bold;
  font-size:15px;
  /*margin-top:-0.2em;*/
  /*margin-bottom:-2em;*/
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
/* grid.css */
.container 
{
    width:700px; padding: 35px;margin:0 auto;       
    background: #fff; overflow: hidden;
    display: inline-block;
    min-width: 500px;
    float: left;
}


FINCSS;
?>

























