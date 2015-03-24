<?php
header('content-type:text/css');
//$colorPrincipal = $_SESSION["sistemaupla_colorinterfaz"];
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];

$tipoLetra = "Helvetica,Arial,sans-serif";
 
echo <<<FINCSS

	/*label, input { display:block; }*/
    input.text { margin-bottom:12px; width:95%; padding: .4em; }
    fieldset { padding:0; border:0; margin-top:25px; }
    h1 { font-size: 1.2em; margin: .6em 0; }
    div#users-contain { width: 350px; margin: 20px 0; }
    div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
    div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
    .ui-dialog .ui-state-error { padding: .3em; }
    .validateTips { border: 1px solid transparent; padding: 0.3em; }

	.cuadro
	{
	  color:white;font-size:19px;font-family:$tipoLetra;font-weight: 900;
	}
	.sub_tit
	{
	  color:white;font-size:13px;font-family:$tipoLetra;font-weight: 900;
	}

	#block{
	    width:100%;
	    height:100%;
	    display: none;
	    position: fixed;
	    z-index: 999;
	    background-color: black;
	    opacity:0.7;
	    filter:alpha(opacity=40); 
	    top:0;
	    left:0;
	    text-align: center;
	}

fieldset.group  { 
  margin: 0; 
  padding: 0; 
  margin-bottom: 1.25em; 
  padding: .125em; 
  border-style: none; 
  background:$colorSecundario;
} 

fieldset.group legend { 
  margin: 0; 
  padding: 0; 
  font-weight: bold; 
  margin-left: 20px; 
  font-size: 100%; 
  color: black; 
} 
ul.checkbox  { 
  margin: 0; 
  padding: 0; 
  /*margin-left: 20px; */
  list-style: none; 
} 

ul.checkbox li input { 
  margin-right: .25em; 
} 

ul.checkbox li { 
  border: 1px transparent solid; 
} 

ul.checkbox li label { 
  margin-left: ; 
} 

ul.checkbox li:hover, 
ul.checkbox li.focus  { 
  background-color: $colorPrincipal; 
  border: 1px white solid; 
  width: 100%; 
} 


.required { 
  font-size: 75%; 
  color: blue; 
} 

FINCSS;
?>