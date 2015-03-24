
<div class="contenedor_cuerpo">
    <div id='popupbox_constancia'></div>
    <div id="bloqueoPantalla" class="CSSbloqueoPantalla" style="display:none" onclick="ocultar_vistaPreviaHorario();"></div>
    <div id="vistaPrevia_horario" class="CSSemergente_horario" style="display:none">
        <div class="notif_btnCerrar" display="none" onclick="ocultar_vistaPreviaHorario();"></div>
    <!-- ====================================================================================================== -->
        <input type="hidden" id="cant_filas_horario_mat" name="cant_filas_horario_mat" value="0" />
        <div style="color: rgb(0, 0, 0); padding-left: 31px; margin-top: 20px; margin-bottom: 10px; font-size: 20px;">VISTA PREVIA DEL HORARIO DE MATRÍCULA (Asignaturas seleccionadas)<input type="submit" class="css_btn" id="btnPrinter"  value="IMPRIMIR HORARIO" style="margin-left: 30px;margin-top: 13px;"/></div>
        <div id="i_vistaHorario" class="CSSTableSimple_2"  >        
            <table style="width:1090px" id="tb_horario_z" align="center">
                <th>Hora Inicio/Dia</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>                
                <tbody id="tbDetalle_horario_matriculados">
                </tbody>                 
            </table>
        </div>
    </div>
    
        <script type="text/javascript">
            
            var ver_horarios_matriculados=function()
            {

                mostrarCargando();
            
                var params={};            
                params['alu']=<?php echo json_encode($_POST['codEst']);?>;                  
                
                //limpiar();
                $.ajax({
                        data : params,
                        type: "GET",
                        url: "verhorariomatriz-matriculados",
                        dataType: "json",
                        success : function(data) 
                        {   
                            
                            $.each(data, function(index, value) 
                            {   
                                if(!(data[index][0]=='No hay datos'))                                                                                                    
                                    tabla_ver_salonexists($.trim(data[index][1]),$.trim(data[index][2]),$.trim(data[index][3]),$.trim(data[index][4]),$.trim(data[index][5]),$.trim(data[index][6]),$.trim(data[index][7]),$.trim(data[index][8]),$.trim(data[index][9]),'tbDetalle_horario_matriculados','cant_filas_horario_mat');                            
                                    
                            });
                            //$("#tb_agregar_aux").show();
                            ocultarCargando();
                        },
                        error: function() 
                        {                    
                            //aviso("buscarSalones no devuelve datos utilizables!","white","black");                                                                
                            location.reload();
                            //ocultarCargando();
                        }
                });
            }

            var tabla_ver_salonexists=function(horas_ini,horas_fin,lu,ma,mi,ju,vi,sa,dom,tab,item)
            {        
                $("#"+item).val(parseInt($("#"+item).val()) + 1);  
                //$("#"+num).val(parseInt($("#"+num).val()) + 1);    
                var oId = $("#"+item).val(); 
                
                var strHtml1 = "<td id='horas_"+oId+"'><input type='hidden' name='horas_"+oId+"' id='horas_"+oId+"' value='"+horas_ini+" - "+horas_fin+"' />" + horas_ini+"</td>";            
                var strHtml2 = celdas("lunes",lu,oId);
                var strHtml3 = celdas("martes",ma,oId);
                var strHtml4 = celdas("miercoles",mi,oId);
                var strHtml5 = celdas("jueves",ju,oId);
                var strHtml6 = celdas("viernes",vi,oId);
                var strHtml7 = celdas("sabado",sa,oId);
                var strHtml8 = celdas("domingo",dom,oId);

                var strHtmlTr = "<tr id='"+tab+"_" + oId + "' align='center'></tr>";
                //onclick=eliminarfila("+oId+",'"+tab+"','"+item+"');
                var strHtmlFinal = strHtml1 + strHtml2 + strHtml3 + strHtml4 + strHtml5 + strHtml6 + strHtml7 + strHtml8;

               //tambien se puede agregar todo el HTML de una sola vez.
                $("#"+tab).append(strHtmlTr);
                //si se agrega el HTML de una sola vez se debe comentar la linea siguiente.
                $("#"+tab+"_" + oId).html(strHtmlFinal);
            }

            contador_semana=[];

            var celdas=function(dia,cad,oId)
            {
                var strHtmlx="";

                //if(contador_semana[dia]<=1 || typeof(contador_semana[dia])==='undefined')
                    strHtmlx = asignardatostmp(dia,cad,oId);
                //else        
                    //contador_semana[dia]=parseInt(contador_semana[dia])-1;            

                return strHtmlx
            }            
            
            var asignardatostmp=function(dia,cad,oId)
            {   

                var datos=cad.split("_");
                if(datos[0]!="")
                {
                    var dia_cod=codigodia(dia);
                    //array_celdas_horario_curso.push(datos[1]+"_"+datos[2]+"_"+datos[8]+"_"+datos[9]+"_"+dia_cod+"_"+datos[5]+"_"+datos[6]+"_"+datos[7]+"_"+(datos[3].split("/")[0])+"_"+(datos[3].split("/")[1]));
                    //var cod=array_celdas_horario_curso.length-1;
                    //1827,1840_35385,35391_ESTRUCTURAS III,CONSTRUCCIONES IV_1/10,1/10_1,1_2_rgba(255,0,0,0.4)_2007B_07:15_08:45_A1_PRUEBA_101
                    var cod_array=datos[0].split(",");
                    var asig_x=datos[2].split(",");
                    var cap_x=datos[3].split(",");

                    //var hor_ini_x=datos[8].split(",");
                    //var hor_fin_x=datos[9].split(",");
                    var obs_x=datos[12].split(",");

                    var tex="";
                   //alert(cod_armodray.length+" "+cod_array[0]);

                    if(cod_array.length>1)
                    {
                        for (var i = 0; i < cod_array.length; i++) 
                        {
                            tex+=(i+1)+") "+asig_x[i]+" ("+cap_x[i]+")";        
                            tex+="</br>";
                            tex+=($.trim(obs_x[i]).length>0)?obs_x[i]+"</br>":obs_x[i];                            
                        }       
                    }
                    else
                    {
                        tex+=asig_x[0]+" ("+cap_x[0]+")";        
                        tex+="</br>";
                        tex+=($.trim(obs_x[0]).length>0)?obs_x[0]+"</br>":obs_x[0];
                        //tex+="("+hor_ini_x[0]+"-"+hor_fin_x[0]+")";
                        //tex+="</br>";
                    }
                    tex+="</br>";
                    tex+=datos[10]+"-"+datos[11]+"</br>("+datos[8]+"-"+datos[9]+")";
                    
                    contador_semana[dia]=parseInt(datos[5]);
                    return "<td style='cursor: pointer;background-color:"+datos[6]+";' id='"+dia+"_"+oId+"' ><input type='hidden' id='"+dia+"_cod_"+oId+"' value='"+datos[0]+"'/>"+tex+"</td>";            
                }
                else
                    return "<td style='cursor: pointer;' id='"+dia+"_"+oId+"' ><input type='hidden' id='"+dia+"_cod_"+oId+"'/></td>";
             
            }

            var codigodia=function(dia)
            {
                switch($.trim(dia).toLowerCase())
                {
                    case "domingo":return 1;
                    case "lunes":return 2;
                    case "martes":return 3;
                    case "miercoles":return 4;
                    case "jueves":return 5;
                    case "viernes":return 6;
                    case "sabado":return 7;
                }
            }

        </script>

        <!-- ====================================================================================================== -->
    
    
    <div id='avisoMatricula' class='CSSavisoMatricula'>
            IMPORTANTE: Tome en cuenta que su matrícula será efectiva sólo después de haber presionado el botón "Ejecutar Matrícula", y haber confirmado dicha ejecución. <br> La Selección de Asignaturas con su respectivo horario será útil para "reservar cupos en salones", reserva que se mantendrá sólo por 24 horas si no confirma su matrícula.
    </div>
    
    
    <div class="contador_matricula" id="contador_matricula">

        <table>
            <tr>
                <th id="nivel_matricula">NIVEL/CICLO</th>
                <th id="nivel_matricula_n">0°</th>
            </tr>
            <tr>
                <td id="creditos_selec">CRÉDITOS SELECCIONADOS</td>
                <td id="creditos_selec_n">0</td>
            </tr>
            <tr>
                <td id="creditos_max">MÁXIMA CANTIDAD DE CRÉDITOS</td>
                <td id="creditos_max_n">0</td>
            </tr>
        </table>        
        <a href="javascript:vistaPreviaHorarios();"><div class="CSSbtnVistaPrevia"></div></a>
        <!--div id="btnAmpliarCreditos" class="CSSbtnAmpliarCreditos" onclick="prueba()"></div-->
        <div class="CSSbtnMatricular_div" onclick="ejecutarMatricula()"><div id="btnMatricular" class="CSSbtnMatricular"></div></div>
    </div>
    
    
    <div class="cuadroHorario" id="cuadroHorario" style="display:none">
        <div class="cuadroHorario_btnCerrar" onclick="javascript:ocultar_disponibilidadHorario()"></div>
        <p class="cuadroHorario_titulo" id="cuadroHorario_titulo">DISEÑO BÁSICO I</p>
        <br>
        <div class="cuadroHorario_contenido">
            
            <input id="hor_estado" type="hidden" value="" />
            <input id="hor_tipo" type="hidden" value="" />
            <input id="hor_nivel" type="hidden" value="" />
            <input id="hor_codigo" type="hidden" value="" />
            <input id="hor_nombre" type="hidden" value="" />
            <input id="hor_creditos" type="hidden" value="" />
            
        
            <label id ="datosAcademicos_horario">ARQUITECTURA (2007B) - I CICLO</label><br><br>
            <div class="CSSTableRayas">
                <table id="t_horarios" style="width:615px">
                    <tr>
                        <th colspan="2" style="height: 23px;">Horarios</th>
                        <th rowspan="2">Sección</th>
                        <th rowspan="2">Local/Aula</th>
                        <th rowspan="2" style="font-size: 13px; padding-left: 8px; padding-right: 8px;">Alumnos / <br>Capacidad</th>
                        <th rowspan="2">Seleccionar</th>
                    </tr>
                    <tr>
                        <th style="height: 22px;">Día(s)</th>
                        <th style="height: 22px;">Horas</th>
                
                    </tr>
                </table>
            </div>

        </div>
        <input id="btnGuardar_Horario" class="css_btn" type="button" value="GUARDAR" onclick="seleccionarAsignatura()" style="margin-top:10px;left: 525px;"/>
    </div>
    

    <fieldset>
        <p class="titulo_modulo">ASIGNATURAS A MATRICULAR</p>
        
        <?php
            $sumarElectivos=true;
            $codEst = $_POST['codEst'];
            $buscar_xml='<Dato>
                            <codEst>'.$codEst.'</codEst>
                        </Dato>';
            $datos=logica::PA_UPLA('[Academico].[paCon_AsignaturasMatriculables]','array',$buscar_xml);
            $progreso=logica::PA_UPLA('[Academico].[paCon_ProgresoEstudiante]','array',$buscar_xml);
            $CreditosPorCiclo=logica::PA_UPLA('[Academico].[paCon_CreditosMaxCant]','array',$buscar_xml);
            foreach ($progreso as $progreso_)
            {
                $datosAcademicos = utf8_encode($progreso_[0]);
                $creditosAprobados = utf8_encode($progreso_[1]);
                $creditosTotales = utf8_encode($progreso_[2]);
            }
            
            /* Variable que determina si el estudiante puede o no llevar mas de 3 ciclos consecutivos*/
            $mas_TresCiclos=logica::PA_UPLA('[Academico].[paCon_comprobarMatricularMasTresCiclos]','',$buscar_xml,true);

            
        ?>
        <label><?php echo $datosAcademicos ?></label><br>
        <input type="hidden" id="v_credAprobados" value="<?php echo $creditosAprobados?>" />
        <input type="hidden" id="v_credTotales" value="<?php echo $creditosTotales?>" />
        
        
        <div id="progressbar"><div class="progress-label">Cargando Progreso...</div></div>
        
        
        <div class="CSSTableSimple" width="500">
    
    <!-- ================= CREACIÓN DE VARIABLES ======================================================== -->
    
        <?php
            /*
            echo $planEstudios[0]; --> Estado de Asignatura ()
            echo $planEstudios[1]; --> Tipo de Asignatura
            echo $planEstudios[2]; --> Nivel de Asignatura
            echo $planEstudios[3]; --> Código de Asignatura
            echo $planEstudios[4]; --> Nombre de Asignatura
            echo $planEstudios[5]; --> #Creditos de Asignatura
            */
            
            $nivel=0;
            $creditosDisponibles = array();
            $creditosSeleccionados = array();
            $n_cursos=0;

        ?>
        
        
       <script>
        var creditosDisponibles = new Array();//Arreglo que cuenta los créditos disponibles en cada ciclo, solo cuando los créditos "disponibles" de un ciclo sean 0 se podrá seleccionar asignaturas del siguiente ciclo
        var creditosSeleccionados = new Array();//Arreglo que cuenta la cantidad de creditos seleccionados en cada ciclo
        var creditosPorCiclo = new Array();//Arreglo que almacena la cantidad de cŕeditos por ciclo académico
        var n_cursos =0;
        
        var minCiclo=0;
        var maxCiclo=0;
       </script>
                
        <div id="leyenda_estados" class="css_leyendaTipos" style="padding-top: 10px;">

        </div>
    <br>
     <label style="color:#555;font-size:19px;font-weight: bold;">PLAN DE ESTUDIOS</label><br>
    <!-- ================================================================================================ -->
        <?php
        
            
            $listarElectivos=1;
            $listarActividades=1;
            
            foreach ($datos as $planEstudios){
                
                //$planEstudios[2]='08';
                //if ($planEstudios[3]=='12185')  $planEstudios[0]='ED';
    
                
                if ($planEstudios[0]=="EA") $icono_asignatura="estado_aprobado";
                else if ($planEstudios[0]=="EC") $icono_asignatura="estado_convalidado";
                else if ($planEstudios[0]=="EB") $icono_asignatura="estado_bloqueado";
                else if ($planEstudios[0]=="ED") $icono_asignatura="estado_desbloqueado";
                
                if ($planEstudios[1]=="TE") $planEstudios[4] = "ELECTIVO: ".$planEstudios[4];
                else if ($planEstudios[1]=="TA") $planEstudios[4] = "ACTIVIDAD: ".$planEstudios[4];
                
                
                if ($creditosDisponibles[$nivel] == ''){$creditosDisponibles[$nivel]=0;}
                if ($creditosSeleccionados[$nivel] == ''){$creditosSeleccionados[$nivel]=0;}
                
                $estado_seleccion = 'X';   
                if ($planEstudios[0]=='ED'){
                    $estado_seleccion='Disponible';//Esta variable se utiliza para mostrar cuadros de selección a la izquierda de cada asignatura
                } 
                
                if ($nivel != $planEstudios[2]){ //Cuando se lee la asignatura de otro ciclo académico
                    $n_electivo=1;//Contador de Electivos en el nivel
                    $n_actividad=1;//Contador de Actividades en el nivel
                    $nivel=intval($planEstudios[2]);
                    $inc_electivos=true;
                    $inc_actividades=true;
                    
                    $cont_electivos=0;
                    $cont_actividades=0;
                    
                    $listarElectivos=1;
                    $listarActividades=1;
                    
                    $cont_electivos=0; //Contador de Electivos No Seleccionados que se van incrementando (Solo puede llegar a 1) hasta que aparezca uno seleccionado y se tenga que eliminar creditos seleccionados en arreglo de creditos disponibles
                    $cont_actividades=0; //Contador de Actividades No Seleccionadas que se van incrementando (Solo puede llegar a 1) hasta que aparezca una seleccionada y se tenga que eliminar creditos seleccionados en arreglo de creditos disponibles
                
                ?>
                
                
                
                
                    
                </table><br>
                <label style="font-size:17px; color:#333">NIVEL <?php echo $nivel ?></label>    
                <table id='tabla_nivel_<?php echo $nivel?>'>
                    <tr>
                        <th>Estado</th>
                        <th>Código</th>
                        <th>Asignatura</th>
                        <th>#Créditos</th>
                        <th>Seleccionar</th>
                    </tr>
                <?php
                }        
            /*
            echo $planEstudios[0]; --> Estado de Asignatura ()
            echo $planEstudios[1]; --> Tipo de Asignatura
            echo $planEstudios[2]; --> Nivel de Asignatura
            echo $planEstudios[3]; --> Código de Asignatura
            echo $planEstudios[4]; --> Nombre de Asignatura
            echo $planEstudios[5]; --> #Creditos de Asignatura
            echo $planEstudios[6]; --> Indicador de si Asignatura está selecta o no
            */
                
                
                if ($planEstudios[0]=='ED'  && $planEstudios[6]=='0'){
                    if ($planEstudios[1]=="TE" && $inc_electivos==true){
                        $creditosDisponibles[$nivel]= $creditosDisponibles[$nivel]+$planEstudios[5];
                        $inc_electivos=false;
                        $cont_electivos=$cont_electivos+$planEstudios[5];;
                    }
                    else if ($planEstudios[1]=="TA" && $inc_actividades==true){
                        $creditosDisponibles[$nivel]= $creditosDisponibles[$nivel]+$planEstudios[5];
                        $inc_actividades=false;
                        $cont_actividades=$cont_actividades+$planEstudios[5];;
                    }
                    else if ($planEstudios[1]!="TE" && $planEstudios[1]!="TA"){
                        $creditosDisponibles[$nivel]= $creditosDisponibles[$nivel]+$planEstudios[5];
                        
                    }
                    
                }
                else if($planEstudios[0]=='ED'  && $planEstudios[6]=='1')
                {
                    $creditosSeleccionados[$nivel]=$creditosSeleccionados[$nivel]+$planEstudios[5];
                    //----------- PARA QUE NO VUELVA A LISTAR TODOS LOS ELECTIVOS O ACTIVIDADES CUANDO RECARGE, CUANDO YA HAY ALGUNO SELECTO
                    if (($planEstudios[1] =='TA' or $planEstudios[1] =='TE') and $planEstudios[2]!='11' and $planEstudios[2]!='12' )
                    {                        
                        if($planEstudios[1]=="TA")
                        {
                            $creditosDisponibles[$nivel]=$creditosDisponibles[$nivel] - $cont_actividades;
                            $inc_actividades=false;
                            $listarActividades=0;
                        }
                        else if ($planEstudios[1]=="TE")
                        {
                            $creditosDisponibles[$nivel]=$creditosDisponibles[$nivel] - $cont_electivos;
                            $inc_electivos=false;
                            $listarElectivos=0;
                        }
                                                
                        if ($listarActividades==0 and $planEstudios[1] =='TA')
                        {
                            $jscript="$('.".$planEstudios[1].'_'.$planEstudios[2]."').hide();$('#".$planEstudios[3]."').show();";
                            script($jscript);
                            $act_select = $planEstudios[3];
                        }
                        
                        if ($listarElectivos==0 and $planEstudios[1] =='TE')
                        {
                            $jscript="$('.".$planEstudios[1].'_'.$planEstudios[2]."').hide();$('#".$planEstudios[3]."').show();";
                            script($jscript);
                            $elec_select = $planEstudios[3];
                        }
                        
                    }
                    
                    
                    
                }
                
                $clasetr='';
                $clasetd='';

                if ($planEstudios[6]=='1')//Si la Asignatura está selecta
                {
                    $clasetr="CSSasignSelecta";
                    
                    $n_cursos++;
                }
                else if ($planEstudios[6]=='0')//Si la Asignatura no está selecta
                {
                    $clasetr=$planEstudios[1]."_".$planEstudios[2];
                    
                }
                if ($planEstudios[0]=="ED")
                {
                    $clasetd="CSScheckbox_Seleccionado";
                }
                else
                {
                    $clasetd="CSScheckbox_X";
                }
                ?>    
                    <tr style="cursor:pointer; cursor: hand" id = "<?php echo utf8_encode($planEstudios[3])?>" class="<?php echo $clasetr?>"
                    onclick="onclick_asignatura('<?php echo utf8_encode($planEstudios[0]) ?>',
                                                                                         '<?php echo utf8_encode($planEstudios[1]) ?>',
                                                                                         '<?php echo utf8_encode($planEstudios[2]) ?>',
                                                                                         '<?php echo utf8_encode($planEstudios[3]) ?>',
                                                                                         '<?php echo utf8_encode($planEstudios[4]) ?>',
                                                                                         '<?php echo utf8_encode($planEstudios[5]) ?>')">
                        <td class="<?php echo $icono_asignatura ?>" id="a_estado"></td>
                        <td id="codigo_<?php echo $planEstudios[3] ?>"><?php echo utf8_encode($planEstudios[3])?></td>
                        <td id="nombres_<?php echo $planEstudios[3] ?>" class="icon_tipoAsignatura_<?php echo $planEstudios[1]?>" style="text-align: left;padding-left: 80px;"><?php echo utf8_encode($planEstudios[4])?></td>
                        <td id="creditos_<?php echo $planEstudios[3] ?>" style="font-size:18px"><?php echo utf8_encode($planEstudios[5])?></td>                            
                        </td>
                        <td id="iconoSeleccion_<?php echo $planEstudios[1] ?>_<?php echo $planEstudios[2] ?>_<?php echo $planEstudios[3] ?>" class="<?php echo $clasetd ?>"></td>                                                              
                    </tr>
                <?php
                
              
                    
                    if (($listarActividades==0 or $listarElectivos==0) and ($planEstudios[1]=='TA' or $planEstudios[1]=='TE') and ($planEstudios[3]!=$act_select and $planEstudios[3]!=$elec_select))
                    {
                        $jscript="$('#".$planEstudios[3]."').hide();";
                        script($jscript);
                    }
                }
                  
   
                ?>
                </table>
        </div>
        
        
        
    </fieldset>
    
