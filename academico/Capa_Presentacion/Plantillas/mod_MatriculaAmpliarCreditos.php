<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">AMPLIACIÓN DE CRÉDITOS</p>
        <div id="ingresoEst" class="CSSingresoEst">
            <label>Código del Estudiante:</label><br>
            <input type="texto" id="txtCodEst" name="txtCodEst" maxlength="7" spellcheck="false" value="" placeholder="Codigo del Estudiantes" style="width:200px;margin-right: 6px;"/>
            <button id="btnVerificar" style="width: 100px;" class="css_btn" onclick="verificarCodigo();">Verificar</button>
        </div>
        <div id="div_datosEstudiante" style="display:none">
            <label style="margin-bottom:10px;">Datos del Estudiante:</label>
            <div class="CSSdatosEst">
                <label id="lbl_nombre" style="color:black"></label><br>
                <label id="lbl_datosAcademicos" style="color:black"></label><br><br>
                <textarea id="txt_observaciones" rows="3" cols="40" placeholder="Escriba aquí si tiene alguna observación..."></textarea><br><br>
                <button class="css_btn" onclick="ampliarCreditos()" id="btnAmpliarCreditos" >Ampliar 4 créditos</button>
                <button class="css_btn" onclick="volverBusqueda()" id="btnVolverBUsqueda" >Volver a Búsqueda</button>
            </div>  
        </div>

</div>

<script>
    
    
    
    $("#txtCodEst").focus();
    
    
    function ampliarCreditos() {
        

        alertify.confirm('A continuación se le ampliarán 4 créditos al (la) estudiante "'+$('#lbl_nombre').text()+'", ¿Está seguro(a) de que desea continuar?', function (e) {
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
                url: "ejecutarAmpliacionCreditos",
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
                        notificacion(1,"No se realizó la Ampliación de Créditos.","Lo sentimos, no es posible realizar la Ampliación de créditos al estudiante "+$('#lbl_nombre').text()+".",10);
                    }
                    else if (rpta=='YAEXISTE'){
                        notificacion(1,"Ya tiene Ampliación de Créditos.","El (La) estudiante "+$('#lbl_nombre').text()+" ya ha ampliado créditos para el presente periodo.",10);
                    }
                    else if (rpta=='INSERTADO'){
                        notificacion(2,"Se realizó la Ampliación de Créditos","Se ha realizado satisfactoriamente la Ampliació de créditos para el (la) estudiante "+$('#lbl_nombre').text()+".",0);
                        $("#btnAmpliarCreditos").attr("disabled", true);
                        $("#txt_observaciones").attr("disabled", true);
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
                url: "progresoEstudiante",
                dataType: "json",
                success : function(data) 
                {
                    if (data[0]=="NO HAY DATOS")
                    {
                        notificacion(1,"Estudiante no encontrado","Lo sentimos, el código que usted ha ingresado no se encuentra registrado en la Base de Datos.",6);
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
    
            
    function volverBusqueda(){
            ocultar_notificacion();
            $("#txtCodEst").val("");
            $("#lbl_nombre").text("");
            $("#lbl_datosAcademicos").text("");
            $("#div_datosEstudiante").css("display","none");
            $("#ingresoEst").css("display","block");
    }
    
    
    
    
    
    
</script>

