<!-- inicio campos ocultos que almacenan la varibles requeridas -->
<input type="hidden" id="txtPeriodo" name="txtPeriodo" value="2013-1" />
<input type="hidden" id="txtPlan" name="txtPlan" value="2007B" />
<input type="hidden" id="cant_filas" name="cant_filas" value="0" />
<input type="hidden" name="color_sesion" id="color_sesion" value="<?php echo $_SESSION['color1'];?>"/>
<!-- fin campos ocultos que almacenan la varibles requeridas -->
<div class="contenedor_cuerpo">
	<fieldset>
		<p class="titulo_modulo">Configuración de Horarios</p>
			<div class="div_busqueda">
				<select class="detalle_" name="cmb_sede" id="cmb_sede" style="width:200px;">
					<option value="0">SEDE</option> 
					<?php
					    $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
					    $data=Logica::PA_UPLA("[Academico].[paLis_sede]","array",$xml_x);
					    opciones_combo($data,"id","detalle");
					?>  
				</select>
				
				<select class="detalle_" name="cmb_modalidad" id="cmb_modalidad" style="width:200px;" disabled>
					<option value="0">MODALIDAD</option> 
					<?php 
					      $data=Logica::PA_UPLA("[Academico].[paLis_modalidad]","array",$xml_x);
					       opciones_combo($data,"id","detalle");
					?>
				</select>

				<select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:200px;" disabled>
					<option value="0">FACULTAD</option>
					<?php
					   $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
					   opciones_combo($data,"id","detalle");
					?>
				</select>
				<br/><br/>
				
				<select class="detalle_" name="cmb_carrera" id="cmb_carrera" style="width:200px;" disabled>
					<option value="0">CARRERA</option>               
				</select>

				<select class="detalle_" name="cmb_ciclo" id="cmb_ciclo" style="width:200px;" disabled>
					<option value="0">CICLO</option> 
					<?php
					   $data=Logica::PA_UPLA("[Academico].[paLis_ciclos]","array");
					   opciones_combo($data,"id","detalle");
					?>
				</select>
    
				<select class="detalle_" name="cmb_salon" id="cmb_salon" style="width:200px;" onchange="cargar_horario_salon();ocultar();cargar_docentes()" disabled>
				   <option value="0">SALON</option>                   
				</select>
				<br/>        
			</div>

			<div>
				<div class="CSSTableSimple" width="700">
					<table width="500" align="center">
						<p style="color:#333;font: bold 15px Open Sans Condensed">Horarios De Clases</p>
						<p class="titulo_cicloAcad" id="Descripcionhorario"></p>
						<tbody id="tbDetalle_horario">
							<tr >
							  <th>Lunes</th>
							  <th>Martes</th>
							  <th>Miercoles</th>
							  <th>Jueves </th>
							  <th>Viernes</th>
							  <th>Sabado</th>
							  <th>Domingo</th>
							</tr>   
							<tr>
							  <th> </th>
							  <th> </th>
							  <th> </th>
							  <th> </th>
							  <th> </th>
							  <th> </th>
							  <th> </th>
							</tr>      
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</fieldset>
<!-- AGREGAR UN NUEVO HORARIO -->
<div id="popupbox_Agregar_horario" style="display:none">
  <table >
    <tr>
      <td>DOCENTE</td>
      <td>
        <select class="detalle_" name="cmb_docxsal_a" id="cmb_docxsal_a" style="width:350px" onchange="cargar_curxdoc('')">
          <option value="0">DOCENTE</option> 
        </select>
      </td>
    </tr>
    <tr>
      <td>CURSO</td>
      <td>
        <select class="detalle_" name="cmb_cursoxsal_a" id="cmb_cursoxsal_a" style="width:350px">
          <option value="0">CURSO</option> 
        </select>
      </td>
    </tr>
    <tr>
      <td>DIA</td>
      <td>
        <select class="detalle_" name="cmb_dia_a" id="cmb_dia_a" style="width:350px">
           <option value="0">DIA</option>
           <option value="2">LUNES</option>
           <option value="3">MARTES</option>
           <option value="4">MIERCOLES</option>
           <option value="5">JUEVES</option>
           <option value="6">VIERNES</option>
           <option value="7">SABADO</option>
           <option value="1">DOMINGO</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>HORA</td>
      <td>De
        <select class="detalle_" name="cmb_hora_inicio_a" id="cmb_hora_inicio_a" style="width:100px;">
            <?php
              combo_hora();
            ?>   
        </select> A

        <select class="detalle_" name="cmb_hora_fin_a" id="cmb_hora_fin_a" style="width:100px;">
            <?php
              combo_hora();
            ?>       
        </select>

      </td>
    </tr> 
  </table>
