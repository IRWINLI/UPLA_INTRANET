<div class="contenedor_cuerpo">
    
    <fieldset>
        <p class="titulo_modulo">ASIGNACIÓN DE TEMAS DE CARGA LECTIVA</p>
        <div id="popupbox" style="display: none">
            
            <table >
                <tr>
                    <td><label>Carrera</label></td>
                    <td>:</td>
                    <td id="v_carrera">Ingeniería de Sistemas y Computación</td>
                </tr>
                <tr>
                    <td><label>Asignatura</label></td>
                    <td>:</td>
                    <td id="v_asignatura">Metología de Sistemas - 2007B</td>
                </tr>
                <tr>
                    <td>Sede/Modalidad</td>
                    <td>:</td>
                    <td id="v_sede_modalidad">Huancayo - Distancia</td>
                </tr>
    
                <tr>
                    <td>Nivel/Sección</td>
                    <td>:</td>
                    <td id="v_nivel_seccion">08 - A</td>
                </tr>
    
    
                
            </table>
            
     
            <br>
            <div>
                <div class="CSSTableSimple" width="700">
                    <table id="tabla_temas" >
                        <tbody>
                            <tr></tr>  
                        </tbody>
                    </table>
                </div>
            </div>
            <br>
            <button id="btnGuardar" type="button" onclick="guardarTemas();" >Guardar</button> 
            
        </div>
        
    
     
        
        
        <p>
            <label class="css_mod_subtitulo">Docente:</label>
            <?php echo $_SESSION['nomape']; ?>
        </p>
    
        <?php
            //$dni=isset($_GET['dni']) ? $_GET['dni'] : null ;    
            //$dni='21423306';
            $dni = $_SESSION['dni'];
            $buscar_xml='<Docente>
                    <dni>'.$dni.'</dni>
                    </Docente>';
            $datos=logica::PA_UPLA('[Academico].[paCon_ListarCargaLecTemas]','array',$buscar_xml);
        
               
        ?>
        
        <!--p style="color:blue">IMPORTANTE: Solo podrá asignar o editar los temas cuya fecha no haya pasado.</p-->
        <div class="css_mod_parrafo" style="width: 824px;">ADVERTENCIA: Desde que selecciona una Asignatura, tiene sólo 15 minutos para guardar un avance de su "Asignación de Temas", en caso contrario el sistema se bloqueará y no podrá guardar los cambios efectuados.</div>
        <br>
        <div class="CSSTableSimple">
            <table id="tabla_datosEstudiante">
                <tr>
                    <th>Asignatura</th>
                    <th>Sede</th>
                    <th>Modalidad</th>
                    <th>Carrera</th>
                    <th>Nivel</th>
                    <th>Sección</th>
                    <th>Plan de Estudios</th>
                    <th>Temas Asignados</th>
                    <th>Operaciones</th>
                </tr>
                
                <?php
                
                
                for ($i=0; $i<sizeof($datos);$i++){
                    //$datos[$i]["TemasAsignados"]='I';
                    if ($datos[$i]["TemasAsignados"]=='N'){
                        $img="temas/tema_nulo.png";
                        $est="Sin asignar";
                    }
                    else if ($datos[$i]["TemasAsignados"]=='I'){
                        $img="temas/tema_incompleto.png";
                        $est="Incompleto";
                    }
                    else if ($datos[$i]["TemasAsignados"]=='C'){
                        $img="temas/tema_completo.png";
                        $est="Completo";
                    }
                    $cargaLectiva=$datos [$i]["CargaLectiva"]; 
                ?>
                
                <tr>
                    <td><?php echo $asignatura=$datos [$i]["Asi_Asignatura"]; ?></td>
                    <td><?php echo $sede=$datos [$i]["Sed_Sede"]; ?></td>
                    <td><?php echo $modalidad=$datos [$i]["Modalidad"]; ?></td>
                    <td><?php echo $carrera=$datos [$i]["Car_Carrera"]; ?></td>
                    <td><?php echo $nivel=$datos [$i]["Nta_Nivel"]; ?></td>
                    <td><?php echo $seccion=$datos [$i]["Nta_Seccion"]; ?></td>
                    <td><?php echo $pes=$datos [$i]["PEs_Id"]; ?></td>
                    <td style="text-align: center;"><?php set_imagen($img,35,35);?><br><?php echo $est ?></a></td>
                    <td style="text-align: center;"><a href='javascript:asignacionTemas(<?php echo '"'.$asignatura.'","'.$sede.'","'.$modalidad.'","'.$carrera.'","'.$nivel.'","'.$seccion.'","'.$pes.'","'.$cargaLectiva.'"'; ?>)'>
                    <?php set_imagen("temas/tema_editar.png",43,43);?><br>Editar</a></td>
                </tr>
                <?php } ?>
    
            </table>
        </div>
        
    </fieldset>
