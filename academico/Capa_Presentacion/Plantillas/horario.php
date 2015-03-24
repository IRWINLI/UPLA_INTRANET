
<input type="hidden" id="cant_filas_sal" name="cant_filas_sal" value="0" />
<input type="hidden" id="cant_filas_horario" name="cant_filas_horario" value="0" />
<input type="hidden" id="cant_filas_capahorario" name="cant_filas_capahorario" value="0" />
<input type="hidden" id="salonact" name="salonact" value="0" />


<input type="hidden" id="fac_tmp" value="" />
<input type="hidden" id="carr_tmp" value="" />
<input type="hidden" id="esp_tmp" value="" />
<input type="hidden" id="sed_tmp" value="" />
<input type="hidden" id="mod_tmp" value="" />
<input type="hidden" id="cic_tmp" value="" />
        
<div class="contenedor_cuerpo" style="width:732px;padding-left: 218px;">
    <fieldset id="field_filtrohorarios" style="min-width: 670px;">
        <p class="titulo_modulo">CONFIGURACIÓN DE HORARIOS</p>

        <label name="l_dequien" id="l_dequien"></label><br>        
        <div>
            <select class="detalle_" name="cmb_facultad" id="cmb_facultad" style="width:174px;">
                <option value="0">FACULTAD</option>
                <?php
                $xml_x="<Dato><dni>".$_SESSION['dni']."</dni></Dato>";
                $data=Logica::PA_UPLA("[Academico].[paLis_facultad]","array",$xml_x);              
                opciones_combo($data,"id","detalle");
                ?>              
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 132px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_carrera'");?>
            <select class="detalle_" name="cmb_car_" id="cmb_car_" style="width:200px;">
                <option value="0">CARRERA</option>               
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 107px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_especialidad'");?>
            <select class="detalle_" name="cmb_esp_" id="cmb_esp_" style="width:216px;">
                <option value="SX">SIN ESPECIALIDAD</option>               
            </select>
        </div>
        <div>            
            <select class="detalle_" name="cmb_sed_" id="cmb_sed_" style="width:174px;">                
                <?php
                $xml_x="<Dato><usuario>".$_SESSION['dni']."</usuario></Dato>";
                $data=Logica::PA_UPLA("[general].[paCon_sede]","array",$xml_x);              
                opciones_combo($data,"id","detalle","SEDE");
                ?>             
            </select>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <?php set_imagen_style("img_cargando.gif","style='width: 132px;height: 17px;margin: -4px;padding-left: 38px;padding-right: 38px;display:none;' id='cargando_modalidad'");?>
            <select class="detalle_" name="cmb_mod_" id="cmb_mod_" style="width:200px;">                                           
                <option value="0">MODALIDAD</option>  
            </select>
            <script type="text/javascript">
            
                $("#cmb_sed_").change(function(){
                    Cargando("cargando_modalidad","cmb_mod_");
                    var codsede;
                    if((codsede=$(this).val())!='0')
                    {                        
                        $.get("modalidades_usu", {sede:codsede} ,function(resultado)
                        {
                          if($.trim(resultado)=='salir')
                          {
                              location.reload();
                          }
                          else
                          {
                              if(resultado != false)            
                              { 
                                $("#cmb_mod_").empty();                                
                                $("#cmb_mod_").append(resultado);
                                Cargando("cmb_mod_","cargando_modalidad");
                              }
                              else
                              {
                                Cargando("cmb_mod_","cargando_modalidad");
                              }
                          }
                        });
                    }
                    else
                    {
                        $("#cmb_mod_").empty();
                        $("#cmb_mod_").append('<option value="0">MODALIDAD</option>');
                    }

                });
            </script>
            <?php set_imagen_style("Flecha-1.png","style='position:relative;top: 5px;width: 30px;height: 20px;'")?>
            <select class="detalle_" name="sel_ciclo" id="sel_ciclo" style="width:68px;">
                <option value="0">CICLO</option>
                <option value="01">I</option>
                <option value="02">II</option>
                <option value="03">III</option>
                <option value="04">IV</option>
                <option value="05">V</option>
                <option value="06">VI</option>
                <option value="07">VII</option>
                <option value="08" >VIII</option>
                <option value="09">IX</option>
                <option value="10">X</option>
                <option value="11">XI</option>
                <option value="12">XII</option>                
            </select>   
            |                        
            <button class="css_btn" onclick="ver_salones();cargarcmbplanestudio();" style="width:64px;">Buscar</button>
            <button class="css_btn" onclick="nuevohorario();cargarcmbplanestudio();" style="width:64px;">Nuevo</button>
        </div>
        <br>
        
        <div id="versalones">         
            <div class="CSSTableSimple">        
                <table style="width:615px;" align="center">
                    <th>Nro</th>
                    <th>Sección</th>
                    <th>Local</th>
                    <th>Aula</th>                    
                    <tbody id="tbDetalle_salones">
                    </tbody>                    
                </table>
            </div>                        
        </div>
        <?php set_imagen_style("cargando1.gif","style='width: 313px;height: 283px;display:none;top: -15px;left: 158px;position: relative;' id='cargando_tabla'");?>

        </fieldset>
        <button class="css_btn" id='btnPrinter' >Imprimir Horario</button> 

        <fieldset style="padding-top: 0px;min-width: 670px;" id="fild_horario">
        <legend style="text-align:center;">Horario</legend>
        <div class="subtitulo" id="txt_guia1">            
        </div>
        <div class="subtitulo" id="txt_guia2">            
        </div>
        <br>
        <div>        

            <label style="padding-right: 2px;">Sección:</label>
            <input class="detalle_" type="text" id="txt_sec_x" style="width:40px;" />
            <select class="detalle_" name="cmb_catsec_" id="cmb_catsec_" style="width:40px;">
                <?php                    
                    $data=Logica::PA_UPLA("[Academico].[paCon_secciones]","array");                  
                    opciones_combo($data,"id","detalle","...");

                    
                ?> 
            </select>
            
            <label style="padding-right: 2px;">Local:</label>
            <input class="detalle_" type="text" id="txt_lug_x" style="width:188px;" maxlength="40" onkeyUp="return cambiarMay(this);"/>
       
            <label style="padding-right: 2px;">Aula:</label>
            <input class="detalle_" type="text" id="txt_aul_x" style="width:150px;" maxlength="40" onkeyUp="return cambiarMay(this);"/>
        |            
            <button class="css_btn" onclick="nuevohorario();" id="img_horario" style="width:105px">Nuevo</button>

            <button class="css_btn" onclick="rangodehoras();" id="btn_ranghoras_tb" style="width:105px">Rango-Horas</button>
            
            <button class="css_btn" onclick="vercapacidadeshorario();" id="btn_guardar_tb" style="width:105px">Continuar!</button>
            
        </div>
        
        <div class="CSSTableSimple_2" >        
            <table style="width:667px;max-width:667px;" id="tb_horario_z" align="center">
                <th>Hora/Dia</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miercoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
                <th>Domingo</th>                
                <tbody id="tbDetalle_horario">
                </tbody>                 
            </table>
            <table style="width:667px;max-width:667px;" id="tb_agregar_aux" align="center">
                <tr style='cursor: pointer;background:red;' onclick="agrear_fila('tbDetalle_horario','cant_filas_horario');">
                <td colspan="8">
                <?php 
                    set_imagen("agregar-item.png",'22','22','',"",'','agregar-item2.png','agregar-item.png');
                ?> 
                AGREGAR HORAS(45 minutos)
                </td>                
                </tr>
            </table>
        </div>
        <?php set_imagen_style("cargando1.gif","style='width: 313px;height: 283px;display:none;top: 0px;left: 158px;position: relative;' id='cargando_tabla_horarios'");?>
    </fieldset>
