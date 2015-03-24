<?php
header('content-type:text/css');
//$colorPrincipal = $_SESSION["sistemaupla_colorinterfaz"];
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];

$tipoLetra = "Helvetica,Arial,sans-serif";
 
echo <<<FINCSS
a:link{   
 text-decoration:none;   
}   
.detalle_
{
    width:300px;
    height:30px;
    border:1px solid $colorPrincipal;
    background-color:#FFFFFF;
    color:#2D4167;
    font-size:13px;
    border-radius: 3px;
    margin-bottom: 6px;
    text-align:center;    
    /*text-indent: 5px;*/
}


.menu_lateral_titulo{
  color: rgb(0,116,255);
  font-size: 30px;
  margin-left: 2px;
  margin-top: 2px;
  font-family: $tipoLetra;
  font-weight: 900;
}

.menu_lateral_contenido{
  color: rgb(0,116,255);
  font-size: 12px;
  margin-left: 2px;
  margin-top: 2px;
  font-family: $tipoLetra;
  font-weight: 700;
  text-align: center;
  padding-top: 10px;
}

.menu_lateral_item{
  margin-bottom:20px;
}

.menu_lateral_icono{
  height: 30px;
  width: 30px;
  margin-bottom: -4px;
  padding-right: 10px;
  float:left;
}
  
.nav > li {
    float: left;
    min-width: 20px;
    margin-top:-16px;
    font-family: $tipoLetra;
    list-style: none outside none;
    text-decoration: none;
    font-size: 15px;
    left: 0;
}
 
.nav li a {
    background-color:$colorPrincipal;
    color:$colorPrincipal;
    display:block;
    padding:4px 5px;
    font-family: $tipoLetra;
    list-style: none outside none;
    text-decoration: none;
    font-size: 13px;
}
 
.nav li a:hover { 
    background-color:$colorSecundario;
    color:white;
    text-decoration: none;
    font-family: $tipoLetra;
    list-style: none outside none;
    text-decoration: none;
    font-size: 13px;
}

.nav li ul {  
    display:none;
    position:absolute;
    min-width:14px;
    font-family: $tipoLetra;
    list-style: none outside none;
    text-decoration: none;
    font-size: 15px;
    text-align:left;    
}

.nav li:hover > ul {
    display:block;
    font-family: $tipoLetra;
    list-style: none outside none;
    text-decoration: none;
    font-size: 15px;
    left: auto;
}

/*========================= VENTANA ======================================*/

.titulo{
text-align:right;
background-color:#D9D8E6;
border: 1px solid #5D5D5D;
margin: 0px;
height: 26px;
width: 300px;
padding-top:4px;}

.sub_menu{
 color: #121212;
border: 2px solid $colorPrincipal;
background-color: #FFFFFF;
margin-bottom: 15px;
position: fixed;
z-index: 100;
/*min-width: 230px;*/
/*height: 200px;
width: 300px;*/
border-top:50px;   
}

.sub_menu_grande{
 color: #121212;
border: 2px solid $colorPrincipal;
background-color:white;
margin-bottom: 15px;
position: fixed;
z-index: 102;
/*min-width: 230px;*/
/*height: 200px;
width: 300px;*/
/*border-top:50px;  */
/*border: 1px solid $colorPrincipal */
}

.contenedor_menu{
  background-color: $colorPrincipal;
  /*display: inline-block;*/
  width: 100%;
  min-width: 1000px;
  float: left;
  box-shadow:0px 0px 7px rgb(66, 66, 66);
  z-index:100;
  position: fixed;
  height:36px;
}

#contenedor div{ float:left; }

FINCSS;
?>

























