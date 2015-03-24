<?php
header('content-type:text/css');
//$colorPrincipal = $_SESSION["sistemaupla_colorinterfaz"];
session_start();
$colorPrincipal = $_SESSION["color1"];
$colorSecundario = $_SESSION["color2"];
$colorLetra= $_SESSION["letra"];

$tipoLetra = "Helvetica,Arial,sans-serif";
 
echo <<<FINCSS

	
/*====================================================== TABLA GRANDE ======================================================*/

	.CSSTableGenerator table
	{
	    border-collapse: collapse;
	    border-spacing: 0;		
		margin:0px;
		padding:0px;
		width:600px;
	}
	
	.CSSTableGenerator tr:hover td{}	
	.CSSTableGenerator tr:nth-child(even){ background-color:$colorPrincipal; }/*COLOR DE UN REGISTRO SI OTRO NO*/
	.CSSTableGenerator td
	{
		vertical-align:middle;	
		border:1px solid $colorSecundario;
		/*border-width:0px 0px 1px 0px;*/
		text-align:center;
		padding:9px;
		font-size:13px;

		font-weight:normal;
		color:$colorLetra;
	}
	
	.CSSTableGenerator tr:first-child th
	{		
		background-color:$colorPrincipal;
		/*border:0px solid #3F424D;*/
		text-align:center;
		border-width:1px 1px 1px 1px;
		font-size:13px;

		font-weight:bold;
		color:#ffffff;
	}
	

/*====================================================== TABLA SIN RAYAS INTERFILAS ======================================================*/

	.CSSTableSimple table
	{
		border-collapse: collapse;
		/*margin:0px;
		padding:0px;*/
		width:800px;
		border: 1px solid #999;
                color:#555;
                
	}
			
	.CSSTableSimple td
	{
		vertical-align:middle;	
		/*border:0px solid $colorSecundario;*/
		border-width:1px 1px 1px 1px;
		text-align:center;
		/*padding:0px;*/
		font-size:12px;

		font-weight:normal;
		
                padding-left: 5px;
                padding-right: 5px;
                padding-top: 5px;
                padding-bottom: 5px;
	}

    .CSSTableSimple tr:hover, .CSSTableSimple tr:nth-child(even):hover
    {
        background: $colorPrincipal;
        color:white;
    }            

        
	.CSSTableSimple  tr:nth-child(even){ background-color:#D0D0D0; }/*COLOR DE UN REGISTRO SI OTRO NO*/
	.CSSTableSimple tr:first-child th
	{		
		background-color:#333;
		/*border:0px solid #3F424D;*/
		text-align:center;
		/*border-width:0px 0px 1px 1px;*/
                font-size:14px;
		font-weight:bold;
		color:#ffffff;
                height: 45px;
                padding: 8px;
                background-image:url(../Recursos/recursos_tabla/tabla_fondo_cabecera.jpg);

	}

        
/*====================================================== TABLA SIN RAYAS INTERFILAS MAS CLARO ======================================================*/

	.CSSTableSimple_claro table
	{
		border-collapse: collapse;
		/*margin:0px;
		padding:0px;*/
		width:800px;
		border: 1px solid #999;
                color:#555;
                
	}
			
	.CSSTableSimple_claro td
	{
		vertical-align:middle;	
		/*border:0px solid $colorSecundario;*/
		border-width:1px 1px 1px 1px;
		text-align:center;
		/*padding:0px;*/
		font-size:13px;

		font-weight:normal;
		
                padding-left: 5px;
                padding-right: 5px;
                padding-top: 5px;
                padding-bottom: 5px;
	}

    .CSSTableSimple_claro tr:hover, .CSSTableSimple_claro tr:nth-child(even):hover
    {
        background: $colorPrincipal;
        color:white;
    }            

        
	.CSSTableSimple_claro  tr:nth-child(even){ background-color:#E9E6E6; }/*COLOR DE UN REGISTRO SI OTRO NO*/
	.CSSTableSimple_claro tr:first-child th
	{		
		background-color:#333;
		/*border:0px solid #3F424D;*/
		text-align:center;
		/*border-width:0px 0px 1px 1px;*/
                font-size:14px;
		font-weight:bold;
		color:#ffffff;
                height: 45px;
                padding: 8px;
                background-image:url(../Recursos/recursos_tabla/tabla_fondo_cabecera.jpg);

	}        

    /*====================================================== TABLA CON CABECERA A RAYAS ======================================================*/

	.CSSTableRayas table
	{
		border-collapse: collapse;
		/*margin:0px;
		padding:0px;*/
		width:800px;
		border: 1px solid #999;
                color:#555;
                
	}
			
	.CSSTableRayas td
	{
		vertical-align:middle;	
		border:0px solid $colorSecundario;
		border-width:1px 1px 1px 1px;
		text-align:center;
		/*padding:0px;*/
		font-size:12px;

		font-weight:normal;
		
                padding-left: 5px;
                padding-right: 5px;
                padding-top: 5px;
                padding-bottom: 5px;
	}

    .CSSTableRayas tr:hover, .CSSTableRayas tr:nth-child(even):hover
    {
        background: $colorPrincipal;
        color:white;
    }            

        
    .CSSTableRayas  tr:nth-child(even){ background-color:#D0D0D0; }/*COLOR DE UN REGISTRO SI OTRO NO*/
    .CSSTableRayas  th
    {		
        background-color: #FFFFFF;
        border: 1px solid #FFFFFF;
        text-align: center;
        border-width: 1px 1px 1px 1px;
        font-size: 14px;
        font-weight: bold;
        color: #ffffff;
        height: 24px;
        background-image:url(../Recursos/recursos_tabla/tabla_fondo_cabecera.jpg);
    }
    


FINCSS;
?>