</div>


<div id="dialog-confirm-operacion" title="Mensaje" style="display:none">  
¿Que operación desea realizar?
</div>

<div id="dialog-confirm-eliminar" title="Mensaje" style="display:none">  
¿Desea eliminar este registro?
</div>


<div class="ventanaEmerg" id="horas" title="Determinar Rango de Fechas" style="display:none">  
    <div id="cerrarhoras" style="z-index: 120;background: rgb(0, 0, 0);height: 37px;width: 190px;top: 0px;position: absolute;left: 0px;border-radius: 7px 7px 0px 0px;cursor: pointer;">
        <div style="position: relative;top: 11px;left: -22;color: rgb(167, 167, 167);font-weight: bold;font-size: 14px">RANGO DE HORAS</div>
        <?php set_imagen("cerrar.png","25","25","cerrar","style='position: absolute;left: 150px;top:1px;padding: 6px;' onclick=$('#fondo_sombra').hide();$('#horas').hide();","","cerrar2.png","cerrar.png")?>
    </div>

    <div style="position: absolute;padding: 13px;left: 25px;top:35px;font-weight: bold;">
        DE
    </div>
    <div style="position: absolute;padding: 13px;left:0px;top:60px">
        <select class="detalle_" id="cmb_rangodehoras1" style="width: 79px;height: 35px;font: icon;font-size: 20px;">
            <!--option value="04:00">04:00</option><option value="04:15">04:15</option><option value="04:30">04:30</option><option value="04:45">04:45</option-->
            <option value="05:00">05:00</option><option value="05:15">05:15</option><option value="05:30">05:30</option>
            <option value="05:45">05:45</option><option value="06:00">06:00</option><option value="06:15" selected>06:15</option><option value="06:30">06:30</option><option value="06:45">06:45</option><option value="07:00">07:00</option><option value="07:15">07:15</option>
            <option value="07:30">07:30</option><option value="07:45">07:45</option><option value="08:00">08:00</option><option value="08:15">08:15</option><option value="08:30">08:30</option><option value="08:45">08:45</option><option value="09:00">09:00</option>
            <option value="09:15">09:15</option><option value="09:30">09:30</option><option value="09:45">09:45</option><option value="10:00">10:00</option><option value="10:15">10:15</option><option value="10:30">10:30</option><option value="10:45">10:45</option>
            <option value="11:00">11:00</option><option value="11:15">11:15</option><option value="11:30">11:30</option><option value="11:45">11:45</option><option value="12:00">12:00</option><option value="12:15">12:15</option><option value="12:30">12:30</option>
            <option value="12:45">12:45</option><option value="13:00">13:00</option><option value="13:15">13:15</option><option value="13:30">13:30</option><option value="13:45">13:45</option><option value="14:00">14:00</option><option value="14:15">14:15</option>
            <option value="14:30">14:30</option><option value="14:45">14:45</option><option value="15:00">15:00</option><option value="15:15">15:15</option><option value="15:30">15:30</option><option value="15:45">15:45</option><option value="16:00">16:00</option>
            <option value="16:15">16:15</option><option value="16:30">16:30</option><option value="16:45">16:45</option><option value="17:00">17:00</option><option value="17:15">17:15</option><option value="17:30">17:30</option><option value="17:45">17:45</option>
            <option value="18:00">18:00</option><option value="18:15">18:15</option><option value="18:30">18:30</option><option value="18:45">18:45</option><option value="19:00">19:00</option><option value="19:15">19:15</option><option value="19:30">19:30</option>
            <option value="19:45">19:45</option><option value="20:00">20:00</option><option value="20:15">20:15</option><option value="20:30">20:30</option><option value="20:45">20:45</option><option value="21:00">21:00</option><option value="21:15">21:15</option>
            <option value="21:30">21:30</option><option value="21:45">21:45</option><option value="22:00">22:00</option><option value="22:15">22:15</option><option value="22:30">22:30</option><option value="22:45">22:45</option><option value="23:00">23:00</option>
            <option value="23:15">23:15</option><option value="23:30">23:30</option><option value="23:45">23:45</option>
            
        </select>
    </div>
    <div style="position: absolute;padding: 13px;left:98px;top:35px;font-weight: bold;">
    HASTA
    </div>
    <script type="text/javascript">
        $("#cmb_rangodehoras1").click(function()
        {
            $("#cmb_rangodehoras2").empty();     
            var cuartos=["00","15","30","45"];        
            var array=$(this).val().split(":");                
            var i;
            var j;
            switch(array[1])
            {
                case "00": i=3;j=parseInt(array[0]);break;
                case "15": i=0;j=parseInt(array[0])+1;break;
                case "30": i=1;j=parseInt(array[0])+1;break;
                case "45": i=2;j=parseInt(array[0])+1;break;
            }

            array_horas=[];

            array_horas.push($(this).val());
            for (;j<24;) 
            {            
                var hora_aux=((j<10)?"0"+j:j)+":"+cuartos[i];
                $("<option>"+hora_aux+"</option>").appendTo("#cmb_rangodehoras2")  
                array_horas.push(hora_aux);

                switch(cuartos[i])
                {
                    case "00": i=3;j--;break;
                    case "15": i=0;break;
                    case "30": i=1;break;
                    case "45": i=2;break;
                }                
                j++;
            };        
        });
    </script>
    <div style="position: absolute;padding: 13px;left: 86px;top:60px">
        <select class="detalle_" id="cmb_rangodehoras2" style="width: 79px;height:35px;font: icon;font-size: 20px;">
    </select>
    </div>
    <HR class="raya" style="top: 100;position: relative;width: 169px;"> 
    <div>
        <button class="css_btn" style="position: relative;top:98px;height: 48px;width: 169px;" onclick="generarhoras(array_horas,'tbDetalle_horario','cant_filas_horario');">GENERAR HORAS</button>
    </div>
