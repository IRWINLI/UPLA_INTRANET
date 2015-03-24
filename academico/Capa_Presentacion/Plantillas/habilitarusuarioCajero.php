<div class="contenedor_cuerpo"> 
	 <p class="titulo_módulo">HABILITAR USUARIO CAJERO</p>
    
    <form id="form_tra" name="form_tra" action="tramitesga" method="POST">

	    <div>
	    	<input type="text" name="t_codigo" id="t_codigo" value="" placeholder="Código" style="width:152px; height:33px;border: 1px solid #d9d9d9; border-top: 1px solid #c0c0c0;" maxlength="8" onKeyUp="if(event.charCode){unicode=event.charCode;}else{unicode=event.keyCode;} if (unicode==13){buscar_tramite();}"/>
	    	<input class="button button-flat-primary" type="button" name="btn_bustra" id="btn_bustra" value="Buscar" onclick="buscar_tramite();" />
	    </div>
	    <br>
	    <div name="d_busqueda" id="d_busqueda" style="width:233px; font-size:smaller; text-align:center;">
	    	
	    </div>	    
	    <br>	    
	    <input class="button button-flat-primary" type="button" name="btn_tramite" id="btn_tramite" onclick="if(validar_antes()){$('#form_tra').submit();}" value="Registrar"/>

    </form>
</div>