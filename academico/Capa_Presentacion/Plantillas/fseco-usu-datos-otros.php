<legend>Otros Datos</legend>

<p>
	<label class="ancho3">En caso de emergencia pueden comunicarse con:</label><br>
	<input type="text" id="txtContEmerg" name="txtContEmerg" align="center"placeholder="Nombre de la persona" maxlength="120"/>
	<br>
	<label class="ancho2">Telefono:</label><br>
	<input type="text" id="txtTelEmerg" name="txtTelEmerg" placeholder="Número de Télefono ó Celular" onkeyUp="return ValNumero(this);"  maxlength="10"/>
</p>

<p>
	<label id="la_2" name="la_2">Usted depende economicamente de sus padres:</label><br>

	<label class="ancho8" for="DEP1">
		<input id="optDepenEconom_1" name="optDepenEconom" type="radio" value="si"checked="checked"/>
		Si
	</label>

	<label class="ancho8" for="DEP2">
		<input id="optDepenEconom_2" name="optDepenEconom" type="radio" value="no"/>
		No
	</label>
</p>

<p>
	<label class="ancho5">¿Qué medio de transporte utiliza para trasladarse a la Universidad?</label></br>
	<select name="cboTransporte" id="cboTransporte">
		<option value="">Seleccione una Opcion</option>
		<option value="1">Taxi</option>
		<option value="2">Movilidad Propia</option>
		<option value="3">Microbús</option>
		<option value="4">ninguno</option>
	</select>
</p>

<p>
	<label class="ancho5">¿cúal es el ingreso mensual de su familia?</label></br>
	<select name="cboIngrFamiliar" id="cboIngrFamiliar">
		<option value="">Seleccione una Opcion</option>
		<option value="1">0 - 750</option>
		<option value="2">750 - 1500</option>
		<option value="3">1500 - 2500</option>
		<option value="4">2500 a más</option>
	</select>
</p>

<p>
	<label class="ancho5">¿Cómo se conecta a Internet?</label></br>
	<select name="cboInternet" id="cboInternet">
		<option value="">Seleccione una Opcion</option>
		<option value="1">Casa</option>
		<option value="2">Cabina de Internet</option>
		<option value="3">Celular</option>
	</select>
</p>

<p>
	<label id="la_2" name="la_2">¿Tiene usted cuenta de Facebook?</label><br>
	<label class="ancho8" for="DEP1">
		<input id="optFacebook_1" name="optFacebook" type="radio" value="si"/>
		Si
	</label>

	<label class="ancho8" for="DEP2">
		<input id="optFacebook_2" name="optFacebook" type="radio" value="no"checked="checked"/>
		No
	</label>
</p>

<p>
	<label id="la_2" name="la_2">¿Tiene usted cuenta de Twitter?</label><br>
	<label class="ancho8" for="DEP1">
		<input id="optTwitter_1" name="optTwitter" type="radio" value="si"/>
		Si
	</label>

	<label class="ancho8" for="DEP2">
		<input id="optTwitter_2" name="optTwitter" type="radio" value="no"checked="checked"/>
		No
	</label>
</p>

<p><label id="la_2" name="la_2">Acepto informacion vía correo electrónico, Teléfono y/o domicilio</label><br>
	<label class="ancho8" for="DEP1">
		<input id="optInformacion_1" name="optInformacion" type="radio" value="si"/>
		Si
	</label>
	<label class="ancho8" for="DEP2">
		<input id="optInformacion_2" name="optInformacion" type="radio" value="no"checked="checked"/>
		No
	</label>
</p>