<!-- FIN AGREGAR UN NUEVO HORARIO -->

<!-- ACTUALIZAR UN HORARIO EXISTENTE -->
<div id="popupbox_update_horario" style="display:none">
  <table >
    <tr>
      <td>DOCENTE</td>
      <td>
        <select class="detalle_" name="cmb_docxsal_u" id="cmb_docxsal_u" style="width:350px" onchange="cargar_curxdoc('')" disabled="true">
          <option value="0">DOCENTE</option> 
        </select>
      </td>
    </tr>
    <tr>
      <td>CURSO</td>
      <td>
        <select class="detalle_" name="cmb_cursoxsal_u" id="cmb_cursoxsal_u" style="width:350px" disabled="true">
          <option value="0">CURSO</option> 
        </select>
      </td>
    </tr>
    <tr>
      <td>DIA</td>
      <td>
        <select class="detalle_" name="cmb_dia_u" id="cmb_dia_u" style="width:350px">
           <option value="0">DIA</option>
           <option value="2">LUNES</option>
           <option value="3">MARTES</option>
           <option value="4">MIERCOLES</option>
           <option value="5">JUEVES</option>
           <option value="6">VIERNES</option>
           <option value="7">SABADO</option>
           <option value="1">DOMINGO</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>HORA</td>
      <td>
        <select class="detalle_" name="cmb_hora_inicio_u" id="cmb_hora_inicio_u" style="width:100px;">
            <?php
              combo_hora();
            ?>   
        </select> A

        <select class="detalle_" name="cmb_hora_fin_u" id="cmb_hora_fin_u" style="width:100px;">
            <?php
              combo_hora();
            ?>       
        </select>

      </td>
    </tr> 
  </table>
<!-- FIN ACTUALIZAR UN HORARIO EXISTENTE -->

<!-- DESHABILITAR UN HORARIO -->
</div>
<div id="dialogConfirmDesa" title="¿Desea Deshabilitar este Registro?" style="display:none">
  <p id="parrafoDes">¿Esta seguro de que desea Deshabilitar este registro?</p> 
</div>
<!-- FIN DESHABILITAR UN HORARIO -->
<!-- ELIMINAR UN HORARIO -->
</div>
<div id="dialogConfirmElim" title="Advertencia ...!!" style="display:none">
  <p>¡Al eliminar este registro se eliminarán también todas las marcaciones que existen! ¿Esta seguro de que desea eliminar este registro?</p> 
</div>
<!-- FIN ELIMINAR UN HORARIO -->

<!-- INICIO ESTE SCRIPT ES PARA CARGAR LOS COMBOS POR DEFECTO -->
<!--script>

document.getElementById("cmb_modalidad").selectedIndex=0;
document.getElementById("cmb_facultad").selectedIndex=1;
document.getElementById("cmb_facultad").onchange();//lamo a su onchange en este caso a la funcion que me permite cargar el combo
document.getElementById("cmb_carrera").selectedIndex=0;
document.getElementById("cmb_carrera").onchange();


