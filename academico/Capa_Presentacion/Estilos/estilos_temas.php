<?php
header('content-type:text/css');
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];
$tipoLetra = "Helvetica,Arial,sans-serif";
echo <<<FINCSS

/*====================================================== TABLA PEQUEÑA DE DATOS DE ESTUDIANTES ======================================================*/

	.CSSTableGenerator_temas table
	{
	    border-collapse: collapse;
	    border-spacing: 0;		
		margin:0px;
		padding:0px;
		width:800px;
		
	}
	
	.CSSTableGenerator_temas tr:hover td{}
	/*.CSSTableGenerator_asignaturas tr:nth-child(odd){ background-color:#d4ffaa; }*/
	.CSSTableGenerator_temas td
	{
		vertical-align:middle;	
		border:1px solid;
		/*border-width:0px 1px 1px 0px;*/
		/*text-align:center;*/
		/*padding:9px;*/
                padding-left:11px;
                padding-top:3px;
                padding-bottom:3px;
		font-size:14px;
		
		font-weight:normal;
		
	}
	
	.CSSTableGenerator_temas tr:first-child th
	{

		background-color:$colorPrincipal;;
		border:0px solid #3F424D;
		text-align:center;
		border-width:0px 0px 1px 1px;
		font-size:14px;
		
		font-weight:bold;
		color:#ffffff;
	}
        
        /*
	.CSSTableGenerator_temas tr:first-child:hover th
	{
		background:-o-linear-gradient(bottom, #002fbf 5%, #3F424D 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3F424D), color-stop(1, #3F424D) );
		background:-moz-linear-gradient( center top, #3F424D 5%, #3F424D 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#3F424D,002fbf);
		background-color:#3F424D;
	}
        */
        
        /*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
        
        .CSSTableGenerator_temasEdicion table
	{
	    border-collapse: collapse;
	    border-spacing: 0;		
		margin:0px;
		padding:0px;
		width:550px;
		
	}
	
	.CSSTableGenerator_temasEdicion tr:hover td{}
	/*.CSSTableGenerator_temasEdicion tr:nth-child(odd){ background-color:#d4ffaa; }*/
	.CSSTableGenerator_temasEdicion td
	{
		vertical-align:middle;	
		border:1px solid;
		/*border-width:0px 1px 1px 0px;*/
		/*text-align:center;*/
		/*padding:9px;*/
                padding-left:11px;
                padding-top:3px;
                padding-bottom:3px;
		font-size:14px;
		
		font-weight:normal;
		
	}
	
	.CSSTableGenerator_temasEdicion tr:first-child th
	{

		background-color:$colorPrincipal;;
		border:0px solid #3F424D;
		text-align:center;
		border-width:0px 0px 1px 1px;
		font-size:14px;
		
		font-weight:bold;
		color:#ffffff;
	}
        
        /*
	.CSSTableGenerator_temasEdicion tr:first-child:hover th
	{
		background:-o-linear-gradient(bottom, #002fbf 5%, #3F424D 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3F424D), color-stop(1, #3F424D) );
		background:-moz-linear-gradient( center top, #3F424D 5%, #3F424D 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#5fbf00", endColorstr="#3f7f00");	background: -o-linear-gradient(top,#3F424D,002fbf);
		background-color:#3F424D;
	}
        */

        
FINCSS;
?>