</div>








<script>
    var arreglos_id_temas = new Array();
    var arreglos_id_horario = new Array();
    function asignacionTemas(asignatura,sede,modalidad,carrera,nivel,seccion,pes,cargalectiva) {
        var params={};

        params['cargaLec']=cargalectiva;
        $.ajax({
	    data : params,
	    type: "GET",
	    url: "CargaLectivaTemas",
            dataType: "json",
            success : function(data) 
            {
                //Se Limpia la Tabla
                $( "#tabla_temas tr" ).remove();//Se limpia la tabla
                
                nuevaFila = document.getElementById("tabla_temas").insertRow(-1);
                nuevaFila.innerHTML = "<th>Día</th><th>Fecha</th><th>Hora</th><th>Tema</th>";
                
                arreglos_id_temas = new Array();
                arreglos_id_horario = new Array();
                
                
                //alert(data.length);
                
                if (data.length!=1) {
                    for (var i=0;typeof(data[i])!= "undefined";i++){
                        //alert(data[i][0]);
                        
                        var relleno='';
                        var id_tema='tema_'+i;
                        
                        if (data[i][6]=='S') {
                            if (data[i][4]=='N') {
                                relleno = '<input type="text" name="nombre" value="" id="'+id_tema+'">';
                            }
                            else{
                                relleno = '<input type="text" name="nombre" value="'+data[i][4]+'" id="'+id_tema+'">';
                            }
                            
                            
                        }
                        else{
                            if (data[i][4]=='N') {
                                relleno = '<input style="background-color:red; color:white" readonly type="text" name="nombre" value="No se asignó tema" id="'+id_tema+'">';
                            }
                            else{
                                relleno = '<input style="background-color:grey; color:white" readonly type="text" name="nombre" value="'+data[i][4]+'" id="'+id_tema+'">';
                            }
                        }
                        
                        arreglos_id_temas.push(id_tema);
                        arreglos_id_horario.push(data[i][5]);
                        
                        nuevaFila = document.getElementById("tabla_temas").insertRow(-1);
                        nuevaFila.innerHTML = '<td>'+data[i][0]+'</td><td>'+data[i][1]+'</td><td>'+data[i][2].substring(0,5)+' - '+data[i][3].substring(0,5)+'</td><td style="width:300px">'+relleno+'</td>';
                        $("#btnGuardar").show();
                    }
                }
                else
                {
                    nuevaFila = document.getElementById("tabla_temas").insertRow(-1);
                    nuevaFila.innerHTML = '<td  colspan="4" style="color:red;">Lo sentimos, aún no le han asignado los horarios correspondientes a esta asignatura. Comuníquese con el Director de la EAP o con el Jefe de Departamento Académico. </td>';
                    $("#btnGuardar").hide();
                }
                
                
                
	    }
            ,error: function()
            {
		location.reload();						
	    }
    });
        
        $('#popupbox').dialog({
                title: "Temas de Carga Lectiva",
                modal: true,
                width: 610,
                height: 400,
                draggable:true,
                position: ["center",100],
                closeOnEscape : "true",
                close: function() { /*Nada..*/ }
            });
        $('#v_carrera').text(carrera);
        $('#v_asignatura').text(asignatura);
        $('#v_sede_modalidad').text(sede+' - '+modalidad);
        $('#v_nivel_seccion').text(nivel+' - '+seccion);
    }
    
    function guardarTemas(){
        
        var continuar = true;
        
        var arreglos_temas= new Array();
        for(i =0; i<arreglos_id_temas.length; i++){
                //xml=xml+'<Tema><cod_hor>'+arreglos_id_horario[i]+'</cod_hor><desc_tem>'+$('#'+arreglos_id_temas[i]).val()+'</desc_tem></Tema>';
                var tema = $('#'+arreglos_id_temas[i]).val();

                /*
                 if (tema=='') {
                    continuar = false;
                    i=arreglos_id_temas.length + 1;
                    alerta("Temas incompletos","Aviso");
                 }
                 */
                 
                arreglos_temas.push(tema);
        }
        
        if (continuar) {
        
            var params={};
            
            params['arreglos_id_horario']=arreglos_id_horario;
            params['arreglos_temas']=arreglos_temas;
            
            
            $.ajax({
                data : params,
                type: "POST",
                url: "InsertarTemas",
                dataType: "json",
                success : function(data) 
                {
                   alerta("Se ejecutó correctamente");
                   location.reload();
                }
                ,error: function()
                {
                    location.reload();					
                }
            });
            
        }
        
        
    }
    
    
    
    
    
</script>


