<legend>Datos Académicos</legend>
<p>
<label class="ancho2">Facultad</label>
<input type="text" id="txtFac" name="txtFac" align="center" readonly="readonly" />
</p>
<p>
<label class="ancho3">Escuela Académico Profesional</label>
<input type="text" id="txtCarPro" name="txtCarPro" align="center" readonly="readonly"/>
</p>
<p>
<label class="ancho2">Mod. de Estudios</label>
<input type="text" id="txtModEst" name="txtModEst" align="center" readonly="readonly"/>
</p>
<p><label id="l_1" name="l_1">¿Responsable de su Educación?</label></p>
<p>
<label class="ancho1" for="rED1">
<input id="rED_1" name="rED" type="radio" value="AMBOS PADRES"/>
Ambos Padres
</label>
<label class="ancho1" for="rED2">
<input id="rED_2" name="rED" type="radio" value="SOLO MADRE"/>
Solo Madre
</label>
<label class="ancho1" for="rED3">
<input id="rED_3" name="rED" type="radio" value="SOLO PADRE"/>
Solo Padre
</label>
<label class="ancho1" for="rED4">
<input id="rED_4" name="rED" type="radio" value="HERMANO(S)"/>
Hermano(s)
</label>
<label class="ancho1" for="rED5">
<input id="rED_5" name="rED" type="radio" value="OTROS RESPONSABLES"/>
Otros Responsables
</label>
<label class="ancho1" for="rED6">
<input id="rED_6" name="rED" type="radio" value="SE AUTOSOSTIENE"/>
Se Autosostiene
</label>
</p>
<p><label id="l_2" name="l_2">¿Cuenta con algún beneficio de la Universidad?</label></p>
<p>
<label class="ancho8" for="BU1">
<input id="BU_1" name="BU" type="radio" value="POR CONVENIO"/>
Por Convenio
</label>
<label class="ancho8" for="BU2">
<input id="BU_2" name="BU" type="radio" value="POR CAFAEE"/>
Por CAFAEE
</label>
<label class="ancho8" for="BU3">
<input id="BU_3" name="BU" type="radio" value="OTROS"/>
Otros
</label>
<label class="ancho8" for="BU4">
<input id="BU_4" name="BU" type="radio" value="NINGUNO"/>
Ninguno
</label>
</p>

<p>
<label class="ancho5">Interrumpió su Estudio Universitario</label>
<select id="Int_EU" name="Int_EU">
<option value="No">No</option>
<option value="Si">Si</option>
</select>
</p>

<script>
$("#Int_EU").change(function(){
  var num=$("#Int_EU").val();
  if(num=="Si"){
  document.getElementById("mot_int_est").selectedIndex=0;//cantidad de opciones
  $("#mot_int_est").attr("disabled",false);
  }
  else{
  document.getElementById("mot_int_est").selectedIndex=0;//cantidad de opciones
  $("#mot_int_est").attr("disabled",true);
  }
});
</script>

<p>
<label class="ancho5">Motivo de interrupcion de estudios</label>
<select id="mot_int_est" name="mot_int_est" disabled="disabled">
<option value="NINGUNO">Ninguno</option>
<option value="SALUD">Salud</option>
<option value="ECONOMICO">Económico</option>
<option value="TRABAJO">Trabajo</option>
<option value="FAMILIAR">Familiar</option>
<option value="OTROS">Otros</option>
</select>
</p>

<p>
<label class="ancho4">Departamento donde concluyó Secundaria</label>
<select id="cboDepColegio" name="cboDepColegio">
<option value="">Seleccione Departamento</option>
</select>
<br>
<br>
<label class="ancho4">Provincia donde concluyó Secundaria</label>
<select id="cboProColegio" name="cboProColegio">
<option value="">Seleccione Provincia</option>
</select> 
<br>
<br>
<label class="ancho4">Distrito donde concluyó Secundaria</label>
<select id="cboDisColegio" name="cboDisColegio">
<option value="">Seleccione Distrito</option>
</select>
<br>
<br>
<label class="ancho5">Inst. Educ. donde concluyó Secundaria</label>
<select name="Sec_Col" id="Sec_Col">
<option value="">Seleccione Estatal o Particular</option>
</select>
<br>
<br>
<label class="ancho2">Colegio de Procedencia</label><br>
<select id="cboColegioProce" name="cboColegioProce">
<option value="">Seleccione Colegio</option>
</select>
</p>