</div>
<!--======================== CAPACIDADES =====================-->

<div class="ventanaEmerg" id="capacidades_ventana" style="bottom: 167px;width: 600px;height:400px;">  
    <div id="cerrarhoras" style="z-index: 120;background: rgb(0, 0, 0);height: 37px;width: 620px;top: 0px;position: absolute;left: 0px;border-radius: 7px 7px 0px 0px;cursor: pointer;">
        <div id="cursosper_tit_capa" style="position: relative;top: 12px;left: -173;color: rgb(167, 167, 167);font-weight: bold;font-size: 12px">
        ASIGNAR CAPACIDADES POR CURSO
        </div>
        <?php set_imagen("cerrar.png","25","25","cerrar","style='position: absolute;left: 575px;top:0px;padding: 6px;' onclick=$('#fondo_sombra').hide();$('#capacidades_ventana').hide();","","cerrar2.png","cerrar.png")?>
    </div>
    <div  style="overflow-y: auto;height:400px;">
        <div class="CSSTableRayas" style="position: relative;top: 45px;">        
            <table style="width:500px;max-width:575px;" id="tb_horario_capacid" align="center">
                <tr>
                    <th rowspan="2">N°</th>
                    <th rowspan="2">Curso</th>
                    <th colspan="7">Dias</th>
                    <th rowspan="2">Ocup.</th>
                    <th rowspan="2">Capacidad</th>                    
                </tr>
                <tr>
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>               
                </tr>                                          

                <tbody id="tbDetalle_capa_horario">

                </tbody>                
            </table>
        </div>
        <button class="css_btn" style="position: relative;top: 76px;height: 48px;width: 169px;" id="btn_agregar_reg" onclick="if($('#salonact').val()=='0'){reg_salon__();}else{act_salon__();}">REGISTRAR</button>
    </div>    
