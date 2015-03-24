<div class="contenedor_cuerpo"> 
	 <p class="titulo_módulo">PAGOS DE SEGUROS DE ESTUDIANTES</p>
	 
	    <div>	    	
	    	<input class="detalle_" type="text" name="f_ini_b" id="f_ini_b" value="" placeholder="Fecha inicio" style="width:90px;" maxlength="10"/>
	    	 - 
	    	 <input class="detalle_" type="text" name="f_fin_b" id="f_fin_b" value="" placeholder="Fecha fin" style="width:90px;" maxlength="10"/>
	    	  | 
	    	<input class="detalle_" type="text" name="t_cadseg" id="t_cadseg" value="" placeholder="Código o Nombre(s) o Apellidos" style="width:200px;" onKeyUp="if(event.charCode){unicode=event.charCode;}else{unicode=event.keyCode;} if (unicode==13){ver_segest();}"/>
	    	 | 
	    	<button class="button button-flat-primary"  name="btn_busseg" id="btn_busseg" onclick="ver_segest();">BUSCAR</button> | 	    	
	    	<button class="button button-flat-primary"  name="btn_exptodo" id="btn_exptodo" onclick="verexceltodo();">EXP.TODO</button>
	    	<button class="button button-flat-primary"  name="btn_expseg" id="btn_expseg" onclick="verexcel();">EXP.SEG.</button>
	    </div>
	    <br>	   
    <input type="hidden" name="cant_filas_seg" id="cant_filas_seg" value="0"/>

     <div class="CSSTableSimple" width="700">
		<table align="center">
			<th>N°</th>						
			<th>CARRERA</th>
			<th>COD.ALUMNO</th>
			<th>ALUMNO</th>
			<th>F.PAGO</th>
			<th>IMPORTE</th>
			<th>DNI</th>
			<th>F.NACIMIENTO</th>
			<th>CUENTA</th>
			<th>SEDE</th>			
			<tbody id="list_pagosseguro_">
            </tbody>
		</table>			
	</div>
</div>

