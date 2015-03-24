<div class="contenedor_cuerpo">
    

    <div id="popupbox">
        <script>var arreglo = new Array();var n_arreglo=0;</script>
        <input type="hidden" name="buscar" id="buscar" placeholder="Código o Apellidos" style="font-size: 13px"/>
        <div>
            <div>
                <table id="tablaEstudiantes" class="CSSTableGenerator_small">
                    <tbody>
                        <tr></tr>  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div id="popupbox_asignaturas" style="display:none">
        
        <div id="popupbox_asignaturas_titulo">
            Asignaturas Matriculables
        </div>
        <a href="javascript:ocultar_popupAsignaturas();"><div id="popupbox_asignaturas_cerrar">X</div></a>
        <br><br>
        <br>
        Seleccione nivel: <select  id="listaCiclos" onchange="javascript:listarAsignaturasPorNivel()" ></select>
        <br><br>
        <div id="popupbox_asignaturas_contenido">
            
            <table  id="tabla_cursosMatriculables" class="CSSTableGenerator_asignaturas">
            </table>
        </div>
    </div>

    <br>
    <p class="titulo_módulo">MATRÍCULA DE ESTUDIANTES (PRUEBA PARA INGENIERIA)</p>
    <div id="div_buscarAlumno"><a href="matricula_ingenieria" >Nueva Búsqueda</a></div>
    
    <input  style="width:300px" type="text" id="txt_estudiante" name="txt_estudiante" value="" maxlength="40" placeholder="Búsqueda por Código o Apellidos..." onKeyUp="buscarEstudiante(event)" style="font-size: 12px"/>

    
    <br><br>
    
    <div class="capa_DatosEstudiante">
        <div class="CSSTableGenerator_datosEstudiante">
                        
        <!-- =========================================================================================================================================== -->   
        <!-- ============================================ DATOS GENERALES DEL ESTUDIANTE =============================================================== -->
        <!-- =========================================================================================================================================== -->
        
            <table>
                <tr>
                    <td>Código:</td>
                    <td>
                        <input type="text" id="codigo_estudiante" name="codigo_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
                <tr>
                    <td>Nombre:</td>
                    <td>
                        <input type="text" id="nombre_estudiante" name="nombre_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
                <tr>
                    <td>Facultad:</td>
                    <td>
                        <input type="text" id="facultad_estudiante" name="facultad_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
                <tr>
                    <td>Carrera:</td>
                    <td>
                        <input type="text" id="carrera_estudiante" name="carrera_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
                <tr>
                    <td>Especialidad:</td>
                    <td>
                        <input type="text" id="especialidad_estudiante" name="especialidad_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
                <tr>
                    <td>Plan de Estudios:</td>
                    <td>
                        <input type="text" id="planEst_estudiante" name="planEst_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
                <tr>
                    <td>Comprobante de Pago:</td>
                    <td>
                        <input type="text" id="Pago_estudiante" name="Pago_estudiante" spellcheck="false" value="" onFocus="javascript:$('#txt_estudiante').focus();" readonly="readonly" placeholder="No se ha seleccionado alumno"/>
                    </td>
                </tr>
                    
            </table>
        </div>
    </div>
    
    
    <div class="capa_CursosEstudiante">
        <!-- =========================================================================================================================================== -->   
        <!-- ============================================ DATOS GENERALES DEL ESTUDIANTE =============================================================== -->
        <!-- =========================================================================================================================================== -->
        

        <div class="CSSTableGenerator_small">
            <!-- ######## Contador de Créditos ######## -->
            <table id="tabla_datosEstudiante">
                <tr>
                    <th>Nivel Calculado</td>
                    <th>MAX. #Créditos</td>
                    <th>#Créd.Seleccionados</td>
                    <th>#Créd.Disponibles</th>
                </tr>
                <tr>
                    <td><label id="nivelAcademico">0°</label></td>
                    <td><label id="totalCreditos">0</label></td>
                    <td><label id="acumuladosCreditos">0</label></td>
                    <td><label id="disponiblesCreditos">0</label></td>
                </tr>
                <tr>
                    <td colspan="2">Observaciones</td>
                    <td colspan="2" id='txt_observaciones' style="color:blue; border-color: black;">---</td>
                </tr>
            </table>
        </div>
        
        <div class="CSSTableGenerator_small" >
            <br>
            <!-- ######## Tablas de cursos seleccionados ######## -->
                
            <table id="tabla_cursosEstudiante">
            </table>
                            
            <!-- ######## Botones ######## -->
                
            <div id="div_matricular"><a href="javascript:matricular_bloqueado()" >Ejecutar Matricular</a></div>
            <div id="div_constMatricula"><a href="javascript:mostrarConstMatricula()" >Constancia Matrícula</a></div>
        </div>
    </div>