</script-->
<script>
  $(document).ready(function(){

  //================== SEDE ======================
    $("#cmb_sede").change(
      function()
        {

          $("#tbDetalle_horario td").remove();
          document.getElementById('Descripcionhorario').innerHTML="";
          mostrar();
          var nextComboIndice=buscarEnArray(listCombos,'cmb_sede')+1;
          //alert(nextComboIndice);
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            //desactivar el control
            combo.disabled = true;
            x++;
          }
          document.getElementById("cmb_modalidad").disabled = false;

        }
      );
  //===================== FIN SEDE ===========================

  //=================== MODALIDAD ============================
    $("#cmb_modalidad").change(
      function()
        {
          $("#tbDetalle_horario td").remove();
          mostrar();
          document.getElementById('Descripcionhorario').innerHTML="";
          var nextComboIndice=buscarEnArray(listCombos,'cmb_modalidad')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

          if($("#cmb_sede").val()!='0')
          {

            document.getElementById("cmb_sede").style.border="";
            document.getElementById("cmb_facultad").disabled = false;
          }
          else
          {
            document.getElementById("cmb_sede").style.border="2px solid red";
            document.getElementById("cmb_modalidad").selectedIndex=0;
          }
        }
      );
//================= FIN MODALIDAD =======================
//================== FACULTAD ======================
    $("#cmb_facultad").change(
      function()
        {
          $("#tbDetalle_horario td").remove();
          mostrar();
          document.getElementById('Descripcionhorario').innerHTML="";
          var nextComboIndice=buscarEnArray(listCombos,'cmb_facultad')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_modalidad").val()!='0')
          {

            document.getElementById("cmb_modalidad").style.border="";
            cargar_carreras($("#cmb_facultad").val());
            document.getElementById("cmb_carrera").disabled = false;
            
          }
          else
          {
            document.getElementById("cmb_modalidad").style.border="2px solid red";
            document.getElementById("cmb_facultad").selectedIndex=0;
          }

        }
      );
  //===================== FIN FACULTAD ===========================

  //================== CARRERA ======================
    $("#cmb_carrera").change(
      function()
        {
          $("#tbDetalle_horario td").remove();
          mostrar();
          document.getElementById('Descripcionhorario').innerHTML="";
          var nextComboIndice=buscarEnArray(listCombos,'cmb_carrera')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_facultad").val()!='00')
          {

            document.getElementById("cmb_facultad").style.border="";
            document.getElementById("cmb_ciclo").disabled = false;
            //document.getElementById("cmb_especialidad").disabled = false;
            //cargar_especialidad($("#cmb_carrera").val());
          }
          else
          {
            document.getElementById("cmb_facultad").style.border="2px solid red";
            document.getElementById("cmb_carrera").selectedIndex=0;
          }

        }
      );
  //===================== FIN CARRERA ===========================

  //================== ESPECIALIDAD ======================
    /*$("#cmb_especialidad").change(
      function()
        {
          $("#tbDetalle_horario td").remove();
          mostrar();
          document.getElementById('Descripcionhorario').innerHTML="";
          var nextComboIndice=buscarEnArray(listCombos,'cmb_especialidad')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_carrera").val()!='0')
          {

            document.getElementById("cmb_carrera").style.border="";
            document.getElementById("cmb_especialidad").disabled = false;
            document.getElementById("cmb_ciclo").disabled = false;
          }
          else
          {
            document.getElementById("cmb_carrera").style.border="2px solid red";
            document.getElementById("cmb_especialidad").selectedIndex=0;
          }

        }
      );*/
  //===================== FIN ESPECIALIDAD ===========================

  //================== CICLO ======================
    $("#cmb_ciclo").change(
      function()
        {
          $("#tbDetalle_horario td").remove();
          mostrar();
          document.getElementById('Descripcionhorario').innerHTML="";
          var nextComboIndice=buscarEnArray(listCombos,'cmb_ciclo')+1;
          //inicializo y deshabilito los demas combos
          var x=nextComboIndice;
          var combo=null;
          while(listCombos[x])
          {
            combo=document.getElementById(listCombos[x]);
            combo.selectedIndex=0;
            combo.disabled = true;
            x++;
          }

         if($("#cmb_carrera").val()!='0')
          {

            document.getElementById("cmb_carrera").style.border="";
            document.getElementById("cmb_salon").disabled = false;
            cargar_salon();
          }
          else
          {
            document.getElementById("cmb_carrera").style.border="2px solid red";
            document.getElementById("cmb_ciclo").selectedIndex=0;
          }
        }
      );
  //===================== FIN CICLO ===========================
    //================== SALON ======================
    $("#cmb_salon").change(
      function()
        {
            $("#tbDetalle_horario td").remove();

            document.getElementById('Descripcionhorario').innerHTML="";
           if($("#cmb_ciclo").val()!='0')
            {
              document.getElementById("cmb_ciclo").style.border="";
            }
            else
            {
              document.getElementById("cmb_ciclo").style.border="2px solid red";
              document.getElementById("cmb_salon").selectedIndex=0;
            }
            if(document.getElementById("cmb_salon").selectedIndex==0)mostrar();

        }
      );
  //===================== FIN SALON ===========================
  ///////////////////////////////////////////////
  });


</script>