</div>
<!--============================================================-->
<div class="ventanaEmerg" id="cursosper" title="Agregar Curso" style="height:362px;bottom: 167px;width: 220px;">  
    <div id="cerrarhoras" style="z-index: 120;background: rgb(0, 0, 0);height: 37px;width: 240px;top: 0px;position: absolute;left: 0px;border-radius: 7px 7px 0px 0px;cursor: pointer;">
        <div id="cursosper_tit" style="position: relative;top: 12px;left: -19;color: rgb(167, 167, 167);font-weight: bold;font-size: 12px"></div>
        <?php set_imagen("cerrar.png","25","25","cerrar","style='position: absolute;left: 201px;top:0px;padding: 6px;' onclick=$('#fondo_sombra').hide();$('#cursosper').hide();","","cerrar2.png","cerrar.png")?>
    </div>

    <div style="position: relative;top:35px;font-weight: bold;font-size: 14px;">
        PLAN DE ESTUDIO
    </div>
    <div style="position: relative;top:39px">
        <select class="detalle_" id="cmb_planes" style="width: 205px;height: 35px;font: icon;font-size: 12px;">                               
        </select>
    </div>
    <script type="text/javascript">
        $("#cmb_planes").click(function()
        {
           cargarcmbcursos(); 
        });
    </script>
    <HR class="raya" style="top: 30;position: relative;"> 
    <div style="position: relative;top:28px;font-weight: bold;font-size: 14px;">
    CURSO
    </div>
    <script type="text/javascript">
        $("#cmb_rangodehoras1").click(function()
        {
            $("#cmb_rangodehoras2").empty();     
            var cuartos=["00","15","30","45"];        
            var array=$(this).val().split(":");                
            var i;
            var j;
            switch(array[1])
            {
                case "00": i=3;j=parseInt(array[0]);break;
                case "15": i=0;j=parseInt(array[0])+1;break;
                case "30": i=1;j=parseInt(array[0])+1;break;
                case "45": i=2;j=parseInt(array[0])+1;break;
            }

            array_horas=[];

            array_horas.push($(this).val());
            for (;j<24;) 
            {            
                var hora_aux=((j<10)?"0"+j:j)+":"+cuartos[i];
                $("<option>"+hora_aux+"</option>").appendTo("#cmb_rangodehoras2")  
                array_horas.push(hora_aux);

                switch(cuartos[i])
                {
                    case "00": i=3;j--;break;
                    case "15": i=0;break;
                    case "30": i=1;break;
                    case "45": i=2;break;
                }                
                j++;

            };        
        });
        
        var generarhorashasta=function()
        {
            $("#cmb_rangodehoras2").empty();     
            var cuartos=["00","15","30","45"];        
            var array=$("#cmb_rangodehoras1").val().split(":");                
            var i;
            var j;
            switch(array[1])
            {
                case "00": i=3;j=parseInt(array[0]);break;
                case "15": i=0;j=parseInt(array[0])+1;break;
                case "30": i=1;j=parseInt(array[0])+1;break;
                case "45": i=2;j=parseInt(array[0])+1;break;
            }

            array_horas=[];

            array_horas.push($("#cmb_rangodehoras1").val());
            for (;j<24;) 
            {            
                var hora_aux=((j<10)?"0"+j:j)+":"+cuartos[i];
                $("<option>"+hora_aux+"</option>").appendTo("#cmb_rangodehoras2")  
                array_horas.push(hora_aux);

                switch(cuartos[i])
                {
                    case "00": i=3;j--;break;
                    case "15": i=0;break;
                    case "30": i=1;break;
                    case "45": i=2;break;
                }                
                j++;

            }; 
        }
    </script>
    <div style="position: relative;top:30px">
        <?php set_imagen_style("img_cargando.gif","style='width: 176px;height:22px;margin: 4px;display: inline;' id='cargando_cursos'");?>
        <select class="detalle_" id="cmb_cursos" style="width: 205px;height:35px;font: icon;font-size: 12px;">                    
        </select>
    </div>
    <!--HR class="raya" style="top: 21;position: relative;">     
    <div style="position: relative;top:24px">
        <select class="detalle_" name="sel_cant" id="sel_cant" style="width: 205px;height:35px;font: icon;font-size: 12px;">
                <option value="0">CAPACIDAD</option>
                <?php opciones_combo_numeros(1,100);?>                 
        </select> 
    </div-->
    <HR class="raya" style="top: 21;position: relative;">       
    <div style="position: relative;top:19px;font-weight: bold;font-size: 14px;">
        COLOR
    </div>
    <div style="position: relative;top:24px">
        <select class="detalle_" id="cmb_colorcelda" style="width: 205px;height:35px;font: icon;font-size: 12px;">
          <option value="BLANCO" style="background:rgb(255,255,255);">BLANCO</option>
          <option value="AZUL" style="background:rgba(0,70,219,0.4);">AZUL</option>
          <option value="VERDE" style="background:rgba(92,221,92,0.4);">VERDE</option>
          <option value="AMARILLO" style="background:rgba(250, 230, 0, 0.4);">AMARILLO</option>
          <option value="ROSADO" style="background:rgba(185,92,221,0.4);">ROSADO</option>
          <option value="CELESTE" style="background:rgba(92,200,221,0.4);">CELESTE</option>
          <option value="ROJO" style="background:rgba(255,0,0,0.4);">ROJO</option>
          <option value="LIMON" style="background:rgba(163,255,0,0.4);">LIMON</option>
          <option value="MARRON" style="background:rgba(138, 77, 10, 0.4);">MARRON</option>
          <option value="VIOLETA" style="background:rgba(88, 0, 219, 0.4);">VIOLETA</option>
          <option value="CELESTE_AGUA" style="background:rgba(0, 219, 210, 0.4);">CELESTE AGUA</option>          
          <option value="NARANJADO" style="background:rgba(255, 163, 0, 0.4);">NARANJADO</option>
          <option value="AMARILLO_OSCURO" style="background:rgba(204, 171, 0, 0.4);">AMARILLO OSCURO</option>
          <option value="MORADO" style="background:rgba(75, 0, 117, 0.4);">MORADO</option>  
          <option value="CELESTE_OSCURO" style="background:rgba(0, 104, 185, 0.4);">CELESTE OSCURO</option> 
          <option value="ROJO_OSCURO" style="background:rgba(156, 0, 0, 0.4);">ROJO OSCURO</option> 
          <option value="VERDE_OSCURO" style="background:rgba(5, 122, 28, 0.4);">VERDE OSCURO</option> 
          <option value="ROSADO_CLARO" style="background:rgba(255, 182, 182, 0.4);">ROSADO CLARO</option>                              
        </select>
    </div>

    <HR class="raya" style="top: 21;position: relative;">

    <div style="position: relative;top:19px;font-weight: bold;font-size: 14px;">
        OBSERVACIÓN
    </div>
    <div class="detalle_" style="top: 22px;position: relative;width: 205px;left: 8;height: 38px;">
        <textarea id='ta_obs_x' rows='2' cols='26'></textarea>
    </div>
    <HR class="raya" style="top: 21;position: relative;width: 200px;">
    <div>
        <button class="css_btn" style="position: relative;top: 21px;height: 48px;width: 169px;" id="btn_agregar" onclick="if(edicion_o_nuevo=='e'){if(comprobar_cursos($('#cmb_cursos').val())){agregarhora_tabla();}else{notificacion(1,'¡Advertencia!','No puede agregar este curso porque ya exiten alumnos en este mismo curso.');}}else{agregarhora_tabla();}">AGREGAR</button>
        <button class="css_btn" style="position: relative;top: 21px;height: 48px;width: 169px;" id="btn_cambiar" onclick="volvernormalcelda(indice);agregarhora_tabla();">CAMBIAR</button>
    </div>
    <input type="hidden" id="indice_horario" val=""/>
