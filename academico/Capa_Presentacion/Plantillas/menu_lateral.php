<?php
$_SESSION["color1"]=isset($_GET['col'])?$_GET['col']:$_SESSION["color1"];
$_SESSION["color2"]=isset($_GET['col_sombra'])?$_GET['col_sombra']:$_SESSION["color2"];
$_SESSION["sistema"]=isset($_GET['sistema'])?$_GET['sistema']:$_SESSION["sistema"];
$_SESSION["letra"]=isset($_GET['letra'])?$_GET['letra']:$_SESSION["letra"];
?>
<div id='cssmenu'>


	<ul>

	<?php 			
		
		$cod='<Dato><n_id_sistema>'.$_SESSION["sistema"].'</n_id_sistema><c_cod_usuario>'.$_SESSION['dni'].'</c_cod_usuario></Dato>';
        $data=Logica::PA_UPLA("[seguridad].[paLis_opc]","array",$cod);                

      	set_menu_lateral($data,"principal","opcion","uri");
	?>

	</ul>
</div>
<div id="popupbox_BBalumnosBB" style="display:none">
	<input type="hidden" name="cant_filas_resultxx" id="cant_filas_resultxx" value="0"/>

    <div class="CSSTableSimple" width="700">
        <table  align="center">
            <th>CODIGO</th>
            <th>NOMBRE</th>
            <th>AP. PATERNO</th>
            <th>AP. MATERNO</th>
            <th>DNI</th>            
            <th>CARRERA</th>            
            <tbody id="list_resultxx_">
            </tbody>
        </table>    
    </div>	
</div>
