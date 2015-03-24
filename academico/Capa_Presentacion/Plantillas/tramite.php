<div class="contenedor_cuerpo"> 
	 <p class="titulo_módulo">ASIGNACIÓN DE TRÁMITE</p>
    
    <form id="form_tra" name="form_tra" action="tramitesga" method="POST">

	    <div>
	    	<input type="text" name="t_codigo" id="t_codigo" value="" placeholder="Código" style="width:152px; height:33px;border: 1px solid #d9d9d9; border-top: 1px solid #c0c0c0;" maxlength="8" onKeyUp="if(event.charCode){unicode=event.charCode;}else{unicode=event.keyCode;} if (unicode==13){buscar_tramite();}"/>
	    	<input class="button button-flat-primary" type="button" name="btn_bustra" id="btn_bustra" value="Buscar" onclick="buscar_tramite();" />
	    </div>
	    <br>
	    <div name="d_busqueda" id="d_busqueda" style="width:233px; font-size:smaller; text-align:center;">
	    	
	    </div>	    
	    <br>
	    <div>		    
		    <?php		    	
        		$data=Logica::PA_UPLA("[SGA].[PaCon_TipoTramite]","array",'',false,"SGA");
	    		combo($data,'id','detalle','cmb_tramite_','elegir trámite...','','detalle_','width:234px;');
	    	?>
	    </div>
	    <br>
	    <div>
		    
		    <?php
		    	$data=Logica::PA_UPLA("[SGA].[PaCon_AnioAcad]","array",'',false,"SGA");
		    	$aux=Logica::PA_UPLA("[SGA].[PaCon_PeriodoAcad]","","",true,"SGA");
		    	//echo substr($aux,0,strpos($aux,'-'));
		    	//echo substr($aux,strpos($aux,'-')+1);
	    		combo($data,'CODIGO','CODIGO','cmb_perianio_','',substr($aux,0,strpos($aux,'-')),'detalle_','width:176px;');	    		
	    	?>
		    -
		    <select class="detalle_" name="cmb_peri_" id="cmb_peri_" style="width:44px;">
			    <?php 
				    for($i=0;$i<3;$i++)
				    {			 
				    	if(substr($aux,strpos($aux,'-')+1) == $i.'')   				    		
				    		echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
				    	else
				    		echo '<option value="'.$i.'" >'.$i.'</option>';
				    }
			    ?>
		    </select>
	    </div>
	    <br>  
	    <div>
	    	<input class="detalle_" type="text" name="i_refe" id="i_refe" placeholder="Ejemplo: OF 247-2014-VRADM-UPLA" style="width:234px;" />
	    </div>  
	    <br>
	    
	    <input class="button button-flat-primary" type="button" name="btn_tramite" id="btn_tramite" onclick="if(validar_antes()){$('#form_tra').submit();}" value="Registrar"/>

    </form>
</div>