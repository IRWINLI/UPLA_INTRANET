<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">INGRESO DE CONVALIDACIONES</p>
        <div id="ingresoEst" class="CSSingresoEst_Conv">
            <label>Código del Estudiante:</label><br>
            <input type="texto" id="txtCodEst" name="txtCodEst" maxlength="7" spellcheck="false" value="" placeholder="Codigo del Estudiantes" style="width:200px;margin-right: 6px;"/>
            <button id="btnVerificar" style="width: 100px;" class="css_btn" onclick="verificarCodigo();">Verificar</button>
        </div>
        <div class="CSS_fondo_Convalidacion" id="div_datosEstudiante" style="display:none">
            <label style="margin-bottom:10px;">Datos del Estudiante:</label>
            <div style="padding-bottom:10px;">
                <label id="lbl_nombre" style="color:black"></label><br>
                <label id="lbl_datosAcademicos" style="color:black"></label><br><br>
                <label>INFORME: </label>
                <input type="texto" id="txt_observaciones" placeholder="Escriba aquí si tiene alguna observación..."></input><br><br>
                <!--button class="css_btn" onclick="volverBusqueda()" id="btnVolverBUsqueda" >Volver a Búsqueda</button-->
            </div>
            <p class="separador_modulo"></p>
            <div class="css_mod_subtitulo">ASIGNATURAS CONVALIDABLES</div><br>
            <label>Código de Asignatua: </label>
            <input style="width:170px" type="texto" placeholder="Código de Asignatura" id="txtAsignatura" ></input>
            <button id="btnVerificar" style="width: 100px;" class="css_btn" onclick="agregarAsignatura();">Agregar</button>
            <br><br>
            <div  class="CSSTableSimple" style="font-size:10px;">
                <table id="t_asigConvalidar">
                    <tr>
                        <th style="width:80px;font-size:17px;">Código</th>
                        <th style="width:100px;font-size:17px;">Crédito</th>
                        <th style="width:100px;font-size:17px;">Ciclo</th>
                        <th>Nombre</th>
                        <th style="width:60px;font-size:17px;">Quitar</th>
                    </tr>

                    
                </table>
                <br>
                <label style="color: rgb(30, 78, 161); font-size: 19px; margin-right: 10px;"># Asignaturas:</label><label id="cant_asignaturas" style="color: rgba(227, 32, 0, 0.81); font-size: 19px;">0</label><br>
                <label style="color: rgb(30, 78, 161); font-size: 19px; margin-right: 10px;">Total Créditos:</label><label id="cant_creditos" style="color: rgba(227, 32, 0, 0.81); font-size: 19px;">0</label><br><br><br>
                <p class="separador_modulo"></p>
                <button class="css_btn" onclick="EjecutarConvalidacion()" id="btnVolverBUsqueda" >EJECUTAR</button>
                <button class="css_btn" onclick="volverBusqueda()" id="btnVolverBUsqueda" >Volver a Búsqueda</button>
            </div>
        </div>

</div>