</div>

<script>
    

    
    
    
    var codAsign_asignaturasSelectas = new Array();//Arreglo que almacena el código de las asignaturas que el estudiante va seleccionando
    var codHorar_asignaturasSelectas = new Array();//Arreglo que almacena el código de las asignaturas que el estudiante va seleccionando
    
    

    
    function ejecutarMatricula() {

        var cicloMax = 0;
        var cicloMaxCreditos=0;
        var totalCreditos=0;
        
        for (var i=1; i<creditosSeleccionados.length;i++)
                { 
                totalCreditos+=creditosSeleccionados[i];
                if (parseInt(creditosSeleccionados[i])>cicloMaxCreditos) {
                    cicloMax=parseInt(i);
                    cicloMaxCreditos=parseInt(creditosSeleccionados[i]);
                }      
        }
        

        
        if (totalCreditos<1) {
            notificacion(1,"No se ha seleccionado ninguna asignatura.","Lo sentimos, para ejecutar la matrícula debe haber seleccionado al menos 1 asignatura.",10);      
        }
        else if (totalCreditos>maxCreditos[cicloMax]) {
            notificacion(1,"Se supera la cantidad máxima de créditos.","Lo sentimos, usted no puedo matricularse pues supera la cantidad máxima de créditos permitida.",10);
        }
        
        else
        {
            alertify.confirm('A continuación se registrará su matrícula en el sistema ¿Está seguro de que desea continuar?', function (e) {
                if (e) {
                    
                    mostrarCargando();
                    var params={};            
                    params['nivelMatri']=numeroDosCifras(cicloMax);                  
                    params['totalCred']=totalCreditos;
                    params['totalCur']=n_cursos;
                    

                    
                    
                    $.ajax({
                        data : params,
                        type: "POST",
                        url: "registrarMatricula",
                        dataType: "json",
                        success : function(data) 
                        {   
    
                            if (data['rpta']==2) {
                                
                                //notificacion(2,"Matricula Registrada","¡Felicitaciones! Tu matrícula ha sido registrada correctamente. Si gustas ahora puedes imprimir tu Constancia de Matrícula.");
                                location.href='matriculaRealizada?msj=0';
                            }
                            else if (data['rpta']==1) {
                                notificacion(1,"Fuera de Tiempo","¡Lo sentimos! Tu matrícula está fuera de tiempo.");
                            }
                            else
                            {
                                notificacion(0,"Error en Registro de Matrícula","Ha habido un error en tu registro de matrícula, si el error persiste comuníquese con la Oficina Universitaria de Informática y Sistemas.");
                            }
                            ocultarCargando();
                        },
                        error: function() 
                        {                    
                            //aviso("buscarSalones no devuelve datos utilizables!","white","black");                                                                
                            location.reload();
                            //ocultarCargando();
                        }
                    });
                }
                
            });
            
        }
        

    }
    
    
    function numeroDosCifras(numero){
        var retorno;
        
        if (numero<10) {
            retorno = '0'+numero;
        }
        else
        {
            retorno = numero;
        }
        return retorno;
    }
    
    
    
    function vistaPreviaHorarios() {
        ver_horarios_matriculados();
        $("#vistaPrevia_horario").css("display","block");
        $("#bloqueoPantalla").css("display","block");
        $("#tb_horario_z td").remove();
        
    }
    
    function ocultar_vistaPreviaHorario(){
        $("#vistaPrevia_horario").css("display","none");
        $("#bloqueoPantalla").css("display","none");
    }
    
    var maxCreditos = new Array();
    maxCreditos[0]=0;
    
    
    
    function verificarCreditos(){
        var cicloMax = 0;
        var cicloMaxCreditos=0;
        var totalCreditos=0;
        
        for (var i=1; i<creditosSeleccionados.length;i++)
                { 
                totalCreditos+=creditosSeleccionados[i];
                if (parseInt(creditosSeleccionados[i])>cicloMaxCreditos) {
                    cicloMax=parseInt(i);
                    cicloMaxCreditos=parseInt(creditosSeleccionados[i]);
                }      
        }
        $("#nivel_matricula_n").text(cicloMax+"°");
        $("#creditos_selec_n").text(totalCreditos);
        $("#creditos_max_n").text(maxCreditos[cicloMax]);
        if (parseInt(totalCreditos)>parseInt(maxCreditos[cicloMax])) {
            $("#creditos_selec_n").css("color","red");
        }
        else{
            $("#creditos_selec_n").css("color","black");
        }
        
    }
    

    
    $( document ).ready(function(){
        creditosDisponibles = <?php echo json_encode($creditosDisponibles);?>;
        creditosSeleccionados = <?php echo json_encode($creditosSeleccionados); ?>;
        creditosPorCiclo= <?php echo json_encode($CreditosPorCiclo);?>;
        n_cursos=<?php echo json_encode($n_cursos);?>;
        //for (var i=1;i<creditosDisponibles.length;i++){
        //    creditosSeleccionados[i]=0;
        //}
        
        for(var i=1; i<=creditosPorCiclo.length;i++){
            maxCreditos[i]=creditosPorCiclo[i-1][1];
        }
        verificarCreditos();
        $("#vistaPrevia_horario").draggable();
        $("#cuadroHorario").draggable();
        $("#leyenda_estados").draggable();
        $("#avisoMatricula").draggable();

        
        
        /* ======================================================================== */
        /* Determinando el nivel mínimo y el nivel máximo al que puede matricularse */
        
        var mas_TresCiclos = <?php echo $mas_TresCiclos ?>;
        //mas_TresCiclos=true;
        var ciclosContados=0;
        //Recorreremos el arreglo "creditosDisponibles" para determinar el nivel mínimo y el nivel máximo
        for(var i=0; i<=creditosDisponibles.length;i++)
        {

            
            var creditosMatriculables = parseInt(creditosDisponibles[i])+parseInt(creditosSeleccionados[i]);
            

            if (creditosMatriculables>0 && minCiclo==0) {
                minCiclo=i;
                maxCiclo=i;
                ciclosContados++;
            }
            else if (mas_TresCiclos==false && ciclosContados<3 && creditosMatriculables>0) {
                maxCiclo=i;
                ciclosContados++;
                
            }            
            else if (mas_TresCiclos==true && creditosMatriculables>0)
            {
                maxCiclo=i;
            }
            
        }
        
        
        
    });
   
    var v_credAprobados = $("#v_credAprobados").val();
    var v_credTotales = $("#v_credTotales").val();
    
    var progressbar = $( "#progressbar" ),
    progressLabel = $( ".progress-label" );
    progressbar.progressbar({
        value: false,
        change: function() {
            progressLabel.text("Aprobados "+v_credAprobados+" de "+v_credTotales+" créditos. Progreso: "+progressbar.progressbar( "value" ) + "%" );
        },
        complete: function() {
            progressLabel.text( "Has terminado tu Escuela Académico Profesional." );
        }
    });
    
    function progress() {
        var totalCreditos = v_credTotales;
        var creditosAprobados = v_credAprobados;
        var porcentaje = (creditosAprobados*100)/totalCreditos;
        
        if (porcentaje<100 && porcentaje>=99) porcentaje=99;

        
        var val = progressbar.progressbar( "value" ) || 0;
        progressbar.progressbar( "value", val + 1 );
        if ( val < porcentaje-1 ) {http://stackoverflow.com/questions/2400386/get-class-name-using-jquery
            setTimeout( progress, 25 );
        }
    }
    setTimeout( progress, 2000 );
    
    $('#contador_matricula').draggable();

    
    function superaLimiteCreditos(asig_codigo,creditos){
        var supera = 0;
        
        var cicloMax = 0;
        var cicloMaxCreditos=0;
        var totalCreditos=0;
        
        for (var i=1; i<creditosSeleccionados.length;i++)
                { 
                totalCreditos+=creditosSeleccionados[i];
                if (parseInt(creditosSeleccionados[i])>cicloMaxCreditos) {
                    cicloMax=parseInt(i);
                    cicloMaxCreditos=parseInt(creditosSeleccionados[i]);
                }      
        }
        
        if ($('#'+asig_codigo).attr('class')!="CSSasignSelecta")
        {
            totalCreditos=parseInt(totalCreditos)+parseInt(creditos);
            if (totalCreditos>maxCreditos[cicloMax] && cicloMaxCreditos!=0) {
                supera=1;
            }
        }
        else
        {
           //totalCreditos=parseInt(totalCreditos)-parseInt(creditos);
           supera=0;
        }

        
        
        
        
        return supera;
    }
    
    function onclick_asignatura(asig_estado,asig_tipo,asig_nivel,asig_codigo,asig_nombre,asig_creditos) {
        

        
        //alert("MIN->"+minCiclo);
        //alert("MAX->"+maxCiclo);
        
        if (asig_nivel>=minCiclo && asig_nivel<=maxCiclo) {
            if (superaLimiteCreditos(asig_codigo,asig_creditos)==0 )
            {
    
                $('#hor_estado').val(asig_estado);
                $('#hor_tipo').val(asig_tipo);
                $('#hor_nivel').val(asig_nivel);
                $('#hor_codigo').val(asig_codigo);
                $('#hor_nombre').val(asig_nombre);
                $('#hor_creditos').val(asig_creditos);
                
                //TalleresTecnicosAmarrados==> if (asig_tipo=='TT') {//======== Si la Asignatura es un "Taller Técnico", se seleccionarán los 2 del ciclo académico, por tanto los créditos se duplicarán
                //TalleresTecnicosAmarrados==>     asig_creditos=asig_creditos*2;
                //TalleresTecnicosAmarrados==> }
                
                //if ($('#iconoSeleccion_'+asig_tipo+'_'+asig_nivel+'_'+asig_codigo).attr('class')=='CSScheckbox_Seleccionado') {
                //    deseleccionarAsignatura(asig_codigo);
                //}
                //else{
                    if (asig_estado=='EB') {
                            notificacion(1,'Asignatura Bloqueada','Lo sentimos, usted no puede seleccionar "'+asig_nombre+'", pues aún no ha cumplido con los Pre Requisitos.',10);
                        }
                        else if (asig_estado=='EA') {
                            notificacion(1,'Asignatura Aprobada','Usted no puede llevar "'+asig_nombre+'", ya la ha aprobado.',10);
                        }
                        else if (asig_estado=='EC') {
                            notificacion(1,'Asignatura Aprobada','Usted no puede llevar "'+asig_nombre+'", esta asignatura ha sido convalidada.',10);
                        }
                        else {
                            
                            var continuar=true;
        
                            //Se comprueba que todos los ciclos anteriores al seleccionado tengan 0 créditos disponibles
                            for (var i=1;i<asig_nivel;i++)
                            {
                                if (creditosDisponibles[i]!=0) {
                                    notificacion(1,'Nivel N°'+i+" incompleto",'Aún no ha seleccionado todas las asignaturas disponibles en el Nivel N°'+i+", por lo tanto no es posible acceder a las asignaturas del Nivel N°"+asig_nivel+".",10);
                                    continuar=false;
                                    break;
                                }  
                            }
                            if (continuar) {
                                $('#hor_estado').val(asig_estado);
                                $('#hor_tipo').val(asig_tipo);
                                $('#hor_nivel').val(asig_nivel);
                                $('#hor_codigo').val(asig_codigo);
                                $('#hor_nombre').val(asig_nombre);
                                $('#hor_creditos').val(asig_creditos);
                                mostrar_disponibilidadHorarios(asig_estado,asig_tipo,asig_nivel,asig_codigo,asig_nombre,asig_creditos);
                                
                                $('#cuadroHorario_titulo').text(asig_nombre);
                                $('#datosAcademicos_horario').text("<?php echo $datosAcademicos ?>"+" - NIVEL N°"+asig_nivel);
                                       
                            }
                        }
                    }
                
                else
                {
                    notificacion(1,"Limite máximo de créditos superado","Lo sentimos, no puede seleccionar esta asignatura pues superaría el límite máxima de créditos permitido.",10);
                }
        }
        else
        {
            notificacion(1,"Limite de ciclos académicos superado","Lo sentimos, usted no puede matricularse en asignaturas pertenecientes a ciclos superiores al "+maxCiclo+"°.",10);
        }

    
    }
    
    
    var activar=false;
    var cod_horarioGeneral='' //Variable que almacena el código del horario seleccionado
    var cod_horariosDetalle=''//Variable que almacena los códigos detalle de los horarios seleccionados
    var agregar_horarios = true; //Variable que indica si se está seleccionando o deseleccionando la asignatura
    function seleccionarHorario(v_horarioGeneral,v_horarioDetalle){

        $('#btnGuardar_Horario').attr("disabled", false);
        
        
        if ($('#HorarioSeleccionado_'+v_horarioGeneral).attr('class')=='CSSHorarioSeleccionado_SI') {
            activar=false;
        }
        else if ($('#HorarioSeleccionado_'+v_horarioGeneral).attr('class')=='CSSHorarioSeleccionado_NO'){
            activar=true;
        }
        
        
        $("div[id ^= 'HorarioSeleccionado_']").removeClass("CSSHorarioSeleccionado_SI").addClass("CSSHorarioSeleccionado_NO");
        
        

         
        if (activar==false) {
            $('#HorarioSeleccionado_'+v_horarioGeneral).removeClass("CSSHorarioSeleccionado_SI").addClass("CSSHorarioSeleccionado_NO");
            agregar_horarios=false;
        }
        if (activar==true){
            $('#HorarioSeleccionado_'+v_horarioGeneral).removeClass("CSSHorarioSeleccionado_NO").addClass("CSSHorarioSeleccionado_SI");
            agregar_horarios=true;
        }
        

        
        cod_horarioGeneral=v_horarioGeneral;
        cod_horariosDetalle=v_horarioDetalle;
        
        /*
        if (v_horarioGeneral!=cod_horarioGeneral) {
            $('#HorarioSeleccionado_'+v_horarioGeneral).removeClass("CSSHorarioSeleccionado_NO").addClass("CSSHorarioSeleccionado_SI");
            cod_horarioGeneral=v_horarioGeneral;
            cod_horariosDetalle=v_horarioDetalle;
            agregar_horarios=true;
        }
        else
        {
            agregar_horarios=false;
        }
        */
    }
    
    function seleccionarAsignatura(){
        
        //alert(cod_horarioGeneral);
        //alert(cod_horariosDetalle);
        
        var ejecutarProcedimiento=1;
        
        if (agregar_horarios==false) {
            ejecutarProcedimiento=deseleccionarAsignatura();
        }
        else
        {
            asig_estado=$('#hor_estado').val();
            asig_tipo=$('#hor_tipo').val();
            asig_nivel=$('#hor_nivel').val();
            asig_codigo=$('#hor_codigo').val();
            asig_nombre=$('#hor_nombre').val();
            asig_creditos=$('#hor_creditos').val();
            
            
            /* ============== Modificación del arreglo de cŕeditos === */
            
            if ($('#'+asig_codigo).attr('class')!="CSSasignSelecta") {//Sólo se modifica créditos si la asignatura está selecta
                creditosDisponibles[asig_nivel]=parseInt(creditosDisponibles[asig_nivel])-parseInt(asig_creditos); //Se resta la cantidad de créditos disponibles al arreglo correspondiente
                creditosSeleccionados[asig_nivel]=parseInt(creditosSeleccionados[asig_nivel])+parseInt(asig_creditos); //Se le suma la cantidad de créditos disponibles al arreglo correspondiente 
            }
                       
            /* ============== Muestra en interfaz de selección =================== */
            //$('#'+asig_codigo).css("border","#003399 solid 3px");
            $('#'+asig_codigo).removeClass(asig_tipo+'_'+asig_nivel).addClass("CSSasignSelecta");
            $('#iconoSeleccion_'+asig_tipo+'_'+asig_nivel+'_'+asig_codigo).removeClass("CSScheckbox_Disponible").addClass("CSScheckbox_Seleccionado");
           
            
            if ((asig_tipo=="TE"||asig_tipo=="TA") && asig_nivel!='11' && asig_nivel!='12')
            {
                //alert(asig_nivel);
                $('.'+asig_tipo+'_'+asig_nivel).hide();
                $('#'+asig_codigo).show();
            }
            
            //TalleresTecnicosAmarrados==> if (asig_tipo=="TT") {
            //TalleresTecnicosAmarrados==>     $('.'+asig_tipo+'_'+asig_nivel).css("border","#003399 solid 3px");
            //TalleresTecnicosAmarrados==>     $("td[id^='iconoSeleccion_TT_"+asig_nivel+"_']").removeClass("CSScheckbox_Disponible").addClass("CSScheckbox_Seleccionado");
            //TalleresTecnicosAmarrados==> }
      
            n_cursos++;
            /* ============== Ocultando "pop-up" de disponibilidad de horarios === */
            ocultar_disponibilidadHorario();
            verificarCreditos();
            
            /* ============== Agregando asignatura seleccionada en arreglo "asignaturasSelectas"===================== */
            //codAsign_asignaturasSelectas.push(asig_codigo);
            //codHorar_asignaturasSelectas.push(codHorario);
        
        

        }
                    
            if (ejecutarProcedimiento==1) {

               // mostrarCargando();
                var params={};  
                params['c_horario']=cod_horarioGeneral;
                params['c_horarios_detalle']=cod_horariosDetalle;
                params['agregar']=agregar_horarios;
                params['codEst']=<?php echo json_encode($_POST['codEst']);?>;
                
                $.ajax({
                    data : params,
                    type: "POST",
                    url: "SelecionarHorarioEstudiante_MatriculaManual",
                    dataType: "json",
                    success : function(data)
                    {
                
                        if (data['rpta']=="CORRECTO")
                        {
                            
                        }
                        else if(data['rpta']=="AULALLENA")
                        {
                            //notificacion(1,"Horario No Disponible","Lo sentimos, este horario acaba de llenarse, actualice la página para ver la cantidad exacta.",8);
                            location.reload();
                        }
                        else if(data['rpta']=="ERRORTRANSACTION")
                        {
                            notificacion(0,"Error de Transacción","Error en transacción, si el error persiste consulte con los encargados en su facultad.",8);
                        }
                        else if(data['rpta']=="ERRORCATCH")
                        {
                            notificacion(0,"Error Capturado","Error en Operación, si el error persiste consulte con los encargados en su facultad.",8);
                        }
                        else
                        {
                            notificacion(0,"Error al realizar operación","Lo sentimos, ha habido un error al realizar operación.",8);
                        }
                        
                    }
                    ,error: function()
                    {
                        location.reload();
                    }
                    
                });            
            }
    }
    
    function deseleccionarAsignatura() {
        
        var retorno=1;//Si se ejecuta procedimiento de deselección de horario
        
        asig_estado=$('#hor_estado').val();
        asig_tipo=$('#hor_tipo').val();
        asig_nivel=$('#hor_nivel').val();
        asig_codigo=$('#hor_codigo').val();
        asig_nombre=$('#hor_nombre').val();
        asig_creditos=$('#hor_creditos').val();
        
        //TalleresTecnicosAmarrados==> if (asig_tipo=='TT') {//======== Si la Asignatura es un "Taller Técnico", se seleccionarán los 2 del ciclo académico, por tanto los créditos se duplicarán
        //TalleresTecnicosAmarrados==>     asig_creditos=asig_creditos*2;
        //TalleresTecnicosAmarrados==> }
        
        
        /*------------------------------------------------------------------------------------------------------
         *Para deseleccionar la asignatura de un ciclo, no debe estar seleccionada ninguna de un ciclo superior */
        
        var deseleccionarAsignatura=true;
        for (var i = creditosSeleccionados.length-1; i>parseInt(asig_nivel);i--){
            if (parseInt(creditosSeleccionados[i])>0) {
                deseleccionarAsignatura=false;
                notificacion(1,'¡No es posible "Deseleccionar" asignatura!','No es posible deseleccionar asignaturas del Nivel N°'+asig_nivel+' mientras hayan asignaturas de niveles superiores seleccionadas.','14');
                retorno=0;
                //ocultar_disponibilidadHorario();
                break;
            }
        }
                
        if (deseleccionarAsignatura)
        {
            /* ============== Modificación del arreglo de cŕeditos === */
            if ($('#'+asig_codigo).attr('class')=="CSSasignSelecta") {//Sólo se modifica créditos si la asignatura está deselecta
                creditosDisponibles[asig_nivel]=parseInt(creditosDisponibles[asig_nivel])+parseInt(asig_creditos); //Se resta la cantidad de créditos disponibles al arreglo correspondiente
                creditosSeleccionados[asig_nivel]=parseInt(creditosSeleccionados[asig_nivel])-parseInt(asig_creditos); //Se le suma la cantidad de créditos disponibles al arreglo correspondiente
            }

             /* ============== Muestra en interfaz de selección =================== */
            //$('#'+asig_codigo).css("border","none");
            $('#'+asig_codigo).removeClass("CSSasignSelecta").addClass(asig_tipo+'_'+asig_nivel);
            $('#iconoSeleccion_'+asig_tipo+'_'+asig_nivel+'_'+asig_codigo).removeClass("CSScheckbox_Seleccionado").addClass("CSScheckbox_Disponible");
                        
            if (asig_tipo=="TE"||asig_tipo=="TA") {
                $('.'+asig_tipo+'_'+asig_nivel).show();
            }
            n_cursos--;
            //TalleresTecnicosAmarrados==> if (asig_tipo=="TT") {
            //TalleresTecnicosAmarrados==>     $('.'+asig_tipo+'_'+asig_nivel).css("border","none");
            //TalleresTecnicosAmarrados==>     $("td[id^='iconoSeleccion_TT_"+asig_nivel+"_']").removeClass("CSScheckbox_Seleccionado").addClass("CSScheckbox_Disponible");
            //TalleresTecnicosAmarrados==> }
            
            /* ============== Ocultando "pop-up" de disponibilidad de horarios === */
            ocultar_disponibilidadHorario();
            verificarCreditos();
            
        }
        return retorno;
        /*========== Eliminando Asignatura de Arreglos ====================================== */
        /*
        
        var posicion = 0;
        
        for (var i=0; i<codAsign_asignaturasSelectas.length;i++){
            if (codAsign_asignaturasSelectas[i]== asig_codigo) {
                posicion=i;
                break;
            }
        }
        
        codAsign_asignaturasSelectas.splice(posicion,1);
        codHorar_asignaturasSelectas.splice(posicion,1);*/
        
        //verificarCreditos();
    }


    
    
    
    
    function mostrar_disponibilidadHorarios(){
        //[Academico].[paCon_horarios]
        
        mostrarCargando();
        
        asig_estado=$('#hor_estado').val();
        asig_tipo=$('#hor_tipo').val();
        asig_nivel=$('#hor_nivel').val();
        asig_codigo=$('#hor_codigo').val();
        asig_nombre=$('#hor_nombre').val();
        asig_creditos=$('#hor_creditos').val();
            
        $('#btnGuardar_Horario').attr("disabled", true);
            
        
        var params={};  
        params['codAsign']=asig_codigo;
        params['codEst']=<?php echo json_encode($_POST['codEst']);?>;  

        $.ajax({
            data : params,
            type: "GET",
            url: "ListarHorariosDisponibles_Manual",
            dataType: "json",
            success : function(data)
            {
                /*  data[X][0] -> código de horario
                    data[X][1] -> código de salon
                    data[X][2] -> dia
                    data[X][3] -> hora de inicio
                    data[X][4] -> hora de fin
                    data[X][5] -> local
                    data[X][6] -> aula
                    data[X][7] -> N° de Ocupados
                    data[X][8] -> Disponibilidad Total
                    data[X][9] -> Bandera de Disponibilidad
                    data[X][10] -> Bandera que indica si ya ha sido seleccionado o no por el estudiante
                    
                    */
                
                
                if (data=="No hay datos") {
                    notificacion(1,"No hay horarios disponibles","Lo sentimos, actualmente no existen horarios disponibles para esta asignatura, comuniquese son su Facultar o Coordinación...",10);
                }
                else
                {
                    
                    agregar_horarios=false;//--Esta Variable (Que determina si se va a agregar o no un horario al hacer click en GUARDAR en la ventana de Horarios)
                                            //Se predispone en FALSE por si el usuario no hiciera ningún cambio
                    cod_horarioGeneral='';
                    cod_horariosDetalle='';
                    $("#t_horarios td").remove();
                
                    var v_dia_grupo='';
                    var v_horas_grupo='';
                    
                    var v_horarios='';
                    var v_salon_grupo=data[0][1];
                    
                    
                    
                    var v_horario_ant= '';
                    var v_salon_ant = '';
                    var v_dia_ant = '';
                    var v_hor_ini_ant = '';
                    var v_hor_fin_ant= '';
                    var v_local_ant = '';
                    var v_aula_ant = '';
                    var v_ocupado_ant = '';
                    var v_dispoTotal_ant = '';
                    var v_banderaDispo_ant = '';
                    var v_seleccionado_ant = '';
                    
                    for(var i=0;typeof(data[i])!= "undefined";i++)
                    {
                            
                            var v_horario= data[i][0];
                            var v_salon = data[i][1];
                            var v_dia = data[i][2];
                            var v_hor_ini = data[i][3];
                            var v_hor_fin= data[i][4];
                            var v_local = data[i][5];
                            var v_aula = data[i][6];
                            var v_ocupado = data[i][7];
                            var v_dispoTotal = data[i][8];
                            var v_banderaDispo = data[i][9];
                            var v_seleccionado = data[i][10];
                            
                            if (v_seleccionado=='SI') {
                                agregar_horarios=true;
                                
                            }
                            
                            //if (v_banderaDispo!=0 || (v_banderaDispo==0 && v_seleccionado=='SI')) {
                            if (1==1) {  
                               
                               if (v_salon_grupo==v_salon) {
                                v_dia_grupo=v_dia_grupo+v_dia+'<br>';
                                v_horas_grupo=v_horas_grupo+"De "+v_hor_ini+' a '+v_hor_fin+'<br>'
                                v_horarios=v_horarios+'-'+v_horario;
                            }
                            else{
                                if (v_seleccionado_ant=='SI') {
                                    cod_horarioGeneral=v_salon_grupo;//Se asigna código de horario seleccionado
                                    cod_horariosDetalle=v_horarios;//Se asigna código de horarios detalles seleleccionados
                                }
                                v_horarios="'"+v_horarios+"'";
                                
                                estilo_bloqueado='';
                                if (v_banderaDispo_ant==0){
                                    estilo_bloqueado=' style="background-color: rgb(0, 0, 0); color: rgb(222, 80, 80);"';
                                    $("#t_horarios").append('<tr '+estilo_bloqueado+' onclick="aviso_salonOcupado()" ><td>'+v_dia_grupo+'</td><td>'+v_horas_grupo+'</td><td>'+v_local_ant+'</td><td>'+v_aula_ant+'</td><td>'+v_ocupado_ant+'/'+v_dispoTotal_ant+'</td><td ><div id="HorarioSeleccionado_'+v_salon_ant+'" class="CSSHorarioSeleccionado_'+v_seleccionado_ant+'"></div></td></tr>');     
                                }
                                else{
                                $("#t_horarios").append('<tr '+estilo_bloqueado+' onclick="seleccionarHorario('+v_salon_grupo+','+v_horarios+')"><td>'+v_dia_grupo+'</td><td>'+v_horas_grupo+'</td><td>'+v_local_ant+'</td><td>'+v_aula_ant+'</td><td>'+v_ocupado_ant+'/'+v_dispoTotal_ant+'</td><td ><div id="HorarioSeleccionado_'+v_salon_ant+'" class="CSSHorarioSeleccionado_'+v_seleccionado_ant+'"></div></td></tr>');     
                                }
                                
                                var v_dia_grupo='';
                                var v_horas_grupo='';
                                var v_horarios='';
                                var v_salon_grupo=v_salon;
                                v_dia_grupo=v_dia_grupo+v_dia+'<br>';
                                v_horas_grupo=v_horas_grupo+"De "+v_hor_ini+' a '+v_hor_fin+'<br>'
                                v_horarios=v_horarios+'-'+v_horario;
                                
                            }
                            
                            var v_horario_ant= v_horario;
                            var v_salon_ant = v_salon;
                            var v_dia_ant = v_dia;
                            var v_hor_ini_ant = v_hor_ini;
                            var v_hor_fin_ant= v_hor_fin;
                            var v_local_ant = v_local;
                            var v_aula_ant = v_aula;
                            var v_ocupado_ant = v_ocupado;
                            var v_dispoTotal_ant = v_dispoTotal;
                            var v_banderaDispo_ant = v_banderaDispo;
                            var v_seleccionado_ant = v_seleccionado;
                                                                            
                        }
                        
                        
                        
                        
                        
                    }
                    v_horarios="'"+v_horarios+"'";
                    
                    estilo_bloqueado='';
                    if (v_banderaDispo_ant==0){
                        estilo_bloqueado=' style="background-color: rgb(0, 0, 0); color: rgb(222, 80, 80);"';
                        $("#t_horarios").append('<tr '+estilo_bloqueado+' onclick="aviso_salonOcupado()"><td>'+v_dia_grupo+'</td><td>'+v_horas_grupo+'</td><td>'+v_local_ant+'</td><td>'+v_aula_ant+'</td><td>'+v_ocupado_ant+'/'+v_dispoTotal_ant+'</td><td ><div id="HorarioSeleccionado_'+v_salon_ant+'" class="CSSHorarioSeleccionado_'+v_seleccionado_ant+'"></div></td></tr>');     
                    }
                    else{
                        $("#t_horarios").append('<tr '+estilo_bloqueado+' onclick="seleccionarHorario('+v_salon_grupo+','+v_horarios+')"><td>'+v_dia_grupo+'</td><td>'+v_horas_grupo+'</td><td>'+v_local_ant+'</td><td>'+v_aula_ant+'</td><td>'+v_ocupado_ant+'/'+v_dispoTotal_ant+'</td><td ><div id="HorarioSeleccionado_'+v_salon_ant+'" class="CSSHorarioSeleccionado_'+v_seleccionado_ant+'"></div></td></tr>');     
                    }
                    
                    
                    if (v_seleccionado_ant=='SI') {
                        cod_horarioGeneral=v_salon_grupo;//Se asigna código de horario seleccionado
                        cod_horariosDetalle=v_horarios;//Se asigna código de horarios detalles seleleccionados
                    }
                    /*
                    */
                    
                    
                    bloquearPagina();
                    $("#cuadroHorario").css( "top", "-25%" );
                    $("#cuadroHorario").css( "display", "block" );
                    //$("#cuadroHorario_icono").attr('class', "cuadroDialogo_icono_"+estado_icono);
                        
                    var i = -25;
                    var temp=setInterval(function(){
                    if (i==35) {clearInterval(temp);}
                        $("#cuadroHorario").css( "top", i+"%" );
                        i=i+1;
                    },4);                   
                }
                ocultarCargando();
                
            }
            ,error: function()
            {
                location.reload();
            }
        });

    }

    function aviso_salonOcupado()
    {
        notificacion(1,"Salon Ocupado","Lo sentimos, este salón ya está lleno, si no hay mas salones disponibles comuníquese con su Facultad.",5);
    }
    
    
    
    function ocultar_disponibilidadHorario(){
        var i = 50;
        var temp=setInterval(function(){
        if (i==-25) {
            clearInterval(temp);
            $("#cuadroHorario").css( "display", "none" );
            desbloquearPagina();
            }
            $("#cuadroHorario").css( "top", i+"%" );
            i=i-1;
        },4);
        
        $('#hor_estado').val("");
        $('#hor_tipo').val("");
        $('#hor_nivel').val("");
        $('#hor_codigo').val("");
        $('#hor_nombre').val("");
        $('#hor_creditos').val("");
    }
    
    function editarHorario(asig_estado,asig_tipo,asig_nivel,asig_codigo,asig_nombre,asig_creditos) {
        if (asig_estado=='ED') {
            if ($('#iconoSeleccion_'+asig_tipo+'_'+asig_nivel+'_'+asig_codigo).attr('class')=='CSScheckbox_Seleccionado') {
                alert("JARM=>MODIFICAR_HORARIO");
            }
            else{
                notificacion(1,"Asignatura No Seleccionada","No es posible editar horario, la Asignatura aún no ha sido seleccionada.",10);
            }
        }
    }
    
    
    
    
    
    $('#btnAmpliarCreditos').mouseover(function () {

        
        var i = 33;
        var temp=setInterval(function(){
        if (i==126) {
            clearInterval(temp);
            }
            $("#btnAmpliarCreditos").css( "width", i+"px" );
            i++;
        },4);
    });
    
    $('#btnAmpliarCreditos').mouseout(function () {
        //alert('pasaste el mouse sobre #div');
        var i = 126;
        var temp=setInterval(function(){
        if (i==33) {
            clearInterval(temp);
            }
            $("#btnAmpliarCreditos").css( "width", i+"px" );
            i--;
        },4); 
    });
    
    
    
    
    
    
</script>









