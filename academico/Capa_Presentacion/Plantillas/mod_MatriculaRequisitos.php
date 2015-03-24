<div class="contenedor_cuerpo">
    <fieldset>
        <p class="titulo_modulo">VERIFICACIÓN DE REQUISITOS DE MATRÍCULA</p>
        
        <div class="CSSleyenda_requisitos"></div>        
        
        <div class="requisitos_oculto" id="r_pago" onclick='javascript:detalleRequisito("r_pago")'>Pago por Derecho de Matrícula.</div>
        <div class="requisitos_oculto" id="r_idioma" onclick='javascript:detalleRequisito("r_idioma")'>Tres (3) ciclos cursados en el Centro de Idiomas.</div>
        <div class="requisitos_oculto" id="r_encuestaDocente" onclick='javascript:detalleRequisito("r_encuestaDocente")'>Encuesta Docente.</div>
        <div class="requisitos_oculto" id="r_convalidacion" onclick='javascript:detalleRequisito("r_convalidacion")'>Proceso de Convalidación concluido.</div>
        <div class="requisitos_oculto" id="r_cambioMod" onclick='javascript:detalleRequisito("r_cambioMod")'>Proceso de Cambio de Modalidad concluido.</div>
        <div class="requisitos_oculto" id="r_cambioSed" onclick='javascript:detalleRequisito("r_cambioSed")'>Proceso de Cambio de Sede concluido.</div>
        <div class="requisitos_oculto" id="r_fseco" onclick='javascript:detalleRequisito("r_fseco")'>Ficha Socio-Económica rellenada.</div>
        <div class="requisitos_oculto" id="r_examMedico" onclick='javascript:detalleRequisito("r_examMedico")'>Examen Médico.</div>
        <div class="requisitos_oculto" id="r_reincorporacion" onclick='javascript:detalleRequisito("r_reincorporacion")'>Proceso de Reincorporación concluido.</div>
        <br>
        <!--input class="css_btn" type="button" value="ACTUALIZAR" onclick="comprobarRequisito()" /-->
        <input class="css_btn" type="button" value="CONTINUAR" onclick="continuarRequisitos()" />
    </fieldset>
    
    <div class="cuadroDialogo" id="cuadroDialogo" style="display:none">
        <div class="cuadroDialogo_btnCerrar" onclick="javascript:ocultar_detalleRequisito()"></div>
        <div id="cuadroDialogo_icono"></div>
        <p class="cuadroDialogo_titulo" id="cuadroDialogo_titulo">Pago por Derecho de Matrícula</p>
        <br>
        <div class="cuadroDialogo_contenido">
            
            <label>Mensaje: </label><label id="req_mensaje" class="cuadroDialogo_descripcion">Usted ha realizado el pago de matrícula satisfactoriamente.</label><br>
            <label>Solución: </label><label id="req_solucion" class="cuadroDialogo_descripcion">Usted ha realizado el pago de matrícula satisfactoriamente.</label><br>
            <a id="enlace_cuadroDialogo" href="" target="_self"></a>
        </div>
    </div>
    <div class="pantallaBloqueada" id="pantallaBloqueada" style="display:none" onclick="javascript:ocultar_detalleRequisito()">
            
    </div>
    
</div>