<script>
    
    
    
    $("#txtCodEst").focus();
            

    $("#txtCodEst").keypress(function(event){
        if (event.which==13) {
            verificarCodigo();
        }
    });
    
    
    
    $("#txtAsignatura").keypress(function(event){
        if (event.which==13) {
            agregarAsignatura();
        }
    });
    
    var asignaturasConvalidar = new Array();
    
    function EjecutarConvalidacion() {
        
        if ($("#txt_observaciones").val()=='') {
            notificacion(1,"No ha ingresado el número de informe","Lo sentimos, no es posible continuar mientras no ingrese el número del informe de convalidación.",10);
        }
        else if ($("#cant_asignaturas").text()=='0') {
            notificacion(1,"No ha seleccionado ninguna asignatura","No es posible efectuar una convalidación si no ha seleccionado por lo menos una asignatura.",10);
        }
        else
        {

        alertify.confirm('A continuación se ingresará la "Convalidación Temporal" del estudiante, ¿desea continuar?', function (e) {
            if (e) {
                
                
                var params={};
                params['codEst']=$("#txtCodEst").val();
                params['asignaturasEst']=arreglo_cadena(asignaturasConvalidar);
                
                params['n_informe']=$("#txt_observaciones").val();
                
                $.ajax({
                        data : params,
                        type: "POST",
                        url: "insertarConvalidacionTemporal",
                        dataType: "json",
                        success : function(data) 
                        {                   
                           if (data['rpta']=="CORRECTO")
                           {
                                notificacion(2,"Convalidación Temporal Correcta","La convalidación temporal ha sido ingresada correctamente, esto permitirá que el estudiante efectué correctamente su matrícula en línea.",10);
                                volverBusqueda();
                           }
                           else if (data['rpta']=="YAFUECONVALIDADO")
                           {
                                notificacion(1,"La Convalidación ya fue ingresada","El estudiante que pretende ingresar ya figura como convalidado en la base de datos.",10);
                           }
                           else if (data['rpta']=="ERROR")
                           {
                                notificacion(0,"Error en el sistema","Error en el sistema, vuelva a intentarlo, si el error persiste consulte con la Oficina Universitaria de Informática y Sistemas.",10);
                           }
                           
                        },
                        error: function() 
                        {
                            location.reload();
                        }
                    });

            }
            });
        }
        
        
        
    }
    
    function agregarAsignatura()
    {
        var codEst=$("#txtCodEst").val();
        var codAsign = $("#txtAsignatura").val();
        
        if (codAsign!='') {
            
            var params={};
            params['codEst']=codEst;
            params['codAsign']=codAsign;
    
            $.ajax({
                data : params,
                type: "GET",
                url: "comprobarAsignaturaConvalidar",
                dataType: "json",
                success : function(data) 
                {
                    /*
                    data[0][0]->Código de Asignatura
                    data[0][1]-># de Créditos
                    data[0][2]->Nivel o Ciclo
                    data[0][3]->Nombre de la Asignatura
                    */
                    
                    if (data[0]=="NOEXISTE")
                    {
                        notificacion(1,"Asignatura no encontrada","Lo sentimos, la asignatura no existe o pertenece a otra carrera o plan de estudios.",10);
                    }
                    else if (data[0]=="YAESTAAPROBADOCONVALIDADO") {
                        notificacion(1,"Asignatura con convbalidable","La Asignatura ya está aprobada o convalidada, no es necesario ingresarla.",10);
                    }
                    else
                    {
                        var continuar=true;
                        for (var i=0;i<asignaturasConvalidar.length;i++) {
                            if(asignaturasConvalidar[i]==data[0][0]){
                                continuar=false;
                                break;
                            }
                        }
                         cant_creditos
                        if (continuar) {
                            asignaturasConvalidar.push(data[0][0]);
                            var asi_id = "'"+data[0][0]+"'";
                            $('#t_asigConvalidar').append('<tr id='+asi_id+'><td style="font-size:17px;">'+data[0][0]+'</td><td id="cred_'+data[0][0]+'" style="font-size:17px;">'+data[0][1]+'</td><td style="font-size:17px;">'+data[0][2]+'</td><td style="font-size:17px;">'+data[0][3]+'</td><td onclick="quitarAsignatura('+asi_id+');" class="CSS_X_quitar"></td></tr>');
                            $('#txtAsignatura').val('');
                            
                            //============= CONTADORES============================
                            $('#cant_asignaturas').text(parseInt($('#cant_asignaturas').text())+1);
                            $('#cant_creditos').text(parseInt($('#cant_creditos').text())+parseInt(data[0][1]));
                            
                        }
                        else{
                            notificacion(1,"Asignatura ya seleccionada","La asignatura ya ha sido seleccionada y se encuentra en la lista de asignaturas a convalidar.",10);
                        }
                    }
                },
                error: function() 
                {
                    location.reload();
                }
            });
            
            
            
        }
        else{
            notificacion(1,"Código de Asignatura incorrecto","Porfavor, ingrese correctamente el código de la asignatura.",10);
        }
    }
    
    
    function quitarAsignatura(id_quitar)
    {
        
        
        for (var i=0;i<asignaturasConvalidar.length;i++) {
            if(asignaturasConvalidar[i]==id_quitar){
                $('#cant_asignaturas').text(parseInt($('#cant_asignaturas').text())-1);
                $('#cant_creditos').text(parseInt($('#cant_creditos').text())-parseInt($('#cred_'+asignaturasConvalidar[i]).text()));
                asignaturasConvalidar.splice(i,1);
                break;
            }
        }
        $('#'+id_quitar).remove();
        //================ CONTADORES =============================
        
        
    }
    
    function verificarCodigo(){
        var codigo = $("#txtCodEst").val();
        
        
        if (codigo=="") {
            notificacion(1,"Código inválido","Debe escribir un código para realizar la búsqueda del estudiante.",6);
        }
        else
        {
            //Obtener Datos del Estudiante con AJAX
            var params={};
            params['codigo']=codigo;
    
            $.ajax({
                data : params,
                type: "GET",
                url: "comprobarConvalidante",
                dataType: "json",
                success : function(data) 
                {
                    if (data[0]=="NOEXISTE")
                    {
                        notificacion(1,"Estudiante no encontrado","Lo sentimos, el código que usted ha ingresado no se encuentra registrado en la Base de Datos.",10);
                    }
                    else if (data[0]=="NOCORRESPONDEDEPENDENCIA") {
                        notificacion(1,"No se puede matricular estudiante","Lo sentimos, usted no corresponde a la facultad, sede o moalidad a la que pertenece el estudiante.",10);
                    }
                    else if (data[0]=="NOCONVALIDANTE") {
                        notificacion(1,"Estudiante no Convalidante","No se puede continuar, el estudiante no es convalidante.",10);
                    }
                    else
                    {
                        //notificacion(2,"Estudiante encontrado","¡Muy bien! El estudiante fué encontrado en la Base de Datos.",6);
                        var nombre=data[0][3];
                        var datosAcademicos=data[0][0];
                        $("#lbl_nombre").text(nombre);
                        $("#lbl_datosAcademicos").text(datosAcademicos);
                        $("#div_datosEstudiante").show();
                        $("#ingresoEst").css("display","none");
                        $("#btnAmpliarCreditos").attr("disabled", false);
                        $("#txt_observaciones").attr("disabled", false);
                        $("#txt_observaciones").text("");
                        $("#txt_observaciones").focus();
                    }
                },
                error: function() 
                {
                    location.reload();
                }
            });
        }
    }
    

    
    function redireccionar_matricula() {
        
        var codigo = $("#txtCodEst").val();
        
        var params={};
        params['codigo']=codigo;
    
            $.ajax({
                data : params,
                type: "POST",
                url: "matriculaManual_comprobarMatricula",
                dataType: "json",
                success : function(data) 
                {
                    params['codEst']=params['codigo'];

                    
                    if (data['rpta']=="NOMATRICULADO")
                    {
                        redirect_by_post("matriculaManualRequisitos",params, false);
                    }
                    else if (data['rpta']=="MATRICULADO") {
                        redirect_by_post("matriculaManualRealizada",params, false);
                    }
                },
                error: function() 
                {
                    location.reload();
                }
            });
        
        
        
        
        
        
        //var params={};
        //params['codEst']=$("#txtCodEst").val();
        //redirect_by_post("matriculaManual_comprobarMatricula",params, false);
    }
            
    function volverBusqueda(){
            ocultar_notificacion();
            $("#txtCodEst").val("");
            $("#lbl_nombre").text("");
            $("#lbl_datosAcademicos").text("");
            $("#div_datosEstudiante").css("display","none");
            $("#ingresoEst").css("display","block");
            $("#txt_observaciones").val("");
            $("#txtAsignatura").val("");
            $("#cant_asignaturas").text("0");
            $("#cant_creditos").text("0");
            $("#t_asigConvalidar td").remove();
            asignaturasConvalidar.length = 0;
    }

    function activarRectificacionAdicional() {
        

        alertify.confirm('A continuación se le habilitará una rectificación más al (la) estudiante "'+$('#lbl_nombre').text()+'", ¿Está seguro(a) de que desea continuar?', function (e) {
            if (e) {
                //EJECUTAR AJAX DE AMPLIACIÓN DE CRÉDITOS
                var codigoEst= $("#txtCodEst").val();
                var observac=$("#txt_observaciones").val();
                
                var params={};
                params['v_codEst']=codigoEst;
                params['v_obs']=observac;

                $.ajax({
                data : params,
                type: "POST",
                url: "ejecutarRectificacionAdicional",
                dataType: "json",
                success : function(data) 
                {
                    var rpta=data['rpta'];
                     
                    /*====================================
                    0-> No es posible realizar ampliación de créditos al estudiante ...
                    1-> El estudiante ... ya ha realizado una ampliación de créditos para el presente periodo de matrícula.
                    2-> La "Ampliación de Créditos" fue realizada satifactoriamente.
                    =====================================*/

                    
                    if (rpta=='ERROR') {
                        notificacion(1,"No se realizó la Activación adicional de Rectificación de Matrícula.","Lo sentimos, no es posible realizar la Activación adicional de Rectificación de Matrícula al estudiante "+$('#lbl_nombre').text()+".",10);
                    }
                    else if (rpta=='0'){
                        notificacion(1,"No se puede realizar operación.","Lo sentimos, usted no pertenece a la facultad, sede o modalidad correspondiente para efectuar cambios sobre el (la) estudiante "+$('#lbl_nombre').text()+".",12);
                    }
		    else if (rpta=='1'){
                        notificacion(1,"El estudiante ya puede rectificar.","No se realizó ninguna modificación pues el (la) estudiante "+$('#lbl_nombre').text()+" está habilitado(a) para realizar una rectificación.",12);
                    }
		    else if (rpta=='2'){
                        notificacion(2,"Rectificación adicional habilitada.","Se ha habilitado una rectificación adicional para el (la) estudiante "+$('#lbl_nombre').text()+".",12);
                    }

                },
                error: function() 
                {
                    location.reload();
                }
            });
                
                
     
                
	    }
        });

    }
    
    
    
    
    
    
    
</script>