<script>
    
    function matricular_bloqueado(){
        alerta("Este sistema es un DEMO para la Facultad de Ingeniería","Advertencia");
    }
    
    function matricular() {
        
        
        var AlumnoNombre_Matricular = $("#nombre_estudiante").val();
        var AlumnoCodigo_Matricular = $("#codigo_estudiante").val();
        var Creditos_Matricular = $("#acumuladosCreditos").text();
        var MaximoCreditos_Matricular = $("#totalCreditos").text();
        var Nivel_Calculado = ciclo_dosCifras(cicloTotal);
                
        if (parseInt(Creditos_Matricular)>parseInt(MaximoCreditos_Matricular)) {
            alerta("¡No es posible matricular al Alumno!. Se supera el límite máximo de créditos.");
        }
        else if(parseInt(Creditos_Matricular)==0){
            alerta("¡No es posible matricular al Alumno!. Debe seleccionar almenos un curso para efectuar matricula.");
        }
        else{
            //Creacion de un arreglo de asignaturas seleccionadas
            var asigSeleccionadas = new Array();
            var turnSeleccionados = new Array();
            var curSalSeleccionados = new Array();
            var nivelSeleccionados = new Array();
            var creditoSeleccionados = new Array();
            
            var j=0;
            var continuar=true;
                
            for(var i=0;i<codigoAsignatura.length;i++){
                if (selecAsignatura[i]==true){
                    asigSeleccionadas[j]=codigoAsignatura[i];
                    turnSeleccionados[j]=$('#turnos_'+codigoAsignatura[i]).val();
                    curSalSeleccionados[j]=curSalAsignatura[i];
                    nivelSeleccionados[j]=ciclo_dosCifras(nivelAsignatura[i]);
                    creditoSeleccionados[j]=creditosAsignatura[i];
                    
                    if (turnSeleccionados[j]==0){
                        continuar=false;
                    }
                    j++;   
                }
            }
            if (continuar) {
                //var jose=confirmacion("A continuación se matriculará a "+AlumnoNombre_Matricular+".¿Está seguro de que desea continuar?");
                //alert(jose);
                var rpta=confirm("A continuación se matriculará a "+AlumnoNombre_Matricular+".¿Está seguro de que desea continuar");
                if (rpta) {
                
                    // ####################### Ejecutar matricula #######################                
                    var params={};

                        params['codEst']=codEst;
                        params['carEst']=car;
                        params['espEst']=esp;
                        params['planEst']=plan;
                        params['nivelMatr']=Nivel_Calculado;
                        params['totalCred']=Creditos_Matricular;
                        params['totalCursos']=asigSeleccionadas.length;                        
                        
                        params['asignaturasEst']=arreglo_cadena(asigSeleccionadas);
                        params['turnosEst']=arreglo_cadena(turnSeleccionados);
                        params['curSal']=arreglo_cadena(curSalSeleccionados);
                        params['nivelEst']=arreglo_cadena(nivelSeleccionados);
                        params['creditEst']=arreglo_cadena(creditoSeleccionados);
                        
                        //alert(params['asignaturasEst']);
                        
                        
                        mostrarCargando();//========= Mostrar "Cargando"
                        
                        $.ajax({
                            data : params,
                            type: "POST",
                            url: "ejecutarMatricula",
                            dataType: "json",
                            success : function(data){
                                
                                ocultarCargando();//========= Mostrar "Cargando"
                                //alert(data["rpta"]);
                                if (data["rpta"]=="La Matricula fue Correcta"){
                                    aviso_bien(data["rpta"]);
                                    alumnosYaMatriculados();
                                    
                                }
                                else{
                                    aviso_mal(data["rpta"],"white","red");
                                }
                                
                                
                            }
                            ,error: function()
                            {
                                //alert("Error de Sistema: JSON");
                                location.reload();					
                            }
                        });
                        
                        }
                        
                }
            
            else{
                alerta("¡No es posible matricular al Alumno!. Debe seleccionar todos los turnos correspondientes a las asignaturas seleccionadas.");
            }
        }
    }
    
    
    
    
    function alumnosYaMatriculados(){
        $("#div_constMatricula").css("display","block");
        $("#div_matricular").css("display","none");
        $("#popupbox_minimizado").css("display", "none");
        $("#tabla_cursosEstudiante tr").remove();
        $('#popupbox_asignaturas').hide();
    }
    
    
    
    function ciclo_dosCifras(ciclo){
        var ciclo_dos='00';
        var n = parseInt(ciclo);
        
        if (n<10){
            ciclo_dos='0'+ciclo;
        }
        else{
            ciclo_dos=''+ciclo;
        }
        return ciclo_dos;
    }

</script>











