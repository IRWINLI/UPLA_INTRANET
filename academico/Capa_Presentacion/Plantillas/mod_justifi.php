<input type="hidden" name="cant_filas_jus" id="cant_filas_jus" value="0"/>
<input type="hidden" name="cant_filas_jus2" id="cant_filas_jus2" value="0"/>
<input type="hidden" name="color_sesion" id="color_sesion" value="<?php echo $_SESSION['color1'];?>"/>
<div class="contenedor_cuerpo" >
    <fieldset>
	<p class='titulo_modulo'>MODULO DE MARCACIONES</p>
	
	<div class="form_busqueda">
                 <input placeholder = 'Ingrese DNI del Docente' type="busqueda" name="bus_jus" id="bus_jus" onkeyUp="return ValNumero(this);" maxlength="8"; onKeyUp="if(event.charCode){unicode=event.charCode;}else{unicode=event.keyCode;} if (unicode==13){buscar_Doc_jus(<?php echo $_SESSION['codFac'];?>);}"/>
                 <!--button class="css_btn_buscar" id="btn_reg_est" onclick="buscarDocente();"/-->
                 <div class="css_btn_buscar" onclick="buscar_Doc_jus('<?php echo $_SESSION['codFac'];?>');" ></div>
        </div>
	
	
	<strong><p id="label_docente" name="label_docente"></p></strong>
	<a href="#" class="mostrar" id="mostrar">Carga Lectiva</a>
	<div class="caja" id="caja">
	    <div class="CSSTableSimple" width="700">
		<table  align="center">
		    <th>SEDE</th>
		    <th>MODALIDAD</th>
		    <th>CARRERA</th>
		    <th>AÑO</th>
		    <th>PERIODO</th>
		    <th>CICLO</th>
		    <th>SECCION</th>
		    <th>PLAN</th>
		    <th>CODIGO</th>
		    <th>U.E.C.</th>
		    <tbody id="list_cursos_"></tbody>
		</table>
		<label id="cont_cursos" name="cont_cursos"></label>
	    </div>
	</div></br>
	<a href="#" class="mostrar" id="h_docente">Historial</a>
	<div class="caja" id="caja_2">
	    <div class="CSSTableSimple" width="700">
		<table>
		    <th>SEMANA</th>
		    <th>ASIGNATURA</th>
		    <th>LUNES</th>
		    <th>MARTES</th>
		    <th>MIERCOLES</th>
		    <th>JUEVES</th>
		    <th>VIERNES</th>
		    <th>SABADO</th>
		    <th>DOMINGO</th>
		    <tbody id="list_hor_just"></tbody>
		</table>
		<br>
	    </div>
	</div>
    </fieldset>
</div>

<div id="popupbox_just" style="display:none">
	<table >
		<tr>
			<td>FECHA</td>
			<td><input class="detalle_" type="text" id="txt_fecha" name="txt_fecha" disabled="true" style="width:219px;"/></td>
		</tr>		
        <tr>
	      	<td>HORA</td>
	      	<td><input class="detalle_" type="text" id="txt_hora" name="txt_hora" disabled="true" style="width:219px;"/></td>
    	</tr>		
		<tr>
			<td>RAZÓN</td>
			<td><textarea class="detalle_" name="txt_motivo" id="txt_motivo" rows="6" cols="36" style="width:219px;height:120px;"></textarea></td>
		</tr>
		<tr>
			<td>RECUPERACION</td>
			<td>
				<div id="d_sino"><input type="radio" name="sino" id="si_rec" value="si">Si<input type="radio" name="sino" id="no_rec" value="no">No</div>
				<div id="d_rpta" style="background-color:rgb(214, 89, 89);"></div>
			</td>
			<script type="text/javascript">
				 $("#no_rec").click(function () 
				 {
				    $('#i_fecha_jus').val("");
                    $('#cmb_hora_inicio_jus').val("06:00");
                    $('#cmb_hora_fin_jus').val("06:00");

                    $('#i_fecha_jus').attr("disabled", true);
                	$('#cmb_hora_inicio_jus').attr("disabled", true);
                	$('#cmb_hora_fin_jus').attr("disabled", true);

 		         });
 		         $("#si_rec").click(function () 
				 {			    

                    $('#i_fecha_jus').attr("disabled", false);
                	$('#cmb_hora_inicio_jus').attr("disabled", false);
                	$('#cmb_hora_fin_jus').attr("disabled", false);

 		         });
 
			</script>
		</tr>
		<tr>
      		<td>FECHA</td>
			<td>
				<input class="detalle_" type="text" name="i_fecha_jus" id="i_fecha_jus" style="width:219px">
			</td>
	    </tr>
	    <tr>
			<td>HORA</td>
			<td>
		        <select class="detalle_" name="cmb_hora_inicio_jus" id="cmb_hora_inicio_jus" style="width:100px;">
		            <?php
		              combo_hora();
		            ?>   
		        </select> A
		        <select class="detalle_" name="cmb_hora_fin_jus" id="cmb_hora_fin_jus" style="width:100px;">
		            <?php
		              combo_hora();
		            ?>       
		        </select>
			</td>
	    </tr> 
	</table>

</div>
</div>


