<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">ACTIVACIÓN DE ASIGNATURAS ELECTIVAS</p>
	
	<div>
	    <select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:160px;">
                <option value="0">FACULTAD</option>
                <?php
                $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
                $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
                opciones_combo($data,"id","detalle");
                ?>              
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 92px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_carrera'");?>
            <select class="detalle_" name="cmb_car_" id="cmb_car_" style="width:160px;">
                <option value="0">CARRERA</option>               
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 92px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_especialidad'");?>
            <select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:160px;">
                <option value="SX">SIN ESPECIALIDAD</option>               
            </select>
	    <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 92px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_especialidad'");?>
            <select class="detalle_" name="cmb_sed_" id="cmb_sed_" style="width:160px;">                
		<?php
                $xml_x="<Dato><usuario>".$_SESSION['dni']."</usuario></Dato>";
                $data=Logica::PA_UPLA("[general].[paCon_sede]","array",$xml_x);              
                opciones_combo($data,"id","detalle","SEDE");
                ?>             
            </select>
        </div>
        <div>            
            <?php set_imagen_style("img_cargando.gif","style='width: 92px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_modalidad'");?>
            <select class="detalle_" name="cmb_mod_" id="cmb_mod_" style="width:160px;">                                           
                <option value="0">MODALIDAD</option>  
            </select>	    
	    <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 92px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_planestudios'");?>
	    <select class="detalle_" id="cmb_planes" style="width: 160px;height: 35px;font: icon;font-size: 12px;">       
		<option value="0">PLAN ESTUDIOS</option>
	    </select>
	    <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 92px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_ciclo'");?>
            <select class="detalle_" name="sel_ciclo" id="sel_ciclo" style="width:160px;">
		<option value="0">CICLO</option>
            </select>
	    	<?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>  
            <button class="css_btn" onclick="listarElectivos();" style="width:160px;">Listar</button>
        </div>
	<div class="CSSTableSimple" style="margin-top:10px;">
	    <table id="t_electivos"style="width:753px;">
		<tr>
		    <th>Código</th>
		    <th>Asignatura</th>
		    <th>Selección</th>
		</tr>
	    </table>
	    <button id="btn_activarElectivos" class="css_btn" onclick="insertarElectivos();" style="width:160px;display: none;margin-top: 10px;" >Guardar Cambios</button>
	</div>
    </fieldset>
</div>


<script>
$("#cmb_sed_").change(function(){
    Cargando("cargando_modalidad","cmb_mod_");
    $("#cmb_mod_").val("0");$('#cmb_planes').val("0");
    $("#t_electivos td").remove();
    $("#btn_activarElectivos").css("display","none");
    var codsede;
    if((codsede=$(this).val())!='0')
    {                        
	$.get("modalidades_usu", {sede:codsede} ,function(resultado)
	{
	    if($.trim(resultado)=='salir')
	    {
		location.reload();
	    }
	    else
	    {
		if(resultado != false)            
		{ 
		    $("#cmb_mod_").empty();                                
		    $("#cmb_mod_").append(resultado);
		    
		    Cargando("cmb_mod_","cargando_modalidad");
		}
		else
                {
		    $("#cmb_mod_").val("0");
		    Cargando("cmb_mod_","cargando_modalidad");
                }
            }
        });
    }
    else
    {
	$("#cmb_mod_").empty();
	$("#cmb_mod_").append('<option value="0">MODALIDAD</option>');
	Cargando("cmb_mod_","cargando_modalidad");
    }
});

</script>