<script>
        
    /*Variables de Estado de Requisitos*/
    var r_pago=0;
    var r_idioma=0;
    var r_encuestaDocente=0;
    var r_convalidacion=0;
    var r_cambioMod=0;
    var r_cambioSed=0;
    var r_fseco=0;
    var r_examMedico=0;
    var r_reincorporacion=0;
    
    /*Variables de Mensajes de Requisitos*/
    var msj_r_pago='';
    var msj_r_idioma='';
    var msj_r_encuestaDocente='';
    var msj_r_convalidacion='';
    var msj_r_cambioMod='';
    var msj_r_cambioSed='';
    var msj_r_fseco='';
    var msj_r_examMedico='';
    var msj_r_reincorporacion='';
    
    comprobarRequisito();
    
    function comprobarRequisito(){
        //Hacer consulta mediane ajax para verificar estado de requisitos
        
        //mostrarCargando();  
        
        var params={};

        //FALTA!!!!!!!!!!!!!!!!!!!!
        mostrarCargando();
        $.ajax({
            data : params,
            type: "GET",
            url: "requisitosMatricula",
            dataType: "json",
            success : function(data)
            {                
                
                
                //Estado de Requisitos
                //---------------------------------------------------------------------
                // 3-> Requisito NO SOLICITADO para el estudiante
                // 2-> Requisito CUMPLIDO
                // 1-> Requisito con ADVERTENCIA
                // 0-> Requisito NO CUMPLIDO
                r_pago=data[0][0];
                r_idioma=data[0][2];
                r_encuestaDocente=data[0][4];
                r_convalidacion=data[0][6];
                r_cambioMod=data[0][8];
                r_cambioSed=data[0][10];
                r_fseco=data[0][12];
                r_examMedico=data[0][14];
                r_reincorporacion=data[0][16];
                
                msj_r_pago=data[0][1];
                msj_r_idioma=data[0][3];
                msj_r_encuestaDocente=data[0][5];
                msj_r_convalidacion=data[0][7];
                msj_r_cambioMod=data[0][9];
                msj_r_cambioSed=data[0][11];
                msj_r_fseco=data[0][13];
                msj_r_examMedico=data[0][15];
                msj_r_reincorporacion=data[0][17];
                
                claseRequisito("r_pago",r_pago);
                claseRequisito("r_idioma",r_idioma);
                claseRequisito("r_encuestaDocente",r_encuestaDocente);
                claseRequisito("r_convalidacion",r_convalidacion);
                claseRequisito("r_cambioMod",r_cambioMod);
                claseRequisito("r_cambioSed",r_cambioSed);
                claseRequisito("r_fseco",r_fseco);
                claseRequisito("r_examMedico",r_examMedico);
                
                
                function claseRequisito(id,estado) {
                    var clase;
                    if (estado==0) clase = "requisitos_error";
                    else if (estado==1) clase = "requisitos_advertencia";
                    else if (estado==2) clase = "requisitos_correcto";
                    else if (estado==3) clase = "requisitos_oculto";
                    
                    $( "#"+id ).removeClass( $("#"+id).attr('class') ).addClass(clase);
        
                }
                ocultarCargando();
                
            }
            ,error: function()
            {
                location.reload();
            }
        });
    }

    
    
    function continuarRequisitos(){
        var continuar = true;
        
        if (r_pago==0) continuar = false;
        if (r_idioma==0) continuar = false;
        if (r_encuestaDocente==0) continuar = false;
        if (r_convalidacion==0) continuar = false;
        if (r_cambioMod==0) continuar = false;
        if (r_cambioSed==0) continuar = false;
        if (r_fseco==0) continuar = false;
        if (r_examMedico==0) continuar = false;
        

        
        if (continuar)
        {
            /*
            var redirect = '../academico/matriculaCompromisoHonor';
            alert("1");
            $.redirectPost(redirect, {x: 'example', y: 'abc'});
            alert("2");
            */
            
            var params={};
            params['requisitos']="satisfactorio_cumplidos";
            redirect_by_post("matriculaCompromisoHonor",params, false);
             
        }
        else{
            notificacion(1,"Requisitos incompletos","No se puede continuar. Por favor regularice sus requisitos.",10);
        }
    }
    
    
    function detalleRequisito(idRequisito){
        var msj_solucion="";
        var estado_icono=0;
        $('#enlace_cuadroDialogo').attr("href","#");
        $('#enlace_cuadroDialogo').text("");
        
        
        if (idRequisito=='r_pago') {
            $("#req_mensaje").text(msj_r_pago);
            if (r_pago==0) msj_solucion='Realice su pago de MATRÍCULA en la entidad financiera respectiva. Si ya lo ha realizado, espere la actualización del banco.';
            else if (r_pago==1) msj_solucion ='No se necesita solución.';
            else if (r_pago==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_pago;
        }
        else if (idRequisito=='r_idioma') {
            $("#req_mensaje").text(msj_r_idioma);
            if (r_idioma==0) msj_solucion='Usted debe cursar los Tres (3) ciclos mínimos en el Centro de Idiomas de la Universidad.';
            else if (r_idioma==1) msj_solucion ='Usted debe cursar los Tres (3) ciclos mínimos en el Centro de Idiomas de la Universidad.';
            else if (r_idioma==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_idioma;            
        }
        else if (idRequisito=='r_encuestaDocente') {
            $("#req_mensaje").text(msj_r_encuestaDocente);
            if (r_encuestaDocente==0) msj_solucion='Es importante que participe de la Encuesta Docente, de esta manera estará participando con la mejora de la calidad educativa.';
            else if (r_encuestaDocente==1) msj_solucion ='Es importante que participe de la Encuesta Docente, de esta manera estará participando con la mejora de la calidad educativa.';
            else if (r_encuestaDocente==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_encuestaDocente; 
        }
        else if (idRequisito=='r_convalidacion') {
            $("#req_mensaje").text(msj_r_convalidacion);
            if (r_convalidacion==0) msj_solucion='Haga el seguimiento de su trámite de "Convalidación" para conocer en que estado se encuentra.';
            else if (r_convalidacion==1) msj_solucion ='No se necesita solución.';
            else if (r_convalidacion==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_convalidacion; 
        }
        else if (idRequisito=='r_cambioMod') {
            $("#req_mensaje").text(msj_r_cambioMod);
            if (r_cambioMod==0) msj_solucion='Haga el seguimiento de su trámite de "Cambio de Modalidad" para conocer en que estado se encuentra.';
            else if (r_cambioMod==1) msj_solucion ='No se necesita solución.';
            else if (r_cambioMod==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_cambioMod; 
        }
        else if (idRequisito=='r_cambioSed') {
            $("#req_mensaje").text(msj_r_cambioSed);
            if (r_cambioSed==0) msj_solucion='Haga el seguimiento de su trámite de "Sede" para conocer en que estado se encuentra.';
            else if (r_cambioSed==1) msj_solucion ='No se necesita solución.';
            else if (r_cambioSed==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_cambioSed; 
        }
        else if (idRequisito=='r_fseco') {
            $("#req_mensaje").text(msj_r_fseco);
            if (r_fseco==0) msj_solucion='Debe rellenar o completar la "Ficha Socio-Económica". (Se han agregado nuevos requerimientos).';
            else if (r_fseco==1) msj_solucion ='No se necesita solución.';
            else if (r_fseco==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_fseco;
            $('#enlace_cuadroDialogo').attr("href","inicio-encuestas?col=rgb(236,%2052,%2052)&col_sombra=rgb(182,%2041,%2041)&sistema=10&letra=rgb(185,%20166,%20155)");
            $('#enlace_cuadroDialogo').text("-> Abrir Ficha Socio-Económica.");
        }
        else if (idRequisito=='r_examMedico') {
            $("#req_mensaje").text(msj_r_examMedico);
            if (r_examMedico==0) msj_solucion='Debe realizarse el Examen Médico, es un requisito importante para su carrera o especialidad.';
            else if (r_examMedico==1) msj_solucion ='Debe realizarse el Examen Médico, es un requisito importante para su carrera o especialidad.';
            else if (r_examMedico==2) msj_solucion ='No se necesita solución.';
            var estado_icono=r_examMedico; 
        }
        
        $("#cuadroDialogo_titulo").text($("#"+idRequisito).text());
        mostrar_detalleRequisito(msj_solucion,estado_icono);
    }
    
    function mostrar_detalleRequisito(msj_solucion,estado_icono){
        //alert(estado_icono);
        $("#req_solucion").text(msj_solucion);
        $("#pantallaBloqueada").css( "display", "block" );
        $("#cuadroDialogo").css( "top", "-25%" );
        $("#cuadroDialogo").css( "display", "block" );
        $("#cuadroDialogo_icono").attr('class', "cuadroDialogo_icono_"+estado_icono);
            
        var i = -25;
        var temp=setInterval(function(){
        if (i==50) {clearInterval(temp);}
            $("#cuadroDialogo").css( "top", i+"%" );
            i=i+1;
        },4);
        
    }

    
    function ocultar_detalleRequisito(){
        var i = 50;
        var temp=setInterval(function(){
        if (i==-25) {clearInterval(temp);$("#cuadroDialogo").css( "display", "none" );$("#pantallaBloqueada").css( "display", "none" )}
            $("#cuadroDialogo").css( "top", i+"%" );
            i=i-1;
        },4);
        
        
    }
    
    

    
    
</script>









