<style>
	body 
	{
		background: url('Capa_Presentacion/Recursos/fondo_login_1.jpg');		
	}

</style>
<div class="contenedor_cuerpo">    
<fieldset style='min-width: 392px;background-color: rgba(255,255,255,0.5);'>
    <p class="titulo_modulo">Buscar trámites</p> 

	    <div style="min-width: 617px;text-align: center;">  
	    	<input class="detalle_" type="text" name="f_ini_doc" id="f_ini_doc" value="" placeholder="Fecha inicio" style="width:120px;" maxlength="10"/>	
	    	-    	 
	    	<input class="detalle_" type="text" name="f_fin_doc" id="f_fin_doc" value="" placeholder="Fecha fin" style="width:120px;" maxlength="10"/>
	    	 
	    	<!--select class="detalle_" id='tipo_i' name='tipo_i' style="width:95px;">
            <?php 
                $data=Logica::PA_UPLA("[reghisdoc].[paCon_tiposdocumentos]","array","",false,"dbTramDoc_SITD");                        
                opciones_combo($data,"id","detalle",'elegir');    
            ?>   
            </select>  
              |-->
            | 
            <select class="detalle_" id='pasa_ibus' name='pasa_ibus' style="width:204px;">
            <?php 
                $data=Logica::PA_UPLA("[reghisdoc].[paCon_dependencia]","array","",false,"dbTramDoc_SITD");                        
                opciones_combo($data,"id","detalle",'cualquier dependencia...');                              
            ?>   
            </select>                             
            <select class="detalle_" id='cmb_estadobus' name='cmb_estadobus' style="width:145px;">
            <?php 
                $data=Logica::PA_UPLA("[reghisdoc].[paCon_estado]","array","",false,"dbTramDoc_SITD");                        
                opciones_combo($data,"id","detalle",'cualquier documento...');                         
            ?>   
            </select>              
        </div>
        <div style="min-width: 617px;text-align: center;">
            
            <input class="detalle_" type="text" id="cad_i" name="cad_i" placeholder="Alguna información adicional" style="width:343px;" onKeyUp="if(event.charCode){unicode=event.charCode;}else{unicode=event.keyCode;} if (unicode==13){busrehisdoc();}"/>
			|
	    	<button class="button button-flat-primary"  name="btn_busseg" id="btn_busseg" onclick="busrehisdoc();">BUSCAR</button> 	    	
	    	 |
	    	<button class="button button-flat-primary"  name="btn_exptodo" id="btn_exptodo" onclick="verexceldoc();">EXP.Excel</button>	    	
	    	 |
	    	<button class="button button-flat-primary"  name="btn_exptodo" id="btn_exptodo" onclick="verpdf();">Ver.Pdf</button>	    	
	    </div>
	    <br>	   
    <input type="hidden" name="cant_filas_docs" id="cant_filas_docs" value="0"/>

     <div class="CSSTableSimple" >
		<table align="center" style="width: 610px;">
			<th>N°</th>									
			<th>DOCUMENTO</th>
			<th>FECHA</th>
			<th>PASA A</th>	
			<th>ASUNTO</th>			
			<th>ESTADO</th>						
			<th>ELIMINAR</th>			
			<tbody id="list_pagosdoc_">
            </tbody>
		</table>			
	</div>

<br>
<br>
<div id="reporte" name="reporte">
</div>
</fieldset>
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
<div id="popupbox_editpro" style="display:none;"></div><!--width: 477px;-->
<div id="popupbox_DOHISPDF" style="display:none;"></div>