</div>

<!--..................................................................................................-->
<!--pop pup -->
<!--..................................................................................................-->

<div class="menu_horario" id="menu_horario1">
        <ul>
            <li id="Combinar_celdas" style="position: relative;left: -20;">Combinar</li>
        </ul>
</div>
<div class="menu_horario" id="menu_horario2">
        <ul>            
            <li id="Asignar_Curso" style="position: relative;left: -26;">Asignar</li>            
        </ul>
</div>
<div class="menu_horario" id="menu_horario3">
        <ul>
            <li id="Asignar_Curso" style="position: relative;left: -26;">Asignar</li>            
            <HR class="raya" style="top: -2;position: relative;width: 95px;left: -27;background-color: rgba(155, 155, 155, 0.25);"> 
            <li id="Dividir_celdas" style="position: relative;left: -26;">Dividir</li>            
        </ul>
</div>

<div class="menu_horario" id="menu_horario4">
        <ul>            
            <li id="Editar_Curso" style="position: relative;left: -26;">Editar</li>
            <HR class="raya" style="top: -2;position: relative;width: 95px;left: -27;background-color: rgba(155, 155, 155, 0.25);"> 
            <li id="Quitar_celda" style="position: relative;left: -26;">Quitar</li>            
        </ul>
</div>
<div class="menu_horario" id="menu_horario5">
        <ul>
            <li id="Editar_Curso" style="position: relative;left: -26;">Editar</li>            
            <HR class="raya" style="top: -2;position: relative;width: 95px;left: -27;background-color: rgba(155, 155, 155, 0.25);"> 
            <li id="Deshacer_celdas" style="position: relative;left: -26;">Quitar</li>            
        </ul>
