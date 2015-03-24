<input type="hidden" name="cant_filas_log" id="cant_filas_log" value="0"/>

<div class="contenedor_cuerpo">
	<fieldset>
		<p class="titulo_modulo">REPORTE DE ASISTENCIA</p>
		<input class="css_btn" type="button" value="Historial Marcaciones" onclick="verMarcacion();" style="margin-bottom: 10px;"/>
		<br><br>
		<div style="width: 100%">
			<input class="detalle_" type="text" name="i_fecha_log" placeholder="Fecha Inicio" id="i_fecha_log" style="width:152px; height:33px;border: 1px solid #d9d9d9; border-top: 1px solid #c0c0c0;"> <!--onfocus="if(this.value == 'Ingrese Fecha de Inicio' || this.value==''){this.value='';}" onblur="if(this.value == ''){this.value='Ingrese Fecha de Inicio'}"-->
			<input class="detalle_" type="text" name="i_fecha_log_2" placeholder="Fecha Fin" id="i_fecha_log_2" style="width:152px; height:33px;border: 1px solid #d9d9d9; border-top: 1px solid #c0c0c0;">    	
			<input class="css_btn" type="button" value="VER REPORTE" onclick="cargar_historial();" />
		</div>    
		<br/>  

		<p style="margin-top: -10px;color: #0404B4;font-size: 15px;font-weight: bold;">
			<img width="25px" height="25px" src="Capa_Presentacion/Recursos/temas/tema_completo.png"> Marcación Correcta</img>&nbsp&nbsp&nbsp
			<img width="25px" height="25px" src="Capa_Presentacion/Recursos/temas/tema_tarde.png"> Tardanza</img>&nbsp&nbsp&nbsp
			<img width="25px" height="25px" src="Capa_Presentacion/Recursos/temas/tema_nulo.png"> No Marcado</img>
		</p> 

		<p style="margin-top: -10px;color: #0404B4;font-size: 15px;font-weight: bold;">
			<img width="25px" height="25px" src="Capa_Presentacion/Recursos/temas/tema_justificadp.png"> Justifcado</img>&nbsp&nbsp&nbsp
			<img width="25px" height="25px" src="Capa_Presentacion/Recursos/temas/tema_incompleto.png"> Fecha posterior</img>
		</p>
		<br/>

		<div class="CSSTableSimple" width="700">
			<table  align="center">								
				<th>ASIGNATURA</th>
				<th>DÍA</th>
				<th>FECHA</th>
				<th>HORARIO</th>
				<th>INGRESO</th>
				<th>SALIDA</th>
				<tbody id="list_log_"></tbody>
			</table>			
		</div>
	</fieldset>
</div>

<div id ='historial_marcaciones' class="CSSTableSimple" width="700" style="display: none">
<p align=justify>
A continuación, usted podrá observar el historial de sus últimas 20 marcaciones, es decir, podrá verificar la hora exacta a la que usted colocó el dedo sobre
el escaner, o acercó su tarjeta de proximidad al marcador, independientemente de si su marcación valió como ingreso o salida, o si fue considerada "puntual",
"tardanza" o "falta" por superar el límite de tolerancia. De esta manera podrá cotrastar esta información con su "Reporte de Asistencias".
</p>
<?php
    $xml_x="<Docente><dni>".$_SESSION['dni']."</dni></Docente>";
    $data=Logica::PA_UPLA("[Academico].[paCon_HistorialMarcacion]","array",$xml_x);
?>

              <table id = "Tablita">
                   <th>Fecha</th>
		   <th>Hora</th>
		   <th>Modo</th>
                   <th>Ubicación</th>
		   <tbody>
                   <?php

		   for ($i=0;$i<20;$i++)
		   {
			
			echo '<tr>';
			echo '<td>'.utf8_encode($data[$i][1]).'</td><td>'.utf8_encode($data[$i][2]).'</td><td>'.utf8_encode($data[$i][3]).'</td><td>'.utf8_encode($data[$i][4]).'</td>';
		    }
?> 
                   </tbody>
              </table>						
</div>


<script>
			
   var colorFondito = document.getElementById("Tablita").tr.style.backgroundColor;
   alert(colorFondito );
			
   function verMarcacion()
   {
        $('#historial_marcaciones').dialog({
			title: "Historial de Marcaciones",
			modal: true,
			width: 630,
			height: 600,
			draggable:true,
			position: ["center",10],
			closeOnEscape : "true"
    });
   
   }
   
   
   
			
			
</script>




















<!--table id = "Tablita">
                   <th>Fecha</th>
		   <th>Hora</th>
		   <th>Modo</th>
                   <th>Ubicación</th>
		   <tbody>
                   <?php /*
		   $colorFondo="white";
		   $colorAlterno="#E7E7E7";
		   $estilo_seleccionado= "this.style.backgroundColor='red'";
		   $estilo_deseleccionado = 'this.style.backgroundColor="'.$colorFondo.'"';
		   for ($i=0;$i<20;$i++)
		   {
			
			echo '<tr onmouseover='.$estilo_seleccionado.' onmouseout='.$estilo_deseleccionado.' >';
			echo '<td>'.utf8_encode($data[$i][1]).'</td><td>'.utf8_encode($data[$i][2]).'</td><td>'.utf8_encode($data[$i][3]).'</td><td>'.utf8_encode($data[$i][4]).'</td>';
                        if ($colorFondo=="white"){
			    $colorFondo=$colorAlterno;
			}
			else{
			    $colorFondo="white";
			}
		        $estilo_deseleccionado = 'this.style.backgroundColor="'.$colorFondo.'"';
		    }
*/?> 
                   </tbody>
              </table-->



