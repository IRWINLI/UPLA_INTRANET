<legend id="person">Datos Personales</legend>
<p>  
<label class="ancho5">Código</label>
<input type="text" id="cod" name="txtCod" align="center" readonly="readonly"  />
</p>
<p>
<label class="ancho5">Nombres</label>
<input type="text" id="nombres" name="txtNom" align="center" readonly="readonly"  />

<label class="ancho8">Apellido Paterno</label>
<input type="text" id="apellidos_paterno" name="txtAP" readonly="readonly" />

<label class="ancho8">Apellido Materno</label>
<input type="text" id="apellidos_materno" name="txtAM" readonly="readonly" />


<label class="ancho8">DNI</label>
<input type="text" id="dni" name="dni" onkeyUp="return ValNumero(this);" maxlength="8" />           

<label class="ancho4">Fecha de Nacimiento</label>
<input type="text" id="fech_nac" name="fech_nac" placeholder="Ingrese su Fecha de Nacimiento con el Calendario de arriba..." readonly="readonly"/>

<label>Estado Civil</label>
<select id="estado_civ" name="estado_civ" >
<option value="">Selecciona Uno...</option>
<option value=1>Soltero</option>
<option value=2>Casado</option>
<option value=3>Conviviente</option>
<option value=4>Separado</option>
<option value=5>Viudo</option>                  
</select>  

<label class="ancho1">Año-Ingreso</label>
<input type="text" id="aIng" name="aIng" readonly="readonly" />
</p>
<p>
<label class="ancho4">Tel-Fijo</label>
<input type="text" id="tel-F" name="tel-F" placeholder="Número de Telefono" onkeyUp="return ValNumero(this);"  maxlength="9" />         
<label class="ancho4">Tel-Cel</label>
<input type="text" id="tel-Cel" name="tel-Cel" placeholder="Número de Celular" onkeyUp="return ValNumero(this);"  maxlength="10" />
<label class="ancho5">E-Mail</label>
<input type="text" id="e-mail" name="e-mail" placeholder="Email: micorreo@dominio.com"/>
<label class="ancho5">Domicilio(Si es pasaje, indicar la cuadra y calle.)</label>
<input type="text" id="domicilio" name="domicilio" placeholder="Dirección: Sea específico por favor." />
</p>

<p>
<label class="ancho4">Departamento donde Recide</label>
<select id="departamento_l" name="Dep_L">
<option value="">Seleccione Departamento</option>
</select>
<br>
<label class="ancho4">Provincia donde Recide</label>
<select id="provincia_l" name="Pro_L">
<option value="">Seleccione Provincia</option>
</select> 
<br>
<label class="ancho4">Distrito donde Recide</label>
<select id="distrito_l" name="Dist_L">
<option value="">Seleccione Distrito</option>
</select>
</p>
<p>
<label class="ancho5">Ciudad de Procedencia</label>
<select id="ciudad_de_proced" name="Ciu_Pro">
<option value="">Elegir una...</option>
<option value="LIMA">LIMA</option>
<option value="HUANUCO">HUANUCO</option>
<option value="CERRO DE PASCO">CERRO DE PASCO</option>
<option value="HUANCAVELICA">HUANCAVELICA</option>
<option value="LA OROYA">LA OROYA</option>
<option value="JAUJA">JAUJA</option>
<option value="CONCEPCION">CONCEPCION</option>
<option value="SATIPO">SATIPO</option>
<option value="LA MERCED">LA MERCED</option>
<option value="TARMA">TARMA</option>
<option value="CHUPACA">CHUPACA</option>
<option value="HUANCAYO">HUANCAYO</option>
<option value="OTROS">OTROS</option>
</select>
</p>

