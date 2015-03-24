<div class="contenedor_cuerpo"> 
	 <p class="titulo_módulo">REPORTE DE OBSERVACIONES ACADÉMICAS</p>


	    <div>
		  <select class="detalle_" name="cmb_tipoObs" id="cmb_tipoObs" style="width:200px;" >
			   <option value="0">TIPO DE OBSERVACION</option> 
			   <?php			       
			       $data=Logica::PA_UPLA("[Academico].[paCon_ListarTiposObs]","array");
			       opciones_combo($data,"TiO_Id","TiO_TipoObservaciones");
			   ?>  
		  </select>
		  
		  <select class="detalle_" name="cmb_anio" id="cmb_anio" style="width:200px;" >
			   <option value="0">AÑO</option>
			   <?php
			   $v_anio=date("o");

			   while ($v_anio >= 2014){
			   ?>
			   <option value="<?php echo $v_anio ?>"><?php echo $v_anio ?></option>     
			   <?php
			   $v_anio--;
			   }
			   ?>
		  </select>
		  
		  <select class="detalle_" name="cmb_periodo" id="cmb_periodo" style="width:200px;" >
			   <option value="0">PERIODO ACADÉMICO</option>
			   <option value="1">I</option>
			   <option value="2">II</option> 
		  </select>
		  
		  <br><br>
		  <select class="detalle_" name="cmb_fac" id="cmb_fac" style="width:200px;" disabled onchange="activarCarreras()">
			   <option value="00">TODAS LAS FACULTADES</option> 
			   <?php
			       $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
			       $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);
			       opciones_combo($data,"id","detalle");
			   ?>  
		  </select>
		  
		  <select class="detalle_" name="cmb_car" id="cmb_car" style="width:200px;" disabled>	    
			   <option value="ZX">TODAS LAS CARRERAS</option> 
		  </select>
		  
		  <select class="detalle_" name="cmb_esp" id="cmb_esp" style="width:200px;" disabled>	    
			   <option value="SX">TODAS LAS ESPECIALIDADES</option> 
		  </select>

	    </div>
	    
	    <br>
	    <input class="button button-flat-primary" type="button" name="btn_" id="btn_" onclick="mostrarRptObsAcad()" value="GENERAR"/>    
</div>

<script>
	 $("#cmb_tipoObs").change(function ()
	 {
		  mostrarCargando();
		  $('#cmb_fac').removeAttr('disabled');
		  $('#cmb_fac').val('0');
		  $('#cmb_car').attr('disabled', 'disabled');
		  $('#cmb_esp').attr('disabled', 'disabled');
		  ocultarCargando();
	 });
	 
	 $("#cmb_fac").change(function ()
	 {
		  mostrarCargando();
		  var fac = $('#cmb_fac').val();
		  $.get("carrera",{code:fac},function(resultado)
		  {
			   
			   if(resultado == false)
			   {                            
				$('#cmb_car').empty();
				$('#cmb_car').append("No existe información...");  
			   }
			   else
			   {                            
			        $('#cmb_car').empty();
				$('#cmb_car').append('<option value="ZX">TODAS LAS CARRERAS</option>');   
                                $('#cmb_car').append(resultado);
                           }
			   ocultarCargando();
		  });
	 
		  $('#cmb_car').removeAttr('disabled');
		  
	 });
	 
	 $("#cmb_car").change(function ()
	 {
		  mostrarCargando();
		  var car = $('#cmb_car').val();
		  $.get("especialidad",{code:car},function(resultado)
		  {
			   if(resultado == false)
			   {                            
				
			   }
			   else
			   {                            
			        $('#cmb_esp').empty();
				$('#cmb_esp').append("<option>ESPECIALIDAD</option>");   
                                $('#cmb_esp').append(resultado);
				$('#cmb_esp').removeAttr('disabled');
				
                           }
			   ocultarCargando();
		  });
	 
		  
	 });
	 
	 

	 function mostrarRptObsAcad() {
		  
		  tipoObs  = $('#cmb_tipoObs').val();
		  anio = $('#cmb_anio').val();
		  periodo = $('#cmb_periodo').val();
		  fac = $('#cmb_fac').val();
		  car = $('#cmb_car').val();
		  esp = $('#cmb_esp').val();
		  
		  
		  alert(tipoObs);
		  alert(anio);
		  alert(periodo);
		  alert(fac);
		  alert(car);
		  alert(esp);
		  
	 $.post("rptObsAcad", {tipoObs:tipoObs,anio:anio,periodo:periodo,fac:fac,car:car,esp:esp} ,function(resultado)
		            {
		                if(resultado != false)
		                {
		                    $("#popupbox_constancia").append(resultado);
		                }
		            }); 

    
    
    $('#popupbox_constancia').dialog({
        title: "Constancia de Matrícula",
        modal: true,
        width: 900,
        height: 600,
        draggable:true,
        position: ["center",10],
        closeOnEscape : "true"
    });
   

   
}
	 

	 
</script>