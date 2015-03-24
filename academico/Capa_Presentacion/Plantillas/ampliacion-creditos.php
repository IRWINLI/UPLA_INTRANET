<div class="contenedor_cuerpo"> 
	 <p class="titulo_módulo">AMPLIACIÓN DE CREDITOS</p>

	    <div>
	    	<input type="text" name="t_codigo" id="t_codigo" value="" placeholder="Código" style="width:152px; height:33px;border: 1px solid #d9d9d9; border-top: 1px solid #c0c0c0;" maxlength="8" onKeyUp="if(event.charCode){unicode=event.charCode;}else{unicode=event.keyCode;} if (unicode==13){buscar_ampli();}"/>
	    	<input class="button button-flat-primary" type="button" name="btn_bustra" id="btn_bustra" value="Buscar" onclick="buscar_ampli();" />
	    </div>
	    <br>
	    <div name="d_busqueda" id="d_busqueda" style="width:233px; font-size:smaller; text-align:center;">
	    	
	    </div>	    	    
	    <br>
	    <div>	    	
	    	<select class="detalle_" name="cmb_tipo" id="cmb_tipo" style="width:234px;">
	    		<option value="0">Motivo...</option>
	    		<option value="4">Ampliación Créditos</option>
	    	</select>
	    </div>
	    <br>  	
	    <div>
	    	<label>Número de Registro:</label>
	    </div>
	    <br>
	    <div>
	    	<input class="detalle_" type="text" name="doc_refe" id="doc_refe" placeholder="Ejemplo: OF 247-2014-VRADM-UPLA" style="width:234px;" />
	    </div>	    
	    <br>  	
	    <div>
	    	<label>Observación:</label>
	    </div>
	    <br>
	    <div>
	    	<textarea class="detalle_" name="ta_obs" id="ta_obs" style="width:233px; height:68px;" ></textarea>    	
	    </div>
	    <br>
	    
	    <input class="button button-flat-primary" type="button" name="btn_" id="btn_" onclick="ampliar();" value="Ampliar"/>    
</div>