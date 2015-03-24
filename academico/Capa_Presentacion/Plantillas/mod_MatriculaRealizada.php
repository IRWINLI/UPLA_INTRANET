<div class="contenedor_cuerpo">
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
    <div id="popupbox_constancia" class="CSSpopupbox_constanciaMatricula" style="display:none">
        <div class="notif_btnCerrar" display="none" onclick="ocultar_vistaPreviaHorario();"></div>
        <div id="rptConstanciaMatricula" class="CSSrptConstanciaMatricula">
            <div style='font-size: 22px; color: rgb(78, 105, 201); font-family: "Times New Roman",Georgia,serif; font-weight: bold; margin-top: 10px;'>
                Universidad Peruana Los Andes</div>
            <div style="font-size: 13px; color: rgb(152, 152, 152); font-family: Times New Roman; font-weight: bold;margin-top:4px">Dirección Universitaria de Desarrollo Académico</div>
            <div id="tituloAnioPeriodo_Constancia" style="font-size: 14px; color: rgba(0, 0, 0, 0.79); font-weight: bold;margin-top:7px;margin-bottom:10px;">CONSYTANCIA DE MATRÍCULA 2015-1 PRESENCIAL</div>
            <div class="CSSlbl_datosConstancia">Facultad:</div>
            <div id="lbl_fac" class="CSSlbl_datosDinamicosConstancia">CIENCIAS ADMINISTRATIVAS Y CONTABLES</div><div style="clear:left"></div>
            <div id="tituloCarreraEAP" class="CSSlbl_datosConstancia">Carrera:</div>
            <div id="lbl_car" class="CSSlbl_datosDinamicosConstancia">ADMINISTRACION Y SISTEMAS</div><div style="clear:left"></div>
            <div class="CSSlbl_datosConstancia">Especialidad:</div>
            <div id="lbl_esp" class="CSSlbl_datosDinamicosConstancia">-----</div><div style="clear:left"></div>
            <div class="CSSlbl_datosConstancia">Código:</div>
            <div id="lbl_cod" class="CSSlbl_datosDinamicosConstancia" style="width:100px;">D11321L</div>
            <div class="CSSlbl_datosConstancia" style="width:40px;">Alumno:</div>
            <div id="lbl_nombre" class="CSSlbl_datosDinamicosConstancia" style="width:500px;">RIOS MONTERREY JOSÉ ANTONIO</div><div style="clear:left"></div>
            <div class="CSSfotoConstancia"><img id="CSSfotoConstancia_img" src="" WIDTH=90 HEIGHT=102 ></div>
            
            <div style="padding-left:20px;margin-top: 10px;">
                <table id="tablaConstMatricula" class="CSSTableConstancia"></table>
                <div class="CSSfirmaConstancia">Coordinador de Asuntos Académicos</div>
                <div id="PieConstanciaMatricula" class="CSS_PieConstanciaMatricula">Oficina Universitaria de Informática y Sistemas. Huancayo. UPLA, 09 de Marzo del 2015</div>
            </div>
        </div>
        <input type="submit" class="css_btn" id="btnPrinterConstancia"  value="IMPRIMIR CONSTANCIA" style="margin-left: 30px;margin-top: 13px;"/>
    </div>
        <script type="text/javascript">
            
        $("#popupbox_constancia").draggable();     
                
        $("#vistaPrevia_horario").draggable();    
            
        function vistaPreviaHorarios() {
            ver_horarios_matriculados();
            $("#vistaPrevia_horario").css("display","block");
            $("#bloqueoPantalla").css("display","block");
            $("#tb_horario_z td").remove(); 
        }
        
        function ocultar_vistaPreviaHorario(){
            $("#vistaPrevia_horario").css("display","none");
            $('#popupbox_constancia').css("display","none");
            $("#bloqueoPantalla").css("display","none");
        }
            
            var ver_horarios_matriculados=function()
            {

                mostrarCargando();
            
                var params={};            
                params['alu']=<?php echo json_encode($_SESSION['dni']);?>;                  
                
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
//6894,6883_54533F,54335_ESCULTURA,MICROBIOLOGIA GENERAL_29/30,17/17_1,0_2_rgba(163,255,0,0.4)_2007B_07:30,07:30_09:00,09:30_A1_CUBA_205 (( P1 )  Lab 311),nada
                    var cod_array=datos[0].split(",");
                    var asig_x=datos[2].split(",");
                    var cap_x=datos[3].split(",");

                    //var hor_ini_x=datos[8].split(",");
                    //var hor_fin_x=datos[9].split(",");
                    var obs_x=datos[12].split(",");

                    var tex="";
                   //alert(cod_array.length+" "+cod_array[0]);

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

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <fieldset>
        <p class="titulo_modulo">DATOS DE MATRÍCULA</p>
        <div style="width: 900px;">
            Felicitaciones, su matrícula se ha realizado correctamente. A continuación tiene las opciones de revisar su "Horario de Clases" y de imprimir su "Constancia de Matrícula". En caso de que desee validar su "Constancia de Matrícula", acérquese a la Oficina de Asuntos Académicos de su Facultad con su constancia impresa.
        </div>
        <div class="CSSDatosMatricula">
            <div class="CSSbtnVerHorarios"></div>
            <div class="CSSbtnConstanciaMatricula"></div>
            <div class="CSSbtnRectificacionMatricula"></div>
            <div style="clear: both"></div>
            <div>
                <button class="css_btn" style="width:125px; margin-left: 90px;" onclick="vistaPreviaHorarios()">Ver Horarios Seleccionados</button>
                <button class="css_btn" style="width:145px; margin-left: 150px;" onclick="mostrarConstMatricula_html()">Ver Constancia de Matrícula</button>
                <button class="css_btn" style="width:145px; margin-left: 150px;" onclick="rectificarMatricula()">Rectificación de Matrícula</button>
            </div>
        </div>
        
        
        
    </fieldset>

    
</div>

    <script>
        
        
function rectificarMatricula(){
    alertify.confirm('IMPORTANTE: Usted tiene sólo 1 oportunidad para realizar la "Rectificación de Matrícula". ¿Desea Continuar?',
        function (e) {
            if (e) {
                $.ajax({
                    type: "POST",
                    url: "Eli_RectificacionMatricula",
                    dataType: "json",
                    success : function(data)
                    {
                        if(data['rpta']==2)
                        {
                            location.href="matriculaRequisitos?rectificacion";
                        }
                        else if (data['rpta']==1)
                        {
                            notificacion(1,'No se puede realizar la Rectificación','Lo sentimos, usted ya ha realizado una "Rectificación de Matrícula". Si aún así determina que es necesario realizarla, solicítelo a la Oficina de Asuntos Académicos de su Facultad.');
                        }
                        else
                        {
                            notificacion(0,'Error en el Servidor.','Si el error persiste, comuníquese con la Oficina Universitaria de Informática y Sistemas.',10);
                        }
                    }
                    ,error: function()
                    {
                            
                    }
                });
            }
        }
    );
}
        
        
function mostrarConstMatricula() {
       


    
    $.ajax({

        type: "GET",
        url: "datosEstudianteMatriculado",
        dataType: "json",
        success : function(data)
        {
            
            var anio=data[0][0];
            var periodo=data[0][1];
            var codEst = <?php echo json_encode($_SESSION['dni']);?>;     
            var car = data[0][2];
            var esp = data[0][3];
            var plan = data[0][4];

            $.post("constMatricula", {codEst:codEst,anio:anio,periodo:periodo,carEst:car,espEst:esp,planEst:plan} ,function(resultado)
	    {
                if(resultado != false)
                {
                    $("#popupbox_constancia").append(resultado);
                }
            }); 
            
        $('#popupbox_constancia').dialog({
            title: "Constancia de Matrícula",
            modal: true,
            width: 900,
            height: 650,
            draggable:true,
            position: ["center",10],
            closeOnEscape : "true"
        });
                
                
            }
            ,error: function()
            {
                    location.reload();
            }
     });
}         
        
        
function mostrarConstMatricula_html() {
       
    $.ajax({
        type: "GET",
        url: "consultarConstanciaMatricula",
        dataType: "json",
        success : function(data)
        {
            
            /*
            data[0][0]=>Código
            data[0][1]=>Nombres y Apellidos
            data[0][2]=>Facultad
            data[0][3]=>Código Carrera
            data[0][4]=>Nombre Carrera
            data[0][5]=>Nombre Especialidad
            data[0][6]=>Código de Asignatura
            data[0][7]=>Nombre de Asignatura
            data[0][8]=>Plan de Estudios
            data[0][9]=>Nivel o Ciclo
            data[0][10]=>Sección
            data[0][11]=>Año Académico
            data[0][12]=>Periodo Académico
            data[0][13]=>#Crédtios
            data[0][14]=>Modalidad de Estudios
            data[0][15]=>Fecha Modificación
            data[0][16]=>Día Actual
            data[0][17]=>Suma Total de Cŕeditos
            data[0][18]=>Nivel o Ciclo Total
            data[0][19]=>Dirección de Foto
            data[0][20]=>Sección Total de Matrícula
            data[0][21]=>Label: Carrera o EAP
            */
            
            
            $('#tablaConstMatricula tr').remove();
            $('#CSSfotoConstancia_img').attr('src',data[0][19]);
            
            $('#tituloAnioPeriodo_Constancia').text("CONSTANCIA DE MATRÍCULA "+data[0][11]+"-"+data[0][12]+" "+data[0][14]);
            $('#lbl_fac').text(data[0][2]);
            $('#tituloCarreraEAP').text(data[0][21]);
            $('#lbl_car').text(data[0][4]);
            $('#lbl_esp').text(data[0][5]);
            $('#lbl_cod').text(data[0][0]);
            $('#lbl_nombre').text(data[0][1]);
            
            $('#tablaConstMatricula').append('<tr><th style="width:20px;">N°</th><th style="width:50px;">Código</th><th>Asignatura</th><th style="width:47px;">Plan</th><th style="width:47px;">Nivel</th><th style="width:57px;">Sección</th><th style="width:70px;">Creditos</th></tr>');
                        
            for (var i=0; typeof(data[i])!='undefined';i++) {
                $('#tablaConstMatricula').append('<tr><td>'+(i+1)+'</td><td>'+data[i][6]+'</td><td>'+data[i][7]+'</td><td>'+data[i][8]+'</td><td>'+data[i][9]+'</td><td>'+data[i][10]+'</td><td>'+data[i][13]+'</td></tr>');
            }
            $('#tablaConstMatricula').append('<tr style="background-color: rgba(0, 0, 0, 0.13);"><td style="background-color: #FFF;" colspan="2"></td><td >Fecha de Registro: '+data[0][15]+'</td><td>'+data[0][8]+'</td><td>'+data[0][18]+'</td><td>'+data[0][20]+'</td><td>'+data[0][17]+'</td></tr>');
            
            $('#PieConstanciaMatricula').text("Oficina Universitaria de Informática y Sistemas. Huancayo, UPLA, "+data[0][16]);
            
            
            $('#bloqueoPantalla').css("display","block")
            $('#popupbox_constancia').css("display","block")
        }
        ,error: function()
        {
            location.reload();
        }
     });
       
}         
        
        
        
        
        
        
        
        
        
        
        
        
        
          // 
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
        
        continuar=true;
        
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
            notificacion(0,"Requisitos incompletos","¡No se puede continuar!");
        }
    }
    
    
    function detalleRequisito(idRequisito){
        var msj_solucion="";
        var estado_icono=0;
        $('#enlace_cuadroDialogo').attr("href","#");
        $('#enlace_cuadroDialogo').text("");
        
        
        if (idRequisito=='r_pago') {
            $("#req_mensaje").text(msj_r_pago);
            if (r_pago==0) msj_solucion='Realice su pago de MATRÍCULA en la "Caja Municipal de Huancayo" o la "Caja de la UPLA". Si ya lo ha realizado, espere la actualización del banco.';
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