</div>
<div class="menu_horario" id="menu_horario6">
        <ul>
            <li id="edit_celdas" style="position: relative;left: -26;">Editar</li>            
            <li id="Deshacer_celdas" style="position: relative;left: -26;">Quitar</li>            
        </ul>
</div>
<div id="fondo_sombra" style="width: 100%;height: 100%;background-color: rgba(0,0,0,0.2);display: none;position: fixed;top: 0;left: 0;"></div>
<script>

    dias=['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
    indice="";
    /* mostramos el menú si hacemos click derecho
    con el ratón */
    $(document).bind("contextmenu", function(e){
        
        $("#menu_horario1").css("display", "none");
        $("#menu_horario2").css("display", "none");
        $("#menu_horario3").css("display", "none");
        $("#menu_horario4").css("display", "none");
        $("#menu_horario5").css("display", "none");
        $("#menu_horario6").css("display", "none");

        indice=e.target.id;        
        var array_indices_x=$.trim(indice).split('_');
        if($.inArray(array_indices_x[0],dias)>=0)
        {            
            if(typeof(array_horarios[indice])==="undefined")            
            {
                cambiarcolorcelda(indice);
                sombrearitems("#horas_"+array_indices_x[1]);
            }

            if(array_celdas.length>1)                            
                $("#menu_horario1").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
            else 
            {
                //busco el siguiente registro, para ver si es una celda combinada
                if(existe_idTd([array_indices_x[0]+'_'+(parseInt(array_indices_x[1])+1)],parseInt(array_indices_x[1])+1))
                {
                    if($("#"+indice).text()!="")
                        $("#menu_horario4").css({'display':'block', 'left':e.pageX, 'top':e.pageY});                        
                    else
                        $("#menu_horario2").css({'display':'block', 'left':e.pageX, 'top':e.pageY});                        
                }
                else
                    if($("#"+indice).text()!="")
                    {                        
                        if(edicion_o_nuevo=='e')
                        {
                            $("#menu_horario6").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
                        }
                        else
                        {
                            $("#menu_horario5").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
                        }    
                    }                        
                    else
                        $("#menu_horario3").css({'display':'block', 'left':e.pageX, 'top':e.pageY});
            }

            return false;

        }      
            
    });
          
    //cuando hagamos click, el menú desaparecerá
    $(document).click(function(e){
        if(e.button == 0){
            $("#menu_horario1").css("display", "none");
            $("#menu_horario2").css("display", "none");
            $("#menu_horario3").css("display", "none");
            $("#menu_horario4").css("display", "none");
            $("#menu_horario5").css("display", "none");
            $("#menu_horario6").css("display", "none");
        }
    });

    //si pulsamos escape, el menú desaparecerá
    $(document).keydown(function(e){
        if(e.keyCode == 27){
            $("#menu_horario1").css("display", "none");
            $("#menu_horario2").css("display", "none");
            $("#menu_horario3").css("display", "none");
            $("#menu_horario4").css("display", "none");
            $("#menu_horario5").css("display", "none");
            $("#menu_horario6").css("display", "none");
            $("#cursosper").css("display", "none");
            $("#horas").css("display", "none");
            $("#fondo_sombra").css("display", "none");
        }
    });
     
    //controlamos los botones del menú
    $("#menu_horario1").click(function(e){
           
        // El switch utiliza los IDs de los <li> del menú
        switch(e.target.id)
        {
            case "Combinar_celdas":
                //alert("combinando!");
                var array_aux=indice.split("_");      
                var obj="";
                var celdas=0;              
                var una=true;
                for(var i=0;i<array_celdas.length;i++)
                {
                    if (array_aux[0]==array_celdas[i].split("_")[0])
                    {
                        if(una)
                        {
                            obj=array_celdas[i];
                            una=false;
                        }

                        celdas++;
                    }                            
                }             
                combinarceldas(obj,celdas);     
                $("#cmb_cursos").prop("disabled",false);
                $("#btn_agregar").show();
                $("#btn_cambiar").hide();
                agregarcurso(obj);                
            break;                      
        }
           
    });

    //controlamos los botones del menú
    $("#menu_horario2").click(function(e){        
        // El switch utiliza los IDs de los <li> del menú
        switch(e.target.id)
        {
            case "Asignar_Curso": 
                $("#btn_agregar").show();
                $("#btn_cambiar").hide();   
                $("#cmb_cursos").prop("disabled",false);                                                      
                agregarcurso(indice);
            break;
        }
           
    });

    //controlamos los botones del menú
    $("#menu_horario3").click(function(e){
        
        var array_indice=indice.split("_");

        // El switch utiliza los IDs de los <li> del menú
        switch(e.target.id)
        {
            case "Asignar_Curso": 
                $("#btn_agregar").show();
                $("#btn_cambiar").hide();
                $("#cmb_cursos").prop("disabled",false);

                agregarcurso(indice);
            break;
            case "Dividir_celdas":        
                //$("#"+indice).text("");  
                //$("#tbDetalle_capa_horario").empty();                                                          
                //alert("quitando1");
                quitarRowspanAtds(array_indice[0]);                
                dividirceldas(indice);          
                devolverRowspanAtds();
                array_rowspan_columnas=[];                
            break;
        }
           
    });

    //controlamos los botones del menú
    $("#menu_horario4").click(function(e)
    {        
        var array_indice=indice.split("_");

        if(parseInt(array_celdas_horario_curso[$("#"+array_indice[0]+"_cod_"+array_indice[1]).val()].split("_")[8])==0)
        {
            // El switch utiliza los IDs de los <li> del menú
            switch(e.target.id)
            {
                case "Editar_Curso":                                     
                    $("#btn_agregar").hide();
                    $("#btn_cambiar").show();  

                    editarcurso(indice);
                    //volvernormalcelda(indice);
                break;
                case "Quitar_celda":        
                    volvernormalcelda(indice);                                                            
                break;
            }
        }
        else
            notificacion(1,"¡Advertencia!","No puede quitar este curso porque ya tiene estudiantes matriculados.",4); 
           
    });

    //controlamos los botones del menú
    $("#menu_horario5").click(function(e){
        
        var array_indice=indice.split("_");

        if(parseInt(array_celdas_horario_curso[$("#"+array_indice[0]+"_cod_"+array_indice[1]).val()].split("_")[8])==0)
        {
            // El switch utiliza los IDs de los <li> del menú
            switch(e.target.id)
            {
                case "Editar_Curso":                         
                        $("#btn_agregar").hide();
                        $("#btn_cambiar").show();
                        editarcurso(indice);
                        //volvernormalcelda(indice);
                break;
                case "Deshacer_celdas":   
                    
                        //$("#tbDetalle_capa_horario").empty();     
                        volvernormalcelda(indice);
                        //alert("termino volver");
                        quitarRowspanAtds(array_indice[0]);                
                        //alert("divirdir el mesmo");
                        dividirceldas(indice);  
                        //alert("divirdido el mesmo");
                        devolverRowspanAtds();
                        array_rowspan_columnas=[];                                         
                break;
            }
        }
        else
            notificacion(1,"¡Advertencia!","No puede quitar este curso porque ya tiene estudiantes matriculados.",4); 
           
    });

    $("#menu_horario6").click(function(e){
        
        var array_indice=indice.split("_");

        if(parseInt(array_celdas_horario_curso[$("#"+array_indice[0]+"_cod_"+array_indice[1]).val()].split("_")[8])==0)
        {
            // El switch utiliza los IDs de los <li> del menú
            switch(e.target.id)
            {                
                case 'edit_celdas':                                        
                    $("#btn_agregar").hide();
                    $("#btn_cambiar").show();                                      
                    editarcurso(indice);
                break;
                case "Deshacer_celdas":   
                    
                        //$("#tbDetalle_capa_horario").empty();     
                        volvernormalcelda(indice);
                        //alert("termino volver");
                        quitarRowspanAtds(array_indice[0]);                
                        //alert("divirdir el mesmo");
                        dividirceldas(indice);  
                        //alert("divirdido el mesmo");
                        devolverRowspanAtds();
                        array_rowspan_columnas=[];                                         
                break;
            }
        }
        else
            notificacion(1,"¡Advertencia!","No puede quitar este curso porque ya tiene estudiantes matriculados."); 
           
    });

</Script>
