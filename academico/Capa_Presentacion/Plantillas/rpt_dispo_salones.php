<div class="contenedor_cuerpo" >    
<p class='titulo_módulo' style="padding:30 256 0 0;">Disponibilidad de Salones</p>
<br>
<select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:150px;">
<option value="0">FACULTAD</option>
<?php
    $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
    $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
    opciones_combo($data,"id","detalle");
?>              
</select>

<select class="detalle_" name="cmb_car_" id="cmb_car_" style="width:150px;">
<option value="0">CARRERA</option>               
</select>

<select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:200px;">
   <option value="SX">ESPECIALIDAD</option>               
</select>

<button class="detalle_" onclick="ver_rpta();" style="width:90px">Ver</button>
<br>
<br>
<div id="reporte" name="reporte">
</div>
	<script type="text/javascript">
		
		function ver_rpta()
		{
			
			
			if($("#cmb_car_").val()!='0')
	        {
	            if($("#cmb_esp_ option").length == 1 || $("#cmb_esp_").val()!='SX')
	            {    	                
	                //$("#l_dequien").text("HUANCAYO - PRESENCIAL: "+$("#cmb_car_ option[value="+$("#x_carrera").val()+"]").text()+" - "+$("#cmb_esp_ option[value="+$("#x_especi").val()+"]").text());
	                mostrarCargando();
	                $.post("RptSalones", {car:$("#cmb_car_").val(),esp:$("#cmb_esp_").val()} ,function(resultado)
		            {
		                if(resultado != false)
		                {
		                    $("#reporte").append(resultado);
		                }
		            }); 	                
	                                     
	                document.getElementById("cmb_car_").style.border="";
	                document.getElementById("cmb_esp_").style.border="";
	            }
	            else
	            {
	                document.getElementById("cmb_esp_").style.border="2px solid red";       
	            }
	        }
	        else
	        {
	            document.getElementById("cmb_car_").style.border="2px solid red";
	        }			
			            
		}
	</script>

</div>