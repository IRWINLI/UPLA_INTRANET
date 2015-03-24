<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">MATRICULA DE CONVALIDANTES</p>
        <div id="ingresoEst" class="CSSingresoEst">
            <label>Código del Estudiante:</label><br>
            <input type="texto" id="txtCodEst" name="txtCodEst" maxlength="7" spellcheck="false" value="" placeholder="Codigo del Estudiantes" style="width:200px;margin-right: 6px;"/>
            <button id="btnVerificar" style="width: 100px;" class="css_btn" onclick="verificarCodigo();">Verificar</button>
        </div>
        <div id="div_datosEstudiante" style="display:none">
            <label style="margin-bottom:10px;">Datos del Estudiante:</label>
            <div class="CSSdatosEst_2">
                <label id="lbl_nombre" style="color:black"></label><br>
                <label id="lbl_datosAcademicos" style="color:black"></label><br><br>
                <textarea id="txt_observaciones" rows="3" cols="40" placeholder="Escriba aquí si tiene alguna observación..."></textarea><br><br>
                <button class="css_btn" onclick="redireccionar_matricula()" id="btnAmpliarCreditos" >MATRICULAR</button>
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
            });rpta
        
        
        
        
        
        
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